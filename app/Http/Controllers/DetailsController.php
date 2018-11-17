<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use App\Award;
use App\Publication;
use App\Asset;
use App\Collaborator;
use App\Funding;
use App\Project;
use App\Researcher;

class DetailsController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = $r_data = $title = null;
        switch($request->get("type")){
            case 'research':
            	$research = Research::find($request->get('id'));
            	$data = $research;
            	$title = "Research";
            	$projects = $research->projects->all();
            	$r_data = collect([
            				'projects' => $projects,
            				'publications' => $research->publications->all()
            			  ])->all();
        }
        return view('component.details', compact('data', 'r_data', 'title'));
    }
}
