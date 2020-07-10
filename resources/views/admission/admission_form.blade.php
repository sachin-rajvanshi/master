@extends('header.admission_header')
@section('content')
<section class="content-main-body">
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="card-block">
					<form class="form-body">	
						<h3 class="form-section-hm">Online Admission Form</h3>
						<h3 class="form-section-h">Personal Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Profile Picture</label>
								<input type="file" name="profile_pic" class="form-control">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">College Enrollment No</label>
								<input type="text" name="college_enrollment_number" class="form-control" placeholder="Enter College Enrollment">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">University Enrollment No</label>
								<input type="text" name="university_enrollment_number" class="form-control" placeholder="Enter University Enrollment">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Student First Name</label>
								<input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Student Middle Name</label>
								<input type="text" name="middle_name" class="form-control" placeholder="Enter Middle Name">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Student Last Name</label>
								<input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Date of Birth</label>
								<input type="date" name="dob" class="form-control">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mobile Number</label>
								<input type="number" name="mobile_number" class="form-control" placeholder="Enter Mobile Number">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Email ID</label>
								<input type="text" name="email" class="form-control" placeholder="Enter Email ID">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Gender</label>
								<select class="form-control" name="gender">
									<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Category</label>
								<select class="form-control" name="category_id">
									<option>Select Category</option>
									<option>General</option>
									<option>OBC</option>
									<option>ST</option>
									<option>SC</option>
								</select>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Current Address</label>
								<input type="text" name="current_address" class="form-control" placeholder="Enter Current Address">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">ID Type</label>
								<select class="form-control" name="id_type">
									<option>Select ID Type</option>
									<option>Aadhar Card</option>
									<option>PAN Card</option>
								</select>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">ID Number</label>
								<input type="text" name="id_number" class="form-control" placeholder="Enter ID Number">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Nationality</label>
								<input type="text" name="nationality" class="form-control" placeholder="Enter Nationality">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">State</label>
								<select class="form-control" name="state_id">
									<option>Select State</option>
								</select>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">City</label>
								<select class="form-control" name="city_id">
									<option>Select City</option>
								</select>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Pin Code</label>
								<input type="text" name="pin_code" class="form-control" placeholder="Enter Pincode">
							</div>
						</div>
						
						<h3 class="form-section-h">Parent's Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Father's Name</label>
								<input type="text" name="father_name" class="form-control" placeholder="Enter Father's Name">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Father's Mobile No.</label>
								<input type="text" name="father_mobile_number" class="form-control" placeholder="Enter Father's Mobile No.">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Father's Occupation</label>
								<input type="text" name="father_occupation" value="{{ old('father_occupation') }}" class="form-control" placeholder="Enter Father's Occupation">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Mother's Name</label>
								<input type="text" name="mother_name" value="{{ old('mother_name') }}" class="form-control" placeholder="Enter Mother's Name">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mother's Mobile No.</label>
								<input type="text" name="mother_mobile_number" value="{{ old('mother_mobile_number') }}" class="form-control" placeholder="Enter Mother's Mobile No.">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mother's Occupation</label>
								<input type="text" name="mother_occupation" value="{{ old('mother_occupation') }}" class="form-control" placeholder="Enter Mother's Occupation">
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
											<td><input type="text" class="form-control-s" name="high_school_passing_year" value="{{ old('high_school_passing_year') }}"></td>
											<td><input type="text" class="form-control-s" name="high_school_passing_board" value="{{ old('high_school_passing_board') }}"></td>
											<td><input type="text" class="form-control-s" name="high_school_percentage" value="{{ old('high_school_percentage') }}"></td>
											<td><input type="file" class="form-control-s" name="high_school_file"></td>
										</tr>
										
										<tr>
											<td>Sr.Secondary</td>
											<td><input type="text" class="form-control-s" name="sr_secondry_passing_year" value="{{ old('sr_secondry_passing_year') }}"></td>
											<td><input type="text" class="form-control-s" name="sr_secondry_passing_board" value="{{ old('sr_secondry_passing_board') }}"></td>
											<td><input type="text" class="form-control-s" name="sr_secondry_percentage" value="{{ old('sr_secondry_percentage') }}"></td>
											<td><input type="file" class="form-control-s" name="sr_secondry_file"></td>
										</tr>
										
										<tr>
											<td>Under Graduation</td>
											<td><input type="text" class="form-control-s" name="graduation_passing_year" value="{{ old('graduation_passing_year') }}"></td>
											<td><input type="text" class="form-control-s" name="graduation_passing_board" value="{{ old('graduation_passing_board') }}"></td>
											<td><input type="text" class="form-control-s" name="graduation_percentage" value="{{ old('graduation_percentage') }}"></td>
											<td><input type="file" class="form-control-s" name="graduation_file"></td>
										</tr>
										
										<tr>
											<td>Post Grad.</td>
											<td><input type="text" class="form-control-s" name="post_graduation_passing_year" value="{{ old('post_graduation_passing_year') }}"></td>
											<td><input type="text" class="form-control-s" name="post_graduation_passing_board" value="{{ old('post_graduation_passing_board') }}"></td>
											<td><input type="text" class="form-control-s" name="post_graduation_percentage" value="{{ old('post_graduation_percentage') }}"></td>
											<td><input type="file" class="form-control-s" name="post_graduation_file"></td>
										</tr>
										
										<tr>
											<td>M.Phil</td>
											<td><input type="text" class="form-control-s" name="m_phil_passing_year" value="{{ old('m_phil_passing_year') }}"></td>
											<td><input type="text" class="form-control-s" name="m_phil_passing_board" value="{{ old('m_phil_passing_board') }}"></td>
											<td><input type="text" class="form-control-s" name="m_phil_percentage" value="{{ old('m_phil_percentage') }}"></td>
											<td><input type="file" class="form-control-s" name="m_phil_file"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						
						<h3 class="form-section-h">Course / University</h3>
						
						<div class="form-group row">
							<div class="col-sm-3">
								<label class="label-control">Course</label>
								<select class="form-control" name="course_id">
									<option>Select Course</option>
								</select>
							</div>
							
							<div class="col-sm-3">
								<label class="label-control">Branch</label>
								<select class="form-control" name="branch_id">
									<option>Select Branch</option>
								</select>
							</div>
							
							<div class="col-sm-3">
								<label class="label-control">Study Mode</label>
								<select class="form-control" name="study_mode_id">
									<option>Select Mode</option>
									<option>Semester</option>
									<option>Annual</option>
								</select>
							</div>
							
							<div class="col-sm-3">
								<label class="label-control">Mode Of Entry</label>
								<select class="form-control" name="mode_of_entry_id">
									<option>Select Entry</option>
									<option>Regular</option>
									<option>Distance</option>
								</select>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">University</label>
								<select class="form-control" name="university_id">
									<option>Select University</option>
								</select>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Session</label>
								<select class="form-control" name="session_id">
									<option>Select Session</option>
								</select>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mode Of Study</label>
								<select class="form-control" name="mode_of_study_id">
									<option value="" selected="selected">Select Mode</option>
									<option value="1">Assisted Self Study</option>
									<option value="2">Blended Learning</option>
									<option value="3">Conventional Learning</option>
								</select>
							</div>
						</div>
						
						<h3 class="form-section-h">Consultant Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Consultant Code</label>
								<input type="text" class="form-control" placeholder="Consultant Code" name="consultant_code" value="{{ old('consultant_code') }}">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Consultant Name</label>
								<input type="text" class="form-control" placeholder="Enter Consultant Name" name="consultant_name" value="{{ old('consultant_name') }}">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Consultant Mobile No.</label>
								<input type="text" class="form-control" placeholder="Enter Consultant Mob" name="consultant_mobile_number" value="{{ old('consultant_mobile_number') }}">
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<label class="label-control">Consultant Address</label>
								<input type="text" class="form-control" placeholder="Enter Consultant Address" name="consultant_address" value="{{ old('consultant_address') }}">
							</div>
						</div>
						
						<h3 class="form-section-h">Fee / Documents Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Admission Fee</label>
								<input type="number" class="form-control" value="{{ old('admission_fees') }}" name="admission_fees">
								<a href="#" data-target="#admission-fee-chart" data-toggle="modal">View Fee Chart</a>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Aadhar Card</label>
								<input type="file" class="form-control" name="aadhar_card" value="{{ old('aadhar_card') }}">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Signature</label>
								<input type="file" class="form-control" name="signature" value="{{ old('signature') }}">
							</div>
						</div>
						
						<h3 class="form-section-h">Course Status (currently)</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Course Completion</label>
								<select class="form-control" name="course_completion_id">
									<option>Continued</option>
								</select>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-12">
								<label><input type="checkbox"> &nbsp; As per law and legal opinion University is empowered by authority of law to award degree's, diplomas, & certificate in all course of Education including Medical Science, there being no requirement to take approval from any other authorities all certificate degrees diplomas certificate awarded by University are Sui - generis valid in law and degree/diploma/certificate holders are automatically entitled to be recognised for government jobs and for Registration with all Professional Council. For Legal opinion and relevent laws and Court Judgments Visit University website.</label>
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
				<td><i class="fas fa-rupee-sign"></i> 1200</td> 
				<th>Course Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 6</td> 
			</tr> 
			<tr>
				<th>Exam Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 1200</td> 
				<th>ITP Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 6</td> 
			</tr> 
			<tr>
				<th>Late Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 1200</td> 
				<th>Total Deposit Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 6</td> 
			</tr> 
			<tr>
				<th>Hotel Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 1200</td> 
				<th>Other Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 1200</td> 
			</tr> 
			 
			 <tr>
			 	<th>Other Fee Remark</th>
				<td colspan="3">Hello</td>
			 </tr>
		 </table>
      </div>
    </div>
  </div>
</div>
@endsection