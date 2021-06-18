@extends('users.staffs.layout.app')
@section('title', 'Courses and classes management')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Course and classes</h1>
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
                <div class="col-md-12">

                    <div class="card">


                        <div class="card-header">
                            <h3 class="card-title text-uppercase">Courses</h3>
                        </div>
                        <div class="card-body">
                            <a href="#addcourse" class="btn btn-success text-uppercase " data-toggle="modal">Add course</a>
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">

                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                ID
                                            </th>
                                            <th>Course title</th>
                                            <th>Course Code</th>
                                            <th>Course Unit</th>
                                            <th>Level</th>
                                            <th>Faculty</th>
                                            <th>Department</th>
                                            <th>Create</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @if ($courses)
                                        @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ strtoupper($course->code) }}</td>
                                            <td>{{ $course->unit }}</td>
                                            <td>{{ $course->level }}</td>
                                            <td>{{ $course->faculty->faculty }}</td>
                                            <td>{{ $course->department->dept }}</td>
                                            <td>{{ $course->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="#editCourse"
                                                    unit="{{ $course->unit }}"
                                                    title="{{ $course->title }}"
                                                    code="{{ $course->code }}"
                                                    level ="{{ $course->level }}"
                                                    facultyid ="{{ $course->faculty_id}}"
                                                    deptid ="{{ $course->department_id}}"
                                                    dept = "{{ $course->department->dept }}"
                                                    faculty = "{{ $course->faculty->faculty }}"
                                                    url = "{{ route('courses-and-classes.update', $course->id) }}"
                                                     data-toggle="modal"
                                                        class="badge badge-pill badge-warning mx-1"><span
                                                            class="fa fa-edit p-1 text-white"></span></a>
                                                    <a href="#deletecourse" data-toggle="modal" deurl = "{{ route('courses-and-classes.destroy', $course->id) }}" title="{{ $course->title }}"
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
                {{--  <div class="col-md-5">
                    <div class="card">


                        <div class="card-header">
                            <h3 class="card-title text-uppercase">classes</h3>
                        </div>
                        <div class="card-body">
                            <a href="#addclass" class="btn btn-success text-uppercase " data-toggle="modal">Add class</a>
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">

                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                ID
                                            </th>
                                            <th>Class</th>
                                            <th>Create</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @if ($categories)
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{21</td>
                                            <td>21</td>
                                            <td>
                                                <div class="row">
                                                    <a href="#editCategory" data-toggle="modal" myurl="" mycategory=""
                                                        class="badge badge-pill badge-warning mx-1"><span
                                                            class="fa fa-edit p-1 text-white"></span></a>
                                                    <a href="#deleteCategory" data-toggle="modal" delurl="" delcategory=""
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

                </div>  --}}


            </div>
        </div>




    </section>

    {{--  <div class="modal" id="addclass">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">Add new class</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="newcategory" action="" method="POST">
                        <div class="form-group">
                            <label for="email">Class name:</label>
                            <input type="text" class="form-control" name="category" id="category">
                        </div>
                        {{ csrf_field() }}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="addcategorybtn" type="submit" class="btn btn-primary text-uppercase">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>  --}}




    <div class="modal" id="addcourse">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">Add new course</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="newcategory" action="{{ route('courses-and-classes.store') }}" method="POST">

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
                            <select class="form-control" id="selectdept" name="dept">
                              <option value="">Departments</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="email">Course title:</label>
                            <input type="text" class="form-control" name="coursetitle" id="coursetitle">
                        </div>
                        <div class="form-group">
                            <label for="email">Course code:</label>
                            <input type="text" class="form-control" name="coursecode" id="coursecode">
                        </div>
                        <div class="form-group">
                            <label for="email">Course unit:</label>
                            <input type="text" class="form-control" name="courseunit" id="courseunit">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select course level:</label>
                            <select class="form-control" name="level">
                                <option value="">Level</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                              <option value="300">300</option>
                              <option value="400">400</option>
                              <option value="500">500</option>
                            </select>
                          </div>
                        {{ csrf_field() }}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="addcategorybtn" type="submit" class="btn btn-primary text-uppercase">Add course</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="editCourse">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">update <span id="course"></span></h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="courseupdateform" action="" method="POST">

                        <div class="form-group">
                            <label for="sel1">Select faculty:</label>
                            <select class="form-control" id="upselectfaculty" name="faculty">
                                <option value="" id="faculty">Faculty</option>
                                @if ($faculties)
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->faculty }}</option>

                                    @endforeach

                                @endif

                            </select>
                        </div>
                          <div class="form-group">
                            <label for="sel1">Select department:</label>
                            <select class="form-control" id="upselectdept" name="dept">
                              <option value="" id="dept">Departments</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="email">Course title:</label>
                            <input type="text" class="form-control" name="coursetitle" id="title">
                        </div>
                        <div class="form-group">
                            <label for="email">Course code:</label>
                            <input type="text" class="form-control" name="coursecode" id="code">
                        </div>
                        <div class="form-group">
                            <label for="email">Course unit:</label>
                            <input type="text" class="form-control" name="courseunit" id="unit">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select course level:</label>
                            <select class="form-control" name="level">
                                <option value="" id="level">Level</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                              <option value="300">300</option>
                              <option value="400">400</option>
                              <option value="500">500</option>
                            </select>
                          </div>
                        {{ csrf_field() }}
                        @method('put')
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="addcategorybtn" type="submit" class="btn btn-primary text-uppercase">update course</button>
                </div>
                </form>
            </div>
        </div>
    </div>


     {{-- delete faculty --}}
     <div class="modal" id="deletecourse">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">are you sure you want delete <span id="coursedeletename"></span>
                        ?</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="coursedeleteform" action="" method="POST">
                        @method('DELETE')

                        {{ csrf_field() }}


                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn btn-success float-left mx-2" data-dismiss="modal">Cancel</button>
                            <button id="addcategorybtn" type="submit" class="btn btn-danger text-uppercase">delete
                                course</button>
                        </div>
                    </form>
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
                    $("#selectdept").html(data)
                }


              })

            })

            $("#upselectfaculty").on('change', function(){
              var facultyid =   $("#upselectfaculty").val();
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('selectFaculty') }}',
                data: 'facultyid='+facultyid,
                success: function(data) {
                    $("#upselectdept").html(data)
                }


              })

            })
            // edit courses
            $('#editCourse').on('show.bs.modal', function(e) {
    var dept = $(e.relatedTarget).attr('dept');
    var faculty = $(e.relatedTarget).attr('faculty');
    var facultyid = $(e.relatedTarget).attr('facultyid');
    var deptid = $(e.relatedTarget).attr('deptid');
    var title = $(e.relatedTarget).attr('title');
    var unit = $(e.relatedTarget).attr('unit');
    var code = $(e.relatedTarget).attr('code');
    var level = $(e.relatedTarget).attr('level');
    var urlink = $(e.relatedTarget).attr('url');
    // alert(url);

                //   alert(facultyname)
                var url = $(e.relatedTarget).attr('myurl');
                $("#dept").text(dept);
                $("#dept").val(deptid);
                $("#faculty").text(faculty);
                $("#faculty").val(facultyid);
                $("#code").val(code);
                $("#unit").val(unit);
                $("#title").val(title);
                $("#level").val(level);
                $("#level").text(level);
                $("#course").text(title);
                $("#courseupdateform").attr("action", urlink);

            })
// delete coures


$('#deletecourse').on('show.bs.modal', function(e) {
                var title = $(e.relatedTarget).attr('title');
                //   alert(facultyname)
                var urlink = $(e.relatedTarget).attr('deurl');
                $("#coursedeletename").text(title);
                $("#coursedeleteform").attr("action", urlink);

            })




        })

    </script>
@endsection
