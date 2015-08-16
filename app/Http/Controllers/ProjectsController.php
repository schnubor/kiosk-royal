<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        $project = Project::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'position' => $request->input('position'),
            'color' => $request->input('color'),
            'bgcolor' => $request->input('bgcolor')
        ]);
        if($project){
            flash()->success('Project created successfully!');
        }
        else{
            flash()->error('Oops! Something went wrong.');
        }
        return redirect(route('backend'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return $project;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, EditProjectRequest $request)
    {
        $project = Project::find($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->color = $request->color;
        $project->bgcolor = $request->bgcolor;

        // get current position and category of project
        $currentPosition = $project->position;
        $currentCategory = $project->category_id;
        $requestPosition = $request->position;

        // Select project currently residing on that position ...
        $swap_project = Project::where('category_id', $currentCategory)
                               ->where('position', $requestPosition)
                               ->first();

        // Set position of swap_project to an untaken position
        $swap_project->position = Project::all()->count() + 1;
        $swap_project->save();

        // Position 
        $project->position = $requestPosition;
        $swap_project->position = $currentPosition;

        if($project->save()){
            $swap_project->save();
            flash()->success('Project updated successfully!');
        }
        else{
            flash()->danger('Oops! Something went wrong.');
        }

        return redirect(route('backend'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        flash()->info('Project deleted successfully.');
        return redirect(route('backend'));
    }
}
