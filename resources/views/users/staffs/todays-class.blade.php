@extends('users.staffs.layout.app')
@section('title', 'Student management')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Today's class</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="card">


                        <div class="card-header">
                            <h3 class="card-title text-uppercase">Manage today's class</h3>
                        </div>
                        <div class="card-body">
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
                                                <td>21</td>
                                                <td><img src="{{  asset("qrcode/". $attendant->qrcode )}}" class="card-img img-rounded img-fluid" style="width:150px" alt=""></td>
                                                <td>{{ $attendant->date }}</td>
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
        $("#table-2").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    })
    </script>
@endsection
