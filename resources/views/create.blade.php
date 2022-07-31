@extends('layouts.layout')

@section('title')
    @parent::{{$title}}
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>{{  $title }}</h1>
            </div>
        </div>
    </section>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('posts.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title post</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                       value="{{old('title')}}">
                <div> @foreach ($errors->get('title') as $message)
                        {{ $message }}
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Leave a content here" id="content"
                          style="height: 100px">{{old('content')}}</textarea>
            </div>
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="mb-3">
                <label for="rubric_id">Rubric</label>
                <select class="form-select" aria-label="Default select example" name="rubric_id">
                    <option selected>Open this select rubric</option>
                    @foreach($rubrics as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
