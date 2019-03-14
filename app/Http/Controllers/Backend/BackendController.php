<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Sns;
use App\Statistic;


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

    public function update($id, Request $request)
    {
        $p = Page::find($id);
        $p->update($request->all());
        if($p->description()->exists()){
            $p->description()->update(["content"=>$request->get('description')]);
        }
        foreach($request->all() as $key => $value) {
            if (strpos($key, 'sns-') === 0) {
                $sns_id = substr($key, strpos($key, "-") + 1);
                $sns = Sns::find($sns_id);
                $sns->update(["display_name" => $value]);
            }

            if(strpos($key, 'sns_') === 0){
                 $sns_id = substr($key, strpos($key, "url_") + 4);
                 $sns = Sns::find($sns_id);
                 $sns->update(["url" => $value]);
            }

            if(strpos($key, 'stat-') === 0){
                 $stat_id = substr($key, strpos($key, "-") + 1);
                 $stat = Statistic::find($stat_id);
                 $stat->update(["content" => $value]);
            }

            if(strpos($key, 'stat_') === 0){
                 $stat_id = substr($key, strpos($key, "desc_") + 5);
                 $stat = Statistic::find($stat_id);
                 $stat->update(["description" => $value]);
            }
        }
        return back();
    }
}
