@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Admission</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Admission</li>
            <li class="breadcrumb-item active">Manage Admission</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
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
                      <th>Date &amp; Time</th>
                      <th>Enrol. No.</th>
                      <th>Branch</th>
                      <th>Name</th>
                      <th>Mob No.</th>
                      <th>Course</th>
                      <th>University</th>
                      <th>State/City</th>
                      <th>Total Fee</th>
                      <th>Already Paid</th>
                      <th>Balance</th>
                      <th>Added By</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>01.10.2020 12:00PM</td>
                      <td>23829483</td>
                      <td>Branch</td>
                      <td>Arbaaz</td>
                      <td>8787878787</td>
                      <td>Computer Science</td>
                      <td>Nice School</td>
                      <td>U.P / Mumbai</td>
                      <td><i class="fas fa-rupee-sign"></i> 1200</td>
                      <td><i class="fas fa-rupee-sign"></i> 120</td>
                      <td><i class="fas fa-rupee-sign"></i> 160</td>
                      <td>Admin</td>
                      <td>Active</td>
                      <td>
						            <ul class="action">
                          	<li><a href="{{ url('admin/view/student-profile') }}" title="View Student"><i class="fas fa-eye"></i></a></li>
                          	<li><a href="edit-student.php" title="Edit Student"><i class="fas fa-pencil-alt"></i></a></li>
                          	<li><a href="student-payment-history.php" title="Payment History"><i class="fas fa-rupee-sign"></i></a></li>
                          	<li><a href="#" title="Change Status"><i class="fas fa-exchange-alt"></i></a></li>
                          	<li><a href="#" title="Delete Student"><i class="fas fa-trash"></i></a></li>
                          </ul>
					            </td>
                    </tr>
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
@endsection