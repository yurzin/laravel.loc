@extends('layouts.layout')

@section('title')
    @parent::{{$title}}
@endsection

@section('header')
    @parent
    <h1>My header</h1>
    <hr>

@endsection

@section('content')
    <section class="py-5 text-center container">
        <div class="row">
            <div class="col-xl-12">
                {{--{!! mb_strtoupper($h1)  !!}--}}
                <h1>{{  $title }}</h1>
                {{--@foreach($data as $key => $item)
                    <p><span style="font-weight: bold">{{$key}}</span> -- {{ $item }}</p>
                @endforeach--}}
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-3">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                             preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"/>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>

                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">
                                    {{--{{ $post->created_at }}--}}
                                    {{--{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d M Y')}}--}}
                                    {{$post->post_date}}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12">
                    {{ $posts->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
