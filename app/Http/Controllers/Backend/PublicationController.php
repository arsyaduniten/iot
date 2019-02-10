<?php

namespace App\Http\Controllers\Backend;

use App\Publication;
use App\Research;
use App\Project;
use App\Keyword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Publication::all();
        return view('backend.publication.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $p_title = [];
        $projects = Project::all();
        foreach ($projects as $p) {
            # code...
            $p_title[] = $p->title;
        }
        // dd($r_title);
        return view('backend.publication.create', compact('projects', 'p_title'));
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
        $new_p = Publication::create($request->all());
        $new_p->tag($tags);
        return redirect()->route('backend:publications');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
        $p_title = [];
        $projects = Project::all();
        foreach ($projects as $p) {
            # code...
            $p_title[] = $p->title;
        }
        $p_tags = [];
        $tags = $publication->tagNames();
        foreach ($tags as $tag) {
            if ($this->in_arrayi($tag, $p_title)){
                $p_tags[] = $tag;
            }
        }

        return view('backend.publication.edit', compact('publication', 'p_title', 'p_tags', 'projects'));
    }


    public function in_arrayi($needle, $haystack)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //
        $publication->update($request->all());
        $tags = explode(",",$request->get('tags'));
        array_pop($tags);
        $publication->retag($tags);
        return redirect()->route('backend:publications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        //
    }
}
