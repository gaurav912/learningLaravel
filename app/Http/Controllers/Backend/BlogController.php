<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
    	$blogs = DB::table('blogs')->select('id','title','description')->get();
        return view('admin.blog',compact('blogs'));
    }

    public function create(){
    	return view('admin.create');
    }
   
    public function store(Request $request){
    	$post = new Blog();
    	$post->title = $request['blogtitle'];
    	$post->description = $request['blogdesc'];
    	$post->save();
    	return redirect('/admin/blog')->with('success','Post is successfully created');
    }

	public function show($id){
		$post = Blog::find($id);
		return view('admin.show',compact('post'));
    }

    public function edit($id){
    	$post = Blog::find($id);
        return view('admin.edit',compact('post'));
    }

    public function update(Request $request){
    	$post = Blog::findOrFail($request->id);
        $post->title = request('blogtitle');
        $post->description = request('blogdesc');
        if($post->save()){
       		return redirect('/admin/blog')->with('success','Post is successflly updated');
        }
    }

    public function destroy($id){
    	Blog::find($id)->delete();
    	return redirect('/admin/blog')->with('error','Post is successfully deleted');
    }

}
