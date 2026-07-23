<?php

namespace App\Http\Controllers;

use App\Models\ModelProject;
use App\Http\Requests\StoreModelProjectRequest;
use App\Http\Requests\UpdateModelProjectRequest;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\Facades\DataTables;

class ModelProjectController extends BaseController
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
        $update =ModelProject::all();
        return view('Admin.model_projects');
    }

    public function messagelist(){
        $projects = ModelProject::all();
      


        return DataTables::of($projects)
            ->addColumn('image', function ($model) {
                $url = asset('images/modelprojects/'.$model->image_path);
                return '<img src="' . $url . '" alt="Image" style="height:50px;width:50px;">';
            })
            ->addColumn('actions', function ($model) {
                return '<a href="javascript:void(0)" class="delete" title="Delete"
                data-url="' . route('delete.ModernProjects', ['id' => $model->id]) . '">
                    <i class=" dripicons-trash text-danger"></i>
                </a>';
                        
            })
            ->rawColumns(['image','actions'])
            ->addIndexColumn()
            ->make(true);
    }

    public function delete($id)
    {
        ModelProject::deleteById($id);
        return self::response('success', 'Deleted!');
    }
    public function projects(){

        return View('Admin.modals.add_modern_projects_modal');
    }

    public function store(StoreModelProjectRequest $request)
    {
        // Validate the request
      
        // Handle the image upload
        if ($file = $request->file('image')) {
            // Generate a unique file name
            $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Move the file to the 'public/images' directory
            $filePath = $file->move(public_path('images/modelprojects/'), $name);
            
            // Insert the data into the database
            ModelProject::create([
                'name' => $request->input('name'),
                'image_path' => $name,
            ]);
    
            // Return a success response
            return response()->json(['status' => 'success', 'message' => 'Successfully Added New Project!']);
        }
    
        // Return an error response if the file is not provided
        return response()->json(['status' => 'error', 'message' => 'Image upload failed!'], 400);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModelProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModelProject  $modelProject
     * @return \Illuminate\Http\Response
     */
    public function show(ModelProject $modelProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelProject  $modelProject
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelProject $modelProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModelProjectRequest  $request
     * @param  \App\Models\ModelProject  $modelProject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModelProjectRequest $request, ModelProject $modelProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelProject  $modelProject
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(ModelProject $modelProject)
    {
        //
    }
}
