@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Schedule') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12">

                    <div class="text-right mt-2 mb-2">
                        <a href="{{ route('schedule.create') }}" class="btn btn-primary btn-sm" role="button">
                            <button class="fas  fa-plus"></button> New
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card m-10">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Doctor Name</th>
                                            <th>Created By</th>
                                            <th style="text-align: center;">Available Time</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedules as $schedule)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $schedule->doctor->fname . ' ' . $schedule->doctor->mname . ' ' . $schedule->doctor->lname }}
                                                </td>
                                                <td>{{ $schedule->user->fname }}</td>
                                                <td style="text-align: center;">
                                                    {{ $schedule->start_time . ' to ' . $schedule->end_time }}</td>
                                                </td>
                                                <td>
                                                    <form method="post" onclick="return confirm('Are you sure?')"
                                                        action="{{ route('schedule.destroy', ['schedule' => $schedule->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
