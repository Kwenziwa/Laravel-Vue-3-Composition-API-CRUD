<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyResource::collection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $comapny = Company::create($request->validated());
        return new CompanyResource($comapny);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comapny  $comapny
     * @return \Illuminate\Http\Response
     */
    public function show(Comapny $comapny)
    {
        return new CompanyResource($comapny);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comapny  $comapny
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Comapny $comapny)
    {
       $comapny->update($request->validated());
       return new CompanyResource($comapny);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comapny  $comapny
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comapny $comapny)
    {
        $comapny->delete();
        return response()->noContent();
    }
}
