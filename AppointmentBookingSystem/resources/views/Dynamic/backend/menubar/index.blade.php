@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Menubar Details') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" text-right mt-2 mb-2">
                        <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm" role="button">
                            <button class="fas  fa-plus pl-2"></button>ADD
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif


                    @if (count($menus) != 0)
                        <div class="card card-warning">
                            <div class="card-body">
                                <div class="table-reesponsive">
                                    <table class="table">
                                        <thead style="text-align: center " class="bg-secondary">
                                            <tr>
                                                <th class="col-2">#</th>
                                                <th class="col-2">Name</th>
                                                <th class="col-2">Type</th>
                                                <th class="col-2">Order</th>
                                                <th class="col-2">Status</th>
                                                <th class="col-2" colspan='2'>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($menus as $menu)
                                                <tr>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $loop->iteration }}</td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $menu->name }}
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        @if ($menu->type == 1)
                                                            Module
                                                        @elseif($menu->type == 2)
                                                            Page
                                                        @elseif($menu->type == 3)
                                                            External Link
                                                        @else
                                                            Unknown Type
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {{ $menu->order }}
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        @if ($menu->status == 1)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>

                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}"
                                                            class="btn btn-warning btn-sm fas fa-edit"
                                                            role="button">Edit</a>
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['menu.destroy', 'menu' => $menu->id]]) !!}
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
                        <div class="text-center">
                            <p> {{ __('There are currently No Menu Available!') }} </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
