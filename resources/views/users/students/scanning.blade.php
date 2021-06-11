@extends('users.students.layout.app')
@section('title', 'Scanning QR code')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Scan QR</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{ ucwords(Auth::user()->name) }}</h2>
        {{--  <p class="section-lead">Change information about yourself on this page.</p>  --}}

        <div class="row mt-sm-4">
            {{--  <div class="col-12 col-md-12 col-lg-5">  --}}
            <div class="col-7 col-md-7 col-lg-7">
                <form id="studentdeleteform" action="" method="POST">

                    {{ csrf_field() }}

                    <div id="loadingMessage" class="text-uppercase">🎥 Unable to access camera stream (please make sure you have a webcam enabled)</div>
                    <canvas id="canvas" hidden></canvas>
                    <div id="output" hidden>
                      <div id="outputMessage " class="text-uppercase font-weight-bold">No QR code detected.</div>
                      <div hidden><b>Data:</b> <span id="outputData"></span></div>
                  </div>
                </form>
            </div>

            <div class="col-5 col-md-5 col-lg-5">

            </div>
        </div>



    </div>

</section>
@endsection
<script src="{{ asset('assets/js/jsQR.js') }}"></script>
@section('script')
    <script>

        $(document).ready(function() {
    // $('#scanqrcode').on('show.bs.modal', function(e) {
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

// })
})
    </script>
@endsection
