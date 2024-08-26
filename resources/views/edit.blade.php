@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   Hello dear {{ \Illuminate\Support\Facades\Auth::user()->name }}
                </div>

                <div>
                    <form action="{{Route('post.update',$post->id)}}" method="post" class="text-center">
                        @csrf


                        <div class="form-floating mx-2">
                        <textarea class="form-control mx-2" placeholder="what is in your mind "
                                  value="{{old('text')}}" id="floatingTextarea2" style="height: 400px" name="content">{{$post->content}}</textarea>
                            <label for="floatingTextarea2" name="text">what is in your mind </label>
                        </div>
                        <button type="submit" class="btn btn-success p-2 mt-2 "> edit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
