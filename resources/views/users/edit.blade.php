@extends('layouts.app')

@section('title', 'Add Post')

@section('content')
    <div class="container">
        <h1 class="title">Update User Info {{ $user->id }}</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="name">name : </label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email : </label>
                <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input class="form-control" type="file" name="password" id="pass" value="{{ $user->password }}">
            </div>
            <input class="btn btn-primary" type="submit" value="SEND">
        </form>
    </div>
@endsection
