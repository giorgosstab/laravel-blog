@extends('admin.main')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">All Posts</li>
    </ol>
    
    <!-- Page Content -->
    <h1>All Posts</h1>
    <hr>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="post">View All Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="post/create">Create New Post</a></li>
        </ul>
    </nav>
    <br>
    @if(Session::has('post_update'))
        <div class="alert alert-success"><em>{!! session('post_update'); !!}</em>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times</span></button>
        </div>
    @elseif(Session::has('post_update'))
        <div class="alert alert-danger"><em>{!! session('post_update'); !!}</em>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times</span></button>
        </div>
    @endif
    @if(count($posts) > 0)
        <div class="card">
            <div class="card-header">
                All Posts
            </div>
            <div class="card-body">
                <table class="table table-striped task-table col-sm-12">
                    <thead>
                        <th class="col-sm-2">Image</th>
                        <th class="col-sm-1">Category</th>
                        <th class="col-sm-1">Title</th>
                        <th class="col-sm-1">Author</th>
                        <th class="col-sm-5">Short Description</th>
                        <th class="col-sm-2">Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="align-middle">
                                    <div>
                                        <a href="/img/posts/{!! $post->image !!}" data-toggle="lightbox" data-title="{!! $post->title !!}" data-footer="{!! $post->short_desc !!}">
                                            {!! Html::image('/img/posts/'.$post->image, $post->title, array('width'=>'230','class'=>'img-fluid')) !!}
                                        </a>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div>{!! $post->category_id !!}</div>
                                </td>
                                <td class="align-middle">
                                    <div>{!! $post->title !!}</div>
                                </td>
                                <td class="align-middle">
                                    <div>{!! $post->author !!}</div>
                                </td>
                                <td class="align-middle">
                                    <div>{!! $post->short_desc !!}</div>
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group">
                                        <a href="{!! url('post/' . $post->id . '/edit') !!}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> &nbsp Edit</a>
                                        {!! Form::open(array('url'=>'post/'.$post->id,'method'=>'DELETE','onsubmit'=>'return confirm(\'Are you sure to delete this item?\')')) !!}
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        {!! Form::button('<i class="fas fa-trash-alt"></i> &nbsp Delete', array('type'=>'submit','class' => 'btn btn-danger btn-sm')) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><br>
        <!-- Pagination -->
        <div class="float-right">{!! $posts->links() !!}</div>
    @endif
@endsection
