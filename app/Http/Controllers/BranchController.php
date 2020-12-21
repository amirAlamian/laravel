<?php

namespace App\Http\Controllers;
use App\Models\branch;
use App\Http\Requests\CreateBranchRequest;
use Illuminate\Database\Eloquent\Builder;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $branch = branch::has('workers',">=", "2")->get(); \has
        // $branch = branch::whereHas('workers' , function (Builder $query){
        //     $query->where('branch_id', "1");
        // })->get();



        // $branch = branch::doesntHave('workers')->get(); // doesn't have
        // $branch = branch::whereDoesntHave('workers', function($query){
        //     $query->where("workers.name", "like", "%jack%");
        // })-> get();

        // $branch = branch::withCount("workers")->get(); //count

        // $branch = branch::withCount(['workers', 'workers as new_workers' => function($query){
        //     $query->where('created_at','>' , '2020-12-14 13:26:18');
        // }])->get();
        $branch = branch::mostWorkers()->get();

        return $branch;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBranchRequest $request)
    {
        $validData = $request->validated();
        error_log($validData['company_id']);
        $branch = branch::create($validData);
        return $branch;
        // return redirect() -> route('test.show',['test' => $branch->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(branch $branch)
    {
        //
    }
}
