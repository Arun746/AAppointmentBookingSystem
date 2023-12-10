@extends('layouts.app')

@section('content')

    <div class="errors" style="text-align: center">
        @if ($errors->any())
            @foreach ($errors->all() as $errors)
                <h4 class="text-danger " style="color:red;">{{ $errors }}
                </h4>
            @endforeach
        @endif
    </div>

    <h2 style="text-align: center;">Page</h2>
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Create New Page</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['method' => 'POST', 'route' => 'page.store']) !!}
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('title[en]', 'Title(EN)') !!}
                        {!! Form::text('title[en]', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('title[ne]', 'Title(NE)') !!}
                        {!! Form::text('title[ne]', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('description[en]', 'Description(EN)') !!}
                        {!! Form::textarea('description[en]', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Description',
                            'rows' => 4,
                            'cols' => 50,
                        ]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('description[ne]', 'Description(NE)') !!}
                        {!! Form::textarea('description[ne]', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Description',
                            'rows' => 4,
                            'cols' => 50,
                        ]) !!}
                    </div>
                </div>
            </div>

            {!! Form::submit('Create ', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
