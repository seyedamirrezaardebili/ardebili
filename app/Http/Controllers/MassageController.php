<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremassageRequest;
use App\Http\Requests\UpdatemassageRequest;
use App\Models\massage;

class MassageController extends Controller
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
     * @param  \App\Http\Requests\StoremassageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremassageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function show(massage $massage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function edit(massage $massage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemassageRequest  $request
     * @param  \App\Models\massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemassageRequest $request, massage $massage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function destroy(massage $massage)
    {
        //
    }
}
