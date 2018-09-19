@extends('admin.main')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create New Post</li>
    </ol>
    
    <!-- Page Content -->
    <h1>Create New Post</h1>
    <hr>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../post">View All Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="create">Create New Post</a></li>
        </ul>
    </nav>
    <br>
    @if(Session::has('post_create'))
        <div class="alert alert-success col-sm-3"><em>{!! session('post_create'); !!}</em>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times</span></button>
        </div>
    @endif

    <div class="panel-body">

        <!-- it show the form/input errors -->
        <br>
        @include('common.errors')

        <!-- it create new category -->
        <div class="card">
            <div class="card-header">
                Form Post
            </div>
            <div class="card-body">
                <div class="container">
                    {!! Form::open(array('url'=>'post','files'=>'true')) !!}
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                {!! Form::label('title','Title:')!!}
                                {!! Form::text('title',null,array('class'=>'form-control','placeholder'=>'Title ..')) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('short_desc','Short Description:')!!}
                                {!! Form::textarea('short_desc',null,array('class'=>'form-control','placeholder'=>'Short Description ...','rows'=>'4')) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('image','Upload Image:')!!}
                                {!! Form::file('image',null,array('class'=>'form-control')) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('category_id','Category:')!!}
                                {!! Form::select('category_id',$categories,array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                {!! Form::label('author','Author:')!!}
                                {!! Form::text('author',null,array('class'=>'form-control','placeholder'=>'Author ..')) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('description','Description:')!!}
                                {!! Form::textarea('description',null,array('class'=>'form-control','placeholder'=>'Description ...','rows'=>'10')) !!}
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    {!! Form::submit('Create Post',array('class'=>'btn btn-primary')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="row"></div>
    </div>
@endsection