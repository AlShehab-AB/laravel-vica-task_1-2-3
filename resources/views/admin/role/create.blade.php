@extends('layouts.app')

@section('title', 'Create Role')

@section('content')
    <div class="container">
        <h1 class="title">Create Role</h1>
        <a class="btn btn-primary mt-4 ml-4" href="{{ route('roles.index') }}">back</a>

        <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Name Role: </label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            @foreach ($permissions as $permission)
                <label for="{{ $permission->name }}">{{ $permission->name }}</label>
                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="{{ $permission->name }}"><br>

            @endforeach
            <input class="btn btn-primary" type="submit" value="SEND">
        </form>
    </div>
@endsection
