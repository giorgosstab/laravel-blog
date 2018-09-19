@if (count($errors) > 0)
    <!-- form error list -->
    <div class="alert alert-danger col-sm-3">
        <strong>Something is Wrong</strong>
        <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-hidden="true">&times</span></button>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif