@extends('layouts.admin')

@section('content')
   
<div class="row">
    <div class="col-sm-6">
       <div class="m-portlet m-portlet--tab">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<span class="m-portlet__head-icon m--hide">
												<i class="la la-gear"></i>
											</span>
											<h3 class="m-portlet__head-text">
												<i class='fa fa-globe'></i> Uppdate Settings
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								
									<div class="m-portlet__body">
       
     
                        <form action="{{ route('settings.update') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group m-form__group">
                                    <label for="Title">Site Name</label>
                                <input type="text" class="form-control m-input m-input--solid" name="site_name" value="{{ $settings->site_name }}" id="name">
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="Title">Contact Email</label>
                                    <input type="email" class="form-control  m-input m-input--solid" name="contact_email" value="{{ $settings->contact_email }}" id="name">
                                </div>

                                <div class="form-group m-form__group">
                                    <label for="Title">Contact Number</label>
                                    <input type="text" class="form-control  m-input m-input--solid" name="contact_number" value="{{ $settings->contact_number }}" id="name">
                                </div>
                                
                                <div class="form-group m-form__group">
                                    <label for="Title">Address</label>
                                    <input type="text" class="form-control  m-input m-input--solid" name="address" value="{{ $settings->address }}" id="name">
                                </div>

                                 <div class="form-group m-form__group">
                                    <label for="Title">Facebook Account</label>
                                    <input type="text" class="form-control  m-input m-input--solid" name="facebook" value="{{ $settings->facebook }}" id="name">
                                </div>

                                 <div class="form-group m-form__group">
                                    <label for="Title">Twitter Account</label>
                                    <input type="text" class="form-control  m-input m-input--solid" name="twitter" value="{{ $settings->twitter }}" id="name">
                                </div>

                                 <div class="form-group m-form__group">
                                    <label for="Title">Instagram</label>
                                    <input type="text" class="form-control  m-input m-input--solid" name="instagram" value="{{ $settings->instagram }}" id="name">
                                </div>
                                
                                <div class="form-group m-form__group">
                                    <div class="text-center">
                                        <button class="btn btn-success btn-block" type="submit">Update Settings</button>
                                    </div>
                                </div>
                            </form>
                                                <!--end::Form-->
                     </div>
            </div>
    </div>
</div>

@endsection