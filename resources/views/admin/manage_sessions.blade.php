@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
		  <button class="btn btn-primary btn-save" data-target="#add-session" data-toggle="modal"><i class="fas fa-plus"></i> Add Session</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Manage Sessions</li>
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
                      <th>Session</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($datas as $data)
                    <tr>
                      <td>
                        @php
                          $dt = new DateTime($data->created_at);
                          $tz = new DateTimeZone('Asia/Kolkata');
                          $dt->setTimezone($tz);
                          $dateTime = $dt->format('d.m.Y h:i A');
                        @endphp
                        {{ $dateTime }}
                      </td>
                      <td>
                        @php
                          $dt = new DateTime($data->updated_at);
                          $tz = new DateTimeZone('Asia/Kolkata');
                          $dt->setTimezone($tz);
                          $dateTime = $dt->format('d.m.Y h:i A');
                        @endphp
                        {{ $dateTime }}
                      </td>
                      <td>{{ $data->session }}</td>
                      <td>
                        @if($data->status == 'Yes')
                          active
                        @else
                          inactive
                        @endif
                      </td>
                      <td>
          						  <ul class="action">
                        	<li>
                            <a title="Edit Session" onclick="updateSession('{{ $data->id }}', '{{ $data->session }}')" style="cursor: pointer;">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                          </li>
                        	<li><a title="Change Status" onclick="changeStatus('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-exchange-alt"></i></a></li>
                        	<li>
                            <a title="Delete Session" onclick="deleteSession('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-trash"></i>
                            </a>
                          </li>
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

<div class="modal" id="add-session">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Session</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/create/session') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control">Session</label>
              <input type="text" name="session" class="text-control" placeholder="Enter Session" required="">
              @if($errors->has('session'))
                  <span style="color: red;">{{ $errors->first('session') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-session').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Add Session</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="edit-session">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Session</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/update/session') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control">Session</label>
              <input type="hidden" name="session_id" id="session_id" class="text-control" placeholder="Enter Session">
              <input type="text" name="edit_session" id="edit_session" class="text-control" placeholder="Enter Session" required="">
              @if($errors->has('edit_session'))
                  <span style="color: red;">{{ $errors->first('edit_session') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-session').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Update Session</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function updateSession(id, session) {
        document.getElementById('session_id').value = id;
        document.getElementById('edit_session').value = session;
        $('#edit-session').modal('show');
    }

    function changeStatus(id) {
      swal({
          title: "Are you sure?",
          text: "Change Status for this session",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/change-session/status') }}",
                  data  : {
                      "_token": "{{ csrf_token() }}",
                      'id'    : id
                  },
                  success: function(data){
                      document.getElementById('loader').style.display ="none";
                      if(data == 'Yes') {
                          swal("", 'Session Activated Successfully.', "success");
                      } else {
                          swal("", 'Session Deactivated Successfully.', "warning");
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

    function deleteSession(id) {
      swal({
          title: "Are you sure?",
          text: "Delete this session",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/delete/session') }}",
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