@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header"> Hello dear {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>

                <div>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">



                    @foreach($posts  as $Post)


                    <div class="row justify-content-center">
                        <div class="col-md-8">
                    <form action="{{route('post.comment')}}" method="post">
                        @csrf
                        <input class="form-control" type="hidden"  name="post_id" value="{{$Post->id}}">

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">post by {{$Post->user->name }}</label>
                            <input class="form-control" type="text" value="{{$Post->content}}" aria-label="Disabled input example" disabled readonly>
                        </div>
                        @foreach($Post ->comments  as $comment)
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">comment by {{ $comment->user->name }}</label>
                            <input class="form-control" type="text" value="{{$comment->content }}" aria-label="Disabled input example" disabled readonly>
                            @if(\Illuminate\Support\Facades\Auth::user()->name == $comment->user->name)
                            <a href="{{route('comment.delete',$comment->id)}}"  class="delete_btn btn btn-sm btn-danger mr-1">delete</a>
                            @endif
                        </div>
                        @endforeach

                        <div class="mb-3">
                            <label for="comment" class="form-label">add comment</label>
                            <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success p-2 mt-2  "> add comment</button>
                        </div>

                    </form>
                        </div>
                        </div>

                    <br>

                    @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
