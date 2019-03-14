<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Work;
use App\Research;
use App\Project;
use App\Award;
use App\Page;

class LandingController extends Controller
{
    //
    public function index(Request $request)
    {
    	$data = null;
    	$user = User::where('type', 'admin')->first();
    	switch($request->get('active')){
    		case 'about-me':
    			$data = $user->about_long;
    			break;
    		case 'education':
    			$data = $user->educations;
    			break;
    		case 'research':
    			$data = Research::all();
    			break;
    		case 'project':
    			$data = Project::all();
    			break;
    		case 'awards':
    			$data = Award::all();
    			break;
            case 'rants':
                $data = "";
                break;
    		default:
    			$data = $user->about_long;
    			break;
    	}
    	return view('public.landing', compact('user', 'data'));
    }

    public function index_v2_default(Request $request)
    {
        $data = Page::find(2);
        $pages = Page::all();
        return view('public.landingv2default', compact('data', 'pages'));
    }

    public function index_v2(Request $request)
    {
        $data = Page::find(1);
        return view('public.landingv2', compact('data'));
    }

    public function portfolio_v2(Request $request)
    {
        $data = Page::find(3);
        return view('public.portfoliov2', compact('data'));
    }

    public function research_v2(Request $request)
    {
        $data = Page::find(4);
        return view('public.researchv2', compact('data'));
    }

    public function mycorner(Request $request)
    {
        $data = Page::find(5);
        return view('public.mycorner', compact('data'));
    }

    public function contact(Request $request)
    {
        $data = Page::find(6);
        return view('public.contact', compact('data'));
    }
}
