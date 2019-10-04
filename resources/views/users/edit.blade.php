@extends('layouts.admin')

@section('title', '| Edit User')

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
												<i class='fa fa-user-plus'></i> Edit {{$user->name}}
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								
									<div class="m-portlet__body">

                                        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

                                         {{ csrf_field() }}
                                            <div class="form-group m-form__group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                {{ Form::label('name', 'Name') }}
                                                {{ Form::text('name', null, array('class' => 'form-control m-input m-input--solid')) }}
                                                 @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                @endif
                                            </div>

                                            <div class="form-group m-form__group">
                                                {{ Form::label('email', 'Email') }}
                                                {{ Form::email('email', null, array('class' => 'form-control m-input m-input--solid')) }}
                                            </div>

                                            <div class='form-group m-form__group'>
                                                @foreach ($roles as $role)
                                                    {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                                                    {{ Form::label($role->name, ucfirst($role->name)) }}
                                                @endforeach
                                            </div>

                                            <div class="form-group m-form__group">
                                                {{ Form::label('password', 'Password') }}<br>
                                                {{ Form::password('password', array('class' => 'form-control m-input m-input--solid')) }}

                                            </div>
                                            
                                            <div class="form-group  m-form__group">
                                                {{ Form::label('password', 'Confirm Password') }}<br>
                                                {{ Form::password('password_confirmation', array('class' => 'form-control m-input m-input--solid')) }}

                                            </div>

                                            {{ Form::submit('Update', array('class' => 'btn btn-primary btn-block')) }}

                                            {{ Form::close() }}
										
									
								<!--end::Form-->
                            </div>
            </div>
    </div>
</div>

   

@endsection