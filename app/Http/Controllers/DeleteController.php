<?php

namespace App\Http\Controllers;

use App\Models\Delete;
use App\Http\Requests\StoreDeleteRequest;
use App\Http\Requests\UpdateDeleteRequest;

class DeleteController extends Controller
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
     * @param  \App\Http\Requests\StoreDeleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeleteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delete  $delete
     * @return \Illuminate\Http\Response
     */
    public function show(Delete $delete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delete  $delete
     * @return \Illuminate\Http\Response
     */
    public function edit(Delete $delete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeleteRequest  $request
     * @param  \App\Models\Delete  $delete
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeleteRequest $request, Delete $delete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delete  $delete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delete $delete)
    {
        //
    }
}
