@extends('layouts.layout')

@section('title')
    @parent::{{$title}}
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('send') }}">
            @csrf

            <div class="mb-3 mt-5">
                <label for="name" class="form-label">Your name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your e-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="text">Message</label>
                <textarea class="form-control" name="text" placeholder="Leave a text here" id="text"
                          style="height: 100px"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection


