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
                                        
                                        <a href="  {{ route('profile.create') }}" class="m-nav__link">
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
                   
                   
                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_user_profile_tab_1">
                        <form class="m-form m-form--fit m-form--label-align-right" method="post"  action="/profile/update/{{ $profile->id }}">
                            {{ csrf_field() }}    
                            <div class="m-portlet__body">
                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                        <div class="alert m-alert m-alert--default" role="alert">
                                         </div>
                                    </div>
                                   <div class="col-12">
                                            <h5 class="m-form__section">
                                               Update Profile
                                            </h5>
                                        </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">
                                            
                                            </h3>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group m-form__group row">
                                        
                                        <div class="col-lg-6">
                                        <label for="example-text-input" class=" col-form-label">
                                            Fullname
                                          </label>
                                        <input class="form-control m-input" type="text" name="name" value="{{ $profile->name }}">
                                        </div>
                                       
                                        <div class="col-lg-6">
                                            <label for="example-text-input" class=" col-form-label">
                                            Email
                                           </label>
                                            <input class="form-control m-input" type="text" name="email" value="{{ $profile->email }}">
                                            <input class="form-control m-input" type="hidden" name="role" value="{{ $profile->user->roles()->pluck('name')->implode('') }}">
                                        </div>
                                    </div>

                                     <div class="form-group m-form__group row">
                                        
                                        <div class="col-lg-6">
                                        <label for="example-text-input" class=" col-form-label">
                                            Phone
                                          </label>
                                        <input class="form-control m-input" type="text" name="phone" value="{{ $profile->phone }}">
                                        </div>
                                       
                                        <div class="col-lg-6">
                                            <label for="example-text-input" class=" col-form-label">
                                            Address
                                           </label>
                                            <input class="form-control m-input" type="text" name="address" value="{{ $profile->address }}">
                                        </div>
                                    </div>

                                     <div class="form-group m-form__group row">
                                        
                                        <div class="col-lg-6">
                                        <label for="example-text-input" class=" col-form-label">
                                            State
                                          </label>
                                        <input class="form-control m-input" type="text" name="state" value="{{ $profile->state }}">
                                        </div>
                                       
                                        <div class="col-lg-6">
                                            <label for="example-text-input" class=" col-form-label">
                                            Services (e.g. Web Developer, UI/UX Designer, Photographer)
                                           </label>
                                            <input class="form-control m-input" type="text" name="service" value="{{ $profile->service }}">
                                        </div>
                                    </div>

                                     <div class="form-group m-form__group row">
                                        
                                        <div class="col-lg-6">
                                        <label for="example-text-input" class=" col-form-label">
                                            About (Tell us about you)
                                          </label>
                                        <textarea class="form-control m-input" type="textarea" cols="3" name="about" value="{{ $profile->about }}"></textarea>
                                        </div>

                                        
                                       
                                    </div>
                                   
                                </div>


                                <div class="" style="padding-bottom:70px; padding-top:30px;">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-8 text-center">
                                                <button type="submit" class="btn btn-primary m-btn m-btn--air m-btn--custom">
                                                    Update
                                                </button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- Profile --}}

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active text-dark font-weight-bold" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Change Profile Picture</a>
                                    <a class="nav-item nav-link text-dark font-weight-bold" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Change Cover Image</a>
                                   
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                      <form class="m-form m-form--fit m-form--label-align-right" method="post" enctype="multipart/form-data" action="/profile/changeProfileImage/{{ $profile->id }}">
                                        {{ csrf_field() }}
                                        <div class="form-group m-form__group row">
                                            <div class="col-lg-6 pt-5 pb-5">
                                                <label for="example-text-input" class=" col-form-label">
                                                Change Avatar
                                                </label>
                                                <input class="form-control-file m-input" type="file" name="image">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                        
                                            <div class="m-form__actions">
                                                    
                                                <button type="submit" class="btn btn-primary m-btn m-btn--air">
                                                    Update Profile Image
                                                </button>
                                            
                                            </div>
                                        </div>
                                       </form>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <form class="m-form m-form--fit m-form--label-align-right" method="post" enctype="multipart/form-data" action="/profile/changeCoverImage/{{ $profile->id }}">
                                            {{ csrf_field() }}
                                            <div class="form-group m-form__group row">
                                                <div class="col-lg-6 pt-5 pb-5">
                                                    <label for="example-text-input" class=" col-form-label">
                                                    Change Cover Image
                                                    </label>
                                                    <input class="form-control-file m-input" type="file" name="coverImage">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                            
                                                <div class="m-form__actions">
                                            
                                                    <button type="submit" class="btn btn-primary m-btn m-btn--air ">
                                                        Update Cover Image
                                                    </button>
                                                
                                                </div>
                                            </div>
                                         </form>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>

                    
                </div>
            </div>

@endsection