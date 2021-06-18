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
                                             <th>Student name</th>
                                             <th>Matric number</th>
                                            <th>Level</th>
                                            <th>Email</th>
                                            <th>Attended time</th>
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
                                            <td>{{ ($attendant->user->matric_no) }}</td>
                                            <td>{{ $attendant->user->level }}</td>
                                            <td>{{ ($attendant->user->email) }}</td>
                                            <td>{{ $attendant->created_at }}</td>
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
      

        setInterval(() => {
    $("#table-1").load(" #table-1");

    }, 6000);
    })
    </script>
@endsection
