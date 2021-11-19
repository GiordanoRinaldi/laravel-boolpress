@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.home')}}" class="freccetta mr-2">&#10148;</a>
                    {{ __('Posts') }}
                    <td><a href="{{route('admin.posts.create')}}"><button type="button" class="btn btn-success ml-2">Crea Nuovo post</button></a></td>
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
                            <th scope="col">Categoria</th>
                            <th scope="col" class="text-center">Tags</th>
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
                                <td>{{$post->category->name ?? " "}}</td>
                                <td class="text-center">
                                  @if (count($post["tags"]) > 0)
                                  @foreach ($post['tags'] as $tag)
                                    <h4><span class="badge badge-primary">{{$tag->name}}</span></h4>
                                  @endforeach  
                                  @endif
                                </td>
                                <td><a href="{{route('admin.posts.show', $post->id)}}"><button type="button" class="btn btn-primary">Visualizza</button></a></td>
                                <td><a href="{{route('admin.posts.edit', $post->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a></td>
                                <td>
                                    <button type="button" data-id="{{$post->id}}" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#exampleModal">
                                        Elimina
                                    </button>
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

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Conferma Cancellazione Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler Cancellare il post
        </div>
        <div class="modal-footer">
            <form action="{{route("admin.posts.destroy", "id")}}" method="POST">
                @csrf
                @method("DELETE")
                <input type="hidden" id="delete-id" name="id">
                <button type="submit" class="btn btn-danger">Si</button>
            </form>
          <button type="button" data-dismiss="modal" class="btn btn-primary">No</button>
        </div>
      </div>
    </div>
  </div>
@endsection