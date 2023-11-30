<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Function\Helper;
use App\http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy("creation_date")->paginate(10);
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = "Inserimento nuovo progetto";
        $method = "POST";
        $route = route('admin.projects.store');
        $project = null;
        return view('admin.projects.create-edit', compact("name", "method", "route", "project"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();
        $form_data["slug"] = Helper::generateSlug($form_data["name"], Project::class);
        $form_data["creation_date"] = date('Y-m-d');

        $new_project = Project::create($form_data);

        return redirect()->route("admin.projects.show", $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $name = "Modifica progetto";
        $method = "PUT";
        $route = route('admin.projects.update', $project);
        return view('admin.projects.create-edit', compact("name","method", "route", "project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        if($form_data["name"]!= $project->name){
            $form_data["name"] = Helper::generateSlug($form_data["name"], Project::class);
        }else{
            $form_data["slug"] = $project->slug;
        }

        $form_data['date'] = date('Y-m-d');

        $project->update($form_data);
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
