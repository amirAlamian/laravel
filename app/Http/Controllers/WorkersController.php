<?php

namespace App\Http\Controllers;

use App\Models\branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateWorkersRequest;
use App\Models\Workers;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::connection()-> enableQueryLog();

        // $branches = branch::with("workers")->find(1) -> workers;

        // $arr = [];
        // foreach ($branches as $branch){
        //     array_push($arr,$branch -> workers);
        // }
        
        // dd($branches);
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWorkersRequest $request)
    {
        $validData = $request -> validated();

        $branch = new branch();
        $branch->name = "tabriz";
        $branch->company_id = 4;
        $branch->save();    
        error_log(($branch->id));
        
        $newBranch = branch::find($branch->id);

        $worker = new Workers();

        $worker->name = $validData['name'];

        $newBranch->workers()->save($worker); 
        return $newBranch->worker;      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workers  $workers
     * @return \Illuminate\Http\Response
     */
    public function show(Workers $workers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workers  $workers
     * @return \Illuminate\Http\Response
     */
    public function edit(Workers $workers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workers  $workers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workers $workers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workers  $workers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workers $workers)
    {
        //
    }
}
