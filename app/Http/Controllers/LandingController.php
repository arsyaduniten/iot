<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Work;
use App\Research;
use App\Project;
use App\Award;
use App\Page;
use App\About;
use App\Funding;
use App\Publication;
use App\Collaborator;
use App\Researcher;
use App\Blog;


class LandingController extends Controller
{
    //
    public function index(Request $request)
    {
    	// $data = null;
    	// $user = User::where('type', 'admin')->first();
    	// switch($request->get('active')){
    	// 	case 'about-me':
    	// 		$data = $user->about_long;
    	// 		break;
    	// 	case 'education':
    	// 		$data = $user->educations;
    	// 		break;
    	// 	case 'research':
    	// 		$data = Research::all();
    	// 		break;
    	// 	case 'project':
    	// 		$data = Project::all();
    	// 		break;
    	// 	case 'awards':
    	// 		$data = Award::all();
    	// 		break;
     //        case 'rants':
     //            $data = "";
     //            break;
    	// 	default:
    	// 		$data = $user->about_long;
    	// 		break;
    	// }
    	return view('public.wip');
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
        $about = About::where('type', 'bodies')->first();
        $recognition = About::where('type', 'recognition')->first();
        return view('public.landingv2', compact('data', 'about', 'awards', 'recognition'));
    }

    public function portfolio_v2(Request $request)
    {
        $data = Page::find(3);
        $tags = $data->tagNames();
        $education = About::where('type', 'education')->first();
        $experience = About::where('type', 'experience')->first();
        $qualification = About::where('type', 'qualifications')->first();
        $teaching = About::where('type', 'teaching')->first();
        $administrative = About::where('type', 'administrative')->first();
        $about = [$education, $experience, $qualification, $teaching, $administrative];
        return view('public.portfoliov2', compact('data', 'tags', 'education', 'experience', 'about'));
    }

    public function research_v2(Request $request)
    {
        $data = Page::find(4);
        $tags = $data->tagNames();
        $projects = Project::orderBy('created_at', 'desc')->get()->toArray();
        $projects_2 = [];
        $researches = Research::orderBy('start_date', 'desc')->get();
        $colleagues = Researcher::orderBy('created_at', 'desc')->get();
        $awards = Award::orderBy('created_at', 'desc')->get();
        foreach ($colleagues as $colleague) {
            $tags = $colleague->tagNames();
            foreach ($projects as $key => $project) {
                foreach ($tags as $tag) {
                    if(strtolower($project['title']) == strtolower($tag)){
                        $projects[$key]['researchers'][] = $colleague;
                    }
                }
                // array_push($projects_2, $project);
            }
            
        }
        $collaborators = Collaborator::orderBy('created_at', 'desc')->get();
        $fundings = Funding::orderBy('created_at', 'desc')->get();
        $total_funding = Funding::orderBy('created_at', 'desc')->sum('amount');
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://free.currconv.com/api/v7/convert?q=USD_MYR&compact=ultra&apiKey=29e644fb846d2284dcf9');
        $rate = json_decode($res->getBody()->getContents());
        $usd = number_format((float)$total_funding / $rate->USD_MYR, 2, '.', '');
        $publications = Publication::orderBy('publication_date', 'desc')->get();
        $highlighted = Publication::where('highlight', 1)->orderBy('rank', 'asc')->get();
        return view('public.researchv2', compact('data', 'tags', 'projects', 'researches', 'colleagues', 'collaborators', 'fundings', 'publications', 'highlighted', 'awards', 'total_funding', 'usd'));
    }

    public function mycorner(Request $request)
    {
        $data = Page::find(5);
        $tags = $data->tagNames();
        $keyword = $request->get('keyword');
        if($keyword == 'events'){
            $posts = Blog::where('event', 1)->get();
        }
        else if(is_null($request->get('keyword'))){
            $posts = Blog::where('publish',1)->orderBy('post_date', 'desc')->get();
        } else if(is_null($request->get('filter'))) {
            $posts = Blog::withAnyTag($request->get('keyword'))->where('publish',1)->orderBy('post_date', 'desc')->get();
        } else {
            $f = $request->get('filter');
            if($f == 'recent'){
                $posts = Blog::where('publish',1)->latest()->get();
            } else {
                $posts = Blog::where('publish',1)->oldest()->get();
            }
        }
        return view('public.mycorner', compact('data', 'tags', 'posts'));
    }

    public function contact(Request $request)
    {
        $data = Page::find(6);
        return view('public.contact', compact('data'));
    }

}
