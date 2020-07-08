@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
      <button class="btn btn-primary btn-save" data-target="#add-coupon" data-toggle="modal"><i class="fas fa-plus"></i> Add Discount Coupons</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Manage Discount Coupons</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
@if(session()->has('success'))
    <div class="alert alert-success" id="hideAlert">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger" id="hideAlert">
        {{ session()->get('error') }}
    </div>
@endif
<br>
<section class="content-main-body">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="card-block">
              <div class="table-responsive">
                <table class="table table-bordered table-fitems" id="for_all">
                  <thead>
                    <tr>
                      <th>Created At Date &amp; Time</th>
                      <th>Updated At Date &amp; Time</th>
                      <th>Coupon Code</th>
                      <th>Student Mob No.</th>
                      <th>Student Email</th>
                      <th>Course</th>
                      <th>Discount (%)</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($coupons as $coupon)
                    <tr>
                      <td>
                        @php
                          $dt = new DateTime($coupon->created_at);
                          $tz = new DateTimeZone('Asia/Kolkata');
                          $dt->setTimezone($tz);
                          $dateTime = $dt->format('d.m.Y h:i A');
                        @endphp
                        {{ $dateTime }}
                      </td>
                      <td>
                        @php
                          $dt = new DateTime($coupon->updated_at);
                          $tz = new DateTimeZone('Asia/Kolkata');
                          $dt->setTimezone($tz);
                          $dateTime = $dt->format('d.m.Y h:i A');
                        @endphp
                        {{ $dateTime }}
                      </td>
                      <td>{{ $coupon->coupon_code }}</td>
                      <td>{{ $coupon->student_mobile_no }}</td>
                      <td>{{ $coupon->email }}</td>
                      <td>{{ $coupon->getCouponRelatedCourse['course_name'] }}</td>
                      <td>{{ $coupon->discount }}%</td>
                      <td>
                        @if($coupon->status == 'Yes')
                          Used
                        @else
                          Unused
                        @endif
                        
                      </td>
                      <td>
                        <ul class="action">
                          <li><a onclick="deleteCoupon('{{ $coupon->id }}')" style="cursor: pointer;"><i class="fas fa-trash"></i></a></li>
                        </ul>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal" id="add-coupon">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Coupon</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/create/coupons') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-6">
              <label class="label-control">Course</label>
              <select class="text-control" name="course" id="course">
                <option value="">Select Course</option>
                @foreach($datas as $data)
                  <option value="{{ $data->id }}">{{ $data->course_name }}</option>
                @endforeach
              </select>
              @if($errors->has('course'))
                  <span style="color: red;">{{ $errors->first('course') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-coupon').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
            <div class="col-sm-6">
                    <label class="label-control">Coupon Code</label>
                    <input type="text" name="coupon_code" id="coupon_code" class="text-control" placeholder="Enter Coupon Code">
                    @if($errors->has('coupon_code'))
                        <span style="color: red;">{{ $errors->first('coupon_code') }}</span>
                        <script type="text/javascript">
                            setTimeout(function() {
                              $('#add-coupon').modal('show');
                            }, 1000);
                        </script>
                    @endif
                  </div>
                </div>
            
            <div class="form-group row">
                  <div class="col-sm-6">
                    <label class="label-control">Student Mobile No.</label>
              <input type="number" name="std_mobile_no" id="std_mobile_no" class="text-control" placeholder="Enter Student Mobile No.">
              @if($errors->has('std_mobile_no'))
                  <span style="color: red;">{{ $errors->first('std_mobile_no') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-coupon').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
            <div class="col-sm-6">
                <label class="label-control">Student Email</label>
                <input type="text" name="email" id="email" class="text-control" placeholder="Enter Student Email">
                @if($errors->has('email'))
                  <span style="color: red;">{{ $errors->first('email') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-coupon').modal('show');
                      }, 1000);
                  </script>
                @endif
              </div>
            </div>
            
            <div class="form-group row">
            <div class="col-sm-6">
                <label class="label-control">Discount (%)</label>
                  <input type="number" name="discount" id="discount" class="text-control" placeholder="Enter in %">
                  @if($errors->has('discount'))
                    <span style="color: red;">{{ $errors->first('discount') }}</span>
                    <script type="text/javascript">
                        setTimeout(function() {
                          $('#add-coupon').modal('show');
                        }, 1000);
                    </script>
                  @endif
            </div>
            <div class="col-sm-6">
                    <label class="label-control">Send SMS</label>
              <div class="d-block">
                <label><input type="checkbox" name="send_sms" id="send_sms" value="Yes"> Yes </label>
              </div>
            </div>
          </div>
  
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Add Coupon</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function deleteCoupon(id) {
      swal({
          title: "Are you sure?",
          text: "Delete this coupon",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/delete/coupons') }}",
                  data  : {
                      "_token": "{{ csrf_token() }}",
                      'id'    : id
                  },
                  success: function(data){
                      document.getElementById('loader').style.display ="none";
                      swal("", data, "success");
                      setTimeout( function () {
                        location.reload();
                      }, 2000);

                  }
              });
          }else {
              document.getElementById('loader').style.display ="none";
          }
      });
    }
</script>
@endsection