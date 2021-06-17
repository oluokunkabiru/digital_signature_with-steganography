@extends('users.students.layout.app')
@section('title', 'Courses  management')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Course management</h1>
        </div>
        <div class="container">


            <div class="row">
                <div class="col-md-12">

                    <div class="card">


                        <div class="card-header">
                            <h3 class="card-title text-uppercase">Courses taken</h3>
                        </div>
                        <div class="card-body">
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
                                            <th>Lecture in charge</th>

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
                                            <td>{{ ucwords($course->title) }}</td>
                                            <td>{{ strtoupper($course->code) }}</td>
                                            <td>{{ $course->unit }}</td>
                                            <td>{{ $course->hod }}</td>

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
