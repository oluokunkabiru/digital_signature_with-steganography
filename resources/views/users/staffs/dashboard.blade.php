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
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total students</h4>
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
                        <h4>Today's classes</h4>
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
                        <h4>Today's attendance</h4>
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
                        <h4>Total attendance</h4>
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
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Total class create</div>
                                <div class="profile-widget-item-value">187</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Total students attended</div>
                                <div class="profile-widget-item-value">6,8K</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Incoming class</div>
                                <div class="profile-widget-item-value">2,1K</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">Michelle Green <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                        Michelle Green is a superhero name in <b>USA</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                    </div>
                    <div class="card-footer text-center">
                        <div class="font-weight-bold mb-2">Follow Michelle On</div>
                        <a href="#" class="btn btn-social-icon btn-facebook mr-1"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-social-icon btn-twitter mr-1"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-social-icon btn-github mr-1"><i class="fab fa-github"></i></a>
                        <a href="#" class="btn btn-social-icon btn-instagram"><i class="fab fa-instagram"></i></a>
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
                                   <h5>my name</h5>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label class="fa fa-phone"></label>
                                   <h5>4828094</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label class="fa fa-envelope"></label>
                                   <h5>oka@vb.com</h5>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label class="fa fa-calendar"></label>
                                   <h5>10/10/1992</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map"></label>
                                   <h5>Country</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-pin"></label>
                                   <h5>State</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-marker"></label>
                                   <h5>City</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label class="fa fa-user-circle"></label>
                                    <p class="">Michelle Green is a superhero name in <b>USA</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</p>
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


