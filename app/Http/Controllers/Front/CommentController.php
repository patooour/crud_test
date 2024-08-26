<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Mail\MailgunEmail;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function addComment(CommentRequest $request){

        $post = Post::find($request->post_id);

        $email = $post->user;
        $content = $request->comment;

        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();

        $data = [
            'comment' => $content,
            'name' => Auth::user()->name,

        ];

        Mail::to($email)->send(new MailgunEmail($data));

        return redirect()->back();
    }

    public function deleteComment($id){
        $comment = Comment::find($id);

        $comment->delete();


        if (!$comment || $comment == null  ) {
            return redirect()->back();
        }
        return redirect()->back();
    }
}
