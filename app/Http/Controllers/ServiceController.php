<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;
use App\Http\Controllers\BaseController;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
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
            ->editColumn('image', function ($model) {
                if (empty($model->image)) {
                    return '<span class="admin-table-placeholder">No image</span>';
                }

                $filename = str_replace(':', '_', $model->image);
                $src = e(asset('image/' . $filename));
                $alt = e($model->title ?: 'Service image');

                return '<img src="' . $src . '" alt="' . $alt . '" class="admin-table-thumb">';
            })
            ->editColumn('icon', function ($model) {
                $icon = trim((string) $model->icon);

                if ($icon === '') {
                    return '<span class="admin-table-placeholder">No icon</span>';
                }

                return '<span class="admin-service-icon" title="' . e($icon) . '"><i class="' . e($icon) . '"></i></span>';
            })
            ->addColumn('actions', function ($model) {
                return '<div class="table-actions">
                <a href="javascript:void(0)" class="load-modal" title="Edit"
                data-url="' . route('service.modal', ['id' => $model->id]) . '">
                    <i class="fas fa-edit text-primary"></i>
                </a>
                <a href="javascript:void(0)" class="delete" title="Delete"
                data-url="' . route('delete.service', ['id' => $model->id]) . '">
                    <i class=" dripicons-trash text-danger"></i>
                </a>
                </div>';
                        
            })
            ->rawColumns(['image', 'icon', 'actions'])
            ->addIndexColumn()
            ->make(true);
    }

    public function service($id = null){

        $service = $id ? service::findOrFail($id) : null;
        return View('Admin.modals.add_service_modal')->with(['service' => $service]);
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

        $filename = null;
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable'],
            'icon' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $data = [
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
        ];

        if($request->file('image')){
            $file = $request->file('image');
            $data['image'] = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('image'), $data['image']);
        }

        service::updateById($id, $data);

        return self::response('success', 'Successfully Updated Service!');
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
