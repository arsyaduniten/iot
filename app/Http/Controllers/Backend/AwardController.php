<?php

namespace App\Http\Controllers\Backend;

use App\Award;
use App\Research;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ImageOptimizer;
use Storage;
use Illuminate\Http\File;


class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Award::all();
        return view('backend.award.index', compact('data'));
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
        return view('backend.award.create', compact('researches', 'r_title', 'p_title'));
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
        $new_p = Award::create($request->all());
        $image = $request->file('file_upload');
        if ($image != null){
            ImageOptimizer::optimize($image->getRealPath());
            $file = Storage::disk('s3')->putFile('/', new File($image->getRealPath()), 'public');
            $url = Storage::disk('s3')->url($file);
            $new_p->file_url_s3 = $url;
            $new_p->save();
        }
        $new_p->tag($tags);
        return redirect()->route('backend:awards');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award)
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
        $tags = $award->tagNames();
        foreach ($tags as $tag) {
            if ($this->in_arrayi($tag, $r_title)){
                $r_tags[] = $tag;
            } else if ($this->in_arrayi($tag, $p_title)){
                $p_tags[] = $tag;
            }
        }
        $ext = '';
        $file_ = '';
        if($award->file_url != ""){
            $ext = pathinfo($award->file_url, PATHINFO_EXTENSION);
            $file_ = $award->file_url;
        } else {
            $ext = pathinfo($award->file_url_s3, PATHINFO_EXTENSION);
            $file_ = $award->file_url_s3;
        }
        return view('backend.award.edit', compact('award', 'r_title', 'p_title', 'researches', 'p_tags', 'r_tags', 'projects', 'ext', 'file_'));
    }

    public function in_arrayi($needle, $haystack)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {
        //
        $image = $request->file('file_upload');
        if ($image != null){
            ImageOptimizer::optimize($image->getRealPath());
            $file = Storage::disk('s3')->putFile('/', new File($image->getRealPath()), 'public');
            $url = Storage::disk('s3')->url($file);
            $award->file_url_s3 = $url;
            $award->save();
        }
        $award->update($request->all());
        $tags = explode(",",$request->get('tags'));
        array_pop($tags);
        $award->retag($tags);
        return redirect()->route('backend:awards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $award)
    {
        //
        $award->delete();
        return redirect()->route('backend:awards');
    }
}
