@extends('admin.main')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Category</li>
    </ol>
    
    <!-- Page Content -->
    <h1>Edit Category</h1>
    <hr>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../category">View All Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="create">Create New Category</a></li>
        </ul>
    </nav>

    <div class="panel-body">

        <!-- it show the form/input errors -->
        <br>
        @include('common.errors')

        <!-- edit a category -->
        {!! Form::model($categories, array('route'=> array('category.update',$categories->id), 'method'=> 'PUT')) !!}

        {!! Form::label('name','Name:')!!}
        {!! Form::text('name',null,array('class'=>'form-control col-sm-3')) !!}
        <br>
        {!! Form::submit('Save Changes',array('class'=>'btn btn-primary')) !!}
        {!! Form::close() !!}
    </div>
@endsection