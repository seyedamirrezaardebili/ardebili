<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\profile;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\StoreprofileRequest;
use App\Http\Requests\UpdateprofileRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Storage;

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
        $data=$this->profileModel->fetch(self::idProfile);
        return view('editprofile')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=$this->profileModel->fetch(self::idProfile);
        return view('editprofile')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprofileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprofileRequest $request )
    {
        $input=$request->validated();
        $id=(int)self::idProfile;
        if($request->has('File')) {
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $date = 'image/profile/' . $year . '-' . $month . '-' . $day. generate_otp(16);
            $path = Storage::put($date, $request->file('File'));
            $input['file'] = $path;
        }
        $data=$this->profileModel->updateAndCreate($id,$input);
        return redirect('adminpanel/profile')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show()
    {

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
    public function update(StoreprofileRequest $request, profile $profile)
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
