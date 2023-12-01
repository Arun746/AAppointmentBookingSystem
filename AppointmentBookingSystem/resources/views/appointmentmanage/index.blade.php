@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Appointments') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid ">
            @if ($appointments->isNotEmpty())
                <div class="row">
                    <div class="col-12">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.N.</th>
                                        <th class="text-center">Booking Date and Time</th>
                                        <th class="text-center">Day</th>
                                        <th class="text-center">Booked Time</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $doctor)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $doctor->created_at }}</td>
                                            <td class="text-center">
                                                {{ dayFromDate($doctor->booking_date_bs) }}
                                                {{-- using helperfunction --}}
                                            </td>
                                            <td class="text-center">
                                                {{ $doctor->schedule->start_time . ' - ' . $doctor->schedule->end_time }}
                                            </td>
                                            <td class="text-center">
                                                @if ($doctor->status == 0)
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-sm btn-warning dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"
                                                            style="color: rgb(0, 0, 0); padding-left:15px; padding-right:15px;">
                                                            Pending
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item custom-dropdown-item accept-item"
                                                                href="{{ route('appointment_management.edit', ['appointment_management' => $doctor->id, 'status' => '1']) }}">Approve<i
                                                                    class="fa fa-check" aria-hidden="true"></i></a>
                                                            <a class="dropdown-item custom-dropdown-item reject-item"
                                                                href="{{ route('appointment_management.edit', ['appointment_management' => $doctor->id, 'status' => '2']) }}">Decline<i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                @elseif($doctor->status == 1)
                                                    <span style="color: green;">Approved<i class="fa fa-check pl-3"
                                                            aria-hidden="true"></i></span>
                                                @else
                                                    <span style="color: red;">Declined<i class="fa fa-times pl-4"
                                                            aria-hidden="true"></i></span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            @else
                <div class="text-center "> No Appointments for you!!</div>
            @endif
        </div>
    </div>

@endsection
