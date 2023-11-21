<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>

    <nav class="navbar navbar-expand-sm" style="background-color:#d5e8f2; backdrop-filter: blur(1px);">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="{{ asset('images/AdminLTELogo.png') }}" alt="Appointment Booking System" style="width:40px;"
                    class="rounded-pill">
            </a>
        </div>
    </nav>
    {{-- <div class="container-fluid ">

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card mt-3 p-3">
                    <form method="post" action="">
                        @csrf
                        <div class="card-header">
                            adshdfvsadh
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-sm-2">
                                    <label for="departmentSelect">Choose Department:</label>
                                    <select id="departmentSelect" class="form-control">
                                        <option value="">Select Department</option>
                                        @foreach ($department as $dept)
                                            <option value="{{ $dept->id }}">
                                                {{ $dept->departmentName }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="doctorSelect">Choose Doctor:</label>
                                    <select name="doctor_id" id="doctorSelect" class="form-control">
                                        <option value="">Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}"
                                                data-department="{{ $doctor->department_id }}">
                                                {{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('departmentSelect').addEventListener('change', function() {
            var selectedDepartment = this.value;
            var doctorSelect = document.getElementById('doctorSelect');

            // Reset doctor options
            doctorSelect.innerHTML = '<option value="">Select Doctor</option>';

            // Filter doctors based on the selected department
            @foreach ($doctors as $doctor)
                if ("{{ $doctor->department_id }}" == selectedDepartment) {
                    var option = document.createElement('option');
                    option.value = "{{ $doctor->id }}";
                    option.text = "{{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}";
                    doctorSelect.appendChild(option);
                }
            @endforeach
        });
    </script> --}}

    <div class="dept mt-5" data-bs-toggle="modal" data-bs-target="#myModal">
        <div class="container">
            <div class="row">
                @foreach ($doctors as $doctor)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <img class="profile-user-img img-fluid img-circle d-flex"
                                    src="{{ asset($doctor->image) }}" alt="profile">
                                <p class="text-bold">{{ $doctor->fname . '' . $doctor->mname . '' . $doctor->lname }}
                                </p>
                                <p>
                                    {{ $doctor->specialization }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title ">Book your Appointment</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="modal-body">
                        <p>
                            <input type="text" id="modal-nepali-date-picker" />
                        </p>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script></script>
</body>

</html>
