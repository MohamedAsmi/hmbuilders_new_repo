<?php

namespace App\Http\Controllers;

use App\Models\PlanImage;
use App\Http\Requests\StorePlanImageRequest;
use App\Http\Requests\UpdatePlanImageRequest;

class PlanImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePlanImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanImage  $planImage
     * @return \Illuminate\Http\Response
     */
    public function show(PlanImage $planImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanImage  $planImage
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanImage $planImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanImageRequest  $request
     * @param  \App\Models\PlanImage  $planImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanImageRequest $request, PlanImage $planImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanImage  $planImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanImage $planImage)
    {
        //
    }
}
