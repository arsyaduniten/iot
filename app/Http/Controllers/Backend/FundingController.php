<?php

namespace App\Http\Controllers\Backend;

use App\Funding;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\LatestActivity;

class FundingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Funding::all();
        return view('backend.funding.index', compact('data'));
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
        return view('backend.funding.create', compact('p_title'));
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
        $new_p = Funding::create($request->all());
        $new_p->tag($tags);
        if($request->has('activity')){
            $a = new LatestActivity();
            $a->text = "Added new Funding";
            $a->link = "/research?active=fundings";
            $a->type = "other";
            $a->save();
        }
        return redirect()->route('backend:fundings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fundings  $fundings
     * @return \Illuminate\Http\Response
     */
    public function show(Funding $funding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fundings  $fundings
     * @return \Illuminate\Http\Response
     */
    public function edit(Funding $funding)
    {
        //
        $p_title = [];
        $projects = Project::all();
        foreach ($projects as $p) {
            # code...
            $p_title[] = $p->title;
        }
        $p_tags = [];
        $tags = $funding->tagNames();
        foreach ($tags as $tag) {
            if ($this->in_arrayi($tag, $p_title)){
                $p_tags[] = $tag;
            } 
        }

        return view('backend.funding.edit', compact('funding', 'p_title', 'p_tags', 'projects'));
    }

    public function in_arrayi($needle, $haystack)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fundings  $fundings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funding $funding)
    {
        //
        $funding->update($request->all());
        $tags = explode(",",$request->get('tags'));
        array_pop($tags);
        $funding->retag($tags);
        if($request->has('activity')){
            $a = new LatestActivity();
            $a->text = "Updated a Funding";
            $a->link = "/research?active=fundings";
            $a->type = "other";
            $a->save();
        }
        return redirect()->route('backend:fundings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fundings  $fundings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funding $funding)
    {
        //
        $funding->delete();
        return redirect()->route('backend:fundings');
    }
}
