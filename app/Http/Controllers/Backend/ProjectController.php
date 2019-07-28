<?php

namespace App\Http\Controllers\Backend;

use App\Project;
use App\Research;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Arr;
use App\LatestActivity;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Project::all();
        return view('backend.project.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd($r_title = Research::pluck('title'));
        $r_title = [];
        $researches = Research::all();
        foreach ($researches as $r) {
            # code...
            $r_title[] = $r->research_area;
        }
        // dd($r_title);
        return view('backend.project.create', compact('researches', 'r_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tags = explode(",",$request->get('tags'));
        array_pop($tags);
        $ktags = explode(",",$request->get('ktags'));
        array_pop($ktags);
        $new_p = Project::create($request->all());
        $new_p->tag($tags);
        $new_p->tag($ktags);
        if($request->has('activity')){
            $a = new LatestActivity();
            $a->text = "Added new Project";
            $a->link = "/details?type=project&id=".$r->id;
            $a->type = "other";
            $a->save();
        }
        foreach ($new_p->tags as $tag) {
            $relatedProjects = $this->in_arrayi($tag->name, $tags);
            $keywords = $this->in_arrayi($tag->name, $ktags);
            if($relatedProjects){
                $tag->setGroup('RelatedProjectsTagGroup');
            }
            if($keywords){
                $tag->setGroup('KeywordsTagGroup');
            }
        }
        // $research = Research::find($request->get('related_r'));
        // $research->projects()->attach($new_p->id);
        return redirect()->route('backend:projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        // $research = $project->researches->first();
        $r_title = [];
        $researches = Research::all();
        foreach ($researches as $r) {
            # code...
            $r_title[] = $r->research_area;
        }
        $tags = $ktags = [];
        foreach ($project->tags as $tag) {
            if($tag->isInGroup('RelatedProjectsTagGroup')){
                $tags[] = $tag->name;
            }
            if($tag->isInGroup('KeywordsTagGroup')){
                $ktags[] = $tag->name;
            }
        }

        return view('backend.project.edit', compact('project', 'r_title', 'researches', 'tags', 'ktags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        // $project->researches()->detach();
        // $project->researches()->attach($request->get('related_r'));
        $project->update($request->all());
        $tags = explode(",",$request->get('tags'));
        array_pop($tags);
        $ktags = explode(",",$request->get('ktags'));
        array_pop($ktags);
        $project->untag();
        $project->tag($tags);
        $project->tag($ktags);
        if($request->has('activity')){
            $a = new LatestActivity();
            $a->text = "Updated a Project";
            $a->link = "/details?type=project&id=".$project->id;
            $a->type = "other";
            $a->save();
        }
        foreach ($project->tags as $tag) {
            $relatedProjects = $this->in_arrayi($tag->name, $tags);
            $keywords = $this->in_arrayi($tag->name, $ktags);
            if($relatedProjects){
                $tag->setGroup('RelatedProjectsTagGroup');
            }
            if($keywords){
                $tag->setGroup('KeywordsTagGroup');
            }
        }
        return redirect()->route('backend:projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect()->route('backend:projects');
    }

    public function in_arrayi($needle, $haystack)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }
}
