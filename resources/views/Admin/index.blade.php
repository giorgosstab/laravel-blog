@extends('admin.main')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Blank Page</li>
    </ol>

    <!-- Page Content -->
    <h1>Blank Page</h1>
    <hr>
    <p>This is a great starting point for new custom pages.</p>
    @if(Session::has('user_update'))
        <div class="alert alert-success"><em>{!! session('user_update'); !!}</em>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times</span></button>
        </div>
    @endif
@endsection