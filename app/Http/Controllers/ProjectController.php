<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Http\Requests\StoreprojectRequest;
use App\Http\Requests\UpdateprojectRequest;
use App\Http\Controllers\BaseController;
use App\Models\Plan;
use App\Models\PlanImage;
use Yajra\DataTables\DataTables;

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
            ->addColumn('actions', function ($model) {
                return '<a href="javascript:void(0)" class="delete" title="Delete"
                data-url="' . route('delete.projects', ['id' => $model->id]) . '">
                    <i class=" dripicons-trash text-danger"></i>
                </a>';
                        
            })
            ->rawColumns(['actions'])
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
            ->addColumn('actions', function ($model) {
                return '<a href="javascript:void(0)" class="delete" title="Delete"
                data-url="' . route('delete.plan', ['id' => $model->id]) . '">
                    <i class=" dripicons-trash text-danger"></i>
                </a>';
                        
            })
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
    }

    
    public function projects(){

        return View('Admin.modals.add_projects_modal');
    }

    public function plansModal(){

        return View('Admin.modals.add_plans_modal');
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
        ]);
        $i=0;

        if($files=$request->file('image')){
            foreach($files as $key=>$file){
                
                $name= date('Y-m-dH:i:s').'Project_image'.$key;
                $file->move('image',$name);

                project_image::insertRow([
                    'project_id' => $id->id,
                    'image' => $name,
                ]);
                $i++;
            }
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
        $i=0;

        if($files=$request->file('image')){
            foreach($files as $key=>$file){
                
                $destinationPath = public_path('image'); // Define the directory path
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true); // Create the directory with write permissions
                }

                $name = date('Y-m-d_H-i-s') . '_Plan_image' . $key; // Generate a unique filename
                $file->move($destinationPath, $name); 

                PlanImage::insertRow([
                    'project_id' => $id->id,
                    'image' => $name,
                ]);
                $i++;
            }
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
    public function update(UpdateprojectRequest $request, project $project)
    {
        //
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
