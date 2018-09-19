@extends('admin.main')

@section('content')
    <div class="container">
        <h3>Change Password</h3>
        {!! Form::model($users, array('route'=> array('user.update',$users->id), 'method'=> 'PUT')) !!}
        {!! csrf_field() !!}

        @if(Session::get('error'))
            <div class="alert alert-error">{!! session::get(error) !!}</div>
        @endif

        @include('common.errors') 

        <div class="form-group">
            {!! Form::password('password',array('class'=>'form-control','placeholder'=>'New Password')) !!}
        </div>       
        <div class="form-group">
            {!! Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>'Confirme Password')) !!}
        </div> 
        <div class="form-group">
            {!! Form::submit('Update Password',array('class'=>'btn btn-primary')) !!}
        </div> 
        
        
        {!! Form::close() !!}
    </div>
@endsection