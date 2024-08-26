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
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">content</th>
                        <th scope="col">operation</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cruds as $k => $crud)
                        <tr >

                            <td>{{$k +1}}</td>
                            <td>{{$crud->title}}</td>
                            <td>{{$crud->content}}</td>


                            <td class="form-inline text-center">

                                <a href="{{route('post.delete',$crud->id)}}"  class="delete_btn btn btn-sm btn-danger mr-1">delete</a>


                                <a href="{{route('post.edit',$crud->id)}}"  class=" btn btn-sm btn-success pr-2 ">edit</a>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
