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
												<i class='fa fa-key'></i> Send Notification
											</h3>
										</div>
									</div>
								</div>
								<!--begin::Form-->
								
									<div class="m-portlet__body">

                                        {{ Form::open(array('url' => route('broadcast.store'))) }}

                                        <div class="form-group m-form__group">
                                            {{ Form::label('title', 'Title') }}
                                            {{ Form::text('title', '', array('class' => 'form-control m-input m-input--solid')) }}
                                        </div><br>
                                      
                                        {{ Form::submit('Send', array('class' => 'btn btn-primary')) }}

                                        {{ Form::close() }}

                                                                    
                                                                        
                                                                    <!--end::Form-->
                            </div>
                            <div class="m-portlet__body">
                                <!--begin::Section-->
                                <div class="m-section">
                                    <div class="m-section__content">
                                        <table class="table table-striped m-table">
                                            <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Notifications as $notification)
                                        <tr>
                                            <td>{{ $notification->title }}</td> 
                                            <td>
                                            <a href="{{ route('broadcast.edit', $notification->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                            </td>
                                            <td>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['broadcast.destroy', $notification->id] ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                        
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end::Section-->
                        </div>
            </div>
    </div>
</div>


@endsection