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
    
    public function group()
    {
        $data['profile']=$this->profileModel->all();
        $data['file']=$this->fileModel->all();
        $data['gruop']=$this->groupModel->all();
        return view('indexgroup')->with('data',$data);
    }

    public function product()
    {
        $data['profile']=$this->profileModel->all();
        $data['file']=$this->fileModel->all();
        $data['gruop']=$this->groupModel->all();
        $data['crop']=$this->cropModel->query()->paginate(16);
        return view('indexproduct')->with('data',$data);
    }
    public function Productgroup()
    {
        $data['profile']=$this->profileModel->all();
        $data['file']=$this->fileModel->all();
        $data['gruop']=$this->groupModel->all();
        $data['crop']=$this->cropModel->all();
        return view('indexproduct')->with('data',$data);
    }

}
