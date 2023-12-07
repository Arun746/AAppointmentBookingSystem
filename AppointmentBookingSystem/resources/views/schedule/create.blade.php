@extends('layouts.app')
@inject('doctor_helper', 'App\Helpers\DoctorHelper')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card mt-3 p-3">
                    {{-- <form method="post" action="{{ route('schedule.store') }}"> --}}
                    {{-- @csrf --}}

                    {!! Form::open(['route' => 'schedule.store', 'method' => 'post']) !!}
                    <div class="card-header">
                        <h3>Create Schedule</h3>

                        {!! Form::select('doctor_id', $doctor_helper->list(), null, [
                            'option' => 'form-select',
                            'placeholder' => 'select doctor',
                        ]) !!}

                    </div>
                    <div class="card-body">
                        <div class="form-row ">
                            <div class="form-group col">
                                <label for="doctors_id">Choose Doctor:</label>
                                <select name="doctors_id" class="form-control">
                                    @if (auth()->user()->role == 0)
                                        <option value="">Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">
                                                {{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}
                                            </option>
                                        @endforeach
                                    @elseif (auth()->user()->role == 1)
                                        <option value="{{ auth()->user()->doctor->id }}" selected>
                                            {{ auth()->user()->doctor->fname . ' ' . auth()->user()->doctor->mname . ' ' . auth()->user()->doctor->lname }}
                                        </option>
                                    @endif
                                </select>
                                @error('doctors_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="date_bs">Date:</label>
                                <input type="string" name="date_bs" id="date_bs" class="form-control"
                                    placeholder="Select Date" value="{{ old('date_bs') }}" />
                                @error('date_bs')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="hidden" name="date_ad" id="date_ad">

                            <div class="col">
                                <label for="start_time">Start Time:</label>
                                <input type="time" name="start_time" class="form-control"
                                    value="{{ old('start_time') }}" />
                                @error('start_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="end_time">End Time:</label>
                                <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}" />
                                @error('end_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm float-right" onclick="BsToAd()">Submit</button>
                    {{-- </form> --}}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elm = document.getElementById("date_bs");

            elm.nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 10,
                readOnlyInput: true,
                disableDaysBefore: 0,
                disableDaysAfter: 3

            });
        });

        function BsToAd() {
            var bsDate = document.getElementById("date_bs").value;
            adDate = NepaliFunctions.BS2AD(bsDate);
            var englishdate = document.getElementById("date_ad");

            englishdate.value = adDate
        }
    </script>




@endsection
