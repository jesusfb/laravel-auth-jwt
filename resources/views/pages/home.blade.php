@extends('layout/main')

@section('content')
@if(session('message'))
    <div class="alert alert-info mb-3" role="alert">
        {{ session('message') }}
    </div>
@endif
<h1 class="h3">{{ $title }}</h1>
@if (session('isLogin'))
    <p>Welcome {{ session('username') }} logged in as {{ session('role') }}.</p>
@else
    <p>Your not logged in, please login first !</p>
@endif
@endsection