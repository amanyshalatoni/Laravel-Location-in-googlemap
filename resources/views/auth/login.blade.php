@extends('_layout')

@section('content')

  <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="login-form" >
                        @csrf
                <h3 class="form-title font-green">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that--> 
                    <label class="control-label visible-ie8 visible-ie9">{{ __('E-Mail Address') }}</label>
                     <input style="direction: rtl; text-align: left" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Username" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                     </div>
                <div class="form-group">                         
                        <label class="control-label visible-ie8 visible-ie9">{{ __('Password') }}</label>

                    <input style="direction: rtl; text-align: left" placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
  <a  class="forget-password" id="forget-password" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password') }}
                                </a>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                 </div>
                                 
                <div style="border-bottom:0px" class="form-actions">
                                    @guest 
                                    <button type="submit" class="btn green uppercase">
                                    {{ __('Login') }}
                                </button>  
                                 @else
                                <?php
                                $user = \Auth::user();
                                $isAdmin=\DB::table("admin")->where("user_id",$user->id)->count();
                                $isclient=\DB::table("client")->where("user_id",$user->id)->count();
                                $adminUrl="/client/home/profile";
                                if($isAdmin){
                                    $adminUrl="/admin";
                                }
                                else if($isclient){
                                    $adminUrl="/client/home/profile";
                                }
                            ?>  
                                           <li class="nav-item dropdown">
                                <a href="#">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul>
                                    <li>
                                        <a href="{{$adminUrl}}">
                                            لوحة التحكم
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        تسجيل خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest                           
     </div>
       
             
                        <div class="squaredTwo" style="padding: 0;width: 380px;">{{ __('Remember Me') }}
	<input type="checkbox" value="1" id="squaredTwo" name="check" {{ old('remember') ? 'checked' : '' }} />
	<label class="rememberme check mt-checkbox mt-checkbox-outline" for="squaredTwo"></label>
</div>
                   
                 
         
                
                
                <div class="login-options">
                    <h4 style="float:left">Or login with</h4>
                    <ul style="float:right" class="social-icons">
                        <li>
                            <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
                        </li>
                    </ul>
                </div>
                <div class="create-account">
                    <p>
                        <a class="nav-link" href="/home/register">{{ __('Register as Client') }}</a>
                    </p>
                </div>
            </form>
            
           
@endsection