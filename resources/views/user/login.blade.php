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
        <form method="post" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Your e-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                       value="{{old('email')}}">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Your password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       name="password">
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection


