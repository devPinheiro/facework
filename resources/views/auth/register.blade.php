@extends('auth.authLayout')

@section('content')
                       <style>
                       .m-login.m-login--2.m-login--signin .m-login__signup{
                                display: block !important;
                          }
                       </style>
                       <div class="m-login__signup">
							<div class="m-login__head">
								<h3 style="    color: #3e3f94" class="m-login__title">
									Sign Up
								</h3>
								<div class="m-login__desc">
									Enter your details to create your account:
								</div>
							</div>
                            <form class="m-login__form m-form"  method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
								<div class="form-group m-form__group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input style="    border: 1px solid #3f3f95;" class="form-control m-input" type="text" placeholder="Name" name="name">
                                     @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                     @endif
								</div>
								<div class="form-group m-form__group{{ $errors->has('email') ? ' has-error' : '' }}">
									<input style="    border: 1px solid #3f3f95;" class="form-control m-input" type="text" placeholder="Email"  name="email" autocomplete="off">
                                      @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                     @endif
                                </div>
								<div class="form-group m-form__group{{ $errors->has('password') ? ' has-error' : '' }}">
									<input style="    border: 1px solid #3f3f95;" class="form-control m-input" type="password" placeholder="Password"  name="password">
                                     @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                     @endif
                                </div>
								<div class="form-group m-form__group">
									<input style="    border: 1px solid #3f3f95;" class="form-control m-input m-login__form-input--last" id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation">
								</div>
								<div class="row form-group m-form__group m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox">
											<input type="checkbox" name="agree">
											I Agree to the
											<a href="#" class="m-link m-link--focus">
												terms and conditions
											</a>
											.
											<span></span>
										</label>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="m-login__form-action">
									<button style="color:#fff; background:#3d3e91;"  type="submit"  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
										Sign Up
									</button>
									&nbsp;&nbsp;
									
								</div>
							</form>
                        </div>
                    
@endsection
