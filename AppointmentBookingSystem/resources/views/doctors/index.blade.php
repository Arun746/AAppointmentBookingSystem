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
                        <a href="/doctors/create" class="btn btn-dark mt-2" role="button">New Doctor</a>
                    </div>
                    <div class="card m-10">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                               
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        
                                        
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
             </div>
        </div>
    </div>    
   
@endsection