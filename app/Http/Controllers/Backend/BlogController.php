<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
    	$blogs = Blog::paginate(5);
        return view('admin.blog',compact('blogs'));
    }

    public function create(){
    	return view('admin.create');
    }
   
    public function store(Request $request){
    	$post = new Blog();
    	$post->title = $request['blogtitle'];
    	$post->description = $request['blogdesc'];
        $post->slug = \Str::slug($request['blogtitle']);
        if($request->hasFile('postimage')){
            $extension = $request->postimage->getClientOriginalExtension();
            $image_name = md5(time()).".".$extension;
            $destination ='uploads/blog/image';
            $request->postimage->move($destination,$image_name);
            $post->image= $image_name;
        }
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
        $post->title = $request['blogtitle'];
        $post->description = $request['blogdesc'];
        $post->slug = \Str::slug($request['blogtitle']);
        if($request->hasFile('postimage')){
            $extension = $request->postimage->getClientOriginalExtension();
            $image_name = md5(time()).".".$extension;
            $destination ='uploads/blog/image';
            $request->postimage->move($destination,$image_name);
            $post->image= $image_name;

        }
        $update = $post->save();
        if($update){
       		return redirect('/admin/blog')->with('success','Post is successflly updated');
        }
        else{
            return redirect()->back()->with('error','Post is not updated');       
        }
    }

    public function destroy($id){
    	Blog::find($id)->delete();
    	return redirect('/admin/blog')->with('error','Post is successfully deleted');
    }
}
