@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Doctors Details') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        Doctors Details
                    </div>
                    <div class="text-right mt-2 mb-2">
                        <a href="{{ route('doctors.create') }}" class="btn btn-primary btn-sm" role="button">
                            <button class="fas  fa-plus"></button> New Doctor
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="m-2">
                        <form action="{{ route('doctors.index') }}" method="get">
                            <label for="department">Filter by Department:</label>
                            <select name="department">
                                <option value="">All Departments</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->departmentName }}</option>
                                @endforeach
                            </select>


                            <input type="text" name="search" placeholder="Search by Name or Email">

                            <button class="btn btn-sm btn-primary" type="submit">Apply Filters</button>
                        </form>
                    </div>

                    <div class="card m-10">
                        <div class="card-body p-0">
                            <div class="table-responsive"> <!-- Make the table responsive -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Specialization</th>
                                            <th>Contact</th>
                                            <th colspan="3" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}</td>
                                                <td>{{ $doctor->email }}</td>
                                                <td>{{ $doctor->specialization }}</td>
                                                <td>{{ $doctor->contact }}</td>
                                                <td class="text-right  pr-0">
                                                    <a href="{{ route('doctors.profile', ['doctor' => $doctor->id]) }}"
                                                        class="btn btn-info btn-sm fas fa-eye" role="button">View</a>
                                                </td>
                                                <td class="text-center pl-0 pr-0">

                                                    <a href="{{ route('doctors.edit', ['doctor' => $doctor->id]) }}"
                                                        class="btn btn-warning btn-sm fas fa-edit" role="button">Edit</a>
                                                </td>
                                                <td class="text-left  pl-0">
                                                    <form method="post" onclick="return confirm('Are you sure?')"
                                                        action="{{ route('doctors.delete', ['doctor' => $doctor->id]) }}">
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
