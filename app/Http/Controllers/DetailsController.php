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
use App\Blog;

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
            	$projects = Project::withAnyTag($research->research_area)->get();
            	$r_data = collect([
            				'projects' => $projects,
            				'publications' => $research->publications->all(),
            				'researchers' => $research->researchers->all()
            			  ])->all();
            break;
            case 'project':
                $project = Project::find($request->get('id'));
                $data = $project;
                $title = "Project";
                $r_data = collect([
                            'research_areas' => Research::whereIn('research_area', $project->tagNames())->get(),
                            'publications' => Publication::withAnyTag($project->title)->get(),
                            'fundings' => Funding::withAnyTag($project->title)->get(),
                            'collaborator' => Collaborator::withAnyTag($project->title)->get(),
                          ])->all();
        }
        return view('component.details', compact('data', 'r_data', 'title'));
    }

    public function view(Request $request)
    {
        $blog = Blog::find($request->get('id'));
        return view('public.post', compact('blog'));
    }
}
