@extends('layout/main')

@section('content')
<h1 class="h3">{{ $title }}</h1>
<div class="row">
    <div class="col col-md-6">
        <ul class="list-group">
            <li class="list-group-item">ID: {{ $candidat['id'] }}</li>
            <li class="list-group-item">Name: {{ $candidat['name'] }}</li>
            <li class="list-group-item">Education: {{ $candidat['education'] }}</li>
            <li class="list-group-item">Birthday: {{ $candidat['birthday'] }}</li>
            <li class="list-group-item">Experience: {{ $candidat['experience'] }}</li>
            <li class="list-group-item">Last Position: {{ $candidat['last_position'] }}</li>
            <li class="list-group-item">Applied Position: {{ $candidat['applied_position'] }}</li>
            <li class="list-group-item">Skills: {{ $candidat['skills'] }}</li>
            <li class="list-group-item">Email: {{ $candidat['email'] }}</li>
            <li class="list-group-item">Phone: {{ $candidat['phone'] }}</li>
            <li class="list-group-item">Resume: <a href="{{ asset('storage/' . $candidat['resume']) }}" class="text-decoration-none" target="_blank">Preview</a></li>
            <li class="list-group-item">Created: {{ $candidat['created_at'] }}</li>
            <li class="list-group-item">Updated: {{ $candidat['updated_at'] }}</li>
        </ul>
        <div class="mt-3">
            <a href="/candidat/edit/{{ $candidat['id'] }}" class="btn btn-primary">Edit</a>
            <form action="/candidat/{{ $candidat['id'] }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
            </form>
        </div>
    </div>
</div>

@endsection