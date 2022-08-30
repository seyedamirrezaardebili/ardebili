<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\crop;
use App\Models\Group;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\cropdeleterequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{

    protected Group $gropModel;
    protected crop  $cropModel;
    
    public function __construct(Group $gropModel, crop  $cropModel)
    {
        $this->gropModel=$gropModel;
        $this->cropModel=$cropModel;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['group']=$this->gropModel->all();
        $data['crop']=$this->cropModel->paginate()->toarray();
        return view('product')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=$this->gropModel->all()->toArray();
        return view('productinput')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $input=$request->validated();
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $date = 'images/product/'.$year . '-' . $month . '-' . $day;
        $path=Storage::put($date,$request->file('File'));
        $input['File']=$path;
        $data=$this->cropModel->store($input);
        return redirect('adminpanel/prouduct')->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(crop $crop)
    {
        return view('productedelete')->with('crop',$_GET);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(crop $crop)
    {
        $crop['group']=$this->gropModel->all()->toArray();
        $crop['data']=$_GET;

        return view('productedit')->with('crop',$crop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, crop $crop)
    {
        $this->cropModel->updateAndFetch($request->id,$request->validated());
        return redirect()->route('adminpanel.product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(crop $crop , cropdeleterequest $request)
    {
        $this->cropModel->deleteModel($request->id);
        return redirect()->route('adminpanel.product');

    }
}
