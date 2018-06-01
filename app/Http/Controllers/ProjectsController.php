<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
//        return $projects->load('company.user');
        return view('projects.index', ['projects' => $projects]);
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
        Project::create($request->all());
//       return $request->all();
       $company = Company::find($request->company_id);
//       return view('companies.show', ['company' => $company])->with('success', $request->get('name').' Created Successfully');
       return back()->with('success', $request->get('name').' Created Successfully');
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
//       return $project->load('comments', 'users');
       $comments = $project->load('comments.user')->comments;
        return view('projects.show', compact('project'), ['comments' => $comments]);
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
        //
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
          return back()->with('success', 'Deleted!');
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
