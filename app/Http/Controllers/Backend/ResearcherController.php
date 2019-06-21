<?php

namespace App\Http\Controllers\Backend;

use App\Researcher;
use App\Research;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ResearcherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Researcher::all();
        return view('backend.researcher.index', compact('data'));
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
        return view('backend.researcher.create', compact('researches', 'r_title', 'p_title'));
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
        $new_p = Researcher::create($request->all());
        $new_p->tag($tags);
        return redirect()->route('backend:researchers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Researcher  $researcher
     * @return \Illuminate\Http\Response
     */
    public function show(Researcher $researcher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Researcher  $researcher
     * @return \Illuminate\Http\Response
     */
    public function edit(Researcher $researcher)
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
        $tags = $researcher->tagNames();
        foreach ($tags as $tag) {
            if ($this->in_arrayi($tag, $r_title)){
                $r_tags[] = $tag;
            } else if ($this->in_arrayi($tag, $p_title)){
                $p_tags[] = $tag;
            }
        }

        return view('backend.researcher.edit', compact('researcher', 'r_title', 'p_title', 'researches', 'p_tags', 'r_tags', 'projects'));
    }

    public function in_arrayi($needle, $haystack)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Researcher  $researcher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Researcher $researcher)
    {
        //
        $researcher->update($request->all());
        $tags = explode(",",$request->get('tags'));
        array_pop($tags);
        $researcher->retag($tags);
        return redirect()->route('backend:researchers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Researcher  $researcher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Researcher $researcher)
    {
        //
        $researcher->delete();
        return redirect()->route('backend:researchers');
    }
}
