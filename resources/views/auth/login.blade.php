
@extends('auth.authLayout')
@section('content')
  
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 style="    color: #3e3f94" class="m-login__title">
									Sign In 
								</h3>
							</div>
                                <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                                   {{ csrf_field() }}
                                
            
                                
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-form__group">
									<input style="    border: 1px solid #3f3f95;" class="form-control m-input" value="{{ old('email') }}" required autofocus id="email"  type="email" placeholder="Email" name="email" autocomplete="off">
                                     
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                
                                
								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-form__group">
									<input style="    border: 1px solid #3f3f95;" class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                                      @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                      @endif
                                
                                </div>
                                
                               
								<div class="row m-login__form-sub">
									<div class="col m--align-left m-login__form-left">
										<label class="m-checkbox  m-checkbox">
											<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
											Remember me
											<span></span>
										</label>
									</div>
									<div class="col m--align-right m-login__form-right">
                                        <a class="m-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
										
									</div>
								</div>
								<div class="form-group text-center">
									<button  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
										Sign In
                                    </button>
								</div>
							</form>
                        </div>
                        


						
						<div class="m-login__account">
							<span class="m-login__account-msg">
								Don't have an account yet ?
							</span>
							&nbsp;&nbsp;
							<a href="/register"  style="    color: #3e3f94" class="m-link m-link--light m-login__account-link">
								Sign Up
                            </a>
						</div>
				
@endsection
    

