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
                        <a href="/doctors/create" class="btn btn-dark mt-2 mb-2" role="button">New Doctor</a>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card m-10">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
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
                                        <td>{{$doctor->id}}</td>
                                        <td>{{$doctor->name}}</td>
                                        <td>{{$doctor->email}}</td>
                                        <td>{{$doctor->specialization}}</td> 
                                        <td>{{$doctor->contact}}</td>
                                        <td>                
                                            <button class="btn btn-primary" >view</button>
                                        </td>
                                        <td>                
                                            <a href="{{route('doctors.edit',['doctor'=>$doctor])}}" class="btn btn-info btn-sm" role="button">Edit</a>
                                        </td>
                                        <td>                
                                            <form method="post" action="{{route('doctors.delete',['doctor'=>$doctor])}}">
                                                @csrf 
                                                @method('delete')
                                                <input type="submit" value="delete" class="btn btn-info btn-sm" role="button"/>
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
   
@endsection