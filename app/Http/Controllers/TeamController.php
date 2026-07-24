<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreteamRequest;
use App\Http\Requests\UpdateteamRequest;
use Illuminate\Support\Facades\Validator;

use Illuminate\Contracts\View\View;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\team;
use App\Models\service;
use App\Models\contact;
use App\Models\inquire;

class TeamController extends BaseController
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
        $team =team::all();
        $service =service::all();
        $contact =contact::all();
        $inquire =inquire::all();


        // $teamstatus =team::where('status',0)->get();
        // $servicestatus =service::where('status',0)->get();
        $contactstatus =contact::where('status',0)->get();
        $inquirestatus =inquire::where('status',0)->get();
        return View('Admin.index')->with(['team'=>count($team),'service'=>count($service),'contact'=>count($contact),'inquire'=>count($inquire),'contactstatus'=>count($contactstatus),'inquirestatus'=>count($inquirestatus)]);
    }

    public function AddTeam()
    {

        return View('Admin.team');
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

    public function teamlist()
    {
        $rows = team::all();

        return DataTables::of($rows)
        ->addColumn('actions', function ($model) {
            return '<div class="table-actions">
            <a href="javascript:void(0)" class="load-modal" title="Edit"
            data-url="' . route('team.modal', ['id' => $model->id]) . '">
                <i class="fas fa-edit text-primary"></i>
            </a>
            <a href="javascript:void(0)" class="delete" title="Delete"
            data-url="' . route('delete.team', ['id' => $model->id]) . '">
                <i class=" dripicons-trash text-danger"></i>
            </a>
            </div>';
                    
        })
        ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
    }
    
    public function team($id = null)
    {
        $member = $id ? team::findOrFail($id) : null;
        return View('Admin.modals.add_team_modal')->with(['member' => $member]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreteamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreteamRequest $request)
    {

        $filename = null;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);

        }

        team::insertRow([
            'image' => $filename,
            'name' => $request->name,
            'qualification' => $request->qualification,
            'position' => $request->position,
        ]);

        return self::response('success', 'Successfully Added New Member!');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(team $team)
    {
        //
    }

    public function delete($id)
    {
        team::deleteById($id);
        return self::response('success', 'Deleted!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateteamRequest  $request
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable'],
            'name' => ['required'],
            'qualification' => ['required'],
            'position' => ['required'],
        ]);

        $data = [
            'name' => $request->name,
            'qualification' => $request->qualification,
            'position' => $request->position,
        ];

        if($request->file('image')){
            $file = $request->file('image');
            $data['image'] = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('image'), $data['image']);
        }

        team::updateById($id, $data);

        return self::response('success', 'Successfully Updated Member!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(team $team)
    {
        //
    }
}
