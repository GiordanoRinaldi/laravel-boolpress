@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.categories.index')}}" class="freccetta mr-2">&#10148;</a>
                    {{ __('Categoria') }}</div>
                <div class="card-body text-center">
                    <h1>{{$category->name}}</h1>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('admin.categories.edit', $category->id)}}"><button type="button" class="btn btn-warning mr-3">Modifica</button></a>
                        <form action="{{route("admin.categories.destroy", $category->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                    <h2 class="text-left">Lista post associati</h2>
                    <ul class="text-left">
                        @forelse ($category->posts as $post)
                            <li><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></li>
                        @empty
                            <p>Non sono presenti post</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection