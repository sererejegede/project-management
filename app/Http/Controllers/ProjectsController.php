<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
//        return view('projects.index', ['projects' => $projects]);

        /** API */
       return response()->json($projects->load('company.user'), 200);
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
    public function store(Request $request)
    {
        $projectCreate = Project::create($request->all());
       return response()->json($projectCreate, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
//       $comments = $project->comments()->get();
//       $comments = $project->load('comments.user')->comments;
//        return view('projects.show', compact('project'), ['comments' => $comments]);

       /**  API */
       return response()->json($project->load('comments', 'users'), 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
       $projectUpdate = Project::find($project->id)->update($request->all());

       /** API*/
       if ($projectUpdate){
          return response()->json($project->fresh(), 200);
       }
       return response()->json(['error' => 'Could not update'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
       $deleteProject = Project::find($project->id)->delete();
       if ($deleteProject > 0){
//          $companies = Company::all();
//          $users = User::all();
          return response()->json('Deleted!', 200);
       }
    }

    public function addUser(Request $request)
    {
       // For API
       $project = Project::find($request->input('project_id'));
       $user = User::where('email', $request->input('email'))->get()->first();
       return $project->users()->attach($user->id);
    }
}
