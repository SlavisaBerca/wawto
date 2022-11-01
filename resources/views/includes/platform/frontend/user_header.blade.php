<div class="header-contact header-wishlist d-lg-flex pl-4 pr-sm-4 pr-2 ml-2">
    <a href="{{route('contact')}}" class="header-icon mr-0" title="wishlist"><i
            class="sicon-envelope"></i></a>
    <h6 class="text-capitalize"><span>Aveti Intrebare</span><a href="{{route('contact')}}">Contact</a>
    </h6>
</div>

<div class="header-contact d-lg-flex pr-sm-4 pr-2">
    <a href="{{route('my-account')}}" class="header-icon mr-0" title="login"><i class="icon-user-2"></i></a>
    <h6 class="text-capitalize"><span class="ls-n-20">{{Auth::user()->name}}</span><a href="{{route('my-account')}}">Contul Meu</a></h6>
</div>

<div class="separator"></div>

<div class="cart-dropdown-wrapper d-flex align-items-center pt-2">
    <span class="cart-subtotal text-right font2 mr-3">Notificari
        <span class="cart-price d-block font2">Click <i class="fa fa-hand-point-right"></i></span>
    </span>

    <div class="dropdown cart-dropdown">
        <a href="demo40.html#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <i class="sicon-bell"></i>
            <span class="cart-count badge-circle counter" style="background:red;">0</span>
        </a>

        <div class="cart-overlay"></div>

        <div class="dropdown-menu mobile-cart">
            <a style="cursor:pointer;" title="Inchide (Esc)" class="btn-close">×</a>

            <div class="dropdownmenu-wrapper custom-scrollbar">
                <div class="dropdown-cart-header notification-counter"> Notificari</div>
                <!-- End .dropdown-cart-header -->

                <div class="dropdown-cart-products">
                <div id="notifications"></div>

                <h4>Ticket de support</h4>
                <form action="{{route('ticket')}}" method="post">
                {{csrf_field()}}
                <label for="">Nume/Firma *</label>               
                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">    
                <label for="">E-mail *</label>           
                <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">  
                <textarea name="msg" id="msg" cols="30" rows="10" class="form-control" placeholder="Trimiteti descriere de problema pe platforma"></textarea>
                <button type="submit" class="btn btn-success" style="width:100%;">Trimite</button>
                </form>
                </div>
                <!-- End .cart-product -->

                
                <!-- End .dropdown-cart-total -->
                @if(Auth::user()->account_type)
                <div class="dropdown-cart-action">
                    <a href="{{route('local-requests')}}" class="btn btn-info btn-block"><i class="icon-pin" style="font-size:16px;"></i> Cereri Teren Local</a>
                    <a href="{{route('national-requests')}}" class="btn btn-warning btn-block"><i class="fa fa-globe" style="font-size:16px;"></i> Cereri Teren National</a>
                </div>
                <!-- End .dropdown-cart-total -->
               
                @endif

                <div class="dropdown-cart-action mt-1">
                    <a class="btn btn-primary btn-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                                     
                </div>

               
            </div>
            <!-- End .dropdownmenu-wrapper -->
        </div>
        <!-- End .dropdown-menu -->
    </div>
    <!-- End .dropdown -->
</div>