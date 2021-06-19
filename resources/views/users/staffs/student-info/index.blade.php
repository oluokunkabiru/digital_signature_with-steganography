@extends('users.staffs.layout.app')
@section('title', 'Student management')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Manage students</h1>
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
                            <h3 class="card-title text-uppercase">Manage student</h3>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('student-info.create') }}" class="btn btn-success text-uppercase " >Add student</a>
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">

                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                ID
                                            </th>
                                            <th>Name</th>
                                            <th>Level</th>
                                            <th>Matric No</th>
                                            <th>Phone No</th>
                                            <th>Email</th>
                                            <th>Avatar</th>
                                            <th>Create</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @if ($students)
                                        @foreach ($students as $student)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->level }}</td>
                                            <td>{{ $student->matric_no }}</td>
                                            <td>{{ isset($student->phone)?$student->phone:"Nill" }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td><img src="{{ asset('assets/images/img_avatar3.png') }}" style="width: 60px" class="rounded-circle card-img" alt=""></td>
                                            <td>{{ $student->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{ route('student-info.edit', $student->id) }}" class="badge badge-pill badge-warning mx-1"><span
                                                            class="fa fa-edit p-1 text-white"></span></a>
                                                            <a href="#{{ $student->numbersOfStudentAttended($student->id) > 0  ? "attendedalready": "deletestudent" }}" data-toggle="modal"
                                                            deurl="{{ route('student-info.destroy', $student->id) }}"
                                                            studentname="{{ ucwords($student->name) }}"
                                                            noOfAttendance= "{{ $student->numbersOfStudentAttended($student->id) }}"
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

    {{-- delete faculty --}}
    <div class="modal" id="deletestudent">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">are you sure you want to delete <span id="studentdeletename"></span>
                        ?</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="studentdeleteform" action="" method="POST">
                        @method('DELETE')

                        {{ csrf_field() }}


                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn btn-success float-left mx-2" data-dismiss="modal">Cancel</button>
                            <button id="addcategorybtn" type="submit" class="btn btn-danger text-uppercase">delete
                                student</button>
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
                        <h4>Students already mark the above number of attendance activities</h4>
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


            $('#deletestudent').on('show.bs.modal', function(e) {
                var studentname = $(e.relatedTarget).attr('studentname');
                //   alert(studentname)
                var url = $(e.relatedTarget).attr('deurl');
                $("#studentdeletename").text(studentname);
                $("#studentdeleteform").attr("action", url);

            })


            $('#attendedalready').on('show.bs.modal', function(e) {
                var title = $(e.relatedTarget).attr('studentname');
                //   alert(facultyname)
                var attendedNo = $(e.relatedTarget).attr('noOfAttendance');
                $("#attendedNoname").text(title);
                $("#attendedNo").text(attendedNo);

            })
        })

    </script>
@endsection
