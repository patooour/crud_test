<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Crud;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function create(PostRequest $request){



       /* for ($i=0 ; $i < count($categories) ; $i++){
            if ( $request->category == $categories[$i]->name){
                $name = $categories[$i]->id;
            }}*/



        $crud = new Post();
        $crud->title = 'category';
        $crud->content = $request->get('content');
        $crud->user_id = Auth::user()->id;
        $crud->save();

        return redirect()->route('post.all');
    }

    public function all(){
        $user_id =  Auth::user()->id;


        $cruds = Post::where('user_id' , '=', $user_id)->orderby('created_at','DESC')->get();

        return view('allPosts',compact('cruds'));
    }

    public function delete($id){

        $post = post::find($id);

        if (!$post || $post == null  ) {
            return redirect()->back();
        }

        $post->delete();

        return redirect()->back();

    }

    public function edit($id){

        $post = post::find($id);

        if (!$post || $post == null  ) {
            return redirect()->back();
        }




         return view('edit',[
            'post'=>$post
        ]);

    }

    public function update(PostRequest $request , $id){

        $categories = Category::all();
        $post = Post::find($id);

        if (!$post || $post == null  ) {
            return redirect()->back();
        }

     /*   for ($i=0 ; $i < count($categories) ; $i++){
            if ( $request->category == $categories[$i]->name){
                $name = $categories[$i]->id;
            }}*/

        $post->title = 'category';
        $post->content = $request->get('content');
        $post->user_id = Auth::user()->id;
        $post->save();


        return redirect()->route('post.all');



    }

    public function allPosts(){

        $posts = Post::with(['comments'=>function ($q) {
           $q -> select('id','content','user_id','post_id');
        }])->orderBy('created_at','DESC')->get();

        return view('allPostsForUsers' , compact('posts' ));
    }

}
