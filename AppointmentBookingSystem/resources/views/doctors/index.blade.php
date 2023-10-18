@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Doctors') }}</h1>
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

                <div class="text-right">
                    <a href="{{route('doctors.create')}}" class="btn btn-dark mt-2 mb-2" role="button">New Doctor</a>
                </div>

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
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
                                    @foreach($doctors as $doctor)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname}}</td>

                                        <td>{{$doctor->email}}</td>
                                        <td>{{$doctor->specialization}}</td>
                                        <td>{{$doctor->contact}}</td>
                                        <td class="text-right">
                                            <button class="btn btn-info btn-sm fas fa-eye">View</button>
                                        </td>
                                        <td class="text-center">
                                           
                                            <a href="{{route('doctors.edit',['doctor'=>$doctor->id])}}" class="btn btn-info btn-sm fas fa-edit"
                                                role="button">Edit</a>
                                        </td>
                                        <td class="text-left">
                                            <form method="post" onclick="return confirm('Are you sure?')"  action="{{route('doctors.delete',['doctor'=>$doctor->id])}}">
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
