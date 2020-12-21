<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeTestRequest;
use App\Http\Requests\EditCompanyRequest;

use Illuminate\Support\Facades\Gate;
use \App\Models\Company;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy','index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::mostBranch()->get(); 

        return $companies;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 222;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeTestRequest $request)
    {
        $validData = $request->validated();
        $company = Company::create($validData);
        error_log($company->name);

        return redirect()->route('test.show', ['test' => $company->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(Company::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);
 
        if ( Gate::denies ('update-company', $company)) {
            abort(403,"you can't update this company");
        };

        $validData = $request->validated();
        $company->fill($validData);
        error_log($company);
        $company->save();
        return redirect()->route('test.show', ['test' => $company->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responseFromDB = Company::destroy($id);
        return $responseFromDB;
    }
}
