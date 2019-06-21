<?php

namespace App\Http\Controllers\Backend;

use App\Collaborator;
use App\Research;
use App\Project;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Collaborator::all();
        return view('backend.collaborator.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $r_title = $p_title = [];
        $researches = Research::all();
        $projects = Project::all();
        foreach ($researches as $r) {
            # code...
            $r_title[] = $r->title;
        }

        foreach ($projects as $p) {
            # code...
            $p_title[] = $p->title;
        }
        // dd($r_title);
        return view('backend.collaborator.create', compact('researches', 'r_title', 'p_title'));
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
        $new_p = Collaborator::create($request->all());
        $new_p->tag($tags);
        return redirect()->route('backend:collaborators');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function show(Collaborator $collaborator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function edit(Collaborator $collaborator)
    {
        //
        $r_title = $p_title = [];
        $researches = Research::all();
        $projects = Project::all();
        foreach ($researches as $r) {
            # code...
            $r_title[] = $r->title;
        }
        foreach ($projects as $p) {
            # code...
            $p_title[] = $p->title;
        }
        $p_tags = $r_tags = [];
        $tags = $collaborator->tagNames();
        foreach ($tags as $tag) {
            if ($this->in_arrayi($tag, $r_title)){
                $r_tags[] = $tag;
            } else if ($this->in_arrayi($tag, $p_title)){
                $p_tags[] = $tag;
            }
        }

        return view('backend.collaborator.edit', compact('collaborator', 'r_title', 'p_title', 'researches', 'p_tags', 'r_tags', 'projects'));
    }

    public function in_arrayi($needle, $haystack)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collaborator $collaborator)
    {
        //
        $collaborator->update($request->all());
        $tags = explode(",",$request->get('tags'));
        array_pop($tags);
        $collaborator->retag($tags);
        return redirect()->route('backend:collaborators');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaborator $collaborator)
    {
        //
        $collaborator->delete();
        return redirect()->route('backend:collaborators');
    }
}
