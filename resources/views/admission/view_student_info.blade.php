@extends('header.header')
@section('content')
<section class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="content-header">
					<h3 class="content-header-title">Admission</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item">Manage Admission</li>
						<li class="breadcrumb-item active">Offline Admission Preview</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="content-main-body">
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="card-block">
					<form class="form-body">	
						<h3 class="form-section-h">Personal Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Profile Picture</label>
								@if($data->profile_pic)
									<img src="{{ $data->profile_pic }}" class="img-fluid" style="height: 50px;display: block">
								@else
									<img src="{{ asset('') }}/images/usr.png" class="img-fluid" style="height: 50px;display: block">
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">College Enrollment No</label>
								<h4 class="label-name">{{ $data->college_enrollment_number }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">University Enrollment No</label>
								<h4 class="label-name">{{ $data->university_enrollment_number }}</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Student First Name</label>
								<h4 class="label-name">{{ $data->first_name }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Student Middle Name</label>
								<h4 class="label-name">{{ $data->middle_name }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Student Last Name</label>
								<h4 class="label-name">{{ $data->last_name }}</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Date of Birth</label>
								<h4 class="label-name">{{ date("d-m-Y", strtotime($data->dob)) }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mobile Number</label>
								<h4 class="label-name">{{ $data->mobile_number }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Email ID</label>
								<h4 class="label-name">{{ $data->email }}</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Gender</label>
								<h4 class="label-name">{{ $data->gender }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Category</label>
								<h4 class="label-name">{{ $data->getCategory['name'] }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Current Address</label>
								<h4 class="label-name">{{ $data->current_address }}</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">ID Type</label>
								<h4 class="label-name">{{ $data->getTdType['name'] }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">ID Number</label>
								<h4 class="label-name">{{ $data->id_number }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Nationality</label>
								<h4 class="label-name">{{ $data->nationality }}</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">State</label>
								<h4 class="label-name">{{ $data->getState['name'] }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">City</label>
								<h4 class="label-name">{{ $data->getCity['name'] }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Pin Code</label>
								<h4 class="label-name">{{ $data->pin_code }}</h4>
							</div>
						</div>
						
						<h3 class="form-section-h">Parent's Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Father's Name</label>
								<h4 class="label-name">{{ $data->father_name }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Father's Mobile No.</label>
								<h4 class="label-name">{{ $data->father_mobile_number }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Father's Occupation</label>
								<h4 class="label-name">{{ $data->father_occupation }}</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Mother's Name</label>
								<h4 class="label-name">{{ $data->mother_name }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mother's Mobile No.</label>
								<h4 class="label-name">{{ $data->mother_mobile_number }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mother's Occupation</label>
								<h4 class="label-name">{{ $data->mother_occupation }}</h4>
							</div>
						</div>
						
						<h3 class="form-section-h">Qualification Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-bordered table-fitems">
										<tr>
											<th>Exam</th>
											<th>Year of Passing</th>
											<th>Board/University</th>
											<th>Total Percentage (%)</th>
											<th>Upload Document</th>
										</tr>
										
										<tr>
											<td>Secondary/ High School</td>
											<td>{{ $data->high_school_passing_year }}</td>
											<td>{{ $data->high_school_passing_board }}</td>
											<td>{{ $data->high_school_percentage }}</td>
											<td>
												@if($data->high_school_file)
													<img src="{{ $data->high_school_file }}" class="img-fluid" style="height: 50px;">
												@else
													<img src="{{ asset('') }}/images/usr.png" class="img-fluid" style="height: 50px;">
												@endif
											</td>
										</tr>
										
										<tr>
											<td>Sr.Secondary</td>
											<td>{{ $data->sr_secondry_passing_year }}</td>
											<td>{{ $data->sr_secondry_passing_board }}</td>
											<td>{{ $data->sr_secondry_percentage }}</td>
											<td>
												@if($data->sr_secondry_file)
													<img src="{{ $data->sr_secondry_file }}" class="img-fluid" style="height: 50px;">
												@else
													<img src="{{ asset('') }}/images/usr.png" class="img-fluid" style="height: 50px;">
												@endif
											</td>
										</tr>
										
										<tr>
											<td>Under Graduation</td>
											<td>{{ $data->graduation_passing_year }}</td>
											<td>{{ $data->graduation_passing_board }}</td>
											<td>{{ $data->graduation_percentage }}</td>
											<td>
												@if($data->graduation_file)
													<img src="{{ $data->graduation_file }}" class="img-fluid" style="height: 50px;">
												@else
													<img src="{{ asset('') }}/images/usr.png" class="img-fluid" style="height: 50px;">
												@endif
											</td>
										</tr>
										
										<tr>
											<td>Post Grad.</td>
											<td>{{ $data->post_graduation_passing_year }}</td>
											<td>{{ $data->post_graduation_passing_board }}</td>
											<td>{{ $data->post_graduation_percentage }}</td>
											<td>
												@if($data->post_graduation_file)
													<img src="{{ $data->post_graduation_file }}" class="img-fluid" style="height: 50px;">
												@else
													<img src="{{ asset('') }}/images/usr.png" class="img-fluid" style="height: 50px;">
												@endif
											</td>
										</tr>
										
										<tr>
											<td>M.Phil</td>
											<td>{{ $data->m_phil_passing_year }}</td>
											<td>{{ $data->m_phil_passing_board }}</td>
											<td>{{ $data->m_phil_percentage }}</td>
											<td>
												@if($data->m_phil_file)
													<img src="{{ $data->m_phil_file }}" class="img-fluid" style="height: 50px;">
												@else
													<img src="{{ asset('') }}/images/usr.png" class="img-fluid" style="height: 50px;">
												@endif
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						
						<h3 class="form-section-h">Course / University</h3>
						
						<div class="form-group row">
						<div class="col-sm-4">
							<label class="label-control">Course</label>
							<h4 class="label-name">{{ $data->getCourse['course_name'] }}</h4>
						</div>

						<div class="col-sm-2">
							<label class="label-control">Branch</label>
							<h4 class="label-name">{{ $data->getCollege['name'] }}</h4>
						</div>
						
						<div class="col-sm-2">
							<label class="label-control">Study Mode</label>
							<h4 class="label-name">{{ $data->getStudyMode['name'] }}</h4>
						</div>

						<div class="col-sm-2">
							<label class="label-control">Mode Of Entry</label>
							<h4 class="label-name">{{ $data->getModeOfEntry['name'] }}</h4>
						</div>
					</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">University</label>
								<h4 class="label-name">{{ $data->getUniversity['name'] }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Session</label>
								<h4 class="label-name">{{ $data->getSession['session'] }}</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mode Of Study</label>
								<h4 class="label-name">{{ $data->getStudyOfMode['name'] }}</h4>
							</div>
						</div>
						
						<h3 class="form-section-h">Fee / Documents Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Admission Fee</label>
								<h4 class="label-name"><i class="fas fa-rupee-sign"></i> {{ $data->admission_fees }} <button type="button" class="btn btn-sm btn-primary" data-target="#admission-fee-chart" data-toggle="modal">View Fee Chart</button></h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Aadhar Card</label>
								@if($data->aadhar_card)
									<img src="{{ $data->aadhar_card }}" class="img-fluid" style="height: 50px;">
								@else
									<img src="{{ asset('') }}/images/usr.png" class="img-fluid" style="height: 50px;">
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Signature</label>
								@if($data->signature)
									<img src="{{ $data->signature }}" class="img-fluid" style="height: 50px;">
								@else
									<img src="{{ asset('') }}/images/usr.png" class="img-fluid" style="height: 50px;">
								@endif
							</div>
						</div>
					</form>
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
				<td><i class="fas fa-rupee-sign"></i> {{ $data->getCourse['admission_fees'] }}</td> 
				<th>Course Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> {{ $data->getCourse['course_fees'] }}</td> 
			</tr> 
			<tr>
				<th>Exam Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> {{ $data->getCourse['exam_fees'] }}</td> 
				<th>ITP Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> {{ $data->getCourse['itp_fees'] }}</td> 
			</tr> 
			<tr>
				<th>Late Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> {{ $data->getCourse['late_fees'] }}</td> 
				<th>Total Deposit Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> {{ $data->getCourse['total_deposite_fees'] }}</td> 
			</tr> 
			<tr>
				<th>Hostel Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> {{ $data->getCourse['hostel_fees'] }}</td> 
			</tr> 
		 </table>
      </div>
    </div>
  </div>
</div>
@endsection