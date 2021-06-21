@extends('users.staffs.layout.app')
@section('title', 'Student management')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Today's attendance</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="card">


                        <div class="card-header">
                            <h3 class="card-title text-uppercase">Manage today's attendance</h3>
                        </div>
                        <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-1">

                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                ID
                                            </th>
                                             <th>Course code</th>
                                             <th>Course title</th>
                                            <th>Level</th>
                                            <th>Student</th>
                                            <th>Attended time</th>
                                            <th>Left time</th>
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
                                            <td>{{ strtoupper($attendant->code) }}</td>
                                            <td>{{ ucwords($attendant->title) }}</td>
                                            <td>{{ $attendant->level }}</td>
                                            <td>{{ ucwords($attendant->name) }}</td>
                                            <td>{{ $attendant->in_date }}</td>
                                            <td>{{ isset($attendant->out_date)?$attendant->out_date:"Not yet leave the class" }}</td>
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
    })
    </script>
@endsection
