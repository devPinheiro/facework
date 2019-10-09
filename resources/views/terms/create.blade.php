@extends('layouts.admin')

@section('title', '| Create Terms and Conditions ')
@section('content')
<div class="row">
    <div class="col-sm-8">
       <div class="m-portlet m-portlet--tab">
								<div class="m-portlet__head">
									<div class="m-portlet__head-caption">
										<div class="m-portlet__head-title">
											<span class="m-portlet__head-icon m--hide">
												<i class="la la-gear"></i>
											</span>
											<h3 class="m-portlet__head-text">
												<i class='fa fa-key'></i> Terms and Conditions
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								
										
										<div class="form-group m-form__group">
                                            {{ Form::label('body', 'Terms and Conditions') }}
                                            {{ Form::textarea('body',  null, array('class' => 'form-control m-input m-input--solid')) }}
										</div><br>

                                      
                                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                                        {{ Form::close() }}

                                                                    
                                                                        
                                                                    <!--end::Form-->
                            </div>
                          
            </div>
    </div>
</div>


@endsection