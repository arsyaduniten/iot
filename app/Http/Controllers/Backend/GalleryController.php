<?php

namespace App\Http\Controllers\Backend;

use App\Gallery;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ImageOptimizer;
use Storage;
use Illuminate\Http\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Gallery::all();
        return view('backend.gallery.index', compact('data'));
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
        return view('backend.gallery.create', compact('p_title'));
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
        $image = $request->file('image');
        ImageOptimizer::optimize($image->getRealPath());
        $file = Storage::disk('s3')->putFile('/', new File($image->getRealPath()), 'public');
        $url = Storage::disk('s3')->url($file);
        $tags = explode(",",$request->get('tags'));
        array_pop($tags);
        $new_p = new Gallery();
        $new_p->filename = $file;
        $new_p->url = $url;
        $new_p->save();
        $new_p->tag($tags);
        return redirect()->route('backend:galleries');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryController  $galleryController
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
        $p_title = [];
        $projects = Project::all();
        foreach ($projects as $p) {
            # code...
            $p_title[] = $p->title;
        }
        $p_tags = [];
        $tags = $gallery->tagNames();
        foreach ($tags as $tag) {
            if ($this->in_arrayi($tag, $p_title)){
                $p_tags[] = $tag;
            } 
        }

        return view('backend.gallery.edit', compact('gallery', 'p_title', 'p_tags', 'projects'));
    }

    public function in_arrayi($needle, $haystack)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
        $gallery->update($request->all());
        $tags = explode(",",$request->get('tags'));
        array_pop($tags);
        $gallery->retag($tags);
        return redirect()->route('backend:galleries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
        Storage::disk('s3')->delete($gallery->filename);
        $gallery->delete();
        return redirect()->route('backend:galleries');
    }
}
