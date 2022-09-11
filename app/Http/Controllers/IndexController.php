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
use App\Models\movie;
use App\Models\post;
use App\Models\profile;
use App\Models\project;

class IndexController extends Controller
{
    protected Article $articleModel;
    protected crop $cropModel;
    protected File $fileModel;
    protected Group $groupModel;
    protected massage $massageModel;
    protected post $postModel;
    protected profile $profileModel;
    protected movie $movieModel;
    protected project $projectModel;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(project $projectModel, movie $movieModel ,Article $articleModel , crop $cropModel , File $fileModel ,Group $groupModel,massage $massageModel ,post $postModel ,profile $profileModel)
    {
        $this->projectModel=$projectModel;
        $this->articleModel=$articleModel;
        $this->cropModel=$cropModel;
        $this->fileModel=$fileModel;
        $this->groupModel=$groupModel;
        $this->massageModel=$massageModel;
        $this->postModel=$postModel;
        $this->profileModel=$profileModel;
        $this->movieModel=$movieModel;
    }

    public function index()
    {

        $data['article']=$this->articleModel->query()->where('status','published')->get();
        $data['crop']=$this->cropModel->query()->where('status','published')->get();
        $data['file']=$this->fileModel->query()->where('status','published')->get();
        $data['gruop']=$this->groupModel->query()->where('status','published')->get();
        $data['movie']=$this->movieModel->query()->where('status','published')->get();
        $data['massage']=$this->massageModel->all();
        $data['profile']=$this->profileModel->all();
        return  view('index')->with('data',$data);
    }
    
    public function group()
    {
        $data['profile']=$this->profileModel->all();
        $data['file']=$this->fileModel->query()->where('status','published')->get();
        $data['gruop']=$this->groupModel->query()->where('status','published')->get();
        return view('indexgroup')->with('data',$data);
    }

    public function product()
    {

        $data['file']=$this->fileModel->query()->where('status','published')->get();
        $data['gruop']=$this->groupModel->query()->where('status','published')->get();
        $data['profile']=$this->profileModel->all();
        $data['crop']=$this->cropModel->query()->where('status','published')->paginate(16);
        return view('indexproduct')->with('data',$data);
    }
    public function Productgroup()
    {

        $data['file']=$this->fileModel->query()->where('status','published')->get();
        $data['gruop']=$this->groupModel->query()->where('status','published')->get();
        $data['profile']=$this->profileModel->all();
        $data['crop']=$this->cropModel->query()->where('group_id',$_GET['id'])->where('status','published')->paginate(16);
        return view('indexproduct')->with('data',$data);
    }
    public function articleshow()
    {

        $data['article']=$this->articleModel->query()->where('status','published')->paginate(16);
        $data['file']=$this->fileModel->query()->where('status','published')->get();
        $data['gruop']=$this->groupModel->query()->where('status','published')->get();
        $data['profile']=$this->profileModel->all();
        return view('articleShow')->with('data',$data);
    }
    public function aboutus()
    {
        $data['profile']=$this->profileModel->all();
        $data['file']=$this->fileModel->query()->where('status','published')->get();
        return view('aboutus')->with('data',$data);
    }
    public function projectshow()
    {
        $data['project']=$this->projectModel->query()->where('status','published')->paginate(16);
        $data['file']=$this->fileModel->query()->where('status','published')->get();
        $data['gruop']=$this->groupModel->query()->where('status','published')->get();
        $data['profile']=$this->profileModel->all();
        return view('projectShow')->with('data',$data);
    }


}
