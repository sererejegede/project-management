<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\User;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $companies = Company::all();
      $users = User::all();
      return view('companies.index', ['companies' => $companies, 'users' => $users]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $users = User::all();
      return view('companies.create', ['users' => $users]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      Company::create($request->all());
      $companies = Company::all();
      $users = User::all();
      return view('companies.index', ['companies' => $companies, 'users' => $users]);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Company $company
    * @return \Illuminate\Http\Response
    */
   public function show(Company $company)
   {
      $company = Company::find($company->id);
      return view('companies.show', ['company' => $company]);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Company $company
    * @return \Illuminate\Http\Response
    */
   public function edit(Company $company)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  \App\Models\Company $company
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Company $company)
   {
      $companyUpdate = Company::find($company->id)->update($request->all());

      if ($companyUpdate){
         return redirect()->route('companies.show', ['company' => $company])
            ->with('success', 'Company updated successfully');
      }

//      return redirect()->route('companies.show', ['company' => $company])
//         ->with('errors', 'Something went wrong');
      return redirect()->back()->withInput();
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Company $company
    * @return \Illuminate\Http\Response
    */
   public function destroy(Company $company)
   {
      $deleteCompany = Company::destroy($company->id);
      if ($deleteCompany > 0){
         $companies = Company::all();
         $users = User::all();
//         return view('companies.index', ['companies' => $companies, 'users' => $users]);
         return redirect()->route('companies.index', ['companies' => $companies, 'users' => $users])
            ->with('success', 'Company deleted successfully');
      }
//      dd($company->id);
   }
}
