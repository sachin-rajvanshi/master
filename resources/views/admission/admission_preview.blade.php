@extends('header.admission_header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Admission</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
						
						
						<div class="form-group row">
							<div class="col-sm-12 text-center">
								<a href="{{ url('admission/edit/') }}/{{ $data->id }}"><button type="button" class="btn btn-danger">Re-Edit</button></a>
								<button type="button" class="btn btn-dark" data-target="#payment-now" data-toggle="modal">Proceed to Pay Fee</button>
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

<div class="modal" id="payment-now">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Pay Fee</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form method="post" action="{{ url('admission/make/payment') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group row">
					<div class="col-sm-6">
						<label class="label-control">Payable Fee</label>
						<input type="text" class="text-control" name="total_fees" id="total_fees" value="{{ $data->getCourse['total_deposite_fees'] }}" disabled>
					</div>
					<div class="col-sm-6">
						<label class="label-control">Amount to Pay</label>
						<input type="text" class="text-control" name="paid_amount" id="paid_amount" placeholder="Enter Amount to Pay">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-6">
						<label class="label-control">Mode Of Payment</label>
						<select class="text-control" name="paymentmode_admission" id="paymentmode_admission">
							<option value="">Select Mode</option>
							@foreach($payment_modes as $mode)
								<option value="{{ $mode->id }}">{{ $mode->name }}</option>
							@endforeach
						</select>
					</div>
					
					<div class="col-sm-6">
						<label class="label-control">Payment Date</label>
						<input type="date" class="text-control" name="payment_date" id="payment_date">
					</div>
				</div>
				
				<div class="form-group row cash_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Cash Collected By</label>
						<input type="text" class="text-control" placeholder="Collected Person Name" name="cash_collected_by" id="cash_collected_by">
					</div>
				</div>
				
				<div class="form-group row chq_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Cheque No.</label>
						<input type="text" class="text-control" placeholder="Enter Cheque No." name="cheque_number" id="cheque_number">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Cheque Date</label>
						<input type="date" class="text-control" name="cheque_date" id="cheque_date">
					</div>
				</div>
				
				<div class="form-group row chq_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Bank Name</label>
						<input type="text" class="text-control" placeholder="Enter Bank Name" name="bank_name" id="bank_name">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Bank Branch</label>
						<input type="text" class="text-control" placeholder="Enter Bank Branch" name="bank_branch" id="bank_branch">
					</div>
				</div>
				
				<div class="form-group row net_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">UTR No.</label>
						<input type="text" class="text-control" placeholder="Enter UTR No." name="utr_number" id="utr_number">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Payment Screenshot</label>
						<input type="file" class="text-control" name="payment_screenshot_utr" id="payment_screenshot_utr">
					</div>
				</div>
				
				<div class="form-group row upi_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Ref Id</label>
						<input type="text" class="text-control" placeholder="Enter Ref Id" name="ref_id" id="ref_id">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Payment Screenshot</label>
						<input type="file" class="text-control" name="ref_screenschot" id="ref_screenschot">
					</div>
				</div>
				
				<div class="form-group row paytm_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Order Id</label>
						<input type="text" class="text-control" placeholder="Enter Order Id" name="order_id" id="order_id">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Payment Screenshot</label>
						<input type="file" class="text-control" name="order_screenshot" id="order_screenshot">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-12">
						<label class="label-control">Remark</label>
						<input type="text" class="text-control" placeholder="Enter Remark" name="remark" id="remark">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-12 text-center">
						<button class="btn btn-dark" type="submit">Pay Now</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
@endsection