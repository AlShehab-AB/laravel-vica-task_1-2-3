@extends('layouts.app')

@section('title' , 'login')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <input class="form-control" type="email" name="email" id="email" placeholder="enter your email">
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" name="password" id="password" placeholder="enter your password">
            </div>
            <input class="btn btn-primary" type="submit" value="Login">
        </form>

    </div>
@endsection