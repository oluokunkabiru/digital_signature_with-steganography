@extends('users.students.layout.app')
@section('title', 'Student Dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-address-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total attendance</h4>
                    </div>
                    <div class="card-body">
                        10
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total attended</h4>
                    </div>
                    <div class="card-body">
                        400
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total missed</h4>
                    </div>
                    <div class="card-body">
                        1,201
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today's class</h4>
                    </div>
                    <div class="card-body">
                        47
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{ ucwords(Auth::user()->name) }}</h2>
        {{--  <p class="section-lead">Change information about yourself on this page.</p>  --}}

        <div class="row mt-sm-4">
            {{--  <div class="col-12 col-md-12 col-lg-5">  --}}
            <div class="col-7 col-md-7 col-lg-7">
                <div class="card">
                        <div class="card-header">
                            <h4> <span class="fa fa-user p-1 mx-2" style="font-size: 60px"></span> Profile Details <a href="" class="mr-auto"> <span class="fa fa-qrcode p-1 mx-2" style="font-size: 60px"></span>Take attendance</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label class="fa fa-user"></label>
                                   <h6>{{ ucwords(Auth::user()->name) }}</h6>
                                </div>
                                                                <div class="form-group col-md-6 col-12">
                                    <label class="fa fa-envelope"></label>
                                   <h6>{{ Auth::user()->email }}</h6>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label class="fa fa-phone"></label>
                                   <h6>{{ Auth::user()->phone }}</h6>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="fa fa-calendar"></label>
                                   <h6>{{ Auth::user()->dob }}</h6>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="fa fa-address-book"></label>
                                   <h6>{{ Auth::user()->matric_no }}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map"></label>
                                   <h5>{{ Auth::user()->country }}</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-pin"></label>
                                   <h5>{{ Auth::user()->state }}</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-marker"></label>
                                   <h5>{{ Auth::user()->city }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-4">
                                    <label class="far  fa-chart-bar"></label>
                                   <h5>{{ Auth::user()->level }}</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-pin"></label>
                                   <h5>{{ ucwords(Auth::user()->faculty->faculty) }}</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-marker"></label>
                                   <h5>{{ ucwords(Auth::user()->department->dept) }}</h5>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer text-right">
                            <a href="#" class="btn btn-primary">Changes</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-5 col-md-5 col-lg-5">
                <div class="card">
                        <div class="card-header">
                            <h4><span class="fa fa-clock p-1 mx-2" style="font-size: 60px"></span> Today attendance</h4>
                        </div>
                        <div class="card-body">
                            {{-- <div class=""> --}}
                                @if ($attendances)
                                    @foreach ($attendances as $attendance)
                                        <a href="#scanqrcode" data-toggle="modal">
                                        <div class="card">
                                            <div class="card-body">
                                            <h6>{{ strtoupper($attendance->course->code) }}</h6>
                                            <p>{{ ucwords($attendance->course->title) }}</</p>
                                        </div>
                                    </div>
                                    </a>
                                    @endforeach
                                @endif

                            {{-- </div> --}}
                        </div>
                </div>
            </div>
        </div>



    </div>

</section>
 <div class="modal" id="scanqrcode">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-uppercase">scan qrcode to attend  <span id="studentdeletename"></span>
                    </h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="studentdeleteform" action="" method="POST">

                    {{ csrf_field() }}

                    <div id="loadingMessage" class="text-uppercase">🎥 Unable to access camera stream (please make sure you have a webcam enabled)</div>
                    <canvas id="canvas" hidden></canvas>
                    <div id="output" hidden>
                      <div id="outputMessage " class="text-uppercase font-weight-bold">No QR code detected.</div>
                      <div hidden><b>Data:</b> <span id="outputData"></span></div>
                  </div>
                    <!-- Modal footer -->
                    {{--  <div class="modal-footer">
                        <button class="btn btn-success float-left mx-2" data-dismiss="modal">Cancel</button>
                        <button id="addcategorybtn" type="submit" class="btn btn-danger text-uppercase">delete
                            student</button>
                    </div>  --}}
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
$(document).ready(function() {
    $('#scanqrcode').on('show.bs.modal', function(e) {
    var video = document.createElement("video");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
    var loadingMessage = document.getElementById("loadingMessage");
    var outputContainer = document.getElementById("output");
    var outputMessage = document.getElementById("outputMessage");
    var outputData = document.getElementById("outputData");

    function drawLine(begin, end, color) {
      canvas.beginPath();
      canvas.moveTo(begin.x, begin.y);
      canvas.lineTo(end.x, end.y);
      canvas.lineWidth = 4;
      canvas.strokeStyle = color;
      canvas.stroke();
    }

    // Use facingMode: environment to attemt to get the front camera on phones
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
      video.srcObject = stream;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.play();
      requestAnimationFrame(tick);
    });

    function tick() {
      loadingMessage.innerText = "⌛ Loading QR scanner..."
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        loadingMessage.hidden = true;
        canvasElement.hidden = false;
        outputContainer.hidden = false;

        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
        });
        if (code) {
          drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
          drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
          drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
          drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
          outputMessage.hidden = true;
          outputData.parentElement.hidden = false;
          outputData.innerText = code.data;
        } else {
          outputMessage.hidden = false;
          outputData.parentElement.hidden = true;
        }
      }
      requestAnimationFrame(tick);
    }

})
})

  </script>
@endsection
