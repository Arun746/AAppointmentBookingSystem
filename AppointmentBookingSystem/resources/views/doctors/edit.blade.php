@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        
      <div class="col-sm-8">
        <h2> Edit Doctor Detail 
        </h2>
        <div class="card mt-3 p-3"> 
              
            <form method="post" action="{{route('doctors.update',['doctor'=>$doctor])}}" enctype="multipart/form-data" >
            @csrf 
            @method('PUT') 
            <div class="form-row">
                <div class="form-group col">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" class="form-control" value="{{old('fname',$doctor->fname)}}" />
                </div>
            
                <div class="form-group col">
                    <label for="mname">Middle Name:</label>
                    <input type="text" id="mname" name="mname" class="form-control" value="{{old('mname',$doctor->mname)}}" />
                </div>
            
                <div class="form-group col">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" class="form-control" value="{{old('lname',$doctor->lname)}}" />
                </div>
            </div>
            <div class="form-group col" >
                <label for="license_no">License Number:</label>
                <input type="text" id="license_no" name="license_no" class="form-control" value="{{old('license_no',$doctor->license_no)}}" />
              </div>

            <div class="form-group col" >
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{old('email',$doctor->email)}}" />
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              
              <div class="form-group col" >
                <label for="contact">Ph.Number</label>
                <input type="integer" id="contact"name="contact" class="form-control"  value="{{old('contact',$doctor->contact)}}" />
              </div>

            <div class="form-group col" >
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" value="{{old('address',$doctor->address)}}" />
              </div>

              <div class="form-group col">
                <label for="gender">Gender:</label>
                <div class="row">
                <div class="form-check">
                    <input type="radio" id="male" name="gender" value="male" {{ old('gender', $doctor->gender) === 'male' ? 'checked' : '' }} >
                    <label for="male" >Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="female" name="gender" value="female"   {{ old('gender', $doctor->gender) === 'female' ? 'checked' : '' }}/>
                    <label for="female">Female</label>
                </div>

                <div class="form-check">
                  <input type="radio" id="others" name="gender" value="others"  {{ old('gender', $doctor->gender) === 'others' ? 'checked' : '' }}/>
                  <label for="others" >Others</label>
              </div>
                </div>
              </div>

              <div class="form-group" col>
                <label for="dob">DOB:</label>
                <input type="date" id="dob" name="dob" class="form-control" value="{{old('dob',$doctor->dob)}}" />
              </div>
              <input type="hidden" id="engdob" name='engdob' />

              <div class="form-group" col>
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" class="form-control" value="{{old('specialization',$doctor->specialization)}}" />
              </div>

              <div class="form-group col">
                        <label for="status">status:</label>
                        <input type="boolean" id="status" name="status" class="form-control" value="{{ old('status', $doctor->status)}}"/>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
            
            <button type="submit" class="btn btn-dark" >Update</button>
          </form>   
      </div>
    </div>
 </div>
</div>
@endsection
