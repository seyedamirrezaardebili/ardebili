<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\StoreGroupDelateRequest;

class GroupController extends Controller
{
    protected Group $groupmodel;

    public function __construct(Group $groupmodel)
    {
          return  $this->groupmodel=$groupmodel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->groupmodel->query()->orderby('id')->paginate(16);
        return view('group')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createGroup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request,Filesystem  $filesystem)
    {
        $input=$request->validated();
        if ($request->has('File')){

            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $date = 'images/groups/'.$year . '-' . $month . '-' . $day. generate_otp();
            $path=Storage::put($date,$request->file('File'));
            $input['File']=$path;

        }
        $data=$this->groupmodel->store($input);
        return redirect('adminpanel/group')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        foreach($_GET as $key=>$value){
            $group= $this->groupmodel->query()->where('id',$key)->get();
            return view('groupdelate')->with('group',$group);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(  Group $group  )
    {
        foreach($_GET as $key=>$value){
        $group= $this->groupmodel->query()->where('id',$key)->get();
        return view('groupedit')->with('group',$group);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGroupRequest $request, Group $group)
    {
        $input = $request->validated();
        if ($request->has('File')){
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $date = 'images/groups/'.$year . '-' . $month . '-' . $day. generate_otp();
            $path=Storage::put($date,$request->file('File'));
            $input['File']=$path;
        }
        $this->groupmodel->updateAndFetch($request->id,$input);
        return redirect()->route('adminpanel.group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group , StoreGroupDelateRequest $request)
    {
        $this->groupmodel->deleteModel($request->id);
        return redirect()->route('adminpanel.group');

    }
}
