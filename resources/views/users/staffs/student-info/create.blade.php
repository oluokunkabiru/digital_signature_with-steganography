                                            <td>21</td>
                                            @extends('users.staffs.layout.app')
                                            @section('title', 'Student management')
                                            @section('content')
                                                <section class="section">
                                                    <div class="section-header">
                                                        <h1>Add new student</h1>
                                                    </div>
                                                    <div class="container">

                                                        <div class="card">
                                                            <div class="card-body">

                                                                <form id="newcategory" action="{{ route('student-info.store') }}" method="POST">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="text">Student Surname:</label>
                                                                            <input type="text"
                                                                                class="form-control {{ $errors->has('sname') ? ' is-invalid' : '' }}"
                                                                                value="{{ old('sname') }}" name="sname">
                                                                            @if ($errors->has('sname'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('sname') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="text">Student Firstname:</label>
                                                                            <input type="text"
                                                                                class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                                                                value="{{ old('fname') }}" name="fname">
                                                                            @if ($errors->has('fname'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('fname') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="text">Student Lastname:</label>
                                                                            <input type="text"
                                                                                class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}"
                                                                                value="{{ old('lname') }}" name="lname">
                                                                            @if ($errors->has('lname'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('lname') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="email">Student phone number:</label>
                                                                            <input type="text"
                                                                                class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                                                value="{{ old('phone') }}" name="phone">
                                                                            @if ($errors->has('phone'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="email">Date of birth:</label>
                                                                            <input type="date"
                                                                                class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                                                                value="{{ old('dob') }}" name="dob">
                                                                            @if ($errors->has('dob'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('dob') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="email">Select gender:</label>
                                                                            <select
                                                                            class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                                                            name="gender">
                                                                            <option value="">Gender</option>
                                                                            <option value="male">Male</option>
                                                                            <option value="female">Female</option>

                                                                        </select>
                                                                        @if ($errors->has('gender'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('gender') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="sel1">Select country:</label>
                                                                            <select
                                                                            class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}"
                                                                            name="country">
                                                                            <option value="">Country</option>
                                                                            <option>Male</option>
                                                                            <option>Female</option>

                                                                        </select>
                                                                        @if ($errors->has('country'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('country') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label for="email">State:</label>
                                                                            <input type="text"
                                                                                class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}"
                                                                                value="{{ old('state') }}" name="state">
                                                                            @if ($errors->has('state'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('state') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="email">City:</label>
                                                                            <input type="text"
                                                                                class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                                                value="{{ old('city') }}" name="city">
                                                                            @if ($errors->has('city'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('city') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label for="sel1">Select faculty:</label>
                                                                            <select
                                                                                class="form-control {{ $errors->has('faculty') ? ' is-invalid' : '' }}"
                                                                                name="faculty" id="selectfaculty">
                                                                                <option value="">Faculty</option>
                                                                                @if ($faculties)
                                                                                @foreach ($faculties as $faculty)
                                                                                    <option value="{{ $faculty->id }}">{{ $faculty->faculty }}</option>

                                                                                @endforeach

                                                                            @endif

                                                                            </select>
                                                                            @if ($errors->has('faculty'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('faculty') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label for="sel1">Select department:</label>
                                                                            <select
                                                                                class="form-control {{ $errors->has('dept') ? ' is-invalid' : '' }}"
                                                                                name="dept"id="dept" >
                                                                                <option value="">Departments</option>


                                                                            </select>
                                                                            @if ($errors->has('dept'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('dept') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>

                                                                        <div class="form-group col-md-6">
                                                                            <label for="sel1">Select level:</label>
                                                                            <select
                                                                                class="form-control {{ $errors->has('level') ? ' is-invalid' : '' }}"
                                                                                name="level" id="level">
                                                                                <option value="">Level</option>


                                                                            </select>
                                                                            @if ($errors->has('level'))
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $errors->first('level') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>

                                                                        {{ csrf_field() }}
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <button id="addcategorybtn" type="submit"
                                                                        class="btn btn-primary text-uppercase">add new
                                                                        student</button>
                                                                </form>

                                                                {{-- </div> --}}
                                                            </div>
                                                        </div>

                                                    @endsection

@section('script')
    <script>
     $(document).ready(function() {
        // select faculty
        $("#selectfaculty").on('change', function() {
            var facultyid = $("#selectfaculty").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('selectFaculty') }}',
                data: 'facultyid=' + facultyid,
                success: function(data) {
                    $("#dept").html(data)
                }


            })

        })
        // select dept
        $("#dept").on('change', function() {
            var facultyid = $("#selectfaculty").val();
            var deptid = $("#dept").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('selectdept') }}',
                data: 'facultyid=' + facultyid +
                    '&dept=' + deptid,
                success: function(data) {
                    $("#level").html(data)
                }


            })

        })
      })

    </script>
@endsection
