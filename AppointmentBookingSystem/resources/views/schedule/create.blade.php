@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card mt-3 p-3">
                    <form method="post" action="{{ route('schedule.store') }}">
                        @csrf
                        <div class="card-header">
                            <h3>Create Schedule</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="doctors_id">Choose Doctor:</label>
                                    <select name="doctors_id" id="doctors_id" class="form-control">
                                        <option value="">Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">
                                                {{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}</option>
                                        @endforeach
                                    </select>
                                    @error('doctors_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="date_bs">Date:</label>
                                    <input type="date" id="date_bs" name="date_bs" class="form-control"
                                        value="{{ old('date_bs') }}" />
                                    @error('date_bs')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" id="date_ad" name='date_ad' />

                                <div class="form-group col">
                                    <label for="start_time">Start Time:</label>
                                    <input type="text" id="start_time" name="start_time" class="form-control"
                                        value="{{ old('start_time') }}" />
                                    @error('start_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="end_time">End Time:</label>
                                    <input type="text" id="end_time" name="end_time" class="form-control"
                                        value="{{ old('end_time') }}" />
                                    @error('end_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success  btn-sm float-right">Submit</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
