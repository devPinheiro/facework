@extends('layouts.admin')

@section('title', '| Roles')

@section('content')

  <div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Roles
										</h3>
									</div>
                                </div>
                                 <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                                <a href="{{ URL::to('roles/create') }}" class="m-portlet__nav-link btn btn-success m-btn m-btn--pill m-btn--air"><i class="flaticon-add"></i> Add Role</a>                                
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                              
							<div class="m-portlet__body">
								<!--begin::Section-->
								<div class="m-section">
									<div class="m-section__content">
										<table class="table table-striped m-table">
											<thead>
                                                <tr>
                                                    <th>Role</th>
                                                    <th>Permissions</th>
                                                    <th>Operation</th>
                                                </tr>
											</thead>
											<tbody>
												 @foreach ($roles as $role)
                                                    <tr>

                                                        <td>{{ $role->name }}</td>

                                                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                                                        <td>
                                                        <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;"><i class="flaticon-edit-1"></i>Edit</a>

                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
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
							<!--end::Form-->
						</div>



@endsection