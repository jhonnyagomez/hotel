@extends('layouts.app')

@section('title','Edit customer')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.partial.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('customers.update',$customer) }}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->name }}">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Identification Document <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="identification_document" placeholder="Enter your number identification" autocomplete="off" value="{{ $customer->identification_document }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Address <strong style="color:red;">(*)</strong></label>
                                        	<div class="form-group label-floating">
                                        	    <div style="display:flex;">
											        <textarea class="form-control" name="address" rows="3" placeholder="Enter your address"> {{ old('address', $customer->address) }}</textarea>
                                        	    </div>
											</div>
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Phone Number <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="phone_number" placeholder="Enter your phone number" autocomplete="off" value="{{ $customer->phone_number }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Email<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="email" placeholder="email" autocomplete="off" value="{{ $customer->email }}">
										</div>
                                        <div class="row">
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Image</label>
                                                <input type="file" class="form-control-file" name="image" id="image">
												@if($customer->image)
        											<img src="{{ asset('uploads/customers/'.$customer->image) }}" alt="Customer Image" style="height: 70px; width: 70px">
    											@endif
                                            </div>
                                        </div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="registerby" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Edit</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('customers.index') }}" class="btn btn-danger btn-block btn-flat">Back</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection