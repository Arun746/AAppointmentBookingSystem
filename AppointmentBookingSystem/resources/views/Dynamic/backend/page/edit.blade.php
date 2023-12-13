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


    <div class="card card-secondary m-3 mt-5">
        <div class="card-header m-2">
            <h3 class="card-title">Edit Page</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['method' => 'PUT', 'route' => ['page.update', $page]]) !!}
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('title[en]', 'Title(EN)') !!}
                        {!! Form::text('title[en]', old('title.en', $page->title['en']), [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Title',
                        ]) !!}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('title[ne]', 'Title(NE)') !!}
                        {!! Form::text('title[ne]', old('title.ne', $page->title['ne']), [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Title',
                        ]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('description[en]', 'Description(EN)') !!}
                        {!! Form::textarea('description[en]', old('description.en', $page->description['en']), [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Description',
                            'rows' => 4,
                            'cols' => 50,
                        ]) !!}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('description[ne]', 'Description(NE)') !!}
                        {!! Form::textarea('description[ne]', old('description.ne', $page->description['ne']), [
                            'class' => 'form-control',
                            'placeholder' => 'Enter Description',
                            'rows' => 4,
                            'cols' => 50,
                        ]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('status', 'Status') !!}
                        {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status', $page->status), [
                            'class' => 'form-control',
                            'placeholder' => 'Select Status',
                        ]) !!}
                    </div>
                </div>
                <div class="col-6 mt-4 text-right">
                    <div class="form-group ">
                        {!! Form::submit('Update ', ['class' => 'btn btn-success text-right']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
