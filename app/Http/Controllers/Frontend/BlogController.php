<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
    	$posts = DB::table('blogs')->select('id','title','description','created_at')->get();
    	$latestposts = Blog::latest()->get();
    	return view('frontend.showPost',compact('posts','latestposts'));
    }

    public function showindividualpost($id){
		$post = Blog::find($id);
		$latestposts = Blog::latest()->get();
		return view('frontend.showindividualpost',compact('post','latestposts'));    
	}
}
