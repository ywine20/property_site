<?php

namespace App\Http\Controllers;

use App\Models\albumTest;
use App\Http\Requests\StorealbumTestRequest;
use App\Http\Requests\UpdatealbumTestRequest;
use Illuminate\Http\Request;

class AlbumTestController extends Controller
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
    public function create($projectId)
    {
        return $projectId;
        return view('admin.album.create');
        // return view('admin.album.create', ['projectId' => $projectId]);
    }

    public function create2($projectId)
    {
        return $projectId;
        return view('admin.album.test');
        // return view('admin.album.create', ['projectId' => $projectId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorealbumTestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorealbumTestRequest $request)
    {
        //
        return $request;
    }

    public function store2(Request $request)
    {
        //
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\albumTest  $albumTest
     * @return \Illuminate\Http\Response
     */
    public function show(albumTest $albumTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\albumTest  $albumTest
     * @return \Illuminate\Http\Response
     */
    public function edit(albumTest $albumTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatealbumTestRequest  $request
     * @param  \App\Models\albumTest  $albumTest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatealbumTestRequest $request, albumTest $albumTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\albumTest  $albumTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(albumTest $albumTest)
    {
        //
    }
}
