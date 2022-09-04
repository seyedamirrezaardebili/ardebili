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
        return view('movie');
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
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $date = 'images/movie/'.$year . '-' . $month . '-' . $day;
        $path=Storage::put($date,$request->file('File'));
        $input['url']=$path;
        $a['status']='draft';
        $this->fileModel->query()->update($a);
        $data=$this->fileModel->store($input);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(movie $movie)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(movie $movie)
    {
        //
    }
}
