@extends('admin.main')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Category Control</li>
    </ol>
    
    <!-- Page Content -->
    <h1>Category Control</h1>
    <hr>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="category">View All Categories</a></li>
            <li class="nav-item"><a class="nav-link" href="category/create">Create New Category</a></li>
        </ul>
    </nav>
    <br>
    @if(Session::has('category_update'))
        <div class="alert alert-success"><em>{!! session('category_update'); !!}</em>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times</span></button>
        </div>
    @elseif(Session::has('category_delete'))
        <div class="alert alert-danger"><em>{!! session('category_delete'); !!}</em>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times</span></button>
        </div>
    @endif
    @if(count($categories) > 0)
        <div class="card">
            <div class="card-header">
                All Categories
            </div>
            <div class="card-body">
                <table class="table table-striped task-table col-sm-6">
                    <thead>
                        <th class="col-sm-8">Category</th>
                        <th class="col-sm-4">Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <div>{!! $category->name !!}</div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{!! url('category/' . $category->id . '/edit') !!}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> &nbsp Edit</a>
                                        {!! Form::open(array('url'=>'category/'.$category->id,'method'=>'DELETE','onsubmit'=>'return confirm(\'Are you sure to delete this item?\')')) !!}
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> &nbsp Delete</button>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection