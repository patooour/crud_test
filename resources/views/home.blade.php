@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">Hello dear {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>

                    <div class="card-body ">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @if (session('error'))
                                <div class="alert alert-success" role="alert">
                                    {{ session::error()->get() }}
                                </div>
                            @endif


                    </div>

                    <div class="mx-5 ">
                        <form action="{{Route('post.create')}}" method="post" class="text-center">
                            @csrf

                            <div class="form-floating mx-2">
                        <textarea class="form-control mx-2" placeholder="what is in your mind "
                                  value="{{old('text')}}" id="floatingTextarea2" style="height: 400px" name="content"></textarea>
                                <label for="floatingTextarea2" name="content" > what is in your mind </label>
                            </div>
                            <button type="submit" class="btn btn-success p-2 mt-2  "> post </button>
                            <div class="mb-3"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
