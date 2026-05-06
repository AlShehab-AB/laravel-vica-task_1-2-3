@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
    <div class="container">
        <h1 class="title">Edit Role {{ $role->name }}</h1>
        <a class="btn btn-primary mt-4 ml-4" href="{{ route('users.index') }}">back</a>

        <form action="{{ route('roles.update', $role->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="name">Name : </label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $role->name }}">
            </div>

            <div class="mb-3">
                @foreach ($permissions as $permission)
                    <label for="{{ $permission->name }}">{{ $permission->name }}</label>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" 
                        id="{{ $permission->name }}"><br>
                @endforeach
            </div>
            <input class="btn btn-primary" type="submit" value="SEND">
        </form>
    </div>
@endsection
