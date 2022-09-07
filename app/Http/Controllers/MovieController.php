<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\movie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoremovieRequest;
use App\Http\Requests\UpdatemovieRequest;

class MovieController extends Controller
{
    protected movie $movieModel;
    public function __construct(movie $movieModel){
        $this->movieModel=$movieModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=$this->movieModel->query()->paginate(16);
        return view('movie')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movieInput');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremovieRequest $request)
    {
        
        $input=$request->validated();
        if ($request->has('File')){
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $date = 'images/movie/'.$year . '-' . $month . '-' . $day. generate_otp();
            $path=Storage::put($date,$request->file('File'));
            $input['url']=$path;
            $a['status']='draft';
            $this->movieModel->query()->where('status','published')->update($a);
        }    
        $data=$this->movieModel->store($input);
        return redirect('adminpanel/movie')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(movie $movie)
    {
        foreach($_GET as $key =>$data){
            $id=$key;
        }
        return view('moviedelete')->with('data',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(movie $movie)
    {
        foreach($_GET as $key =>$data){
            $id=$key;
            }
        $data=$this->movieModel->query()->where('id',$id)->get();
        return view('movieedit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemovieRequest  $request
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemovieRequest $request, movie $movie)
    {
        $input =$request->validated();
        if ($request->has('File')){
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $date = 'images/file/'.$year . '-' . $month . '-' . $day. generate_otp(16);
            $path=Storage::put($date,$request->file('File'));
            $input['File']=$path;

        }
        if($input['status']=='published'){
            $a['status']='draft';
            $this->movieModel->query()->update($a);
        }
    
        $this->movieModel->updateAndFetch($request->id,$input);
        return redirect()->route('adminpanel.movie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(movie $movie ,UpdatemovieRequest $request)
    {
        $this->movieModel->deleteModel($request->id);
        return redirect()->route('adminpanel.movie');
    }
}
