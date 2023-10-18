@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        Users Details
                    </div>

                    <div class="text-right">
                        
                        <a href="{{route('users.create')}}" class="btn btn-dark mt-2 mb-2" role="button">New User</a>
                    </div>

                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>                                       
                                        <td>{{$user->fname . ' ' . $user->mname . ' ' . $user->lname}}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role}}</td>
                                        <td>{{ $user->status}}</td>
                                        <td class="text-right">
                                            <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-info btn-sm fas fa-edit" role="button">Edit</a>

                                        </td>
                                        <td class="text-center">
                                            <form method="post" onclick="return confirm('Are you sure?')" action="{{route('users.delete',['user'=>$user])}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                  </button>
                                            
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
@endsection
