<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Http\Requests\StoreprofileRequest;
use App\Http\Requests\UpdateprofileRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProfileController extends Controller
{
    protected profile $profileModel;
    const idProfile=1;
    public function __construct(profile $model){
        return $this->profileModel=$model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprofileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprofileRequest $request )
    {
      return  view('profile');
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show(): Application|Factory|View
    {
        $data=$this->profileModel->fetch(self::idProfile);
       return view('editprofile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprofileRequest  $request
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprofileRequest $request, profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profile)
    {
        //
    }
}
