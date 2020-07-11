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
            <li class="breadcrumb-item">Manage Admission</li>
            <li class="breadcrumb-item active">Payment History</li>
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
                      <th>Paid Amount</th>
                      <th>Balance Amount</th>
                      <th>Mode of Payment</th>
                      <th>Payment Status</th>
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
                      <td><i class="fas fa-rupee-sign"></i> {{ $data->paid_amount }}</td>
                      <td><i class="fas fa-rupee-sign"></i> {{ $data->due_amount }}</td>
                      <td><a href="#" data-target="#payment-details" data-toggle="modal">{{ $data->getPaymentMode['name'] }}</a></td>
                      <td>{{ $data->action_by_admin }}</td>
                      <td>
						              <ul class="action">
                          	<li>
                              @if($data->action_by_admin == 'Pending')
                                <a title="Approved Payment" onclick="markAsApproved('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-check"></i></a>
                              @else
                                <a href="payment-receipt.php" title="Payment Receipt"><i class="fas fa-file-alt"></i></a>
                              @endif
                            </li>
                          	<li><a href="#" title="Change Status"><i class="fas fa-exchange-alt"></i></a></li>
                          	<li><a onclick="deletePayment('{{ $data->id }}')" style="cursor: pointer;"><i class="fas fa-trash"></i></a></li>
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

<div class="modal" id="payment-details">
  <div class="modal-dialog">
    <div class="modal-content"> 
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Payment Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
		 <table class="table table-bordered table-fitems">
		 	<tr>
				<th>Total Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 1200</td> 
				<th>Paid Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 6</td> 
			</tr> 
			 
			<tr>
				<th>Balance Fee</th> 
				<td><i class="fas fa-rupee-sign"></i> 1194</td> 
				<th>Mode of Payment</th> 
				<td>Cheque/DD</td> 
			</tr> 
			
			<tr>
				<th>Cheque No.</th> 
				<td>3434343</td> 
				<th>Cheque Date</th> 
				<td>12.10.2020</td> 
			</tr> 
			 
			 <tr>
				<th>Bank Name</th> 
				<td>IndusInd</td> 
				<th>Bank Branch</th> 
				<td>Mumbai</td> 
			</tr> 
		 </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
      function markAsApproved(id) {
          swal({
              title: "Are you sure?",
              text: "Approved this payment",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              document.getElementById('loader').style.display ="block";
              if (willDelete) {
                  $.ajax({
                      method:'post',
                      url   : "{{ url('admin/student/payment/approved') }}",
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


    function deletePayment(id) {
          swal({
              title: "Are you sure?",
              text: "Delete this payment history.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              document.getElementById('loader').style.display ="block";
              if (willDelete) {
                  $.ajax({
                      method:'post',
                      url   : "{{ url('admin/student/payment-history/delete') }}",
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