<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Article;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\deletArticleRequest;

class ArticleController extends Controller
{
    protected  Group $groupModel;
    protected  Article $articleModel;


    public function __construct(Group $gropModel ,Article $articleModel){
        $this->gropModel=$gropModel;
        $this->articleModel=$articleModel;
        return $this ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['group']=$this->gropModel->all();
        $data['article']=$this->articleModel->query()->paginate(16);
        return view('Article')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=$this->gropModel->all()->toArray();
        return view('articleinput')->with('data',$data);
    }

    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {

        $input=$request->validated();
        if ($request->has('File')){
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $date = 'images/file/'.$year . '-' . $month . '-' . $day. generate_otp();
            $path=Storage::put($date,$request->file('File'));
            $input['File']=$path;
        }
        $data=$this->articleModel->store($input);
        return redirect('adminpanel/article')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        foreach($_GET as $key =>$data){
            $id=$key;
        }
        return view('articledelete')->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        foreach($_GET as $key =>$datas){
            $id=$key;
        }
        $data['group']=$this->gropModel->all();
        $data['article']=$this->articleModel->query()->where('id',$id)->get();
        return view('articleedit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticleRequest $request, Article $article)
    {
        $input =$request->validated();
        unset($input['name']);
        if ($request->has('File')){
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $date = 'images/article/'.$year . '-' . $month . '-' . $day. generate_otp(16);
            $path=Storage::put($date,$request->file('File'));
            $input['File']=$path;
        }
        $this->articleModel->updateAndFetch($request->id,$input);
        return redirect()->route('adminpanel.article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article,deletArticleRequest $request)
    {
        $this->articleModel->deleteModel($request->id);
        return redirect()->route('adminpanel.article');
    }
}
