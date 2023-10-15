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
                    <input type="text" id="fname" name="fname" class="form-control" />
                </div>
            
                <div class="form-group col">
                    <label for="mname">Middle Name:</label>
                    <input type="text" id="mname" name="mname" class="form-control" />
                </div>
            
                <div class="form-group col">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" class="form-control" />
                </div>
            </div>
            <div class="form-group col">
                <label for="license_no">License Number:</label>
                <input type="text" id="license_no" name="license_no" class="form-control" />
              </div>

            <div class="form-group col">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" />
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            

              <div class="form-group col">
                <label for="contact">Ph.Number</label>
                <input type="integer" id="contact"name="contact" class="form-control" />
              </div>

            <div class="form-group col">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" />
              </div>

              <div class="form-group col">
                <label for="gender">Gender:</label>
                <input type="text" id="gender"name="gender" class="form-control" />
              </div>

              <div class="form-group col">
                <label for="dob">DOB:</label>
                <input type="date" id="dob" name="dob" class="form-control"/>
              </div>

              <div class="form-group col">
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" class="form-control" />
              </div>

              <div class="form-group col">
                <label for="Image">Image:</label>
                <input type="file" name="image" class="form-control" />
              </div>

            <button type="submit" class="btn btn-dark">Submit</button>
          </form>   
      </div>
    </div>
 </div>
</div>
@endsection