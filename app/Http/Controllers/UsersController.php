<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $users = User::all();
//      return view('users.index', ['users' => $users]);

      /**API*/
//      return $users->load('role');
      return response()->json($users->load('role'), 200);
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
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\User $user
    * @return \Illuminate\Http\Response
    */
   public function show(User $user)
   {
//      return view('users.show', compact('user'));

      /** API */
        return response()->json($user, 200);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\User $user
    * @return \Illuminate\Http\Response
    */
   public function edit(User $user)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  \App\User $user
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, User $user)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\User $user
    * @return \Illuminate\Http\Response
    */
   public function destroy(User $user)
   {
      //
   }

   /**
    * @param Request $request
    * @param User $user
    * @return \Illuminate\Http\JsonResponse
    */
   public function uploadFile(Request $request, User $user)
   {
//      return response()->json([$request->profile_pic], 200);
//      return response()->json([$request->file('profile_pic')], 200);
      if (!($request->hasFile('profile_pic'))) {
         return response()->json(['custom_error', 'Could not upload, please retry speonw']);
      } else {

         $userImage = (str_replace('storage/','public/', $user->profile_pic));
         $profilePicUpdate = $user->update([
            'profile_pic' => str_replace('public/','storage/', $request->profile_pic->store('public/profile_pics')),
         ]);
         if ($profilePicUpdate) {
            /*Delete previous record*/
            if (is_file(storage_path(str_replace('storage/','app/public/', $user->profile_pic)) )){
               Storage::delete($userImage);
            }
            return response()->json(['success', 'Profile picture changed successfully'], 201);
         } else {
            return back()->with('custom_error', 'Could not upload, please retry');
         }
      }
   }
}
