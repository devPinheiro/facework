@extends('layouts.admin')

@section('title', '| Create Permission')
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
												<i class='fa fa-key'></i> Add Permissions
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								
									<div class="m-portlet__body">

                                        {{ Form::open(array('url' => 'permissions')) }}

                                        <div class="form-group m-form__group">
                                            {{ Form::label('name', 'Name') }}
                                            {{ Form::text('name', '', array('class' => 'form-control m-input m-input--solid')) }}
                                        </div><br>
                                        @if(!$roles->isEmpty()) //If no roles exist yet
                                            <h4>Assign Permission to Roles</h4>

                                            @foreach ($roles as $role) 
                                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                            @endforeach
                                        @endif
                                        <br>
                                        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                                        {{ Form::close() }}

                                                                    
                                                                        
                                                                    <!--end::Form-->
                            </div>
            </div>
    </div>
</div>


@endsection