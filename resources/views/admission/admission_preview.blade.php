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
								<img src="images/usr.png" class="img-fluid" style="height: 50px;display: block">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">College Enrollment No</label>
								<h4 class="label-name">234329849230</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">University Enrollment No</label>
								<h4 class="label-name">234329849230</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Student First Name</label>
								<h4 class="label-name">Mirza</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Student Middle Name</label>
								<h4 class="label-name">Arbaaz</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Student Last Name</label>
								<h4 class="label-name">Ali fahim</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Date of Birth</label>
								<h4 class="label-name">12.20.2020</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mobile Number</label>
								<h4 class="label-name">9000000000</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Email ID</label>
								<h4 class="label-name">im@gmail.com</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Gender</label>
								<h4 class="label-name">Male</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Category</label>
								<h4 class="label-name">General</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Current Address</label>
								<h4 class="label-name">1st Floor, Dayal Chamber, Lucknow</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">ID Type</label>
								<h4 class="label-name">Aadhar Card</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">ID Number</label>
								<h4 class="label-name">534543534354</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Nationality</label>
								<h4 class="label-name">Indian</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">State</label>
								<h4 class="label-name">Maharashtra</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">City</label>
								<h4 class="label-name">Mumbai</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Pin Code</label>
								<h4 class="label-name">333333</h4>
							</div>
						</div>
						
						<h3 class="form-section-h">Parent's Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Father's Name</label>
								<h4 class="label-name">Tension</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Father's Mobile No.</label>
								<h4 class="label-name">23535345</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Father's Occupation</label>
								<h4 class="label-name">Manager</h4>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Mother's Name</label>
								<h4 class="label-name">Maa</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mother's Mobile No.</label>
								<h4 class="label-name">2434343</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mother's Occupation</label>
								<h4 class="label-name">HouseWife</h4>
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
											<td>2020</td>
											<td>Maharashtra</td>
											<td>55</td>
											<td><img src="images/usr.png" class="img-fluid" style="height: 50px;"></td>
										</tr>
										
										<tr>
											<td>Sr.Secondary</td>
											<td>2020</td>
											<td>Maharashtra</td>
											<td>55</td>
											<td><img src="images/usr.png" class="img-fluid" style="height: 50px;"></td>
										</tr>
										
										<tr>
											<td>Under Graduation</td>
											<td>2020</td>
											<td>Maharashtra</td>
											<td>55</td>
											<td><img src="images/usr.png" class="img-fluid" style="height: 50px;"></td>
										</tr>
										
										<tr>
											<td>Post Grad.</td>
											<td>2020</td>
											<td>Maharashtra</td>
											<td>55</td>
											<td><img src="images/usr.png" class="img-fluid" style="height: 50px;"></td>
										</tr>
										
										<tr>
											<td>M.Phil</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						
						<h3 class="form-section-h">Course / University</h3>
						
						<div class="form-group row">
						<div class="col-sm-4">
							<label class="label-control">Course</label>
							<h4 class="label-name">Diploma in Computer Science</h4>
						</div>

						<div class="col-sm-2">
							<label class="label-control">Branch</label>
							<h4 class="label-name">Name</h4>
						</div>
						
						<div class="col-sm-2">
							<label class="label-control">Study Mode</label>
							<h4 class="label-name">Semester</h4>
						</div>

						<div class="col-sm-2">
							<label class="label-control">Mode Of Entry</label>
							<h4 class="label-name">Regular</h4>
						</div>
					</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">University</label>
								<h4 class="label-name">Nice English University</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Session</label>
								<h4 class="label-name">2012 - 2013</h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Mode Of Study</label>
								<h4 class="label-name">Conventional Learning</h4>
							</div>
						</div>
						
						<h3 class="form-section-h">Fee / Documents Details</h3>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Admission Fee</label>
								<h4 class="label-name"><i class="fas fa-rupee-sign"></i> 12000 <button type="button" class="btn btn-sm btn-primary" data-target="#admission-fee-chart" data-toggle="modal">View Fee Chart</button></h4>
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Aadhar Card</label>
								<img src="images/usr.png" class="img-fluid" style="height: 50px;display:block;">
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Signature</label>
								<img src="images/usr.png" class="img-fluid" style="height: 50px;display:block;">
							</div>
						</div>
						
						
						<div class="form-group row">
							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-danger">Re-Edit</button>
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
				<div class="form-group row">
					<div class="col-sm-6">
						<label class="label-control">Payable Fee</label>
						<input type="text" class="text-control" value="1200" disabled>
					</div>
					<div class="col-sm-6">
						<label class="label-control">Amount to Pay</label>
						<input type="text" class="text-control" placeholder="Enter Amount to Pay">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-6">
						<label class="label-control">Mode Of Payment</label>
						<select class="text-control" id="paymentmode_admission">
							<option value="0">Select Mode</option>
							<option value="1">Cash</option>
							<option value="2">Cheque/DD</option>
							<option value="3">Net Banking</option>
							<option value="4">UPI</option>
							<option value="5">Paytm</option>
						</select>
					</div>
					
					<div class="col-sm-6">
						<label class="label-control">Payment Date</label>
						<input type="date" class="text-control">
					</div>
				</div>
				
				<div class="form-group row cash_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Cash Collected By</label>
						<input type="text" class="text-control" placeholder="Collected Person Name">
					</div>
				</div>
				
				<div class="form-group row chq_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Cheque No.</label>
						<input type="text" class="text-control" placeholder="Enter Cheque No.">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Cheque Date</label>
						<input type="date" class="text-control">
					</div>
				</div>
				
				<div class="form-group row chq_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Bank Name</label>
						<input type="text" class="text-control" placeholder="Enter Bank Name">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Bank Branch</label>
						<input type="text" class="text-control" placeholder="Enter Bank Branch">
					</div>
				</div>
				
				<div class="form-group row net_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">UTR No.</label>
						<input type="text" class="text-control" placeholder="Enter UTR No.">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Payment Screenshot</label>
						<input type="file" class="text-control">
					</div>
				</div>
				
				<div class="form-group row upi_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Ref Id</label>
						<input type="text" class="text-control" placeholder="Enter Ref Id">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Payment Screenshot</label>
						<input type="file" class="text-control">
					</div>
				</div>
				
				<div class="form-group row paytm_div" style="display: none;">
					<div class="col-sm-6">
						<label class="label-control">Order Id</label>
						<input type="text" class="text-control" placeholder="Enter Order Id">
					</div>
					<div class="col-sm-6">
						<label class="label-control">Payment Screenshot</label>
						<input type="file" class="text-control">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-12">
						<label class="label-control">Remark</label>
						<input type="text" class="text-control" placeholder="Enter Remark">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-12 text-center">
						<button class="btn btn-dark" type="submit">Pay Now</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection