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
                <a href="{{ route('student-info.index') }}">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total student</h4>
                    </div>
                    <div class="card-body">
                        {{ count($students) }}
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
                <a href="{{ route('todaysClass') }}">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today's classes</h4>
                    </div>
                    <div class="card-body">
                        {{ count($attendances) }}
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
            <a href="{{ route('todayAttendance') }}">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today's attendee</h4>
                    </div>

                    <div class="card-body">
                       {{count($todayatendee)}}
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
                <a href="{{ route('attendance.index') }}">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total attendance</h4>
                    </div>
                    <div class="card-body">
                        {{ count($tattendances) }}
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
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="{{ asset('assets/images/img_avatar3.png') }}" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Total class create</div>
                                <div class="profile-widget-item-value">{{ count($totalatendee) }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Total students attended</div>
                                <div class="profile-widget-item-value">{{ count($totalatendee) }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Incoming class</div>
                                <div class="profile-widget-item-value">{{ count($incomingattendances) }}</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                        <div class="card-header">
                            <h4>Profile Details</h4>
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



                        </div>
                        <div class="card-footer text-right">
                            <a href="#" class="btn btn-primary">Changes</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection


