@extends('users.staffs.layout.app')
@section('title', 'Staff Dashboard')
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
                <div class="col-md-7">

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
                                            <th>Create</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        {{-- @if ($categories)
                                        @foreach ($categories as $category) --}}
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{21</td>
                                            <td>21</td>
                                            <td>21</td>
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
                                        {{-- @endforeach --}}
                                        {{-- @endif --}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
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
                                        {{-- @if ($categories)
                                        @foreach ($categories as $category) --}}
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
                                        {{-- @endforeach --}}
                                        {{-- @endif --}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>




    </section>

    <div class="modal" id="addclass">
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
    </div>




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
                    <form id="newcategory" action="" method="POST">
                        <div class="form-group">
                            <label for="email">Course title:</label>
                            <input type="text" class="form-control" name="category" id="category">
                        </div>
                        <div class="form-group">
                            <label for="email">Course code:</label>
                            <input type="text" class="form-control" name="category" id="category">
                        </div>
                        <div class="form-group">
                            <label for="email">Course unit:</label>
                            <input type="text" class="form-control" name="category" id="category">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Select course level:</label>
                            <select class="form-control" id="sel1">
                              <option>100</option>
                              <option>200</option>
                              <option>300</option>
                              <option>400</option>
                              <option>500</option>
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

        })

    </script>
@endsection
