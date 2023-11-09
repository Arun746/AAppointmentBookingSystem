@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-sm-12">
                <h2> Create department
                </h2>
                <div class="card mt-3 p-3">

                    <form method="post" action="{{ route('department.update', $department->id) }}">
                        @csrf
                        @method('patch')
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="departmentName">Department Name:</label>
                                <input type="text" id="departmentName" name="departmentName" class="form-control"
                                    value="{{ $department->departmentName }}" />
                                @error('departmentName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-8 pt-4 ">
                                <button type="submit" class="btn btn-dark float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
