@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Master</h3>
		  <button class="btn btn-primary btn-save" onclick="window.location.href='add-branch.php'"><i class="fas fa-plus"></i> Add Branch</button>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Branches</li>
            <li class="breadcrumb-item active">Manage Branch</li>
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
                      <th>Name</th>
                      <th>Code</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>State</th>
                      <th>City</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>01.10.2020 12:00PM</td>
                      <td>AEM Institute</td>
                      <td>INS001</td>
                      <td>in@gmil.com</td>
                      <td>9898989898</td>
                      <td>Maharashtra</td>
                      <td>Mumbai</td>
                      <td>Active</td>
                      <td>
						  <ul class="action">
                          	<li><a href="edit-branch.php" title="Edit Branch"><i class="fas fa-pencil-alt"></i></a></li>
                          	<li><a href="#" title="Change Status"><i class="fas fa-exchange-alt"></i></a></li>
                          	<li><a href="#" title="Change Password" data-target="#change-password" data-toggle="modal"><i class="fas fa-lock"></i></a></li>
                          	<li><a href="#" title="Delete Branch"><i class="fas fa-trash"></i></a></li>
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

<div class="modal" id="change-password">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        <form>
          <div class="form-group row">
            <div class="col-sm-6">
              <label class="label-control">New Password</label>
              <input type="text" class="text-control" placeholder="Enter New Password">
            </div>
			 <div class="col-sm-6">
              <label class="label-control">Re-Enter Password</label>
              <input type="text" class="text-control" placeholder="Re-Enter Password">
            </div>
          </div>
	
          <div class="form-action row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-primary btn-save" type="submit">Change Password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
