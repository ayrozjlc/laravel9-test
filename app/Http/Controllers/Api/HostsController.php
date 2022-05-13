<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHostsRequest;
use App\Models\Hosts;
use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class HostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hosts = Hosts::all();
        return BaseResource::collection($hosts);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHostsRequest $request)
    {
        $hosts = hosts::create($request->all());

        return new BaseResource($hosts);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hosts  $hosts
     * @return \Illuminate\Http\Response
     */
    public function show(Hosts $hosts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hosts  $hosts
     * @return \Illuminate\Http\Response
     */
    public function edit(Hosts $hosts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hosts  $hosts
     * @return \Illuminate\Http\Response
     */
    public function update(StoreHostsRequest $request, Hosts $hosts)
    {
        $hosts->update($request->all());

        return new BaseResource($hosts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hosts  $hosts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hosts $hosts)
    {
        //
    }
}
