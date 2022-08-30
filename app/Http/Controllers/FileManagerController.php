<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileManagerRequest;
use App\Models\File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class FileManagerController extends Controller
{
    protected  File $fileModel;
    public function  __construct(File $fileModel)
    {
        return $this->fileModel=$fileModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('filemanager');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('fileManagerInput');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFileManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileManagerRequest $request)
    {

        $input=$request->validated();
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $date = 'images/file/'.$year . '-' . $month . '-' . $day;
        $path=Storage::put($date,$request->file('File'));
        $input['url']=$path;
        $data=$this->fileModel->store($input);
        return redirect('adminpanel/file')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileManager  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileManager  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileManagerRequest  $request
     * @param  \App\Models\FileManager  $file
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFileManagerRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileManager  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
