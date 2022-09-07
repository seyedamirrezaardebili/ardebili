<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremassageRequest;
use App\Http\Requests\UpdatemassageRequest;
use App\Models\massage;

class MassageController extends Controller
{
    protected massage $massageModel;
    public function __construct(massage $massageModel){
        $this->massageModel=$massageModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= $this->massageModel->query()->paginate(16);
       return view('massage')->with('data',$data);
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
     * @param  \App\Http\Requests\StoremassageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremassageRequest $request)
    {
        $input=$request->validated();
        $data=$this->massageModel->store($input);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function show(massage $massage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function edit(massage $massage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemassageRequest  $request
     * @param  \App\Models\massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function update(StoremassageRequest $request, massage $massage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\massage  $massage
     * @return \Illuminate\Http\Response
     */
    public function destroy(massage $massage)
    {
        //
    }
}
