<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;


class BackendController extends Controller
{
    //
    public function index()
    {
    	return view('backend.index');
    }

    public function entry()
    {
        return view('backend.entry');
    }

    public function layout()
    {
        $pages = Page::all();
        return view('backend.layout', compact('pages'));
    }

    public function getpage($id)
    {
        $pages = Page::all();
        $p = Page::find($id);
        $desc = $p->description;
        $stats = $p->statistics;
        $snss = $p->snss;
        return view('backend.pageview', compact('pages','p', 'desc', 'stats', 'snss'));
    }
}
