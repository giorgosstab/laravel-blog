@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <br>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Hello, world!</h1>
                <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
            </div>
        </div>
    </div>
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        @if(count($posts) > 0)
          <h1 class="my-4">{{-- {!! $categories->name !!} --}}
              <small>Secondary Text</small>
          </h1>
          @foreach ($posts as $post)
              <div class="card mb-4">
                  <a class="card-img-top" href="/img/posts/{!! $post->image !!}" data-toggle="lightbox" data-title="{!! $post->title !!}" data-footer="{!! $post->short_desc !!}">
                      {!! Html::image('/img/posts/'.$post->image, $post->title, array('class'=>'img-fluid')) !!}
                  </a>
                  <div class="card-body">
                      <h2 class="card-title">{!! $post->title !!}</h2>
                      <p class="card-text">{!! $post->short_desc !!}</p>
                      <a href="/store/view/{{ urlencode($post->title) }}" class="btn btn-primary">Read More &rarr;</a>
                  </div>
                  <div class="card-footer text-muted">
                      Posted on {!! date('jS F Y', strtotime($post->created_at)) !!} at {!! date('H:i', strtotime($post->created_at)) !!} by
                      <a href="#">{!! $post->author !!}</a>
                  </div>
              </div>
          @endforeach
          <!-- Pagination -->
          <div class="float-right">{!! $posts->links() !!}</div>
      @else
          <h1 class="my-4">{{-- {!! $categories->name !!} --}}
              <small>No Post In That Category <br></small>
          </h1>
          <a href="{!! url('/') !!}" class="btn btn-primary">Go Back!</a>
      @endif
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
