<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Work;

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
    			$data = Work::where('user_id', $user->id)->research()->get();
    			break;
    		case 'iot':
    			$data = Work::where('user_id', $user->id)->iot()->get();
    			break;
    		case 'robotic':
    			$data = Work::where('user_id', $user->id)->robotic()->get();
    			break;
    		case 'awards':
    			$data = $user->awards;
    			break;
    		default:
    			$data = $user->about_long;
    			break;
    	}
    	return view('public.landing', compact('user', 'data'));
    }

    public function details(Request $request)
    {
        return view('component.details');
    }
}
