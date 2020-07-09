@extends('header.header')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="content-header">
                    <h3 class="content-header-title">My Account</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item">My Account</li>
                        <li class="breadcrumb-item active">Update Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-main-body">
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success" id="hideAlert">
                {{ session()->get('success') }}
            </div>
        @endif
        <br>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <form class="form-body" method="post" action="{{ url('admin/profile/update') }}" enctype="multipart/form-data">
                                @csrf
                                <h4 class="form-section-h">Update Profile</h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                @if(\Auth::user()->profile_pic)
                                                    <img src="{{ \Auth::user()->profile_pic }}" id="image" class="img-fluid img-stud-pro">
                                                @else
                                                    <img src="{{ asset('') }}/images/usr.png" id="image" class="img-fluid img-stud-pro">
                                                @endif
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="file" name="file" class="text-control" onchange="readURL(this);">
                                                @if($errors->has('file'))
                                                    <span style="color: red;">{{ $errors->first('file') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="label label-control">Company Name</label>
                                                <input type="text" class="text-control" name="company_name" placeholder="Enter Company Name" value="{{ \Auth::user()->company_name }}">
                                                @if($errors->has('company_name'))
                                                    <span style="color: red;">{{ $errors->first('company_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label label-control">Name</label>
                                                <input type="text" class="text-control" name="name" placeholder="Enter Name" value="{{ \Auth::user()->name }}">
                                                @if($errors->has('name'))
                                                    <span style="color: red;">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="label label-control">Email</label>
                                                <input type="text" class="text-control" name="email" placeholder="Enter Email" value="{{ \Auth::user()->email }}">
                                                @if($errors->has('email'))
                                                    <span style="color: red;">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label label-control">Mobile No.</label>
                                                <input type="text" class="text-control" name="mobile_number" placeholder="Enter Mobile No." value="{{ \Auth::user()->mobile_number }}">
                                                @if($errors->has('mobile_number'))
                                                    <span style="color: red;">{{ $errors->first('mobile_number') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-dark">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                           @if(session()->has('error'))
                                <div class="alert alert-danger" id="hideAlert">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <form class="form-body" method="post" action="{{ url('admin/update/password') }}">							@csrf
                                <h4 class="form-section-h">Login Security</h4>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="label-control">Login ID <span class="required">*</span></label>
                                        <input type="text" class="text-control" name="login_id" placeholder="Enter Login ID">
                                        @if($errors->has('login_id'))
                                            <span style="color: red;">{{ $errors->first('login_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="label-control">New Password <span class="required">*</span></label>
                                        <input type="password" name="password" class="text-control" placeholder="Enter New Password">
                                        @if($errors->has('password'))
                                            <span style="color: red;">{{ $errors->first('password') }}</span>
                                        @endif
                                        <span>Leave Blank if you don't want to change.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="label-control">Re-enter Password <span class="required">*</span></label>
                                        <input type="password" name="confirm_password" class="text-control" placeholder="Re-enter Password">
                                        @if($errors->has('confirm_password'))
                                            <span style="color: red;">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn-w100 btn btn-dark">Update Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content-wrapper -->
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection