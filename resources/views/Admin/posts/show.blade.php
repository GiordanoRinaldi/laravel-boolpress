@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'admin.categories.show')
                        <a href="{{URL::previous()}}" class="freccetta mr-2">&#10148;</a>
                    {{ __('Torna alla categoria') }}</div>
                    @else
                        <a href="{{route('admin.posts.index')}}" class="freccetta mr-2">&#10148;</a>
                    {{ __('Post') }}</div>
                    @endif
                    
                <div class="card-body text-center">
                    <h1>{{$post->title}}</h1>
                    <p>{{$post->content}}</p>
                    <h5>Creato il {{$post->created_at->format('d.m.Y')}}</h5>
                    @if (!empty($post["category"]["name"]))
                       <h5>Categoria appartenente: {{$post["category"]["name"]}}</h5>
                    @endif
                    @if (count($post["tags"]) > 0)
                        <h3>Tags:</h3>
                        @foreach ($post['tags'] as $tag)
                            <h4><span class="badge badge-primary">{{$tag->name}}</span></h4>
                        @endforeach  
                    @endif
                    
                    <div class="d-flex justify-content-center">
                        <a href="{{route('admin.posts.edit', $post->id)}}"><button type="button" class="btn btn-warning mr-3">Modifica</button></a>
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