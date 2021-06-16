<div class="modal-content">

    <!-- Modal Header -->

    <div class="modal-header">
            <h4 class="modal-title text-uppercase">Attendance details
                </h4>
            <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
    </div>
<div class="modal-body">
    <div class="card">
            @if ($status =="success")
            <div class="card-header">
                <h4 class="text-center card-title">You have successfully take new attendance</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-muted">Faculty:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->faculty->faculty) }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Dept:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->department->dept) }}</</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Course Code:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold text-uppercase">{{ $attendee->course->code }}</</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Course title:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->course->title) }}</h6>
                    </div>

                    <div class="col-6">
                        <h6 class="text-muted">Lecturer:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->user->name) }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Date:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ $attendee->date }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Attended at:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ $attendance->created_at }}</h6>
                    </div>
                </div>
            </div>

            @elseif ($status =="already")

            <div class="card-header">
                <h4 class="text-center card-title">You already attended this class at <b>{{ $attendance->created_at }}</b>, <br> No new attendance recorded</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-muted">Faculty:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->faculty->faculty) }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Dept:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->department->dept) }}</</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Course Code:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold text-uppercase">{{ $attendee->course->code }}</</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Course title:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->course->title) }}</h6>
                    </div>

                    <div class="col-6">
                        <h6 class="text-muted">Lecturer:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->user->name) }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Date:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ $attendee->date }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Attended at:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ $attendance->created_at }}</h6>
                    </div>
                </div>
            </div>
            @else
            <div class="card-header">
                <h4 class="text-center card-title">This attendance is not for you, no attendance was recorded for you <br>see the details below:</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h6 class="text-muted">Faculty:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->faculty->faculty) }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Dept:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->department->dept) }}</</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Course Code:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold text-uppercase">{{ $attendee->course->code }}</</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Course title:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->course->title) }}</h6>
                    </div>

                    <div class="col-6">
                        <h6 class="text-muted">Lecturer:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ ucwords($attendee->user->name) }}</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="text-muted">Date:</h6>
                    </div>
                    <div class="col-6">
                        <h6 class="font-weight-bold">{{ $attendee->date }}</h6>
                    </div>

                </div>
            </div>

            @endif
    </div>

    </div>
    <!-- Modal body -->
</div>

