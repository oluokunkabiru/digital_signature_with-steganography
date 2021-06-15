
@extends('users.students.layout.app')
@section('title', 'Student Dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('scanner/css/qrcode-reader.css') }}">

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Scan with your camera</h2>
        {{--  <p class="section-lead">Change information about yourself on this page.</p>  --}}

        <div class="row mt-sm-4">
            {{--  <div class="col-12 col-md-12 col-lg-5">  --}}
            <div class="col-7 col-md-7 col-lg-7">
                <form>
                    <label for="single">Single input (rebound click, depending on target input's content):</label>
                    <input id="single2" type="text" size="50">
                    <a href="#" type="button" id="openreader-single2"
                      data-qrr-target="#single2"
                      data-qrr-line-color="#00FF00"
                      data-qrr-repeat-timeout="0"
                      data-qrr-audio-feedback="true">Read or follow QRCode</a>
                  </form>



            </div>

            <div class="col-5 col-md-5 col-lg-5">

            </div>
        </div>



    </div>

</section>

@endsection
@section('script')
<script src="{{ asset('scanner/js/qrcode-reader.min.js') }}"></script>

<script>

  $(function(){

    // overriding path of JS script and audio
    $.qrCodeReader.jsQRpath = "{{ asset('scanner/js/jsQR/jsQR.min.js') }}"; //"../dist/js/jsQR/jsQR.min.js";
    $.qrCodeReader.beepPath = "{{ asset('scanner/audio/beep.mp3') }}"; //"../dist/audio/beep.mp3";


    $("#openreader-single2").qrCodeReader({callback: function(code) {
      if (code) {
        window.location.href = code;
      }
    }}).off("click.qrCodeReader").on("click", function(){
      var qrcode = $("#single2").val().trim();
      if (qrcode) {
        window.location.href = qrcode;
      } else {
        $.qrCodeReader.instance.open.call(this);
      }
    });


  });

</script>



@endsection

