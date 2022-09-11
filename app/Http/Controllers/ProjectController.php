<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Article;
use App\Models\project;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\deletprojectRequest;
use App\Http\Requests\StoreprojectRequest;
use App\Http\Requests\UpdateprojectRequest;

class ProjectController extends Controller
{

    protected  Group $groupModel;
    protected  Project $projectModel;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Group $gropModel ,Project $projectModel){
        $this->gropModel=$gropModel;
        $this->projectModel=$projectModel;
        return $this ;
    }
    public function index()
    {
        $data['group']=$this->gropModel->all();
        $data['project']=$this->projectModel->query()->paginate(16);
        return view('project')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=$this->gropModel->all()->toArray();
        return view('projectinput')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprojectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprojectRequest $request)
    {
        $input=$request->validated();
        if ($request->has('File')){
            
            foreach($request->file()['File'] as $key=>$file){
                $year = Carbon::now()->year;
                $month = Carbon::now()->month;
                $day = Carbon::now()->day;
                $date = 'images/project/'.$year . '-' . $month . '-' . $day. generate_otp();
                $path=Storage::put($date,$file);
                $input['Files'][]=$path;
            }
            $input['File']=json_encode($input['Files']);
            unset($input['Files']);
        }
        $data=$this->projectModel->store($input);
        return redirect('adminpanel/project')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        foreach($_GET as $key =>$data){
            $id=$key;
        }
        return view('projectdelete')->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        foreach($_GET as $key =>$datas){
            $id=$key;
        }
        $data['group']=$this->gropModel->all();
        $data['project']=$this->projectModel->query()->where('id',$id)->get();
        return view('projectedit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprojectRequest  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprojectRequest $request, project $project)
    {
        $input =$request->validated();
        unset($input['name']);
        if ($request->has('File')){
             
            foreach($request->file()['File'] as $key=>$file){
                $year = Carbon::now()->year;
                $month = Carbon::now()->month;
                $day = Carbon::now()->day;
                $date = 'images/project/'.$year . '-' . $month . '-' . $day. generate_otp();
                $path=Storage::put($date,$file);
                $input['Files'][]=$path;
            }
            $input['File']=json_encode($input['Files']);
            unset($input['Files']);
        }
        $this->projectModel->updateAndFetch($request->id,$input);
        return redirect()->route('adminpanel.project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project, deletprojectRequest $request)
    {
        $this->projectModel->deleteModel($request->id);
        return redirect()->route('adminpanel.project');
    }
}
