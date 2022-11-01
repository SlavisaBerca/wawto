<div class="header-contact header-wishlist d-lg-flex pl-4 pr-sm-4 pr-2 ml-2">
    <a href="{{route('contact')}}" class="header-icon mr-0" title="Formular Contact"><i
            class="sicon-envelope"></i></a>
    <h6 class="text-capitalize"><span>Aveti intrebare?</span><a href="{{route('contact')}}">Contact</a>
    </h6>
</div>

<div class="header-contact d-lg-flex pr-sm-4 pr-2">
    <a data-toggle="modal" data-target="#socials" class="header-icon mr-0" title="login"><i class="icon-user-2"></i></a>
    <h6 class="text-capitalize"><span class="ls-n-20">Recele Sociale</span><a data-toggle="modal" data-target="#socials">Facebook
            / Gmail</a></h6>
</div>

<div class="separator"></div>

<div class="cart-dropdown-wrapper d-flex align-items-center pt-2">
    <span class="cart-subtotal text-right font2 mr-3">Wawto Login
        <span class="cart-price d-block font2">Click <i class="fa fa-hand-point-right"></i></span>
    </span>

    <div class="dropdown cart-dropdown">
        <a href="demo40.html#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <i class="sicon-login"></i>
           
            @if(session()->has('error'))
            <span class="cart-count badge-circle" style="background:red;"><i class="fa fa-exclamation-triangle" style="font-size:12px;"></i></span>
            @endif
           
            
       
        </a>

        <div class="cart-overlay"></div>

        <div class="dropdown-menu mobile-cart">
            <a style="cursor:pointer;" title="Inchide (Esc)" class="btn-close">×</a>

            <div class="dropdownmenu-wrapper custom-scrollbar">
                <div class="dropdown-cart-header">Formular Login</div>
                <!-- End .dropdown-cart-header -->

                <div class="dropdown-cart-products">
                   <form action="{{route('login')}}" method="post" id="this-login-form">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Email/Telefon *</label>
                            <input type="text" class="form-control" name="username" value="{{old('email')}}" >
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="col-md-12">
                            <label for="">Parola *</label>
                            <input type="password" class="form-control" name="password">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>
                       
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Tine ma logat
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a style="font-size:14px; color:blue;" href="{{ route('password.request') }}">
                               Ati uitat parola?
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="subaccount"> Intru ca angajat
                                </label>
                            </div>
                        </div>
                         <!--End form row-->
                         <div class="col-md-8">
                             @if(session()->has('error'))
                            <p class="text-danger">{{session()->get('error')}}</p>
                             @endif
                         </div>
                    </div>
                    </form>

                   
                </div>
                <!-- End .cart-product -->

                

                <div class="dropdown-cart-action">
                    <button  type="submit" form="this-login-form" class="btn btn-info btn-block">Login</button>
                   <a class="btn btn-primary btn-block" href="{{route('login-facebook')}}"><i style="font-size:16px;"class="icon-facebook"></i> Facebook</a>
                  <a  class="btn btn-danger btn-block" href="{{route('login-google')}}"><i style="font-size:16px;"class="fab fa-google"></i> Mail</a>
                </div>
                <!-- End .dropdown-cart-total -->
            </div>
            <!-- End .dropdownmenu-wrapper -->
        </div>
        <!-- End .dropdown-menu -->
    </div>
    <!-- End .dropdown -->
</div>


<div class="modal modal-md" tabindex="-1" role="dialog" id="socials">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Retele Sociale</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div class="row">
             <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cont Facebook
                    </div>
                    <div class="card-body">
						<?=$gs->facebook_text;?>
                        <a href="{{route('login-facebook')}}" class="btn btn-info" style="width:100%;"><i class="icon-facebook"></i> Facebook</a>
                    </div>
                </div>
             </div>
             <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Cont Gmail
                    </div>
                    <div class="card-body">
					<?=$gs->gmail_text;?>
                        <a href="{{route('login-google')}}" class="btn btn-danger" style="width:100%;"><i class="fab fa-google"></i> Google</a>
                    </div>
                </div>
             </div>
         </div>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>