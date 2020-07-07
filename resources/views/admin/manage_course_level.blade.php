@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
		  <button class="btn btn-primary btn-save" data-target="#add-course-level" data-toggle="modal"><i class="fas fa-plus"></i> Add Course Level</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Manage Course Level</li>
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
                      <th>Updated At Date &amp; Time</th>
                      <th>Created At Date &amp; Time</th>
                      <th>Course Level</th>
                      <th>Level Remark</th>
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
                      <td>{{ $data->course_level }}</td>
                      <td>
                        @if($data->level_remark)
                          {{ $data->level_remark }}
                        @else
                          N/A
                        @endif
                      </td>
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
                            <a title="Edit Session" onclick="updateCourseLevel('{{ $data->id }}', '{{ $data }}')" style="cursor: pointer;">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                          </li>
                          <li><a title="Change Status" onclick="changeStatus('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-exchange-alt"></i></a></li>
                          <li>
                            <a title="Delete Session" onclick="deleteCourseLevel('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-trash"></i>
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

<div class="modal" id="add-course-level">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Course Level</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/create/course-level') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control">Course Level</label>
              <input type="text" name="course_level" id="course_level" class="text-control" placeholder="Enter Course Level">
              @if($errors->has('course_level'))
                  <span style="color: red;">{{ $errors->first('course_level') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course-level').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
		  </div>
		  <div class="form-group row">  
			<div class="col-sm-12">
              <label class="label-control">Level Remark</label>
              <input type="text" name="level_remark" id="level_remark" class="text-control" placeholder="Enter Level Remark">
              @if($errors->has('level_remark'))
                  <span style="color: red;">{{ $errors->first('level_remark') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course-level').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Add Course Level</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="edit-course-level">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Course Level</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/update/course-level') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="hidden" name="course_level_id" id="course_level_id">
              <label class="label-control">Course Level</label>
              <input type="text" name="up_course_level" id="up_course_level" class="text-control" placeholder="Enter Course Level" required="">
              @if($errors->has('up_course_level'))
                  <span style="color: red;">{{ $errors->first('up_course_level') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course-level').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
		  </div>
		  <div class="form-group row">  
			<div class="col-sm-12">
              <label class="label-control">Level Remark</label>
              <input type="text" name="up_level_remark" id="up_level_remark" class="text-control" placeholder="Enter Level Remark">
              @if($errors->has('up_level_remark'))
                  <span style="color: red;">{{ $errors->first('up_level_remark') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course-level').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Update Course Level</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function updateCourseLevel(id, datas) {
      document.getElementById('course_level_id').value = id;
      $('#edit-course-level').modal('show');
  }

  function changeStatus(id) {
      swal({
          title: "Are you sure?",
          text: "Change status of this course Level",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/change-status/course-level') }}",
                  data  : {
                      "_token": "{{ csrf_token() }}",
                      'id'    : id
                  },
                  success: function(data){
                      document.getElementById('loader').style.display ="none";
                      if(data == 'Yes') {
                          swal("", 'Course Level Activated Successfully.', "success");
                      } else {
                          swal("", 'Course Level Deactivated Successfully.', "warning");
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

    function deleteCourseLevel(id) {
      swal({
          title: "Are you sure?",
          text: "Delete this course level",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/change-status/course-level') }}",
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