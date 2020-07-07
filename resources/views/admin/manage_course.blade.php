@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
		  <button class="btn btn-primary btn-save" data-target="#add-course" data-toggle="modal"><i class="fas fa-plus"></i> Add Course</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active">Manage Courses</li>
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
                      <th>Course Name</th>
                      <th>Course Code</th>
                      <th>Wise</th>
                      <th>Duration</th>
                      <th>Type</th>
                      <th>Level</th>
                      <th>Admission Fee</th>
					  <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data['courses'] as $course)
                      <tr>
                        <td>
                          @php
                            $dt = new DateTime($course->created_at);
                            $tz = new DateTimeZone('Asia/Kolkata');
                            $dt->setTimezone($tz);
                            $dateTime = $dt->format('d.m.Y h:i A');
                          @endphp
                          {{ $dateTime }}
                        </td>
                        <td>
                          @php
                            $dt = new DateTime($course->updated_at);
                            $tz = new DateTimeZone('Asia/Kolkata');
                            $dt->setTimezone($tz);
                            $dateTime = $dt->format('d.m.Y h:i A');
                          @endphp
                          {{ $dateTime }}
                        </td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->getCourseWise['name'] }}</td>
                        <td>{{ $course->getCourseDuration['name'] }}</td>
                        <td>{{ $course->getCourseType['course_type'] }}</td>
                        <td>{{ $course->getCourseLevel['course_level'] }}</td>
                        <td><i class="fas fa-rupee-sign"></i> {{ $course->admission_fees }}  <a onclick="viewMoredata('{{ $course }}')" style="cursor: pointer;">View</a></td>
                        <td>active</td>
                        <td>
                        <ul class="action">
                          <li><a  title="Edit Course" onclick="editCourse('{{ $course }}')" style="cursor: pointer;"><i class="fas fa-pencil-alt"></i></a></li>
                          <li><a href="#" title="Change Status"><i class="fas fa-exchange-alt"></i></a></li>
                          <li><a href="#"><i class="fas fa-trash"></i></a></li>
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

<div class="modal" id="admission-fee-chart">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Admission Fee Chart</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
		 <table class="table table-bordered table-fitems">
		 	<tr>
				<th>Admission Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="admission_amount">1200</span></td> 
				<th>Course Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="course_amount">6</span></td> 
			</tr> 
			<tr>
				<th>Exam Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="exam_amount">1200</span></td> 
				<th>ITP Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="itp_amount">6</span></td> 
			</tr> 
			<tr>
				<th>Late Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="late_amount">1200</span></td> 
				<th>Total Deposit Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="deposite_amount">6</span></td> 
			</tr> 
			<tr>
				<th>Hotel Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="hostel_amount">1200</span></td> 
				<th>Other Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="other_amount">1200</span></td> 
			</tr> 
			 
			 <tr>
			 	<th>Other Fee Remark</th>
				<td colspan="3"><span id="remark">Hello</span></td>
			 </tr>
		 </table>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="add-course">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Course</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/create/course') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <label class="label-control">Course Name</label>
              <input type="text" name="course_name" id="course_name" class="text-control" value="{{ old('course_name') }}" placeholder="Enter Course Name">
              @if($errors->has('course_name'))
                  <span style="color: red;">{{ $errors->first('course_name') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">
            <div class="col-sm-6">
              <label class="label-control">Course Code</label>
              <input type="text" name="course_code" id="course_code" class="text-control" placeholder="Enter Course Code" value="{{ old('course_code') }}">
              @if($errors->has('course_code'))
                  <span style="color: red;">{{ $errors->first('course_code') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			  
			<div class="col-sm-6">
              <label class="label-control">Course Wise</label>
              <select class="text-control" name="course_wise" id="course_wise">
      			  	<option value="">Select Wise</option>
                @foreach($data['course_wises'] as $wise)
                  @if(old('course_wise') == $wise->id)
                    <option value="{{ $wise->id }}" selected="">{{ $wise->name }}</option>
                  @else
                    <option value="{{ $wise->id }}">{{ $wise->name }}</option>
                  @endif
                @endforeach
      			  </select>
              @if($errors->has('course_wise'))
                  <span style="color: red;">{{ $errors->first('course_wise') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
      </div>
     </div>
			
		  <div class="form-group row">
        <div class="col-sm-6">
          <label class="label-control">Course Duration</label>
          <select class="text-control" name="course_duration" id="course_duration">
      	  	<option value="">Select Duration</option>
      	  	@foreach($data['course_durations'] as $duration)
              @if(old('course_duration') == $duration->id)
                <option value="{{ $duration->id }}" selected="">{{ $duration->name }}</option>
              @else
                <option value="{{ $duration->id }}">{{ $duration->name }}</option>
              @endif
            @endforeach
      	  </select>
          @if($errors->has('course_duration'))
              <span style="color: red;">{{ $errors->first('course_duration') }}</span>
              <script type="text/javascript">
                  setTimeout(function() {
                    $('#add-course').modal('show');
                  }, 1000);
              </script>
          @endif
        </div>
			  
			<div class="col-sm-6">
          <label class="label-control">Course Type</label>
          <select class="text-control" name="course_type" id="course_type">
  			  	<option value="">Select Type</option>
  			  	@foreach($data['course_types'] as $type)
              @if(old('course_type') == $type->id)
                <option value="{{ $type->id }}" selected="">{{ $type->course_type }}</option>
              @else
                <option value="{{ $type->id }}">{{ $type->course_type }}</option>
              @endif
            @endforeach
  			  </select>
          @if($errors->has('course_type'))
              <span style="color: red;">{{ $errors->first('course_type') }}</span>
              <script type="text/javascript">
                  setTimeout(function() {
                    $('#add-course').modal('show');
                  }, 1000);
              </script>
          @endif
          </div>
      </div>
			
		  <div class="form-group row">
            <div class="col-sm-6">
              <label class="label-control">Course Level</label>
              <select class="text-control" name="course_level" id="course_level">
      			  	<option value="">Select Level</option>
      			  	@foreach($data['course_levels']  as $level)
                  @if(old('course_level') == $level->id)
                    <option value="{{ $level->id }}" selected="">{{ $level->course_level }}</option>
                  @else
                    <option value="{{ $level->id }}">{{ $level->course_level }}</option>
                  @endif
                @endforeach
      			  </select>
              @if($errors->has('course_level'))
                  <span style="color: red;">{{ $errors->first('course_level') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			  
			<div class="col-sm-6">
              <label class="label-control">Admission Fee</label>
              <input type="number" name="admission_fees" id="admission_fees" class="text-control" placeholder="Enter Admission Fee" value="{{ old('admission_fees') }}">
              @if($errors->has('admission_fees'))
                  <span style="color: red;">{{ $errors->first('admission_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
	      <div class="form-group row">
			<div class="col-sm-4">
              <label class="label-control">Course Fee</label>
              <input type="number" name="course_fees" id="course_fees" class="text-control" placeholder="Enter Course Fee" value="{{ old('course_fees') }}">
              @if($errors->has('course_fees'))
                  <span style="color: red;">{{ $errors->first('course_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">Exam Fee</label>
              <input type="number" name="exam_fees" id="exam_fees" class="text-control" placeholder="Enter Exam Fee" value="{{ old('exam_fees') }}">
              @if($errors->has('exam_fees'))
                  <span style="color: red;">{{ $errors->first('exam_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">ITP Fee</label>
              <input type="number" name="itp_fees" id="itp_fees" class="text-control" placeholder="Enter ITP Fee" value="{{ old('itp_fees') }}">
              @if($errors->has('itp_fees'))
                  <span style="color: red;">{{ $errors->first('itp_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">
			<div class="col-sm-4">
              <label class="label-control">Late Fee</label>
              <input type="number" name="late_fees" id="late_fees" class="text-control" placeholder="Enter Late Fee" value="{{ old('late_fees') }}">
              @if($errors->has('late_fees'))
                  <span style="color: red;">{{ $errors->first('late_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">Total Deposit Fee</label>
              <input type="number" class="text-control" name="deposit_fees" id="deposit_fees" placeholder="Enter Total Deposit Fee" value="{{ old('deposit_fees') }}">
              @if($errors->has('deposit_fees'))
                  <span style="color: red;">{{ $errors->first('deposit_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">Hostel Facility</label>
              <select class="text-control" name="hostel_facility" id="hostel_facility">
        				<option value="No">No</option>
        				<option value="AC">AC</option>
        				<option value="No AC">No AC</option>
        			</select>
              @if($errors->has('hostel_facility'))
                  <span style="color: red;">{{ $errors->first('hostel_facility') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">
			<div class="col-sm-4">
              <label class="label-control">Hostel Fee</label>
              <input type="number" name="hostel_fees" id="hostel_fees" class="text-control" placeholder="Enter Hotel Fee">
              @if($errors->has('hostel_fees'))
                  <span style="color: red;">{{ $errors->first('hostel_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">Other Fee</label>
              <input type="number" name="other_fees" id="other_fees" class="text-control" placeholder="Enter Other Fee">
              @if($errors->has('other_fees'))
                  <span style="color: red;">{{ $errors->first('other_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">Other Fee Remark</label>
              <input type="text" name="other_fees_remark" id="other_fees_remark" class="text-control" placeholder="Enter Remark">
              @if($errors->has('other_fees_remark'))
                  <span style="color: red;">{{ $errors->first('other_fees_remark') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#add-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Add Course</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="edit-course">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Course</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ url('admin/update/course') }}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="hidden" name="id" id="id">
              <label class="label-control">Course Name</label>
              <input type="text" name="up_course_name" id="up_course_name" class="text-control" placeholder="Enter Course Name">
              @if($errors->has('up_course_name'))
                  <span style="color: red;">{{ $errors->first('up_course_name') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">
            <div class="col-sm-6">
              <label class="label-control">Course Code</label>
              <input type="text" name="up_course_code" id="up_course_code" class="text-control" placeholder="Enter Course Code">
              @if($errors->has('up_course_code'))
                  <span style="color: red;">{{ $errors->first('up_course_code') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			  
			<div class="col-sm-6">
              <label class="label-control">Course Wise</label>
              <select class="text-control" name="up_course_wise_id" id="up_course_wise_id">
      			  	<option value="">Select Wise</option>
                @foreach($data['course_wises'] as $wise)
                  <option value="{{ $wise->id }}">{{ $wise->name }}</option> 
                @endforeach
      			  </select>
              @if($errors->has('up_course_wise_id'))
                  <span style="color: red;">{{ $errors->first('up_course_wise_id') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">
            <div class="col-sm-6">
              <label class="label-control">Course Duration</label>
              <select class="text-control" name="up_course_duration_id" id="up_course_duration_id">
      			  	<option value="">Select Duration</option>
                @foreach($data['course_durations'] as $duration)
                    <option value="{{ $duration->id }}">{{ $duration->name }}</option>
                @endforeach
      			  </select>
              @if($errors->has('up_course_duration_id'))
                  <span style="color: red;">{{ $errors->first('up_course_duration_id') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			  
			<div class="col-sm-6">
              <label class="label-control">Course Type</label>
              <select class="text-control" name="up_course_type_id" id="up_course_type_id">
      			  	<option>Select Type</option>
                @foreach($data['course_types'] as $type)
                  <option value="{{ $type->id }}">{{ $type->course_type }}</option>
                @endforeach
      			  </select>
              @if($errors->has('up_course_type_id'))
                  <span style="color: red;">{{ $errors->first('up_course_type_id') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">
            <div class="col-sm-6">
              <label class="label-control">Course Level</label>
              <select class="text-control" name="up_course_level_id" id="up_course_level_id">
      			  	<option>Select Level</option>
                @foreach($data['course_levels']  as $level)
                  <option value="{{ $level->id }}">{{ $level->course_level }}</option>
                @endforeach
      			  </select>
              @if($errors->has('up_course_level_id'))
                  <span style="color: red;">{{ $errors->first('up_course_level_id') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			  
			<div class="col-sm-6">
              <label class="label-control">Admission Fee</label>
              <input type="number" name="up_admission_fees" id="up_admission_fees" class="text-control" placeholder="Enter Admission Fee">
               @if($errors->has('up_admission_fees'))
                  <span style="color: red;">{{ $errors->first('up_admission_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
	      <div class="form-group row">
			<div class="col-sm-4">
              <label class="label-control">Course Fee</label>
              <input type="number" name="up_course_fees" id="up_course_fees" class="text-control" placeholder="Enter Course Fee">
              @if($errors->has('up_course_fees'))
                  <span style="color: red;">{{ $errors->first('up_course_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">Exam Fee</label>
              <input type="number" name="up_exam_fees" id="up_exam_fees" class="text-control" placeholder="Enter Exam Fee">
              @if($errors->has('up_exam_fees'))
                  <span style="color: red;">{{ $errors->first('up_exam_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">ITP Fee</label>
              <input type="number" name="up_itp_fees" id="up_itp_fees" class="text-control" placeholder="Enter ITP Fee">
              @if($errors->has('up_itp_fees'))
                  <span style="color: red;">{{ $errors->first('up_itp_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
			
		  <div class="form-group row">
			<div class="col-sm-4">
              <label class="label-control">Late Fee</label>
              <input type="number" name="up_late_fees" id="up_late_fees" class="text-control" placeholder="Enter Late Fee">
              @if($errors->has('up_late_fees'))
                  <span style="color: red;">{{ $errors->first('up_late_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">Total Deposit Fee</label>
              <input type="number" name="up_total_deposite_fees" id="up_total_deposite_fees" class="text-control" placeholder="Enter Total Deposit Fee">
              @if($errors->has('up_total_deposite_fees'))
                  <span style="color: red;">{{ $errors->first('up_total_deposite_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
          <label class="label-control">Hostel Facility</label>
          <select class="text-control" name="up_hostel_facility" id="up_hostel_facility">
    				<option value="No">No</option>
    				<option value="AC">AC</option>
    				<option value="No AC">No AC</option>
    			</select>
           @if($errors->has('up_hostel_facility'))
              <span style="color: red;">{{ $errors->first('up_hostel_facility') }}</span>
              <script type="text/javascript">
                  setTimeout(function() {
                    $('#edit-course').modal('show');
                  }, 1000);
              </script>
          @endif
        </div>
      </div>
			
		   <div class="form-group row">
			<div class="col-sm-4">
              <label class="label-control">Hotel Fee</label>
              <input type="number" name="up_hostel_fees" id="up_hostel_fees" class="text-control" placeholder="Enter Hotel Fee">
              @if($errors->has('up_hostel_fees'))
                <span style="color: red;">{{ $errors->first('up_hostel_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">Other Fee</label>
              <input type="number" name="up_other_fees" id="up_other_fees" class="text-control" placeholder="Enter Other Fee">
              @if($errors->has('up_other_fees'))
                <span style="color: red;">{{ $errors->first('up_other_fees') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
			<div class="col-sm-4">
              <label class="label-control">Other Fee Remark</label>
              <input type="text" name="up_other_fees_remark" id="up_other_fees_remark" class="text-control" placeholder="Enter Remark">
              @if($errors->has('up_other_fees_remark'))
                <span style="color: red;">{{ $errors->first('up_other_fees_remark') }}</span>
                  <script type="text/javascript">
                      setTimeout(function() {
                        $('#edit-course').modal('show');
                      }, 1000);
                  </script>
              @endif
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Update Course</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function viewMoredata(data) {
        var obj = JSON.parse(data);
        document.getElementById("admission_amount").innerHTML = obj.admission_fees;
        document.getElementById("course_amount").innerHTML = obj.course_fees;
        document.getElementById("exam_amount").innerHTML = obj.exam_fees;
        document.getElementById("itp_amount").innerHTML = obj.itp_fees;
        document.getElementById("late_amount").innerHTML = obj.late_fees;
        document.getElementById("deposite_amount").innerHTML = obj.total_deposite_fees;
        document.getElementById("hostel_amount").innerHTML = obj.hostel_fees;
        document.getElementById("other_amount").innerHTML = obj.other_fees;
        document.getElementById("remark").innerHTML = obj.other_fees_remark;
        $('#admission-fee-chart').modal('show');
    }

    function editCourse(data) {
      var obj = JSON.parse(data);
      document.getElementById("id").value = obj.id;
      document.getElementById("up_course_name").value = obj.course_name;
      document.getElementById("up_course_code").value = obj.course_code;

      var up_course_wise_id = document.querySelector('#up_course_wise_id');
      var index1 = parseInt(obj.course_wise_id);
      up_course_wise_id[index1].selected = true;
      $(up_course_wise_id).change();

      var up_course_duration_id = document.querySelector('#up_course_duration_id');
      var index2 = parseInt(obj.course_duration_id);
      up_course_duration_id[index2].selected = true;
      $(up_course_duration_id).change();

      var up_course_type_id = document.querySelector('#up_course_type_id');
      var index3 = parseInt(obj.course_duration_id);
      up_course_type_id[index3].selected = true;
      $(up_course_type_id).change();

      var up_course_level_id = document.querySelector('#up_course_level_id');
      var index4 = parseInt(obj.course_duration_id);
      up_course_level_id[index4].selected = true;
      $(up_course_level_id).change();

       document.getElementById("up_admission_fees").value = obj.admission_fees;
       document.getElementById("up_course_fees").value = obj.course_fees;
       document.getElementById("up_exam_fees").value = obj.exam_fees;
       document.getElementById("up_itp_fees").value = obj.itp_fees;
       document.getElementById("up_late_fees").value = obj.late_fees;
       document.getElementById("up_total_deposite_fees").value = obj.total_deposite_fees;
       document.getElementById("up_hostel_facility").value = obj.hostel_facility;
       document.getElementById("up_hostel_fees").value = obj.hostel_fees;
       document.getElementById("up_other_fees").value = obj.other_fees;
       document.getElementById("up_other_fees_remark").value = obj.other_fees_remark;
      $('#edit-course').modal('show');
    }
</script>
@endsection