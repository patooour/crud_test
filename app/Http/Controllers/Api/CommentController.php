<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Traits\generalTrait;
use App\Mail\MailgunEmail;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{

    use generalTrait;
    public function addComment($id, CommentRequest $request){


        $post = Post::find($id);

        if (!$post || $post == null ) {
          return $this->returnError(100 , 'this post does not exist')   ;
        }

        $email = $post->user;
        $content = $request->comment;

        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->user_id = $request->user()->id;
        $comment->post_id = $id;
        $comment->save();

        $data = [
            'comment' => $content,
            'name' => Auth::user()->name,

        ];

        Mail::to($email)->send(new MailgunEmail($data));

        return $this->returnSuccess( 'comment add success' )   ;

    }
}
