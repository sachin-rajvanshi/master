@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
		  <button class="btn btn-primary btn-save" data-target="#add-course-type" data-toggle="modal"><i class="fas fa-plus"></i> Add Course Type</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Manage Course Type</li>
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
                      <th>Course Type</th>
                      <th>Type Remark</th>
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
                      <td>{{ $data->course_type }}</td>
                      <td>
                        @if($data->type_remark)
                          {{ $data->type_remark }}
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
                            <a title="Edit Session" onclick="updateCourseType('{{ $data->id }}', '{{ $data }}')" style="cursor: pointer;">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                          </li>
                          <li><a title="Change Status" onclick="changeStatus('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-exchange-alt"></i></a></li>
                          <li>
                            <a title="Delete Session" onclick="deleteCourseType('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-trash"></i>
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

<div class="modal" id="add-course-type">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Course Type</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/create/course-type') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control">Course Type</label>
              <input type="text" name="course_type" id="course_type" class="text-control" placeholder="Enter Course Type" required="">
              @if($errors->has('course_type'))
                  <span style="color: red;">{{ $errors->first('course_type') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course-type').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">  
			<div class="col-sm-12">
              <label class="label-control">Type Remark</label>
              <input type="text" name="type_remark" id="type_remark" class="text-control" placeholder="Enter Type Remark">
              @if($errors->has('type_remark'))
                  <span style="color: red;">{{ $errors->first('type_remark') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course-type').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Add Course Type</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="edit-course-type">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Course Type</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/update/course-type') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="hidden" name="course_type_id" id="course_type_id">
              <label class="label-control">Course Type</label>
              <input type="text" name="course_type_new" id="course_type_new" class="text-control" placeholder="Enter Course Type" required="">
              @if($errors->has('course_type_new'))
                  <span style="color: red;">{{ $errors->first('course_type_new') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course-type').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">  
			<div class="col-sm-12">
              <label class="label-control">Type Remark</label>
              <input type="text" name="type_remark_new" id="type_remark_new" class="text-control" placeholder="Enter Type Remark">
              @if($errors->has('type_remark_new'))
                  <span style="color: red;">{{ $errors->first('type_remark_new') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course-type').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Update Course Type</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function updateCourseType(id, datas) {
      document.getElementById('course_type_id').value = id;
      $('#edit-course-type').modal('show');
  }


    function changeStatus(id) {
      swal({
          title: "Are you sure?",
          text: "Change Status Of This course Type",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/change-status/course-type') }}",
                  data  : {
                      "_token": "{{ csrf_token() }}",
                      'id'    : id
                  },
                  success: function(data){
                      document.getElementById('loader').style.display ="none";
                      if(data == 'Yes') {
                          swal("", 'Course Type Activated Successfully.', "success");
                      } else {
                          swal("", 'Course Type Deactivated Successfully.', "warning");
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

    function deleteCourseType(id) {
      swal({
          title: "Are you sure?",
          text: "Delete this course type",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/delete/course-type') }}",
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