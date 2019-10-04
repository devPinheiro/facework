@extends('layouts.admin')

@section('title', '| Admin - Users')

@section('content')
 <div class="m-portlet ">
							<div class="m-portlet__body  m-portlet__body--no-padding">
								<div class="row m-row--no-padding m-row--col-separator-xl">
									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::Total Profit-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													All Active Members
												</h4>
												<br>
												<span class="m-widget24__desc">
													Active Members
												</span>
												<span class="m-widget24__stats m--font-brand">
													{{-- {{ count($user->roles()->pluck('name')->implode('') != 'Active') }} --}}
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
												
												</span>
												<span class="m-widget24__number">
													
												</span>
											</div>
										</div>
										<!--end::Total Profit-->
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::New Feedbacks-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													Uploaded Works
												</h4>
												<br>
												<span class="m-widget24__desc">
													Member Posts
												</span>
												<span class="m-widget24__stats m--font-info">
													{{ count($posts) }}
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													84%
												</span>
											</div>
										</div>
										<!--end::New Feedbacks-->
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::New Orders-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													New Users
												</h4>
												<br>
												<span class="m-widget24__desc">
													Newly Joined
												</span>
												<span class="m-widget24__stats m--font-danger">
													
													{{-- {{ count($users) - count($user->roles()->pluck('name')->implode('') != 'Active') }} --}}
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													69%
												</span>
											</div>
										</div>
										<!--end::New Orders-->
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::New Users-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													All Users
												</h4>
												<br>
												<span class="m-widget24__desc">
													All Members 
												</span>
												<span class="m-widget24__stats m--font-success">
													{{count($users)}}
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-success" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													10%
												</span>
											</div>
										</div>
										<!--end::New Users-->
									</div>
								</div>
							</div>
                        </div>
                        
    <h3 class="m-subheader__title ">
        <i class="fa fa-users"></i> User Administration
    </h3>
  
   <hr>

        <div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Registered Users
										</h3>
									</div>
                                </div>
                                 <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                                <a href="{{ route('users.create') }}" class="m-portlet__nav-link btn btn-success m-btn m-btn--pill m-btn--air"><i class="flaticon-user-add"></i> Add User</a>                                
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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Date/Time Added</th>
                                                    <th>User Roles</th>
                                                    <th>Operations</th>
                                                </tr>
											</thead>
											<tbody>
												 @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                                        <td>{{  $user->roles()->pluck('name')->implode(',') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                                        <td>
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;"><i class="flaticon-edit-1"></i></a>

                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
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