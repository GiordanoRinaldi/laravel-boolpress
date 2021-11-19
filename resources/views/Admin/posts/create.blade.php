@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.posts.index')}}" class="freccetta mr-2">&#10148;</a>
                    {{ __('Aggiungi Post') }}</div>
                <div class="card-body">
                    <form action="{{route('admin.posts.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title')}}">

                            @error('title')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="10" placeholder="Inserisci il contenuto">{{old('content')}}</textarea>
                            @error('content')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Seleziona una categoria</option>
                                @foreach ($categories as $category)
                                <option {{ old("category_id") == $category->id ? 'selected' : null}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Seleziona i tag</h5>
                            @foreach ($tags as $tag)
                            <div class="custom-control custom-checkbox">
                                <input {{in_array($tag->id, old('tags', []))? "checked" : " "}} name="tags[]" value="{{$tag->id}}" name="tags[]" value="{{$tag->id}}" type="checkbox" class="custom-control-input" id="tag-{{$tag->id}}">
                                <label class="custom-control-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>     
                            </div>
                            @endforeach
                            @error('tags')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Invia</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection