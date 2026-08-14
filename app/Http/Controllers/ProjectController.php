<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Http\Requests\StoreprojectRequest;
use App\Http\Requests\UpdateprojectRequest;
use App\Http\Controllers\BaseController;
use App\Models\Plan;
use App\Models\PlanImage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Models\project_image;
class ProjectController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Admin.projects');
    }
    public function viewplans()
    {
        return view('Admin.plans');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function projectlist(){
        $projects = project::all();
        $images=[];
        $projectsarr=[];
        foreach($projects as $project){
            $images=[];
            $project_images=  project_image::where('project_id',$project->id)->get();
            foreach($project_images as $project_image){
                $images[]=$project_image->image;
            }

            $projectsarr[$project->id]=$project;
            $projectsarr[$project->id]['image']=json_encode($images);
    
        }



        return DataTables::of($projectsarr)
            ->editColumn('image', function ($model) {
                return $this->renderImageList(json_decode($model->image, true) ?: [], 'image');
            })
            ->editColumn('category', function ($model) {
                return $model->category ?: '-';
            })
            ->editColumn('year', function ($model) {
                return $model->year ?: '-';
            })
            ->addColumn('actions', function ($model) {
                return '<div class="table-actions">
                <a href="javascript:void(0)" class="load-modal" title="Edit"
                data-url="' . route('projects.modal', ['id' => $model->id]) . '">
                    <i class="fas fa-edit text-primary"></i>
                </a>
                <a href="javascript:void(0)" class="delete" title="Delete"
                data-url="' . route('delete.projects', ['id' => $model->id]) . '">
                    <i class=" dripicons-trash text-danger"></i>
                </a>
                </div>';
                        
            })
            ->rawColumns(['image','actions'])
            ->addIndexColumn()
            ->make(true);
    }

    public function planlist(){
        $projects = Plan::all();
        $images=[];
        $projectsarr=[];
        foreach($projects as $project){
            $images=[];
            $project_images=  PlanImage::where('project_id',$project->id)->get();
            foreach($project_images as $project_image){
                $images[]=$project_image->image;
            }

            $projectsarr[$project->id]=$project;
            $projectsarr[$project->id]['image']=json_encode($images);
    
        }



        return DataTables::of($projectsarr)
            ->editColumn('image', function ($model) {
                return $this->renderImageList(json_decode($model->image, true) ?: [], 'image');
            })
            ->addColumn('actions', function ($model) {
                return '<div class="table-actions">
                <a href="javascript:void(0)" class="load-modal" title="Edit"
                data-url="' . route('plan.modal', ['id' => $model->id]) . '">
                    <i class="fas fa-edit text-primary"></i>
                </a>
                <a href="javascript:void(0)" class="delete" title="Delete"
                data-url="' . route('delete.plan', ['id' => $model->id]) . '">
                    <i class=" dripicons-trash text-danger"></i>
                </a>
                </div>';
                        
            })
            ->rawColumns(['image','actions'])
            ->addIndexColumn()
            ->make(true);
    }

    
    public function projects($id = null){

        $project = $id ? project::findOrFail($id) : null;
        $images = $id ? project_image::where('project_id', $id)->pluck('image') : collect();

        return View('Admin.modals.add_projects_modal')->with([
            'project' => $project,
            'images' => $images,
        ]);
    }

    public function plansModal($id = null){

        $plan = $id ? Plan::findOrFail($id) : null;
        $images = $id ? PlanImage::where('project_id', $id)->pluck('image') : collect();

        return View('Admin.modals.add_plans_modal')->with([
            'plan' => $plan,
            'images' => $images,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprojectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprojectRequest $request)
    {
       
        
        $id = project::insertRow([
            'type' => $request->type,
            'title' => $request->title,
            'location' => $request->location,
            'category' => $request->category,
            'year' => $request->year,
            'description' => $request->description,
        ]);

        if($files = $request->file('image')){
            $this->saveImages($files, $id->id, project_image::class, 'Project_image');
        }

        return self::response('success', 'Successfully Added New Project!');
    }

    public function storeplan(StoreprojectRequest $request)
    {
        $destinationPath = 'image';
        $destinationPath = public_path('image'); // Path to the public/image directory
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true); // Create the directory if it doesn't exist
        }
        
        $id = Plan::insertRow([
            'type' => $request->type,
            'title' => $request->title,
            'location' => $request->location,
        ]);

        if($files=$request->file('image')){
            $this->saveImages($files, $id->id, PlanImage::class, 'Plan_image');
        }

        return self::response('success', 'Successfully Added New Project!');
    }

    public function delete($id)
    {
        project::deleteById($id);
        project_image::deleteSelected(['project_id'=> $id]);
      
        return self::response('success', 'Deleted!');
    }

    public function deleteplan($id)
    {
        Plan::deleteById($id);
        PlanImage::deleteSelected(['project_id'=> $id]);
      
        return self::response('success', 'Deleted!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprojectRequest  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable'],
            'type' => ['required'],
            'title' => ['required'],
            'location' => ['required'],
            'category' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'digits:4'],
            'description' => ['nullable', 'string'],
        ]);

        project::updateById($id, [
            'type' => $request->type,
            'title' => $request->title,
            'location' => $request->location,
            'category' => $request->category,
            'year' => $request->year,
            'description' => $request->description,
        ]);

        if($files = $request->file('image')){
            project_image::deleteSelected(['project_id'=> $id]);
            $this->saveImages($files, $id, project_image::class, 'Project_image');
        }

        return self::response('success', 'Successfully Updated Project!');
    }

    public function updateplan(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable'],
            'type' => ['required'],
            'title' => ['required'],
            'location' => ['required'],
        ]);

        Plan::updateById($id, [
            'type' => $request->type,
            'title' => $request->title,
            'location' => $request->location,
        ]);

        if($files = $request->file('image')){
            PlanImage::deleteSelected(['project_id'=> $id]);
            $this->saveImages($files, $id, PlanImage::class, 'Plan_image');
        }

        return self::response('success', 'Successfully Updated Plan!');
    }

    private function saveImages($files, $projectId, $imageModel, $prefix)
    {
        $destinationPath = public_path('image');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        foreach($files as $key => $file){
            $extension = $file->getClientOriginalExtension();
            $name = date('Y-m-d_H-i-s') . '_' . $projectId . '_' . $prefix . '_' . $key . '_' . uniqid();

            if ($extension) {
                $name .= '.' . $extension;
            }

            $file->move($destinationPath, $name);

            $imageModel::insertRow([
                'project_id' => $projectId,
                'image' => $name,
            ]);
        }
    }

    private function renderImageList(array $images, $folder)
    {
        if (empty($images)) {
            return '<span class="text-muted">No image</span>';
        }

        $html = '<div class="admin-image-list">';

        foreach(array_slice($images, 0, 3) as $image){
            $html .= '<img src="' . asset($folder . '/' . $image) . '" alt="' . e($image) . '" title="' . e($image) . '">';
        }

        if (count($images) > 3) {
            $html .= '<span class="admin-image-count">+' . (count($images) - 3) . '</span>';
        }

        $html .= '</div>';

        return $html;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
    }
}
