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


            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                       
                         <div class="m-card-profile-details">
                          <ul class="m-nav m-nav--skin-light sidebar_ul">
                         
                                  <li class="m-nav__item">
                                      <a href="{{ route('profile.index', Auth::user()->id ) }}" class="m-nav__link">
                                        <i class="ion-ios-speedometer-outline"></i>
                                        <span class="m-nav__link-title">
                                          <span class="m-nav__link-wrap">
                                            <span class="m-nav__link-text">
                                               Dashboard
                                            </span>
                                            <span class="m-nav__link-badge">
                                             
                                            </span>
                                          </span>
                                        </span>
                                      </a>
                                    </li>
                                
                                    @role('Admin') {{-- Laravel-permission blade helper --}}
                                    <li class="m-nav__item">
                                      <a href="/users" class="m-nav__link">
                                        <i class="ion-ios-speedometer-outline"></i>
                                        <span class="m-nav__link-title">
                                          <span class="m-nav__link-wrap">
                                            <span class="m-nav__link-text">
                                              Visit Admin Dashboard
                                            </span>
                                            <span class="m-nav__link-badge">
                                              <span class="m-badge m-badge--success">
                                                
                                              </span>
                                            </span>
                                          </span>
                                        </span>
                                      </a>
                                    </li>
                             
                                    @endrole
                                    
                                    <li class="m-nav__item">
                                        
                                        <a href=" {{ route('profile.edit', Auth::user()->id ) }}" class="m-nav__link">
                                            <i class="ion-ios-compose-outline"></i>
                                            <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                    <span class="m-nav__link-text">
                                                        Edit Profile
                                                    </span>
                                                    
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                
                                    <li class="m-nav__item">
                                        
                                        <a href="  {{ route('posts.create') }}" class="m-nav__link">
                                            <i class="ion-ios-upload-outline"></i>
                                            <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                    <span class="m-nav__link-text">
                                                        Upload Work
                                                    </span>
                                                    
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                
                                   
                                    
                                    <li class="m-nav__item">
                                            <a href="{{ route('task.show', Auth::user()->id) }}" class="m-nav__link">
                                                <i class="ion-ios-email-outline"></i>
                                                <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                    <span class="m-nav__link-text">
                                                    Messages
                                                    </span>
                                                <span class="m-nav__link-badge">
                                                        <span class="m-badge m-badge--success">
                                                            {{-- {{ Auth::user()->task->count() }} --}}
                                                        </span>
                                                </span>
                                            </span>
                                            </span>
                                        </a>
                                    </li>
                                    
                                    
                                
                                
                                    <li class="m-nav__item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="m-nav__link">
                                            <i class="ion-ios-close-outline"></i>
                                            <span class="m-nav__link-text">
                                                Log out
                                            </span>
                                        </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                   
                    <div class="m-portlet__head">

                        <div class="m-portlet__head-tools">
                          
                        </div>

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_user_profile_tab_1">


        <div class=" pt-5 pl-5 pr-5 pb-5">
							<div class="card-body">
								
										<h5 class="m-portlet__head-text">
											Upload Work
										</h3>
								
							</div>
							<!--begin::Form-->
							
                                 {{ Form::open(array('route' => 'posts.store' , 'enctype' => 'multipart/form-data', 'class' => 'm-form m-form--fit m-form--label-align-right')) }}
								 {{ csrf_field() }}
								 <div class="card-body">
									<div class="form-group m-form__group  row">
                                        {{ Form::label('title', 'Title', array('style'=> 'padding-left:0px','class' => 'col-form-label text-left col-lg-2-offset-1 col-sm-12')) }}
                                       {{ Form::text('title', null, array('class' => 'form-control col-lg-6 col-sm-12')) }}       
										
									<input type="hidden" value="{{ Auth::user()->profile->id }}" name="profile_id" >
									</div>

									<div class="form-group m-form__group row">
                                        {{ Form::label('featured', 'Featured Image', array('style'=> 'padding-left:0px','class' => 'col-form-label text-left col-lg-2-offset-1 col-sm-12')) }}

										{{ Form::file('featured', array('class' => 'form-control-file col-lg-6 col-sm-12')) }}  
										
										
									</div>
									<div class="form-group m-form__group row">
                                         {{ Form::label('body', 'Content', array('style'=> 'padding-left:0px','class' => 'col-form-label text-left col-lg-2-offset-1 col-sm-12')) }}
                                         {{ Form::textarea('body', null, array('class' => 'form-control col-lg-6')) }}
            
										
									</div>
								</div>
							
										<div class="row">
											<div class="col-lg-12">
                                                 {{ Form::submit('Create Post', array('class' => 'btn btn-primary')) }}
                                              {{ Form::close() }}
												
												
											</div>
										</div>
								
							</form>
							<!--end::Form-->
                        </div>
    
                            
                        </div>
                    </div>

                    
                </div>
            </div>
 
@endsection