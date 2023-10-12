@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        
      <div class="col-sm-8">
        <h2> Fill Doctors Detail 
        </h2>
        <div class="card mt-3 p-3">
       
          <form method="post" action="{}" >
            @csrf 
            @method('POST') 
            <div class="form-row">
                <div class="form-group col">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" required/>
                </div>
            
                <div class="form-group col">
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name" class="form-control" nullable/>
                </div>
            
                <div class="form-group col">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" required/>
                </div>
            </div>
            <div class="form-group ">
                <label for="license_number">License Number:</label>
                <input type="text" id="license_number" name="license_number" class="form-control" required>
              </div>

        

            <div class="form-group ">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
              </div>
            

              <div class="form-group">
                <label>Ph.Number</label>
                <input type="number" name="number" class="form-control" required/>
              </div>

            <div class="form-group">
                <label>Address:</label>
                <input type="text" name="address" class="form-control" required/>
              </div>
              <div class="form-group">
                <label>Gender:</label>
                <input type="text" name="gender" class="form-control" required/>
              </div>

              <div class="form-group">
                <label>DOB:</label>
                <input type="date" name="dob" class="form-control" required/>
              </div>

              <div class="form-group">
                <label>Specialization:</label>
                <input type="text" name="specialization" class="form-control" required/>
              </div>

              <div class="form-group">
                <label>Image:</label>
                <input type="file" name="image" class="form-control" required/>
              </div>

            <button type="submit" class="btn btn-dark">Submit</button>
          </form>   
      </div>
    </div>
 </div>
</div>
@endsection