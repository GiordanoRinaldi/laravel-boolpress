@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.posts.index')}}" class="freccetta mr-2">&#10148;</a>
                    {{ __('Post') }}</div>
                <div class="card-body text-center">
                    <h1>{{$post->title}}</h1>
                    <p>{{$post->content}}</p>
                    <h5>Creato il {{$post->created_at->format('d.m.Y')}}</h5>
                    <div class="d-flex justify-content-center">
                        <a href=""><button type="button" class="btn btn-warning mr-3">Modifica</button></a>
                        <form action="{{route("admin.posts.destroy", $post->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection