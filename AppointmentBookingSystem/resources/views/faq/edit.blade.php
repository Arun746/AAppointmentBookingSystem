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


    <div class="card card-secondary m-2">
        <div class="card-header">
            <h3 class="card-title">Edit FAQ</h3>
        </div>
        <div class="card-body">
            {!! Form::model($faq, ['method' => 'PUT', 'route' => ['faq.update', $faq->id]]) !!}
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('question', 'Question') !!}
                        {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Enter Question']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('answer', 'Answer') !!}
                        {!! Form::textarea('answer', null, ['class' => 'form-control', 'placeholder' => 'Enter Answer']) !!}
                    </div>
                </div>
            </div>
            <div class="text-right">
                {!! Form::submit('Update', ['class' => 'btn btn-success ']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
