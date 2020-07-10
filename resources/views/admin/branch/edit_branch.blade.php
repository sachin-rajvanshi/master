@extends('header.header')
@section('content')
<section class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="content-header">
          <h3 class="content-header-title">Branches</h3>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item">Branches</li>
            <li class="breadcrumb-item active">Add Branch</li>
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
					<form class="form-body" method="post" action="{{ url('admin/update/branch') }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group row justify-content-center">
							<div class="col-sm-4">
								<input type="hidden" name="id" value="{{ $data['college']->id }}">
								@if($data['college']->profile_pic)
									<img src="{{ $data['college']->profile_pic }}" id="image" class="img-fluid mb-3" style="height: 150px;"><br>
								@else
									<img src="{{ asset('') }}/images/usr.png" id="image" class="img-fluid mb-3" style="height: 150px;"><br>
								@endif
								<label class="label-control">Branch Profile</label>
								<input type="file" class="text-control" name="file" id="file" placeholder="Branch Profile" onchange="readURL(this);">
								@if($errors->has('file'))
									<span style="color: red;">{{ $errors->first('file') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Branch Name</label>
								<input type="text" class="text-control" name="branch_name" id="branch_name" placeholder="Enter Branch Name" value="{{ $data['college']->name }}">
								@if($errors->has('branch_name'))
									<span style="color: red;">{{ $errors->first('branch_name') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Branch Email</label>
								<input type="text" name="email" id="email" class="text-control" placeholder="Enter Branch Email" value="{{ $data['college']->email }}">
								@if($errors->has('email'))
									<span style="color: red;">{{ $errors->first('email') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Branch Mobile</label>
								<input type="text" name="mobile_number" id="mobile_number" class="text-control" placeholder="Enter Branch Mobile" value="{{ $data['college']->mobile_number }}">
								@if($errors->has('mobile_number'))
									<span style="color: red;">{{ $errors->first('mobile_number') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Branch Address</label>
								<input type="text" name="branch_address" id="branch_address" class="text-control" placeholder="Enter Branch Address" value="{{ $data['college']->branch_address }}">
								@if($errors->has('branch_address'))
									<span style="color: red;">{{ $errors->first('branch_address') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Branch State</label>
								<select class="text-control" name="state_id" id="state_id">
									<option value="">Select State</option>
									@foreach($data['states'] as $state)
										@if($data['college']->state_id == $state->id)
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
								<label class="label-control">Branch City</label>
								<select class="text-control" name="city_id" id="city_id">
									<option value="">Select City</option>
									@foreach($data['cities'] as $city)
										@if($data['college']->city_id == $city->id)
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
						</div>
						
						<div class="form-group row">
							<div class="col-sm-4">
								<label class="label-control">Contact Person Name</label>
								<input type="text" class="text-control" placeholder="Enter Person Name" name="contact_person_name" id="contact_person_name" value="{{ $data['college']->contact_person_name }}">
								@if($errors->has('contact_person_name'))
									<span style="color: red;">{{ $errors->first('contact_person_name') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Contact Person Mob</label>
								<input type="text" class="text-control" placeholder="Enter Person Mobile" name="contact_person_mobile" id="contact_person_mobile" value="{{ $data['college']->contact_person_mobile }}">
								@if($errors->has('contact_person_mobile'))
									<span style="color: red;">{{ $errors->first('contact_person_mobile') }}</span>
								@endif
							</div>
							
							<div class="col-sm-4">
								<label class="label-control">Branch Code</label>
								<input type="text" class="text-control" name="branch_code" id="branch_code" value="{{ $data['college']->branch_code }}">
								@if($errors->has('branch_code'))
									<span style="color: red;">{{ $errors->first('branch_code') }}</span>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-dark">Update College</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content-wrapper -->
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection