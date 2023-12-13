@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('FAQS') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" text-right mt-2 mb-2">
                        <a href="{{ route('faq.create') }}" class="btn btn-primary btn-sm" role="button">
                            <button class="fas  fa-plus pl-2"></button>ADD
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (count($faqs) != 0)
                        <div class="card card-warning">
                            <div class="card-body">
                                <div class="table-reesponsive">
                                    <table class="table">
                                        <thead style="text-align: center">
                                            <tr>
                                                <th class="col-2">#</th>
                                                <th class="col-4">Question</th>
                                                <th class="col-4">Answer</th>
                                                <th class="col-2" colspan='2'>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($faqs as $faq)
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">
                                                        {{ $loop->iteration }}</th>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $faq->question }}
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $faq->answer }}
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <a href="{{ route('faq.edit', ['faq' => $faq->id]) }}"
                                                            class="btn btn-warning btn-sm fas fa-edit"
                                                            role="button">Edit</a>
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['faq.destroy', 'faq' => $faq->id]]) !!}
                                                        {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', [
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-sm btn-danger',
                                                        ]) !!}
                                                        {!! Form::close() !!}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    @else
                        <div>
                            <p> {{ __('There are currently no FAQs!') }} </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
