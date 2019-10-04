@extends('layouts.app')

@section('content')

 <div class="col-lg-12">
           <div class="m-portlet m-portlet--full-height" style="background: linear-gradient(to bottom, rgba(22, 22, 22, 0.75) 0%, rgba(22, 22, 22, 0.75) 75%, rgba(22, 22, 22, 0.75) 100%), url('{{ $profile->coverImage}}');background: linear-gradient(to bottom, rgba(22, 22, 22, 0.75) 0%, rgba(22, 22, 22, 0.75) 75%, rgba(22, 22, 22, 0.75) 100%), url((unknown));
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-size: cover;
            width: 100%;
            padding: 20px 15px;
            margin: 15px 0;">
                    <div class="card_body __body text-center" style="padding:40px 0 ">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                
                            </div>
                            <div class="m-card-profile__pic">
                                
                                <div class="m-card-profile__pic-wrapper">
                                    <span class="m-topbar__userpic">
                                    <img src="{{ $profile->image }}" class="m--img-rounded m--marginless m--img-centered" alt="" style="    width: 140px;
    height: 120px;
    border-radius: 50%;"/>
                                    </span>
                                </div>
                            </div>
                            <div class="card_text_useername text-white" >
                                <div class="m-card-profile__name text-white" style="    padding: 15px 0 0 0;
                                font-weight: 500;
                                font-size: 1.0rem;">
                                      {{ $profile->name }}
                                </div>
                                <a href="" class="m-card-profile__email m-link text-white">
                                      {{ $profile->email }}
                                </a>
                            </div>
                        </div>

                      
                         
                    </div>
                </div>
            </div>


        
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                   
                    <div class="m-portlet__head">

                        <div class="m-portlet__head-tools">
                            
                          

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_user_profile_tab_1">
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                        <div class="alert m-alert m-alert--default" role="alert">
                                           
                                         </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-6">
                                            <h5 class="">
                                                Personal Details
                                            </h5>
                                        </div>
                                        <div class="col-6">
                                             <button type="button" class="btn btn-focus float-right" data-toggle="modal" data-target="#m_modal_4">
												Send me a Task
											</button>
                                        </div>
                                    </div>
                                      <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                    
                                    <div class="form-group m-form__group row">
                                        
                                        <div class="col-lg-6">
                                        <h6 for="example-text-input" class=" col-form-label">
                                            Fullname
                                        </h6>
                                            <p class="">
                                                {{ $profile->name }}
                                            </p>
                                        </div>
                                       
                                        <div class="col-lg-6">
                                           
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        
                                        <div class="col-lg-6">
                                        <h6 for="example-text-input" class=" col-form-label">
                                            Skill sets
                                        </h6>
                                            <p class="">
                                                {{ $profile->service }}
                                            </p>
                                        </div>
                                       
                                        <div class="col-lg-6">
                                            <h6 for="example-text-input" class=" col-form-label">
                                            City
                                            </h6>
                                            <p class="">
                                                {{ $profile->state }}
                                            </p>
                                        </div>
                                    </div>

                                   

                                    <div class="form-group m-form__group row">
                                         <div class="col-lg-12">
                                            <h6 for="example-text-input" class=" col-form-label">
                                            Bio
                                            </h6>
                                            <p class="">
                                                {{ $profile->about }}
                                            </p>
                                        </div>
                                    </div>

                                  
                                    
                                   
                                    
                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                   
                                    <div class="pt-5 pb-5">
                                            @if(count($profile->post) !== 0)
                                            <h6 class="text-left">{{$profile->user->name}}'s recent job</h6>
                                            <br>
                                            <div class="row">
                                                @foreach ($profile->post as $post)
  
                                                  <div class="col-md-4 p-3" >
                                                      <a href="{{ route('posts.show', $post->id ) }}">
  
                                                      <div class="card">
                                                      <div class="card-img-top img-fluid" style="height: 200px; background: url({{ $post->featured }}) no-repeat;     background-size: cover;" >
                                                          
                                                          </div>
                                                          
                                                          <div class="card-body">
                                                          <h6 class="text-dark">	{{ $post->title }}</h6>
                                                          <p class="card-text"> </p>
                                                          <div class="full row">
                                                              <div class="col-2 pr-0"><img src="{{ $post->profile->image }}" class="img-rounded" alt="" srcset=""></div>
                                                              <div class="col-7 pl-2 mb-0"><p class="card-text"><small class="text-dark">{{ $post->profile->name }}</small></p>
                                                          </div>
                                                              <div class="col-3"><p class="card-text"><small class="text-muted"><i class="fa fa-thumbs-up pl-2"></i> <strong>{{ $post->likes->count() }}</strong></small></p></div>
                                                      </div>
                                                          
                                                          </div>
                                                      </div>
  
                                                      </a>
                                                  </div>
  
                                                  @endforeach
                                              
                                          </div>
                                             @else
                                              <h6 class="text-center">{{$profile->user->name}} has no recent work to show case</h6>
											 @endif
										</div>

                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
         </div>
   
 </div>

 <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog modal-md" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Send Task
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">
                                    <form method="post" action="{{ route('task.store') }}">
                                          {{ csrf_field() }}

                                          @if(Auth::user()) 
                                           <div class="form-group">
												<label for="recipient-name" class="form-control-label">
													Your name:
												</label>
                                            <input type="text" name="client_name" value="{{ Auth::user()->profile->name }}" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
												<label for="recipient-name" class="form-control-label">
													Your phone:
												</label>
												<input type="text" name="phone" value="{{ Auth::user()->profile->phone }}" class="form-control" id="recipient-name">
                                                 <input type="hidden" name="user_id" value="{{  $profile->user->id }}" class="form-control" id="recipient-name">
                                            </div>
                                           @else
                                            
                                            <div class="form-group">
												<label for="recipient-name" class="form-control-label">
													Your name:
												</label>
												<input type="text" name="client_name" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
												<label for="recipient-name" class="form-control-label">
													Your phone:
												</label>
												<input type="text" name="phone" class="form-control" id="recipient-name">
                                                <input type="hidden" name="user_id" value="" class="form-control" id="recipient-name">

                                            </div>
                                            @endif


                                            <div class="form-group">
												<label for="recipient-name" class="form-control-label">
													Your request:
												</label>
                                                <input type="text" name="title" class="form-control" id="recipient-name">
                                                <small class="form-helper">Give it a title or short description</small>
											</div>
											<div class="form-group">
												<label for="message-text" class="form-control-label">
													Give more details about your request:
												</label>
												<textarea class="form-control" name="description" id="message-text"></textarea>
                                            </div>
                                            <div class="form-group">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                   <label for="recipient-name" class="form-control-label">
													Any deadline:
                                                  </label>
                                                  
                                                    <div class="input-group date">
                                                        <input type="text" name="date" class="form-control m-input" readonly="" placeholder="Select date" id="datepicker">
                                                       
                                                    </div>
                                                			 
                                                </div>
												<div class="col-md-6">
                                                   <label for="recipient-name" class="form-control-label">
													Your location:
												  </label>
												  <input type="text" name="location" class="form-control" id="recipient-name">
                                                </div>
												
											</div>
										
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Cancel
										</button>
										<button type="submit" class="btn btn-primary">
											Create Tasks
										</button>
                                    </div>
                                 </form>
								</div>
							</div>
						</div>
@endsection