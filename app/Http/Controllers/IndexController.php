<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreindexRequest;
use App\Http\Requests\UpdateindexRequest;
use App\Models\Article;
use App\Models\crop;
use App\Models\File;
use App\Models\Group;
use App\Models\index;
use App\Models\massage;
use App\Models\post;
use App\Models\profile;

class IndexController extends Controller
{
    protected Article $articleModel;
    protected crop $cropModel;
    protected File $fileModel;
    protected Group $groupModel;
    protected massage $massageModel;
    protected post $postModel;
    protected profile $profileModel;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Article $articleModel , crop $cropModel , File $fileModel ,Group $groupModel,massage $massageModel ,post $postModel ,profile $profileModel)
    {
        $this->articleModel=$articleModel;
        $this->cropModel=$cropModel;
        $this->fileModel=$fileModel;
        $this->groupModel=$groupModel;
        $this->massageModel=$massageModel;
        $this->postModel=$postModel;
        $this->profileModel=$profileModel;
    }

    public function index()
    {

        $data['article']=$this->articleModel->all();
        $data['crop']=$this->cropModel->all();
        $data['file']=$this->fileModel->all();
        $data['gruop']=$this->groupModel->all();
        $data['massage']=$this->massageModel->all();
        $data['profile']=$this->profileModel->all();
        return  view('index')->with('data',$data);
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
     * @param  \App\Http\Requests\StoreindexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreindexRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(index $index)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateindexRequest  $request
     * @param  \App\Models\index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateindexRequest $request, index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(index $index)
    {
        //
    }
}
