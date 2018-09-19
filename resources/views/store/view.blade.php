@extends('layouts.app')

@section('content')
    <!-- Post Content Column -->
    <div class="col-lg-8">
        <!-- Title -->
        <h1 class="mt-4">{!! $posts->title !!}</h1>

        <!-- Author -->
        <p class="lead">
            by
            <a href="#">{!! $posts->author !!}</a>
        </p>
        <hr>
        <!-- Date/Time -->
        <p>Posted on {!! $posts->created_at->format('jS F Y') !!} at {!! $posts->created_at->format('H:i') !!}</p>
        <hr>

        <!-- Preview Image -->
        {!! Html::image('/img/posts/'.$posts->image, $posts->title, array('class'=>'img-fluid rounded')) !!}
        <hr>

        <!-- Post Content -->
        <p class="lead">{!! $posts->description !!}</p>
        <hr>
        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form>
                    <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- Single Comment -->
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <!-- Comment with nested comments -->
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <div class="media mt-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <div class="media mt-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4" id="sidebar">
        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            {!! Form::open(array('url'=>'store/search','method'=>'GET')) !!}
            <div class="input-group">
              {!! Form::text('keyword',null,array('class'=>'form-control','placeholder'=>'Search for...')) !!}
              <span class="input-group-btn">
                {!! Form::submit('Go!',array('class'=>'btn btn-secondary')) !!}
              </span>
            </div>
            {!! Form::close() !!}
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    @foreach ($categories as $category)
                        <li><a href="/store/category/{{ $category->id }}">{!! $category->name !!}</a></li>
                    @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
        </div>
    </div>
@endsection
