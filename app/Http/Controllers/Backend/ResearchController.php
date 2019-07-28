<?php

namespace App\Http\Controllers\Backend;

use App\Research;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LatestActivity;


class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Research::all();
        return view('backend.research.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.research.create');
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
        
        $r = Research::create($request->all());
        if($request->has('activity')){
            $a = new LatestActivity();
            $a->text = "Added new Research Area";
            $a->link = "/details?type=research&id=".$r->id;
            $a->type = "other";
            $a->save();
        }
        return redirect()->route('backend:researches');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function show(Research $research)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function edit(Research $research)
    {
        //
        return view('backend.research.edit', compact('research'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Research $research)
    {
        //
        $research->update($request->all());\
        if($request->has('activity')){
            $a = new LatestActivity();
            $a->text = "Updated a Research Area";
            $a->link = "/details?type=research&id=".$research->id;
            $a->type = "other";
            $a->save();
        }
        return redirect()->route('backend:researches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function destroy(Research $research)
    {
        //
        $research->delete();
        return redirect()->route('backend:researches');
    }
}
