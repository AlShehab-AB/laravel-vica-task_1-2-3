@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <h1 class="title">Edit User {{ $user->name }}</h1>
        <a class="btn btn-primary mt-4 ml-4" href="{{ route('users.index') }}">back</a>

        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="name">Name : </label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="mb-3">
                <select name="roleName" id="roleName" class="form-control">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn-primary" type="submit" value="SEND">
        </form>
    </div>
@endsection
