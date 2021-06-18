@extends('users.staffs.layout.app')
@section('title', 'Student management')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Attendance management</h1>
        </div>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success! </strong> {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())

                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong style="font-size:20px;">Oops!
                        {{ 'Kindly rectify below errors' }}</strong><br />
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                    @endforeach
                </div>
            @endif

            <div class="row">
                <div class="col-12">

                    <div class="card">


                        <div class="card-header">
                            <h3 class="card-title text-uppercase">Manage attendance</h3>
                        </div>
                        <div class="card-body">
                            <a href="#addattendance" class="btn btn-success text-uppercase " data-toggle="modal">Add new attendance</a>
                                <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">

                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                ID
                                            </th>
                                            <th>Lecture name</th>
                                             <th>Course code</th>
                                             <th>Course title</th>
                                            <th>Level</th>
                                            <th>No. of attendee</th>
                                            <th>QR code</th>
                                            <th>Class date</th>
                                            <th>Create</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @if ($attendance)
                                        @foreach ($attendance as $attendant)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ ucwords($attendant->user->name) }}</td>
                                            <td>{{ strtoupper($attendant->course->code) }}</td>
                                            <td>{{ ucwords($attendant->course->title) }}</td>
                                            <td>{{ $attendant->level }}</td>
                                            <td> <a href="{{ route('attendance.show', $attendant->id) }}" > <span class="badge badge-pill badge-success p-2 font-weight-bold" >{{ $attendant->numbersOfAttendee($attendant->id) }}</span> </a> </td>
                                            <td><a href="{{  asset("qrcode/". $attendant->qrcode )}}" download><img src="{{  asset("qrcode/". $attendant->qrcode )}}" class="card-img img-rounded img-fluid" style="width:150px" alt=""></a></td>
                                            <td>{{ $attendant->date }}</td>
                                            <td>{{ $attendant->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="#editattendance" data-toggle="modal"
                                                    url="{{ route('attendance.update', $attendant->id) }}"
                                                    coursecode="{{ $attendant->course->title." | ".$attendant->course->code }}"
                                                    courseid="{{ $attendant->course_id }}"
                                                    facultyid ="{{ $attendant->faculty_id }}"
                                                    facultyname ="{{ $attendant->faculty->faculty }}"
                                                    level="{{ $attendant->level }}"
                                                    deptid="{{ $attendant->department_id }}"
                                                    dept="{{ $attendant->department->dept }}"
                                                    date ="{{ str_replace("-", "/",$attendant->date) }}"


                                                        class="badge badge-pill badge-warning mx-1"><span
                                                            class="fa fa-edit p-1 text-white"></span></a>
                                                    <a href="#{{ $attendant->numbersOfAttendee($attendant->id) > 0 ? "attendedalready":"deleteattendance" }}" data-toggle="modal" attendedNo={{ $attendant->numbersOfAttendee($attendant->id) }} deurl="{{ route('attendance.destroy', $attendant->id) }}" title="{{ ucwords($attendant->course->title) }}"
                                                        class="badge badge-pill badge-danger mx-1"><span
                                                            class="fa fa-trash p-1 text-white"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>




    </section>



  {{-- edit --}}
  <div class="modal" id="addattendance">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-uppercase">Add new attendance</h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="newcategory" action="{{ route('attendance.store') }}" method="POST">
                    <div class="form-group">
                        <label for="sel1">Select faculty:</label>
                        <select class="form-control" id="selectfaculty" name="faculty">
                            <option value="">Faculty</option>
                            @if ($faculties)
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->faculty }}</option>

                                @endforeach

                            @endif
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="sel1">Select department:</label>
                        <select class="form-control" id="dept" name="dept">
                          <option value="">Departments</option>
                        </select>
                      </div>


                      <div class="form-group">
                        <label for="sel1">Select course level:</label>
                        <select class="form-control" id="level" name="level">
                            <option value="">Level</option>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="sel1">Select course:</label>
                        <select class="form-control" id="course" name="course">
                          <option value="">Courses</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="email">Choose date:</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>

                    {{ csrf_field() }}
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="addcategorybtn" type="submit" class="btn btn-primary text-uppercase">Add attendance</button>
            </div>
            </form>
        </div>
    </div>
</div>

  <div class="modal" id="editattendance">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-uppercase">edit <span id="attendancename"></span></h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="updateattendanceform" action="" method="POST">
                    <div class="form-group">
                        <label for="sel1">Select faculty:</label>
                        <select class="form-control" id="upselectfaculty" name="faculty">
                            <option value="" id="selectsfaculty">Faculty</option>
                            @if ($faculties)
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->faculty }}</option>

                                @endforeach

                            @endif
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="sel1">Select department:</label>
                        <select class="form-control" id="updept" name="dept">
                          <option value=""  id="selectdept">Departments</option>
                        </select>
                      </div>


                      <div class="form-group">
                        <label for="sel1">Select course level:</label>
                        <select class="form-control" id="uplevel" name="level">
                            <option value=""  id="selectlevel">Level</option>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="sel1">Select course:</label>
                        <select class="form-control" id="upcourse" name="course">
                          <option value=""  id="selectcourse">Courses</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="email">Choose date:</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>

                    {{ csrf_field() }}
                    @method('PUT')
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="addcategorybtn" type="submit" class="btn btn-primary text-uppercase">update attendance</button>
            </div>
            </form>
        </div>
    </div>
</div>





 {{-- delete faculty --}}
 <div class="modal" id="deleteattendance">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-uppercase">are you sure you want delete <span id="attendancedeletename"></span>
                    ?</h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="attendancedeleteform" action="" method="POST">

                    @method('DELETE')

                    {{ csrf_field() }}


                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-success float-left mx-2" data-dismiss="modal">Cancel</button>
                        <button id="addcategorybtn" type="submit" class="btn btn-danger text-uppercase">delete
                            attendance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="attendedalready">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-uppercase">you can not delete <span id="attendedNoname"></span></h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-danger">Reason</h3>
                    </div>
                    <div class="card-body">
                     <h1 id="attendedNo" class="text-center"></h1>
                    <h4>Students already attended</h4>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

{{-- end of faculty deletion --}}
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#table-1").dataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [2, 3]
                }]
            });
            $("#table-2").dataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [2, 3]
                }]
            });


// select faculty
            $("#selectfaculty").on('change', function(){
              var facultyid =   $("#selectfaculty").val();
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('selectFaculty') }}',
                data: 'facultyid='+facultyid,
                success: function(data) {
                    $("#dept").html(data)
                }


              })

            })
            $("#upselectfaculty").on('change', function(){
                alert("hello")
              var facultyid =   $("#upselectfaculty").val();
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('selectFaculty') }}',
                data: 'facultyid='+facultyid,
                success: function(data) {
                    $("#updept").html(data)
                }


              })

            })
// select dept
            $("#dept").on('change', function(){
                var facultyid =   $("#selectfaculty").val();
                var deptid =   $("#dept").val();

              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('selectdept') }}',
                data: 'facultyid='+facultyid+'&dept='+deptid,
                success: function(data) {
                    $("#level").html(data)
                }


              })

            })

            $("#updept").on('change', function(){
                var facultyid =   $("#selectfaculty").val();
                var deptid =   $("#updept").val();

              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('selectdept') }}',
                data: 'facultyid='+facultyid+'&dept='+deptid,
                success: function(data) {
                    $("#uplevel").html(data)
                }


              })

            })
// select dept
$("#level").on('change', function(){
                var facultyid =   $("#selectfaculty").val();
                var deptid =   $("#dept").val();
                var level =   $("#level").val();

              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('selectlevel') }}',
                data: 'facultyid='+facultyid+'&dept='+deptid+'&level='+level,
                success: function(data) {
                    $("#course").html(data)
                }


              })

            })
            $("#uplevel").on('change', function(){
                var facultyid =   $("#selectfaculty").val();
                var deptid =   $("#updept").val();
                var level =   $("#uplevel").val();

              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('selectlevel') }}',
                data: 'facultyid='+facultyid+'&dept='+deptid+'&level='+level,
                success: function(data) {
                    $("#upcourse").html(data)
                }


              })

            })


                        // edit courses
                        $('#editattendance').on('show.bs.modal', function(e) {
    var dept = $(e.relatedTarget).attr('dept');
    var faculty = $(e.relatedTarget).attr('facultyname');
    var facultyid = $(e.relatedTarget).attr('facultyid');
    var deptid = $(e.relatedTarget).attr('deptid');
    var title = $(e.relatedTarget).attr('title');
    var courseid = $(e.relatedTarget).attr('courseid');
    var coursecode = $(e.relatedTarget).attr('coursecode');
    var level = $(e.relatedTarget).attr('level');
    var date = $(e.relatedTarget).attr('date');
    var urlink = $(e.relatedTarget).attr('url');
    // alert(url);

                //   alert(facultyname)selectdept
                var url = $(e.relatedTarget).attr('myurl');
                $("#dept").text(dept);
                $("#dept").val(deptid);
                $("#selectsfaculty").text(faculty);
                $("#selectsfaculty").val(facultyid);
                $("#selectdept").text(dept);
                $("#selectdept").val(deptid);
                $("#selectlevel").text(level);
                $("#selectlevel").val(level);
                $("#selectcourse").text(coursecode);
                $("#selectcourse").val(courseid);
                $("#attendancename").text(coursecode);
                $("#date").val(date);
                $("#updateattendanceform").attr("action", urlink);

            })
// delete coures


$('#deleteattendance').on('show.bs.modal', function(e) {
                var title = $(e.relatedTarget).attr('title');
                //   alert(facultyname)
                var urlink = $(e.relatedTarget).attr('deurl');
                $("#attendancedeletename").text(title);
                $("#attendancedeleteform").attr("action", urlink);

            })


            $('#attendedalready').on('show.bs.modal', function(e) {
                var title = $(e.relatedTarget).attr('title');
                //   alert(facultyname)
                var attendedNo = $(e.relatedTarget).attr('attendedNo');
                $("#attendedNoname").text(title);
                $("#attendedNo").text(attendedNo);

            })


//             setInterval(() => {
//   $(".numbersOfAttendee").load(" .numbersOfAttendee");

// }, 6000);


        })

    </script>
@endsection
