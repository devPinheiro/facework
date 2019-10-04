@extends('layouts.app')

@section('content')
<div class="container-fluid">
 <div class="row">
    
  <div class="m-content">
    
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Your Profile
                            </div>
                            <div class="m-card-profile__pic">
                                
                                <div class="m-card-profile__pic-wrapper">
                                    <span class="m-topbar__userpic">
                                        <img src="../../assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                    </span>
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">
                                      {{ $profile->name }}
                                </span>
                                <a href="" class="m-card-profile__email m-link">
                                      {{ $profile->email }}
                                </a>
                            </div>
                        </div>

                        <div class="m-portlet__body-separator"></div>

                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                   
                    <div class="m-portlet__head">

                        <div class="m-portlet__head-tools">
                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" aria-selected="true">
                                        <i class="flaticon-edit "></i>
                                        Update Profile
                                    </a>
                                </li>
                               
                               
                            </ul>
                        </div>

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
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">
                                                Personal Details
                                            </h3>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Name
                                        </label>
                                        <div class="col-5">
                                           <input class="form-control m-input" type="text" value="{{ $user->name }}">
                                        </div>
                                        <div class="col-7">
                                             <label for="example-text-input" class="col-2 col-form-label">
                                                E-mail
                                            </label>
                                            <input class="form-control m-input" type="text" value="{{ $user->email }}">
                                           
                                        </div>
                                    </div>
                                    
                                    
                                   
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Phone No.
                                        </label>
                                        c
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Ext.
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" value="1276">
                                        </div>
                                    </div>

                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                   
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">
                                                2. Next of Kin(s)
                                            </h3>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Address
                                        </label>
                                        <div class="col-5">
                                            <input class="form-control m-input" type="text" value="">
                                        </div>
                                        <div class="col-5">
                                            <input class="form-control m-input" type="text" value="">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Relationship
                                        </label>
                                        <div class="col-5">
                                            <input class="form-control m-input" type="text" value="">
                                        </div>
                                        <div class="col-5">
                                            <input class="form-control m-input" type="text" value="">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Portion
                                        </label>
                                        <div class="col-5">
                                            <input class="form-control m-input" type="text" value="">
                                        </div>
                                        <div class="col-5">
                                            <input class="form-control m-input" type="text" value="">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                           
                                        </label>
                                        <div class="col-7">
                                            <label class="m-option">
                                                <span class="m-option__control">
                                                    <span class="m-checkbox m-checkbox--primary m-radio--check-bold">
                                                        <input type="checkbox" name="chkAgree">
                                                        <span></span>
                                                    </span>
                                                </span>
                                                <span class="m-option__label">
                                                    <span class="m-option__head">
                                                        <span class="m-option__title">
                                                            Agree to Terms
                                                        </span>
                                                        
                                                    </span>
                                                    <span class="m-option__body">
                                                        By clicking this box, I declare that the information given above correct to the best of my knowledge and belief. I agree to abide by the fineprint of the society
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                </div>


                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-7">
                                                <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                    Save changes
                                                </button>
                                                &nbsp;&nbsp;
                                                <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 </div>
@endsection