@extends('layouts.admin')

@section('title', '| Create Permission')
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
												<i class='fa fa-key'></i> Create Job Listing
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								
									<div class="m-portlet__body">

                                        {{ Form::open(array('url' => route('job.store') , 'enctype' => 'multipart/form-data',)) }}

                                        <div class="form-group m-form__group">
                                            {{ Form::label('title', 'Job Title') }}
                                            {{ Form::text('title', null,  array('class' => 'form-control m-input m-input--solid')) }}
										</div><br>
										
										<div class="form-group m-form__group">
                                            {{ Form::label('description', 'Job Description') }}
                                            {{ Form::textarea('description',  null, array('class' => 'form-control m-input m-input--solid')) }}
										</div><br>

										<div class="form-group m-form__group">
                                            {{ Form::label('category_id', 'Job Category') }}
                                            {{ Form::select('category_id',  $categories, null, array('class' => 'form-control m-input m-input--solid')) }}
										</div><br>
										

										<div class="form-group m-form__group">
                                            {{ Form::label('position', 'Job Position') }}
                                            {{ Form::text('position',  null, array('class' => 'form-control m-input m-input--solid')) }}
										</div><br>

										<div class="form-group m-form__group">
                                            {{ Form::label('experience', 'Experience') }}
                                            {{ Form::text('experience',  null, array('class' => 'form-control m-input m-input--solid')) }}
										</div><br>
										
										<div class="form-group m-form__group">
                                            {{ Form::label('location', 'Location') }}
                                            {{ Form::text('location',  null, array('class' => 'form-control m-input m-input--solid')) }}
										</div><br>
										
										<div class="form-group m-form__group">
                                            {{ Form::label('dead_line', 'Deadline') }}
                                            {{ Form::text('deadline_date',  null, array('class' => 'form-control m-input m-input--solid')) }}
										</div><br>
										
										<div class="form-group m-form__group">
                                            {{ Form::label('salary', 'Salary') }}
                                            {{ Form::text('salary',   null,array('class' => 'form-control m-input m-input--solid')) }}
										</div><br>
										
										<div class="form-group m-form__group">
                                            {{ Form::label('link', 'Link to Job') }}
                                            {{ Form::text('link',  null, array('class' => 'form-control m-input m-input--solid')) }}
                                        </div><br>
                                      
                                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                                        {{ Form::close() }}

                                                                    
                                                                        
                                                                    <!--end::Form-->
                            </div>
                          
            </div>
    </div>
</div>


@endsection