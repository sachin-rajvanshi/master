@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
		  <button class="btn btn-primary btn-save" data-target="#add-university" data-toggle="modal"><i class="fas fa-plus"></i> Add University</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Manage University</li>
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
                      <th>University</th>
                      <th>Courses</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($universities as $university)
                    <tr>
                      <td>
                        @php
                          $dt = new DateTime($university->created_at);
                          $tz = new DateTimeZone('Asia/Kolkata');
                          $dt->setTimezone($tz);
                          $dateTime = $dt->format('d.m.Y h:i A');
                        @endphp
                        {{ $dateTime }}
                      </td>
                      <td>
                        @php
                          $dt = new DateTime($university->created_at);
                          $tz = new DateTimeZone('Asia/Kolkata');
                          $dt->setTimezone($tz);
                          $dateTime = $dt->format('d.m.Y h:i A');
                        @endphp
                        {{ $dateTime }}
                      </td>
                      <td>
                        {{ $university->name }}
                      </td>
                      <td>
                        @foreach($university->getRelatedCourse as $course)
                          {{ $course->getCourse['course_name'] }},
                        @endforeach
                      </td>
                      <td>
                        @if($university->status == 'Yes')
                          active
                        @else
                          inactive
                        @endif
                      </td>
                      <td>
						              <ul class="action">
                          	<li><a  title="Edit University" onclick="updateUniversity('{{ $university->id }}','{{ $university }}')" style="cursor: pointer;"><i class="fas fa-pencil-alt"></i></a></li>
                          	<li><a  title="Change Status" onclick="changeStatus('{{ $university->id }}')"><i class="fas fa-exchange-alt"></i></a></li>
                          	<li><a onclick="deleteUniversity('{{ $university->id }}')" style="cursor: pointer;"><i class="fas fa-trash"></i></a></li>
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

<div class="modal" id="add-university">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add University</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/create/university') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control">University Name</label>
              <input type="text" class="text-control" name="university_name" id="university_name" placeholder="Enter University Name" value="{{ old('university_name') }}">
              @if($errors->has('university_name'))
                  <span style="color: red;">{{ $errors->first('university_name') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-university').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control">Courses</label>
              <div class="d-block">
				<ul class="ul-inline-block">
          @foreach($datas as $data)
				    <li><label><input type="checkbox" name="course[]" value="{{ $data->id }}">  {{ $data->course_name }}</label></li> 
          @endforeach  
				</ul>
        @if($errors->has('course'))
            <span style="color: red;">{{ $errors->first('course') }}</span>
            <script type="text/javascript">
                setTimeout(function() {
                  $('#add-university').modal('show');
                }, 1000);
            </script>
        @endif
			  </div>
            </div> 
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Add University</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal hide" id="edit-university"  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update University</h4>
        <button type="button" class="close" onclick="closeModel()">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/update/university') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="hidden" name="id" id="id">
              <label class="label-control">University Name</label>
              <input type="text" name="up_university_name" id="up_university_name" class="text-control" placeholder="Enter University Name">
              @if($errors->has('up_university_name'))
                  <span style="color: red;">{{ $errors->first('up_university_name') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-university').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control">Courses</label>
              <div class="d-block">
				<ul class="ul-inline-block">
				  @foreach($datas as $data)
            <li><label><input type="checkbox" id="up_course{{ $data->id }}" name="up_course[]" value="{{ $data->id }}">  {{ $data->course_name }}</label></li> 
          @endforeach   
				</ul>
        @if($errors->has('up_course'))
            <span style="color: red;">{{ $errors->first('up_course') }}</span>
            <script type="text/javascript">
                setTimeout(function() {
                  $('#edit-university').modal('show');
                }, 1000);
            </script>
        @endif
			  </div>
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Update University</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  function updateUniversity(id, datas) {
      var obj = JSON.parse(datas);
      document.getElementById('id').value = obj.id;
      document.getElementById('up_university_name').value = obj.name;
      for (var i = 0; i < obj.get_related_course.length; i++) {
        var data = obj.get_related_course[i];
        document.getElementById("up_course"+data.course_id).checked = true;
      }
      $('#edit-university').modal('show');
  }

  function closeModel() {
    location.reload();
  }

   function changeStatus(id) {
      swal({
          title: "Are you sure?",
          text: "Change Status of university.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/change-status/university') }}",
                  data  : {
                      "_token": "{{ csrf_token() }}",
                      'id'    : id
                  },
                  success: function(data){
                      document.getElementById('loader').style.display ="none";
                      if(data == 'Yes') {
                          swal("", 'University Activated Successfully.', "success");
                      } else {
                          swal("", 'University Deactivated Successfully.', "warning");
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

    function deleteUniversity(id) {
      swal({
          title: "Are you sure?",
          text: "Delete this university.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          document.getElementById('loader').style.display ="block";
          if (willDelete) {
              $.ajax({
                  method:'post',
                  url   : "{{ url('admin/delete/university') }}",
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