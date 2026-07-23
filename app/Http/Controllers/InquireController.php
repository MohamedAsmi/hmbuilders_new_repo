<?php

namespace App\Http\Controllers;

use App\Models\inquire;
use App\Http\Requests\StoreinquireRequest;
use App\Http\Requests\UpdateinquireRequest;
use App\Http\Controllers\BaseController;
use Yajra\DataTables\DataTables;

class InquireController extends BaseController
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
        $update =inquire::where('status',0)->update(['status'=>1]);
        return view('Admin.inquires');
    }

    public function projectlist(){
        $projects = inquire::all();
      


        return DataTables::of($projects)
            ->addColumn('actions', function ($model) {
                return '<a href="javascript:void(0)" class="delete" title="Delete"
                data-url="' . route('delete.inquires', ['id' => $model->id]) . '">
                    <i class=" dripicons-trash text-danger"></i>
                </a>';
                        
            })
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
    }

    public function delete($id)
    {
        inquire::deleteById($id);
        return self::response('success', 'Deleted!');
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
     * @param  \App\Http\Requests\StoreinquireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreinquireRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inquire  $inquire
     * @return \Illuminate\Http\Response
     */
    public function show(inquire $inquire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inquire  $inquire
     * @return \Illuminate\Http\Response
     */
    public function edit(inquire $inquire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinquireRequest  $request
     * @param  \App\Models\inquire  $inquire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateinquireRequest $request, inquire $inquire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inquire  $inquire
     * @return \Illuminate\Http\Response
     */
    public function destroy(inquire $inquire)
    {
        //
    }
}
