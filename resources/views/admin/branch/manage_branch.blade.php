@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
		  <button class="btn btn-primary btn-save" onclick="window.location.href='{{ url('admin/add/branch') }}'"><i class="fas fa-plus"></i> Add College</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item">Colleges</li>
            <li class="breadcrumb-item active">Manage Colleges</li>
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
                      <th>Name</th>
                      <th>Code</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>State</th>
                      <th>City</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($colleges as $college)
                    <tr>
                      <td>
                        @php
                          $dt = new DateTime($college->created_at);
                          $tz = new DateTimeZone('Asia/Kolkata');
                          $dt->setTimezone($tz);
                          $dateTime = $dt->format('d.m.Y h:i A');
                        @endphp
                        {{ $dateTime }}
                      </td>
                      <td>
                        @php
                          $dt = new DateTime($college->updated_at);
                          $tz = new DateTimeZone('Asia/Kolkata');
                          $dt->setTimezone($tz);
                          $dateTime = $dt->format('d.m.Y h:i A');
                        @endphp
                        {{ $dateTime }}
                      </td>
                      <td>{{ $college->name }}</td>
                      <td>{{ $college->branch_code }}</td>
                      <td>{{ $college->email }}</td>
                      <td>{{ $college->mobile_number }}</td>
                      <td>{{ $college->getState['name'] }}</td>
                      <td>{{ $college->getCity['name'] }}</td>
                      <td>
                        @if($college->status == 'Yes')
                          active
                        @else
                          inactive
                        @endif
                      </td>
                      <td>
					              <ul class="action">
                        	<li><a href="{{ url('admin/edit/branch/') }}/{{ $college->id }}" title="Edit College"><i class="fas fa-pencil-alt"></i></a></li>
                        	<li><a title="Change Status" onclick="changeStatus('{{ $college->id }}')" style="cursor: pointer;"><i class="fas fa-exchange-alt"></i></a></li>
                        	<li><a title="Change Password" onclick="updatePassword('{{ $college->id }}')"><i class="fas fa-lock"></i></a></li>
                        	<li><a title="Delete College" onclick="deleteBranch('{{ $college->id }}')" style="cursor: pointer;"><i class="fas fa-trash"></i></a></li>
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

<div class="modal" id="change-password">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/update/password/branch') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-6">
              <input type="hidden" name="user_id" id="user_id">
              <label class="label-control">New Password</label>
              <input type="text" name="password" class="text-control" placeholder="Enter New Password">
              @if($errors->has('password'))
                  <span style="color: red;">{{ $errors->first('password') }}</span>
                  <script type="text/javascript">
                    setTimeout(function() {
                      $('#change-password').modal();
                    }, 1000);
                  </script>
              @endif
            </div>
			 <div class="col-sm-6">
              <label class="label-control">Re-Enter Password</label>
              <input type="text" name="confirm_password" class="text-control" placeholder="Re-Enter Password">
              @if($errors->has('confirm_password'))
                  <span style="color: red;">{{ $errors->first('confirm_password') }}</span>
                  <script type="text/javascript">
                    setTimeout(function() {
                      $('#change-password').modal();
                    }, 1000);
                  </script>
              @endif
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Change Password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function changeStatus(id) {
      swal({
          title: "Are you sure?",
          text: "Change Status Of This College",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/change-status/branch') }}",
                  data  : {
                      "_token": "{{ csrf_token() }}",
                      'id'    : id
                  },
                  success: function(data){
                      document.getElementById('loader').style.display ="none";
                      if(data == 'Yes') {
                          swal("", 'College Activated Successfully.', "success");
                      } else {
                          swal("", 'College Deactivated Successfully.', "warning");
                      }
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

     function deleteBranch(id) {
      swal({
          title: "Are you sure?",
          text: "Delete this college",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/delete/branch') }}",
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

    function updatePassword(id) {
      document.getElementById('user_id').value = id;
      $('#change-password').modal('show');
    }
</script>
@endsection
