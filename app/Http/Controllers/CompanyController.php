<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company as Company;
use App\Http\Resources\Company as CompanyResource;
use Illuminate\Support\Facades\Validator as Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(6);
        return CompanyResource::collection($companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'email' => 'required|unique:companies|max:50',
            'whatsapp' => 'required|unique:companies|max:50',
            'description' => 'max:255',
            'name' => 'required|max:100',
            'state' => 'required|max:2',
            'city' => 'required|max:50'
        );
        $validator = Validator::make($request->all(), $rules);

        $company = new Company;
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->email = $request->input('email');
        $company->whatsapp = $request->input('whatsapp');
        $company->state = $request->input('state');
        $company->city = $request->input('city');

        if ($validator->fails()) {
            return $validator->errors();
        }
        
        if ($company->save()) {
            return new CompanyResource($company);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($request->id);
        $company->name = $request->input('name');
        $company->description = $request->input('description');
        $company->email = $request->input('email');
        $company->whatsapp = $request->input('whatsapp');

        if ($company->save()) {
            return new CompanyResource($company);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        if ($company->delete()) {
            return new CompanyResource($company);
        }
    }
}
