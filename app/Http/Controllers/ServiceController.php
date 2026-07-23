<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;
use App\Http\Controllers\BaseController;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class ServiceController extends BaseController
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
        return view('services');
    }

    public function serviceAdmin(){

        return View('Admin.services');
    }

    public function servicelist(){
        $rows = service::all();

        return DataTables::of($rows)
            ->addColumn('actions', function ($model) {
                return '<a href="javascript:void(0)" class="delete" title="Delete"
                data-url="' . route('delete.service', ['id' => $model->id]) . '">
                    <i class=" dripicons-trash text-danger"></i>
                </a>';
                        
            })
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
    }

    public function service(){

        return View('Admin.modals.add_service_modal');
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
     * @param  \App\Http\Requests\StoreserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreserviceRequest $request)
    {

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);

        }


        
    
        service::insertRow([
            'image' => $filename,
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        
        return self::response('success', 'Successfully Added New Service!');
    }

    public function delete($id)
    {
        service::deleteById($id);
        return self::response('success', 'Deleted!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserviceRequest  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateserviceRequest $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        //
    }
}
