@extends('layouts.admin')

@section('title', '| Edit Permission')

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
												<i class='fa fa-key'></i> Edit
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								
									<div class="m-portlet__body">
    
    {{ Form::model($broadcast, array('route' => array('broadcast.update', $broadcast->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

    <div class="form-group m-form__group">
        {{ Form::label('title', 'Broadcast ') }}
        {{ Form::text('title', null, array('class' => 'form-control m-input m-input--solid')) }}
    </div>
    <br>
    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

                                     
                                                                    <!--end::Form-->
                            </div>
            </div>
    </div>
</div>

@endsection