@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <h3 class=>Profile</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" {{-- src="{{ asset($doctor->image) }}" --}} alt="profile">
                            </div>
                            <h3 class="profile-username text-center">
                                {{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}</h3>

                            <p class="text-muted text-center">
                                @if ($doctor->role == 0)
                                    Admin
                                @elseif($doctor->role == 1)
                                    Doctor
                                @else
                                    User
                                @endif
                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>License No:</b> {{ $doctor->license_no }}
                                </li>
                                <li class="list-group-item">
                                    <b>Email:</b> {{ $doctor->email }}
                                </li>
                                <li class="list-group-item">
                                    <b>Department: </b> {{ $doctor->department->departmentName }}
                                </li>
                                <li class="list-group-item">
                                    <b>Specialization: </b> {{ $doctor->specialization }}
                                </li>
                                <li class="list-group-item">
                                    <b>Status: </b>
                                    @if ($doctor->status == 0)
                                        Inactive
                                    @else
                                        Active
                                    @endif
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-9 ">
                    <div class="card">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fa fa-book mr-1"></i> Basic Information</strong>
                                <div class="basic text-muted d-flex justify-content-between ">
                                    <div>
                                        <b>Date of Birth: </b>{{ $doctor->dob }}
                                    </div>
                                    <div>
                                        <b>Gender: </b> {{ $doctor->gender }}
                                    </div>
                                    <div>
                                        <b>Contact: </b> {{ $doctor->contact }}
                                    </div>
                                </div>
                                <hr>
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>
                                <div class="table-responsive ">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Institution</th>
                                                <th>Level</th>
                                                <th>Board</th>
                                                <th>Completion Year</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctor->education as $list)
                                                <tr>
                                                    <td>{{ $list->institution }}</td>


                                                    <td>{{ $list->level }}</td>

                                                    <td>{{ $list->board }}</td>

                                                    <td>{{ $list->completion_year }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <strong><i class="fa fa-lightbulb mr-1"></i> Experience</strong>
                                <div class="table-responsive ">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Organization Name</th>
                                                <th>Position</th>
                                                <th>Start Date</th>
                                                <th>End date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctor->experience as $list2)
                                                <tr>
                                                    <td>{{ $list2->organization }}</td>


                                                    <td>{{ $list2->position }}</td>

                                                    <td>{{ $list2->start_date }}</td>

                                                    <td>{{ $list2->end_date }}</td>
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
    </div>
@endsection
