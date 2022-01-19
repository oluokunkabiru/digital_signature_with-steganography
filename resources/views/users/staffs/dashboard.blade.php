@extends('users.staffs.layout.app')
@section('title', 'Staff Dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <a href="">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Message Encrypt</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <a href="">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>vboy</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
            <a href="">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4></h4>
                    </div>

                    <div class="card-body" id="numbersOfAttendee">

                    </div>

                </div>
            </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <a href="">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total attendance</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </a>
            </div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">{{ ucwords(Auth::user()->name) }}</h2>
        {{--  <p class="section-lead">Change information about yourself on this page.</p>  --}}

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Encryption</h4>
                    </div>
                    <div class="card-body">
                        <form id="encryptAES" method="post">
                            <div class="form-group">
                                <label for="comment">Message:</label>
                                <textarea name="message" class="form-control  @error('message') is-invalid @enderror" rows="5" id="comment">
                                    {{ old('message') }}
                                </textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>


                        <div class="form-group">
                            <label for="usr">Your Private Key:</label>
                            <input type="password" value="{{ old('private') }}" name="private" class="form-control   @error('private') is-invalid @enderror" id="usr">
                            @error('private')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                         {{ csrf_field() }}


                        <button type="submit" class="btn btn-warning">Encrypt With AES</button>
                    </form>
                    <form id="generateStego" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="comment">Encrypted Message:</label>
                            <textarea id="encrypedmessage" class="form-control  @error('encrypedmessage') is-invalid @enderror" rows="5" name="encrypedmessage" id="comment">
                                  {{old('encrypedmessage') }}
                            </textarea>
                            @csrf
                            @error('encrypedmessage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Choose Cover Image</label>
                            <input type="file" id="coverimage" name="coverimage" class="form-control-file border  @error('coverimage') is-invalid @enderror" name="file">
                            @error('coverimage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                        <div class="row" id="imageinfo" style="display: none">
                            <div class="col">
                                <img id="imageinf" src="{{ asset('assets/fonts/images/img_avatar3.png') }}" style="width: 200px" class="card-img" alt="">
                            </div>
                            <div class="col">
                                <h6>Image Information</h6>
                                <p>Width: <b id="coverImgWidth"></b></p>
                                <p>Height: <b id="coverImgHeight"></b></p>
                                {{-- <p>Payload: <b>200</b></p> --}}
                            </div>
                        </div>

                        <div id="generatedStedImage">

                        </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Embed Now</button>
                    </div>
                </form>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                        <div class="card-header">
                            <h4>Decryption</h4>
                        </div>
                        <div class="card-body">
                            <form id="decryptStegoIma" action="{{ route('decrypt') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Choose Stego Image</label>
                                <input name="stegoimage" id="stegoimage" type="file" class="form-control-file border  @error('stegoimage') is-invalid @enderror">
                                @error('stegoimage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="usr">Sender Key:</label>
                                <input type="password" name="dprivate"  value="{{ old('dprivate') }}" class="form-control @error('dprivate') is-invalid @enderror" id="usr">
                                @error('dprivate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Decrypt now</button>
                        </div>
                    </form>
                </div>

                <div class="row" id="stegoimageinfo" style="display: none">
                    <div class="col">
                        <img id="stegoimageinf" src="{{ asset('assets/fonts/images/img_avatar3.png') }}" style="width: 200px" class="card-img" alt="">
                    </div>
                    <div class="col">
                        <h6>Image Information</h6>
                        <p>Width: <b id="stegoImgWidth"></b></p>
                        <p>Height: <b id="stegoImgHeight"></b></p>
                        {{-- <p>Payload: <b>200</b></p> --}}
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

    $("#coverimage").change(function () {
            previewpassport(this, "imageinf",'coverImgHeight', 'coverImgWidth', 'imageinfo');


        });


        $("#stegoimage").change(function () {
            previewpassport(this, "stegoimageinf",'stegoImgHeight', 'stegoImgWidth', 'stegoimageinfo');


        });

        $('#encryptAES').submit(function(e) {
            e.preventDefault();
            var datas = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('encryptAES') }}",
                data: datas,
                contentType: false,
                // dataType : 'json',
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    $("#encrypedmessage").text(data);

                },
                error:function(err){
                    if(err.status ==422){
                        console.log(err.status);
                        $.each(err.responseJSON.errors, function(i, error){
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color:red">'+ error[0] +'</span>'))
                        })
                    }
                }

            })
        })


        $('#generateStego').submit(function(e) {
            e.preventDefault();
            var datas = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('embed-with-stego') }}",
                data: datas,
                contentType: false,
                // dataType : 'json',
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    $("#generatedStedImage").html(data);

                },
                error:function(err){
                    if(err.status ==422){
                        console.log(err.status);
                        $.each(err.responseJSON.errors, function(i, error){
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color:red">'+ error[0] +'</span>'))
                        })
                    }
                }

            })
        })


        $('#decryptStegoImage').submit(function(e) {
            e.preventDefault();
            var datas = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('decrypt') }}",
                data: datas,
                contentType: false,
                // dataType : 'json',
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    $("#generatedStedImage").html(data);
                },
                error:function(err){
                    if(err.status ==422){
                        console.log(err.status);
                        $.each(err.responseJSON.errors, function(i, error){
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color:red">'+ error[0] +'</span>'))
                        })
                    }
                }

            })
        })



    function previewpassport(input, data, h, w, display) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // $('#uppreviewimage + img').remove();
                    // console.log(e);
                    $('#'+data).attr('src', e.target.result);
                    var img = new Image();
                    img.src = e.target.result;
                    img.onload = function(){
                        // console.log(this.width);
                        $("#"+w).text(this.width)
                        $("#"+h).text(this.height)
                        $("#"+display).removeAttr('style')
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


    })
</script>
@endsection


