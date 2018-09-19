@extends('admin.main')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create New Category</li>
    </ol>
    
    <!-- Page Content -->
    <h1>Create New Category</h1>
    <hr>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../category">View All Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="create">Create New Category</a></li>
        </ul>
    </nav>
    <br>
    @if(Session::has('category_create'))
        <div class="alert alert-success col-sm-3"><em>{!! session('category_create'); !!}</em>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times</span></button>
        </div>
    @endif

    <div class="panel-body">

        <!-- it show the form/input errors -->
        <br>
        @include('common.errors')

        <!-- it create new category -->
        {!! Form::open(array('url'=>'category')) !!}

        {!! Form::label('name','Name:')!!}
        {!! Form::text('name',null,array('class'=>'form-control col-sm-3')) !!}
        <br>
        {!! Form::submit('Create Category',array('class'=>'btn btn-primary')) !!}
        {!! Form::close() !!}
    </div>
@endsection