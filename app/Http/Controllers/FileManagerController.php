<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EditFileManagerRequest;
use App\Http\Requests\StoreFileManagerRequest;

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

        $data=$this->fileModel->query()->paginate(16);
        return view('filemanager')->with('data',$data);
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
        if ($request->has('File')){
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $date = 'images/file/'.$year . '-' . $month . '-' . $day. generate_otp();
            $path=Storage::put($date,$request->file('File'));
            $input['url']=$path;
            $a['status']='draft';
            if($input['status']=='published'){
                $this->fileModel->query()->where('key',$input['key'])->update($a);
            }
        }
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
        foreach($_GET as $key =>$data){
            $id=$key;
        }
        return view('filemanagerdelete')->with('data',$id);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileManager  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        foreach($_GET as $key =>$data){
        $id=$key;
        }
        $data=$this->fileModel->query()->where('id',$id)->get();

        return  view('fileManageredit')->with('data',$data);
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
            $this->fileModel->query()->where('key',$input['key'])->update($a);
        }
        $this->fileModel->updateAndFetch($request->id,$input);
        return redirect()->route('adminpanel.file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileManager  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreFileManagerRequest $request, File $file)
    {
        $this->fileModel->deleteModel($request->id);
        return redirect()->route('adminpanel.file');
    }
}
