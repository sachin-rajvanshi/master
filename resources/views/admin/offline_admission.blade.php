@extends('header.header')
@section('content')
<section class="content-main-body">
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="card-block">
					<form class="form-body" method="post" action="{{ url('admin/admission/create') }}" enctype="multipart/form-data">	
						@csrf
						<h3 class="form-section-hm">Offline Admission Form</h3>
						<h3 class="form-section-h">Personal Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Profile Picture</label>
								<input type="file" name="profile_pic" class="form-control" required="">
								@if($errors->has('profile_pic'))
									<span style="color: red;">{{ $errors->first('profile_pic') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">College Enrollment No</label>
								<input type="text" name="college_enrollment_number" value="{{ old('college_enrollment_number') }}" class="form-control" placeholder="Enter College Enrollment">
								@if($errors->has('college_enrollment_number'))
									<span style="color: red;">{{ $errors->first('college_enrollment_number') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">University Enrollment No</label>
								<input type="text" name="university_enrollment_number" value="{{ old('university_enrollment_number') }}" class="form-control" placeholder="Enter University Enrollment">
								@if($errors->has('university_enrollment_number'))
									<span style="color: red;">{{ $errors->first('university_enrollment_number') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Student First Name</label>
								<input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="Enter First Name">
								@if($errors->has('first_name'))
									<span style="color: red;">{{ $errors->first('first_name') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Student Middle Name</label>
								<input type="text" name="middle_name" value="{{ old('middle_name') }}" class="form-control" placeholder="Enter Middle Name">
								@if($errors->has('middle_name'))
									<span style="color: red;">{{ $errors->first('middle_name') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Student Last Name</label>
								<input type="text" name="last_name" value="{{ old('last_name') }}"  class="form-control" placeholder="Enter Last Name">
								@if($errors->has('last_name'))
									<span style="color: red;">{{ $errors->first('last_name') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Date of Birth</label>
								<input type="date" name="dob" value="{{ old('dob') }}" class="form-control">
								@if($errors->has('dob'))
									<span style="color: red;">{{ $errors->first('dob') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mobile Number</label>
								<input type="number" name="mobile_number" value="{{ old('mobile_number') }}" class="form-control" placeholder="Enter Mobile Number">
								@if($errors->has('mobile_number'))
									<span style="color: red;">{{ $errors->first('mobile_number') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Email ID</label>
								<input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email ID">
								@if($errors->has('email'))
									<span style="color: red;">{{ $errors->first('email') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Gender</label>
								<select class="form-control" name="gender">
									<option value="">Select Gender</option>
									@if(old('gender') == 'Male')
										<option value="Male" selected="">Male</option>
									@elseif(old('gender') == 'Female')
										<option value="Female" selected="">Female</option>
									@else
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									@endif
								</select>
								@if($errors->has('gender'))
									<span style="color: red;">{{ $errors->first('gender') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Category</label>
								<select class="form-control" name="category_id">
									<option value="">Select Category</option>
									@foreach($data['categories'] as $category)
										@if(old('category_id') == $category->id)
											<option value="{{ $category->id }}" selected="">{{ $category->name }}</option>
										@else
											<option value="{{ $category->id }}">{{ $category->name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('category_id'))
									<span style="color: red;">{{ $errors->first('category_id') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Current Address</label>
								<input type="text" name="current_address" value="{{ old('current_address') }}" class="form-control" placeholder="Enter Current Address">
								@if($errors->has('current_address'))
									<span style="color: red;">{{ $errors->first('current_address') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">ID Type</label>
								<select class="form-control" name="id_type">
									<option value="">Select ID Type</option>
									@foreach($data['id_types'] as $idtype)
										@if(old('id_type') == $idtype->id)
											<option value="{{ $idtype->id }}" selected="">{{ $idtype->name }}</option>
										@else
											<option value="{{ $idtype->id }}">{{ $idtype->name }}</option>
										@endif
									@endforeach
									<option>Aadhar Card</option>
									<option>PAN Card</option>
								</select>
								@if($errors->has('id_type'))
									<span style="color: red;">{{ $errors->first('id_type') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">ID Number</label>
								<input type="text" name="id_number" value="{{ old('id_number') }}" class="form-control" placeholder="Enter ID Number">
								@if($errors->has('id_number'))
									<span style="color: red;">{{ $errors->first('id_number') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Nationality</label>
								<input type="text" name="nationality" value="{{ old('nationality') }}" class="form-control" placeholder="Enter Nationality">
								@if($errors->has('nationality'))
									<span style="color: red;">{{ $errors->first('nationality') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">State</label>
								<select class="form-control" name="state_id">
									<option value="">Select State</option>
									@foreach($data['states'] as $state)
										@if(old('state_id') == $state->id)
											<option value="{{ $state->id }}" selected="">{{ $state->name }}</option>
										@else
											<option value="{{ $state->id }}">{{ $state->name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('state_id'))
									<span style="color: red;">{{ $errors->first('state_id') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">City</label>
								<select class="form-control" name="city_id">
									<option value="">Select City</option>
									@foreach($data['cities'] as $city)
										@if(old('city_id') == $city->id)
											<option value="{{ $city->id }}" selected="">{{ $city->name }}</option>
										@else
											<option value="{{ $city->id }}">{{ $city->name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('city_id'))
									<span style="color: red;">{{ $errors->first('city_id') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Pin Code</label>
								<input type="text" name="pin_code" value="{{ old('pin_code') }}" class="form-control" placeholder="Enter Pincode">
								@if($errors->has('pin_code'))
									<span style="color: red;">{{ $errors->first('pin_code') }}</span>
								@endif
							</div>
						</div>
						
						<h3 class="form-section-h">Parent's Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Father's Name</label>
								<input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control" placeholder="Enter Father's Name">
								@if($errors->has('father_name'))
									<span style="color: red;">{{ $errors->first('father_name') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Father's Mobile No.</label>
								<input type="text" name="father_mobile_number" value="{{ old('father_mobile_number') }}" class="form-control" placeholder="Enter Father's Mobile No.">
								@if($errors->has('father_mobile_number'))
									<span style="color: red;">{{ $errors->first('father_mobile_number') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Father's Occupation</label>
								<input type="text" name="father_occupation" value="{{ old('father_occupation') }}" class="form-control" placeholder="Enter Father's Occupation">
								@if($errors->has('father_occupation'))
									<span style="color: red;">{{ $errors->first('father_occupation') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Mother's Name</label>
								<input type="text" name="mother_name" value="{{ old('mother_name') }}" class="form-control" placeholder="Enter Mother's Name">
								@if($errors->has('mother_name'))
									<span style="color: red;">{{ $errors->first('mother_name') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mother's Mobile No.</label>
								<input type="text" name="mother_mobile_number" value="{{ old('mother_mobile_number') }}" class="form-control" placeholder="Enter Mother's Mobile No.">
								@if($errors->has('mother_mobile_number'))
									<span style="color: red;">{{ $errors->first('mother_mobile_number') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mother's Occupation</label>
								<input type="text" name="mother_occupation" value="{{ old('mother_occupation') }}" class="form-control" placeholder="Enter Mother's Occupation">
								@if($errors->has('mother_occupation'))
									<span style="color: red;">{{ $errors->first('mother_occupation') }}</span>
								@endif
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
											<td>
												<input type="text" class="form-control-s" name="high_school_passing_year" value="{{ old('high_school_passing_year') }}">
												@if($errors->has('high_school_passing_year'))
													<span style="color: red;">{{ $errors->first('high_school_passing_year') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="high_school_passing_board" value="{{ old('high_school_passing_board') }}">
												@if($errors->has('high_school_passing_board'))
													<span style="color: red;">{{ $errors->first('high_school_passing_board') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="high_school_percentage" value="{{ old('high_school_percentage') }}">
												@if($errors->has('high_school_percentage'))
													<span style="color: red;">{{ $errors->first('high_school_percentage') }}</span>
												@endif
											</td>
											<td>
												<input type="file" class="form-control-s" name="high_school_file" required="">
												@if($errors->has('high_school_file'))
													<span style="color: red;">{{ $errors->first('high_school_file') }}</span>
												@endif
											</td>
										</tr>
										
										<tr>
											<td>Sr.Secondary</td>
											<td>
												<input type="text" class="form-control-s" name="sr_secondry_passing_year" value="{{ old('sr_secondry_passing_year') }}">
												@if($errors->has('sr_secondry_passing_year'))
													<span style="color: red;">{{ $errors->first('sr_secondry_passing_year') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="sr_secondry_passing_board" value="{{ old('sr_secondry_passing_board') }}">
												@if($errors->has('sr_secondry_passing_board'))
													<span style="color: red;">{{ $errors->first('sr_secondry_passing_board') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="sr_secondry_percentage" value="{{ old('sr_secondry_percentage') }}">
												@if($errors->has('sr_secondry_percentage'))
													<span style="color: red;">{{ $errors->first('sr_secondry_percentage') }}</span>
												@endif
											</td>
											<td>
												<input type="file" class="form-control-s" name="sr_secondry_file" required="">
												@if($errors->has('sr_secondry_file'))
													<span style="color: red;">{{ $errors->first('sr_secondry_file') }}</span>
												@endif
											</td>
										</tr>
										
										<tr>
											<td>Under Graduation</td>
											<td>
												<input type="text" class="form-control-s" name="graduation_passing_year" value="{{ old('graduation_passing_year') }}">
												@if($errors->has('graduation_passing_year'))
													<span style="color: red;">{{ $errors->first('graduation_passing_year') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="graduation_passing_board" value="{{ old('graduation_passing_board') }}">
												@if($errors->has('graduation_passing_board'))
													<span style="color: red;">{{ $errors->first('graduation_passing_board') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="graduation_percentage" value="{{ old('graduation_percentage') }}">
												@if($errors->has('graduation_percentage'))
													<span style="color: red;">{{ $errors->first('graduation_percentage') }}</span>
												@endif
											</td>
											<td>
												<input type="file" class="form-control-s" name="graduation_file">
												@if($errors->has('graduation_file'))
													<span style="color: red;">{{ $errors->first('graduation_file') }}</span>
												@endif
											</td>
										</tr>
										
										<tr>
											<td>Post Grad.</td>
											<td>
												<input type="text" class="form-control-s" name="post_graduation_passing_year" value="{{ old('post_graduation_passing_year') }}">
												@if($errors->has('post_graduation_passing_year'))
													<span style="color: red;">{{ $errors->first('post_graduation_passing_year') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="post_graduation_passing_board" value="{{ old('post_graduation_passing_board') }}">
												@if($errors->has('post_graduation_passing_board'))
													<span style="color: red;">{{ $errors->first('post_graduation_passing_board') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="post_graduation_percentage" value="{{ old('post_graduation_percentage') }}">
												@if($errors->has('post_graduation_percentage'))
													<span style="color: red;">{{ $errors->first('post_graduation_percentage') }}</span>
												@endif
											</td>
											<td>
												<input type="file" class="form-control-s" name="post_graduation_file">
												@if($errors->has('post_graduation_file'))
													<span style="color: red;">{{ $errors->first('post_graduation_file') }}</span>
												@endif
											</td>
										</tr>
										
										<tr>
											<td>M.Phil</td>
											<td>
												<input type="text" class="form-control-s" name="m_phil_passing_year" value="{{ old('m_phil_passing_year') }}">
												@if($errors->has('m_phil_passing_year'))
													<span style="color: red;">{{ $errors->first('m_phil_passing_year') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="m_phil_passing_board" value="{{ old('m_phil_passing_board') }}">
												@if($errors->has('m_phil_passing_board'))
													<span style="color: red;">{{ $errors->first('m_phil_passing_board') }}</span>
												@endif
											</td>
											<td>
												<input type="text" class="form-control-s" name="m_phil_percentage" value="{{ old('m_phil_percentage') }}">
												@if($errors->has('m_phil_percentage'))
													<span style="color: red;">{{ $errors->first('m_phil_percentage') }}</span>
												@endif
											</td>
											<td>
												<input type="file" class="form-control-s" name="m_phil_file">
												@if($errors->has('m_phil_file'))
													<span style="color: red;">{{ $errors->first('m_phil_file') }}</span>
												@endif
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						
						<h3 class="form-section-h">Course / University</h3>
						
						<div class="form-group row">
							<div class="col-sm-3">
								<label class="label-control">Course</label>
								<select class="form-control" name="course_id" id="course_id" onchange="getTotalFees()">
									<option value="">Select Course</option>
									@foreach($data['courses'] as $course)
										@if(old('course_id') == $course->id)
											<option value="{{ $course->id }}" selected="">{{ $course->course_name }}</option>
										@else
											<option value="{{ $course->id }}">{{ $course->course_name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('course_id'))
									<span style="color: red;">{{ $errors->first('course_id') }}</span>
								@endif
							</div>
							
							<div class="col-sm-3">
								<label class="label-control">Branch</label>
								<select class="form-control" name="branch_id">
									<option value="">Select Branch</option>
									@foreach($data['colleges'] as $college)
										@if(old('branch_id') == $college->id)
											<option value="{{ $college->id }}" selected="">{{ $college->name }}</option>
										@else
											<option value="{{ $college->id }}">{{ $college->name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('branch_id'))
									<span style="color: red;">{{ $errors->first('branch_id') }}</span>
								@endif
							</div>
							
							<div class="col-sm-3">
								<label class="label-control">Study Mode</label>
								<select class="form-control" name="study_mode_id">
									<option value="">Select Mode</option>
									@foreach($data['study_modes'] as $studeMode)
										@if(old('study_mode_id') == $studeMode->id)
											<option value="{{ $studeMode->id }}" selected="">{{ $studeMode->name }}</option>
										@else
											<option value="{{ $studeMode->id }}">{{ $studeMode->name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('study_mode_id'))
									<span style="color: red;">{{ $errors->first('study_mode_id') }}</span>
								@endif
							</div>
							
							<div class="col-sm-3">
								<label class="label-control">Mode Of Entry</label>
								<select class="form-control" name="mode_of_entry_id">
									<option value="">Select Entry</option>
									@foreach($data['modes_of_entries'] as $entry)
										@if(old('mode_of_entry_id') == $entry->id)
											<option value="{{ $entry->id }}" selected="">{{ $entry->name }}</option>
										@else
											<option value="{{ $entry->id }}">{{ $entry->name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('mode_of_entry_id'))
									<span style="color: red;">{{ $errors->first('mode_of_entry_id') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">University</label>
								<select class="form-control" name="university_id">
									<option value="">Select University</option>
									@foreach($data['universities'] as $university)
										@if(old('university_id') == $university->id)
											<option value="{{ $university->id }}" selected="">{{ $university->name }}</option>
										@else
											<option value="{{ $university->id }}">{{ $university->name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('university_id'))
									<span style="color: red;">{{ $errors->first('university_id') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Session</label>
								<select class="form-control" name="session_id">
									<option value="">Select Session</option>
									@foreach($data['sessions'] as $session)
										@if(old('session_id') == $session->id)
											<option value="{{ $session->id }}" selected="">{{ $session->session }}</option>
										@else
											<option value="{{ $session->id }}">{{ $session->session }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('session_id'))
									<span style="color: red;">{{ $errors->first('session_id') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mode Of Study</label>
								<select class="form-control" name="mode_of_study_id">
									<option value="">Select Mode</option>
									@foreach($data['mode_of_studies'] as $study)
										@if(old('mode_of_study_id') == $study->id)
											<option value="{{ $study->id }}" selected="">{{ $study->name }}</option>
										@else
											<option value="{{ $study->id }}">{{ $study->name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('mode_of_study_id'))
									<span style="color: red;">{{ $errors->first('mode_of_study_id') }}</span>
								@endif
							</div>
						</div>
						
						<h3 class="form-section-h">Consultant Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Consultant Code</label>
								<input type="text" class="form-control" placeholder="Consultant Code" name="consultant_code" value="{{ old('consultant_code') }}">
								@if($errors->has('consultant_code'))
									<span style="color: red;">{{ $errors->first('consultant_code') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Consultant Name</label>
								<input type="text" class="form-control" placeholder="Enter Consultant Name" name="consultant_name" value="{{ old('consultant_name') }}">
								@if($errors->has('consultant_name'))
									<span style="color: red;">{{ $errors->first('consultant_name') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Consultant Mobile No.</label>
								<input type="text" class="form-control" placeholder="Enter Consultant Mob" name="consultant_mobile_number" value="{{ old('consultant_mobile_number') }}">
								@if($errors->has('consultant_mobile_number'))
									<span style="color: red;">{{ $errors->first('consultant_mobile_number') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<label class="label-control">Consultant Address</label>
								<input type="text" class="form-control" placeholder="Enter Consultant Address" name="consultant_address" value="{{ old('consultant_address') }}">
								@if($errors->has('consultant_address'))
									<span style="color: red;">{{ $errors->first('consultant_address') }}</span>
								@endif
							</div>
						</div>
						
						<h3 class="form-section-h">Fee / Documents Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Admission Fee</label>
								<input type="number" class="form-control" value="{{ old('admission_fees') }}" id="admission_fees" name="admission_fees" readonly="">
								<a href="#" data-target="#admission-fee-chart" data-toggle="modal">View Fee Chart</a>
								@if($errors->has('admission_fees'))
									<span style="color: red;">{{ $errors->first('admission_fees') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Aadhar Card</label>
								<input type="file" class="form-control" name="aadhar_card" value="{{ old('aadhar_card') }}" required="">
								@if($errors->has('aadhar_card'))
									<span style="color: red;">{{ $errors->first('aadhar_card') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Signature</label>
								<input type="file" class="form-control" name="signature" required="">
								@if($errors->has('signature'))
									<span style="color: red;">{{ $errors->first('signature') }}</span>
								@endif
							</div>
						</div>
						
						<h3 class="form-section-h">Course Status (currently)</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Course Completion</label>
								<select class="form-control" name="course_completion_id">
									<option value="">Select Course Completion</option>
									@foreach($data['completion'] as $complete)
										@if(old('course_completion_id') == $complete->id)
											<option value="{{ $complete->id }}" selected="">{{ $complete->name }}</option>
										@else
											<option value="{{ $complete->id }}">{{ $complete->name }}</option>
										@endif
									@endforeach
								</select>
								@if($errors->has('course_completion_id'))
									<span style="color: red;">{{ $errors->first('course_completion_id') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<label><input type="checkbox" name="terms" required=""> &nbsp; As per law and legal opinion University is empowered by authority of law to award degree's, diplomas, & certificate in all course of Education including Medical Science, there being no requirement to take approval from any other authorities all certificate degrees diplomas certificate awarded by University are Sui - generis valid in law and degree/diploma/certificate holders are automatically entitled to be recognised for government jobs and for Registration with all Professional Council. For Legal opinion and relevent laws and Court Judgments Visit University website.</label>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-dark">Proceed to Next Step</button>
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Admission Fee Chart</h4>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
		 <table class="table table-bordered table-fitems">
		 	<tr>
				<th>Admission Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="fees">1200</span></td> 
				<th>Course Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="course_fees">6</span></td> 
			</tr> 
			<tr>
				<th>Exam Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="exam_fees">1200</span></td> 
				<th>ITP Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="itp_fees">6</span></td> 
			</tr> 
			<tr>
				<th>Late Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="late_fees">1200</span></td> 
				<th>Total Deposit Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="total_fees">6</span></td> 
			</tr> 
			<tr>
				<th>Hostel Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="hostel_fees">1200</span></td> 
				<th>Other Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> <span id="other_fees">1200</span></td> 
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
<script type="text/javascript">
	function getTotalFees() {
		var course_id = $('#course_id').val();
		$.ajax({
			method:'post',
			url   : "{{ url('course/total/fees') }}",
			data  : {
				"_token": "{{ csrf_token() }}",
				'id'    : course_id
			},
			success: function(data){
				document.getElementById('admission_fees').value = data.total_deposite_fees;
				document.getElementById('fees').innerHTML = data.admission_fees;
				document.getElementById('course_fees').innerHTML = data.course_fees;
				document.getElementById('exam_fees').innerHTML = data.exam_fees;
				document.getElementById('itp_fees').innerHTML = data.itp_fees;
				document.getElementById('late_fees').innerHTML = data.late_fees;
				document.getElementById('total_fees').innerHTML = data.total_deposite_fees;
				document.getElementById('hostel_fees').innerHTML = data.hostel_fees;
				document.getElementById('other_fees').innerHTML = data.other_fees;
				document.getElementById('remark').innerHTML = data.other_fees_remark;
			}
		});
	}
</script>
@endsection