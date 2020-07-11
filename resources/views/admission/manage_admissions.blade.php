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
@if(session()->has('success'))
    <div class="alert alert-success" id="hideAlert">
        {{ session()->get('success') }}
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
                    @foreach($datas as $data)
                      <td>
                        @php
                          $dt = new DateTime($data->created_at);
                          $tz = new DateTimeZone('Asia/Kolkata');
                          $dt->setTimezone($tz);
                          $dateTime = $dt->format('d.m.Y h:i A');
                        @endphp
                        {{ $dateTime }}
                      </td>
                      <td>{{ $data->college_enrollment_number }}</td>
                      <td>{{ $data->getCollege['name'] }}</td>
                      <td>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</td>
                      <td>{{ $data->mobile_number }}</td>
                      <td>{{ $data->getCourse['course_name'] }}</td>
                      <td>{{ $data->getUniversity['name'] }}</td>
                      <td>{{ $data->getState['name'] }} / {{ $data->getCity['name'] }}</td>
                      <td><i class="fas fa-rupee-sign"></i> {{ $data->admission_fees }}</td>
                      <td><i class="fas fa-rupee-sign"></i> {{ $data->paidsum }}</td>
                      <td><i class="fas fa-rupee-sign"></i> 160</td>
                      <td>
                        @if($data->admission_created_by)
                          Admin
                        @else
                          Online
                        @endif
                      </td>
                      <td>{{ $data->status }}</td>
                      <td>
						            <ul class="action">
                          	<li><a href="{{ url('admin/view/student-profile') }}/{{ $data->id }}" title="View Student"><i class="fas fa-eye"></i></a></li>
                          	<li><a href="{{ url('admin/edit/student-profile') }}/{{ $data->id }}" title="Edit Student"><i class="fas fa-pencil-alt"></i></a></li>
                          	<li><a href="{{ url('admin/student/payment-history') }}/{{ $data->id }}" title="Payment History"><i class="fas fa-rupee-sign"></i></a></li>
                          	<li><a href="#" title="Change Status"><i class="fas fa-exchange-alt"></i></a></li>
                          	<li><a title="Delete Student" onclick="deleteAdmission('{{ $data->id }}')"><i class="fas fa-trash"></i></a></li>
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
<script type="text/javascript">
  function deleteAdmission(id) {
          swal({
              title: "Are you sure?",
              text: "Delete this admission.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              document.getElementById('loader').style.display ="block";
              if (willDelete) {
                  $.ajax({
                      method:'post',
                      url   : "{{ url('admin/admission/delete') }}",
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