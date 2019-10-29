@extends('layouts.app')

@section('content')
   
            <div class="col-lg-8 m-5">

                <div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text mb-5">
													Your Task Requests
												</h3>
											</div>
										</div>
									
									</div>


									<div class="container-fluid">
										<div class="row ">
												<div class="list-group">
													@if(count($tasks) === 0)
													<p> You don't have new tasks yet </p>
													@else
															@foreach ($tasks as $task)
															
																<a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
																	<div class="d-flex w-100 justify-content-between">
																		<img class="m-widget3__img " style="width:4.2rem;" src="../../images/logo.png" alt="">	
																		<h5 class="mb-1"> {{ $task->title }}</h5>
																		<small>{{ $task->created_at->diffForHumans() }}</small>
																	</div>
																	<p class="mb-1 pt-3">{{  $task->description }}</p>
																	<small><b>Deadline: </b> {{ $task->date }}</small>
																	<small><b>Location: </b> {{ $task->location }}</small>
																	<small><b>Contact: </b> {{ $task->phone }}</small>
																</a>

															@endforeach
														@endif

												</div>
												</div>
											</div>
										</div>
									</div>
                
                <div class="col-lg-4">
									
                </div>
         
@endsection
