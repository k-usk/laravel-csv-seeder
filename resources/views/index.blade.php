<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel CSV Seeder</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">Laravel CSV Seeder</h1>
        <p class="lead">Create laravel seeder from csv format text.</p>
    </div>
</div>

<div class="container">
    {!! Form::open() !!}
    <div>
        <div class="form-group">
            {!! Form::label('table', 'Table name') !!}
            {!! Form::text('table', null, [
                'class' => 'form-control'
            ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('csv', 'CSV Format Text') !!}
            {!! Form::textarea('csv', null, [
                'class' => 'form-control',
                'rows' => '5'
            ]) !!}
        </div>
        @if($errors->has('csv'))<span class="text-danger">{{ $errors->first('csv') }}</span>@endif
    </div>
    <div class="mt-3 mb-5">
        {!! Form::submit('convert', [
            'class' => 'btn btn-success'
        ]) !!}
    </div>
    {!! Form::close() !!}

    <div>
        {!! Form::label('converted', 'Conversion result') !!}
        {!! Form::textarea('converted', $seeder_txt, [
            'class' => 'form-control',
            'rows' => '6',
            'readonly',
        ]) !!}
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
</body>
</html>
