@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.home')}}" class="freccetta mr-2">&#10148;</a>
                    {{ __('Posts') }}
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>    
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Creato il</th>
                            <th scope="col">Visualizza</th>
                            <th scope="col">Modifica</th>
                            <th scope="col">Elimina</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at->format('d.m.Y')}}</td>
                                <td><a href="{{route('admin.posts.show', $post->id)}}"><button type="button" class="btn btn-primary">Visualizza</button></a></td>
                                <td><a href=""><button type="button" class="btn btn-warning">Modifica</button></a></td>
                                <td>
                                    <form action="{{route("admin.posts.destroy", $post->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection