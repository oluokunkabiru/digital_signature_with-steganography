@extends('users.students.layout.app')
@section('title', 'Scanning QR code')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{ ucwords(Auth::user()->name) }}</h2>
        {{--  <p class="section-lead">Change information about yourself on this page.</p>  --}}

        <div class="row mt-sm-4">
            {{--  <div class="col-12 col-md-12 col-lg-5">  --}}
            <div class="col-7 col-md-7 col-lg-7">
                <div class="card">
                        <div class="card-header">
                            <h4> <span class="fa fa-user p-1 mx-2" style="font-size: 60px"></span> Profile Details</h4>
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
@endsection
