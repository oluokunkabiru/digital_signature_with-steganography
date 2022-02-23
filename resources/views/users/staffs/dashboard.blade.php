@extends('users.staffs.layout.app')
@section('title', 'Staff Dashboard')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <h1>Digital Signature with cryptography (AES) and steganography (PVD)</h1>

    <div class="section-body">
        <h2 class="section-title">{{ ucwords(Auth::user()->name) }}</h2>
        {{--  <p class="section-lead">Change information about yourself on this page.</p>  --}}

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Signing an image</h4>
                    </div>
                    <div class="card-body">
                        <form id="encryptAES" method="post">
                            <div class="form-group">
                                <label for="comment">:Signature content</label>
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
                            <label for="usr">Signature Key:</label>
                            <input type="password" value="{{ old('private') }}" name="private" class="form-control   @error('private') is-invalid @enderror" id="usr">
                            @error('private')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                         {{ csrf_field() }}


                        <button type="submit" class="btn btn-warning">Sign With AES</button>
                    </form>
                    <form id="generateStego" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="comment">Signature Signed generated:</label>
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
                        {{-- <div class="form-radio">
                            <label class="form-radio-label" for="check1">
                              <input type="radio" class="form-radio-input" id="check1" name="encryptionalgorithm" value="pvd" checked>PVD
                            </label>
                          </div>
                          <div class="form-radio">
                            <label class="form-check-label" for="check2">
                              <input type="radio" class="form-radio-input" id="check2" name="encryptionalgorithm" value="lsb">LSB
                            </label>
                          </div> --}}
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
                        <button type="submit" class="btn btn-primary">This Image now Now</button>
                    </div>
                </form>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                        <div class="card-header">
                            <h4>Verify Signed Image</h4>
                        </div>
                        <div class="card-body">
                            <form id="decryptStegoImage" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Choose Signed Image</label>
                                <input name="stegoimage" id="stegoimage" type="file" class="form-control-file border  @error('stegoimage') is-invalid @enderror">
                                @error('stegoimage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="usr">Signature Key:</label>
                                <input type="password" name="dprivate"  value="{{ old('dprivate') }}" class="form-control @error('dprivate') is-invalid @enderror" id="usr">
                                @error('dprivate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Verify now</button>
                        </div>
                    </form>
                </div>

                <div class="row" id="stegoimageinfo" style="display: none">

                    <div class="col-6">
                        <img id="stegoimageinf" src="{{ asset('assets/fonts/images/img_avatar3.png') }}" style="width: 200px" class="card-img" alt="">
                    </div>
                    <span id="notstego"></span>
                    <span id="invalidekey"></span>
                    <div class="col-6">
                        <h6>Image Information</h6>
                        <p>Width: <b id="stegoImgWidth"></b></p>
                        <p>Height: <b id="stegoImgHeight"></b></p>
                        {{-- <p>Payload: <b>200</b></p> --}}
                    </div>
                    <div class="col-12" style="width: min-content">
                        <span id="ciphertextfromstego"></span>
                    </div>
                    <div class="col-6">
                        <h6 id="plaintextfromstego"></h6>
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
                dataType : 'json',
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data['plain']);

                    $("#notstego").css('display','none')
                    // $("#invalidekey").css('display','none')
                    $("#stegoimageinfo").removeAttr('style')
                    $("#ciphertextfromstego").text(data.cipher?data.cipher:"");
                    $("#plaintextfromstego").text(data.plain?data.plain:"");
                    $("#invalidekey").html(data.invalidkey?"<h4 class='text-danger'>Invalid Signature Key detected</h4>":"")

                },
                error:function(err){
                    if(err.status ==500){
                        // $("#invalidekey").css('display','none')

                        $("#notstego").html("<h4 class='text-danger'>Not Signed Image, Please Request for Signed domcument From Sender</h4>");
                    }
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


