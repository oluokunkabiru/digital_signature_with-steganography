@extends('users.staffs.layout.app')
@section('title', 'Faculty and department management')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Faculty and department </h1>
        </div>
        <div class="container-fluid">
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
                <div class="col-md-6">

                    <div class="card">


                        <div class="card-header">
                            <h3 class="card-title text-uppercase">Faculty</h3>
                        </div>
                        <div class="card-body">
                            <a href="#addfaculty" class="btn btn-success text-uppercase my-1" data-toggle="modal">Add faculty</a>
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">

                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                ID
                                            </th>
                                            <th>Faculty name</th>

                                            <th>Create</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @if ($faculties)
                                        @foreach ($faculties as $faculty)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ ucwords($faculty->faculty) }}</td>

                                            <td>{{ ($faculty->created_at) }}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="#updatefaculty" data-toggle="modal" myurl="{{ route('faculty.update', $faculty->id) }}" facultyname="{{ ucwords($faculty->faculty) }}"
                                                        class="badge badge-pill badge-warning mx-1"><span
                                                            class="fa fa-edit p-1 text-white"></span></a>
                                                    <a href="#deletefaculty" data-toggle="modal"  myurl="{{ route('faculty.destroy', $faculty->id) }}" facultyname="{{ ucwords($faculty->faculty) }}"
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-uppercase">department</h3>
                        </div>
                        <div class="card-body">
                            <a href="#adddept" class="btn btn-success text-uppercase " data-toggle="modal">Add department</a>
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">

                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                ID
                                            </th>
                                            <th>Department name</th>
                                            <th>Faculty</th>
                                            <th>Create</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @if ($departments)
                                        @foreach ($departments as $dept)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ ucwords($dept->dept) }}</td>
                                                <td>{{ ucwords($dept->faculty->faculty )}}</td>
                                                <td>{{ $dept->created_at }}</td>
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

                </div>


            </div>
        </div>




    </section>

    <div class="modal" id="addfaculty">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">Add new faculty</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="newcategory" action="{{ route('faculty.store') }}" method="POST">
                        <div class="form-group">
                            <label for="email">Faculty name:</label>
                            <input type="text" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('faculty') }}" name="faculty">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('name') }}</strong>
                            </span>
                         @endif
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
    </div>



    {{-- updatee faculty --}}
    <div class="modal" id="updatefaculty">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">update <span id="facultyname"></span></h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="facultyupdateform" action="" method="POST">
                        @method('PUT')
                        <div class="form-group">
                            <label for="email">Faculty name:</label>
                            <input type="text" id="facultynameval" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('faculty') }}" name="faculty">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('name') }}</strong>
                            </span>
                         @endif
                        </div>
                        {{ csrf_field() }}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="addcategorybtn" type="submit" class="btn btn-primary text-uppercase">update faculty</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end of faculty update --}}

{{-- delete faculty --}}
<div class="modal" id="deletefaculty">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-uppercase">are you sure you want delete  <span id="facultydeletename"></span> ?</h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="facultydeleteform" action="" method="POST">
                    @method('DELETE')

                    {{ csrf_field() }}


            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-success float-left mx-2"  data-dismiss="modal">Cancel</button>
                <button id="addcategorybtn" type="submit" class="btn btn-danger text-uppercase">delete faculty</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

{{-- end of faculty deletion --}}


    <div class="modal" id="adddept">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase">Add new department</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="newcategory" action="{{ route('department-info.store') }}" method="POST">

                        <div class="form-group">
                            <label for="email">Department name:</label>
                            <input type="text" class="form-control" name="dept">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Select faculty:</label>
                            <select class="form-control" id="sel1" name="faculty">
                                <option value="">Faculty</option>
                                @if ($faculties)
                                @foreach ($faculties as $faculty)
                                 <option value="{{ $faculty->id }}">{{ $faculty->faculty }}</option>

                                @endforeach

                                @endif

                            </select>
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
    </div>
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




// edit faculty

$('#updatefaculty').on('show.bs.modal', function(e){
          var facultyname = $(e.relatedTarget).attr('facultyname');
        //   alert(facultyname)
          var url = $(e.relatedTarget).attr('myurl');
        $("#facultyname").text(facultyname);
        $("#facultynameval").val(facultyname);

          $("#facultyupdateform").attr("action", url);

     })


// delete

        $('#deletefaculty').on('show.bs.modal', function(e){
          var facultyname = $(e.relatedTarget).attr('facultyname');
        //   alert(facultyname)
          var url = $(e.relatedTarget).attr('myurl');
        $("#facultydeletename").text(facultyname);
          $("#facultydeleteform").attr("action", url);

     })



        })



    </script>
@endsection
