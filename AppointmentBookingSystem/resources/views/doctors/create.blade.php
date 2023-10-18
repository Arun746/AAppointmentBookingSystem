@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        
      <div class="col-sm-8">
        <h2> Fill Doctors Detail 
        </h2>
        <div class="card mt-3 p-3">
       
          <form method="post" action="{{route('doctors.store')}}" enctype="multipart/form-data" >
            @csrf 
            @method('POST') 
            <div class="form-row">
                <div class="form-group col">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" class="form-control" value="{{old('fname')}}"/>
                    @error('fname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group col">
                    <label for="mname">Middle Name:</label>
                    <input type="text" id="mname" name="mname" class="form-control" value="{{old('mname')}}"/>
                    @error('mname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group col">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" class="form-control" value="{{old('lname')}}"/>
                    @error('lname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group col">
                <label for="license_no">License Number:</label>
                <input type="text" id="license_no" name="license_no" class="form-control" value="{{old('license_no')}}"/>
                @error('license_no')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

            <div class="form-group col">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}"/>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group col">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control"  value="{{old('password')}}"/>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col">
              <label for="password_confirmation">Confirm Password:</label>
              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"   />
              @error('confirmpassword')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
            
              
              <div class="form-group col">
                <label for="contact">Phone Number</label>
                <input type="integer" id="contact"name="contact" class="form-control" value="{{old('contact')}}"/>
                @error('contact')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

            <div class="form-group col">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" value="{{old('address')}}"/>
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group col">
                <label for="gender">Gender:</label>
                <div class="row">
                <div class="form-check">
                    <input type="radio" id="male" name="gender" value="male"  >
                    <label for="male" >Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="female" name="gender" value="female"  />
                    <label for="female">Female</label>
                </div>

                <div class="form-check">
                  <input type="radio" id="others" name="gender" value="others" />
                  <label for="others" >Others</label>
              </div>
            </div>
            </div>

              <div class="form-group col">
                <label for="dob">DOB:</label>
                <input type="date" id="dob" name="dob" class="form-control" value="{{old('dob')}}"/>
                @error('dob')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group col">
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" class="form-control" value="{{old('specialization')}}"/>
                @error('specialization')
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
