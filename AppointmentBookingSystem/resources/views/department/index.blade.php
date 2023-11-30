@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        Departments
                    </div>
                    <div class="text-right mt-2 mb-2">
                        <a href="{{ route('department.create') }}" class="btn btn-primary btn-sm" role="button">
                            <button class="fas  fa-plus"></button> New departmment
                        </a>
                    </div>

                    <div class="card ">
                        <div class="card-body  p-0">
                            <div class="table-responsive">

                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th> Department Name</th>
                                            <th>Members</th>
                                            <th colspan="2" class="text-center  ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $department)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $department->departmentName }}</td>
                                                <td>{{ $department->doctor->count() }}</td>
                                                <td class="text-right pl-10 pr-0 mr-0">
                                                    <a href="{{ route('department.edit', ['department' => $department]) }}"
                                                        class="btn btn-warning btn-sm fas fa-edit" role="button">Edit</a>

                                                </td>
                                                <td class="text-left pl-4 ">
                                                    <form method="post" onclick="return confirm('Are you sure?')"
                                                        action="{{ route('department.destroy', ['department' => $department->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
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
