@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
		  <button class="btn btn-primary btn-save" data-target="#add-session" data-toggle="modal"><i class="fas fa-plus"></i> Add Stream</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Manage Stream</li>
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
                      <th>Stream</th>
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
                      <td>{{ $data->stream }}</td>
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
                            <a title="Edit Stream" onclick="updateStream('{{ $data->id }}', '{{ $data->stream }}')" style="cursor: pointer;">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                          </li>
                          <li><a title="Change Status" onclick="changeStatus('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-exchange-alt"></i></a></li>
                          <li>
                            <a title="Delete Stream" onclick="deleteStream('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-trash"></i>
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
        <h4 class="modal-title">Add Stream</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/create/stream') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control">Stream</label>
              <input type="text" name="stream" class="text-control" placeholder="Enter Stream" required="">
              @if($errors->has('stream'))
                  <span style="color: red;">{{ $errors->first('stream') }}</span>
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
              <button class="btn btn-primary btn-save" type="submit">Add Stream</button>
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
        <h4 class="modal-title">Update Stream</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/update/stream') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control"></label>
              <input type="hidden" name="id" id="id" class="text-control" >
              <input type="text" name="edit_stream" id="edit_stream" class="text-control" placeholder="Enter Stream" required="">
              @if($errors->has('edit_stream'))
                  <span style="color: red;">{{ $errors->first('edit_stream') }}</span>
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
              <button class="btn btn-primary btn-save" type="submit">Update Stream</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function updateStream(id, stream) {
        document.getElementById('id').value = id;
        document.getElementById('edit_stream').value = stream;
        $('#edit-session').modal('show');
    }

    function changeStatus(id) {
      swal({
          title: "Are you sure?",
          text: "Change Status for this stream",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/change-status/stream') }}",
                  data  : {
                      "_token": "{{ csrf_token() }}",
                      'id'    : id
                  },
                  success: function(data){
                      document.getElementById('loader').style.display ="none";
                      if(data == 'Yes') {
                          swal("", 'Stream Activated Successfully.', "success");
                      } else {
                          swal("", 'Stream Deactivated Successfully.', "warning");
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

    function deleteStream(id) {
      swal({
          title: "Are you sure?",
          text: "Delete this stream",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/delete/stream') }}",
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