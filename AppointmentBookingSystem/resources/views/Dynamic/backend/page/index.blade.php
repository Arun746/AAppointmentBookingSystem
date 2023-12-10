@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Page Details') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" text-right mt-2 mb-2">
                        <a href="{{ route('page.create') }}" class="btn btn-primary btn-sm" role="button">
                            <button class="fas  fa-plus pl-2"></button>ADD
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    {{-- <div class=" text-right m-3">
                        <button type="button" class="btn btn-sm btn-secondary mr-0 rounded-0" style="">EN <button
                                type="button" class="btn btn-sm btn-secondary ml-0 rounded-0">NP</button></button>

                    </div> --}}
                    @if (count($pages) != 0)
                        <div class="card card-warning">
                            <div class="card-body">
                                <div class="table-reesponsive">
                                    <table class="table">
                                        <thead style="text-align: center">
                                            <tr>
                                                <th class="col-1">#</th>
                                                <th class="col-3">Title</th>
                                                <th class="col-6">Description</th>
                                                <th class="col-2" colspan='2'>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pages as $key => $item)
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">
                                                        {{ $key + 1 }}</th>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $item->title['en'] }}
                                                        <hr>
                                                        {{ $item->title['ne'] }}
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $item->description['en'] }}
                                                        <hr>
                                                        {{ $item->description['ne'] }}
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <a href="{{ route('page.edit', ['page' => $item->id]) }}"
                                                            class="btn btn-warning btn-sm fas fa-edit"
                                                            role="button">Edit</a>
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['page.destroy', 'page' => $item->id]]) !!}
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
                            <p> {{ __('There are currently no Page Articles!') }} </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
