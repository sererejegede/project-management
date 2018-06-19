<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class CompaniesController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
//      if (Auth::user()){
//         $companies = Company::where('user_id', Auth::user()->id)->get();
//         return view('companies.index', ['companies' => $companies]);
//      } else {
//         return redirect()->route('login')->with('custom_error', 'Please log in');
//      }


      /** API*/
      $user = JWTAuth::parseToken()->toUser();
      $companies = Company::where('user_id', $user->id)->get();
      return response()->json(['data' => $companies], 200);
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
      // Check if user is logged in
//      if (Auth::check()){
//         $companyCreate = Company::create([
//            'name' => $request->input('name'),
//            'description' => $request->input('description'),
//            'user_id' => Auth::user()->id
//         ]);
//         if ($companyCreate){
//            return back()->with('success', $request->get('name').' created successfully');
//         }
//      } else {
//         return redirect()->route('login')->with('custom_error', 'You must be logged in to create a company');
//      }

      /** API */
      $user = JWTAuth::parseToken()->toUser();
      $companyCreate = Company::create([
         'name' => $request->input('name'),
         'description' => $request->input('description'),
         'user_id' => $user->id,
      ]);
      if ($companyCreate) {
         return response()->json($companyCreate, 201);
      }

   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Company $company
    * @return Company|\Illuminate\Http\Response
    */
   public function show(Company $company)
   {
//      $company = Company::find($company->id);
//      return view('companies.show', ['company' => $company]);

      /**API*/
      return $company->load('user', 'projects');
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

//      if ($companyUpdate){
//         return back()->with('success', $company->name.' updated successfully');
//      }
//      return back()->with('custom_error', 'Company could not be updated');


      /** API*/
      if ($companyUpdate){
         return response()->json($company->fresh(), 200);
      }
      return response()->json(['error' => 'Could not update'], 500);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Company $company
    * @return \Illuminate\Http\Response
    */
   public function destroy(Company $company)
   {

      $deleteCompany = Company::find($company->id)->delete();
      if ($deleteCompany > 0){
         /** WEB*/
//         return back()->with('success', 'Deleted!');

         /** API*/
         return response()->json('Deleted!', 204);
      } else {
         return response()->json('Could not delete', 500);
      }

   }
}
