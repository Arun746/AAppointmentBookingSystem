@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        
      <div class="col-sm-8">
        <h2> Fill User Details 
        </h2>
        <div class="card mt-3 p-3">
       
          <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data" >
            @csrf 
             
            <div class="form-row">
                <div class="form-group col">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" class="form-control" />
                    @error('fname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group col">
                    <label for="mname">Middle Name:</label>
                    <input type="text" id="mname" name="mname" class="form-control" />
                    @error('mname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group col">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" class="form-control" />
                    @error('lname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" />
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            
              <div class="form-group col">
                <label for="password">Password:</label>
                <input type="string" id="password"name="password" class="form-control" />
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

            <div class="form-group col">
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" class="form-control" />
                @error('role')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

            <button type="submit" class="btn btn-dark">Submit</button>
          </form>   
      </div>
    </div>
 </div>
</div>
@endsection