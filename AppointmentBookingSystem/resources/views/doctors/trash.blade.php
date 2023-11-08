@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Trash') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card m-10">
                        <div class="card-body p-0">
                            <div class="table-responsive ">
                                <!-- Make the table responsive -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Specialization</th>
                                            <th>Contact</th>
                                            <th colspan="2" style="text-align: center;">Action</th>
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

                                                <td class="text-center pl-0 pr-0">
                                                    <a href="{{ route('doctors.restore', ['id' => $doctor->id]) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <span class="fas fa-undo "></span> Restore
                                                    </a>
                                                </td>
                                                <td class="text-left pl-0">
                                                    <form method="post" onclick="return confirm('Are you sure?')"
                                                        action="{{ route('doctors.forcedelete', ['id' => $doctor->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash-alt"></i> Delete
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
