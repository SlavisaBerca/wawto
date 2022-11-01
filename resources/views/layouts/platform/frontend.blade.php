<?php 
$gs = generalsetting();
?>
<!DOCTYPE html>
<html lang="en">
 <script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        if (window.history && history.pushState) {
            window.history.pushState("", document.title, window.location.pathname);
        } else {
            // Prevent scrolling by storing the page's current scroll offset
            var scroll = {
                top: document.body.scrollTop,
                left: document.body.scrollLeft
            };
            window.location.hash = '';
            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scroll.top;
            document.body.scrollLeft = scroll.left;
        }
    }
</script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{$gs->site_title}}</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="{{$gs->site_title}}">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{URL::to('platform/frontend/assets/images/logo/'.$gs->site_logo)}}">

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800', 'Segoe+Script:300,400,500,600,700,800', 'Lato:300,400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{URL::to('platform/frontend/assets/js/webfont.js')}}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{URL::to('platform/frontend/assets/css/bootstrap.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{URL::to('platform/frontend/assets/css/demo40.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('platform/frontend/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('platform/frontend/assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
</head>

<style>
    body{
        overflow: hidden;
    }
@media(max-width: 800px) {
  .info-box {
    display:none ;
  }
}
}
	
</style>
<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-left top-notice d-none d-md-flex p-0 font2 d-flex">
                       @guest 
					   <i class="fa fa-envelope"></i> {{$gs->main_email}}
					   @endguest
					   @auth 
					     <i class="fa fa-envelope"></i> {{Auth::user()->email}}
					   @endauth
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right header-dropdowns ml-auto w-sm-100 justify-content-end">
                        
                        
                    @auth()
                    <?php $show_rules = 1;?>
                    @endauth 

                    @guest 
                    <?php $show_rules = 0;?>
                    @endguest
                       

                      

                        <div class="info-box-container align-items-center">
                            @foreach($gs->menu as $menu)                          
                           


                            @if($menu->is_header && $menu->show_rules == $show_rules || !$menu->show_rules)
                            <div class=" info-box info-box-icon-left">
                                <i class="{{$menu->menu_icon}}"></i>

                                <div class="info-box-content">
                                   <a href="/{{$menu->menu_url}}"> <h4>{{$menu->menu_title}}</h4></a>
                                </div>
                                <!-- End .info-box-content -->
                            </div>
                            <!-- End .info-box -->
                            @endif
                            @endforeach
                         

                         
                                <div class="separator"></div>


                                <div class="header-dropdown mr-0 pl-2 font2">
                                    <a href="#"><i class="flag-us flag"></i>ENG</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                                            </li>
                                            <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>
                                        </ul>
                                    </div>
                                    <!-- End .header-menu -->
                                </div>
                                <!-- End .header-dropown -->
                            
                        </div>
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>

            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container-fluid">
                    <div class="header-left" style="width:100%;">
                        <button class="mobile-menu-toggler text-primary mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="/" class="logo">
                            <img src="{{URL::to('platform/frontend/assets/images/logo/'.$gs->site_logo)}}" alt="Porto Logo" style="width:100%;">
                        </a>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right w-lg-max">
                        <div class="header-icon header-search header-search-inline header-search-category d-sm-block d-none w-lg-max text-right mt-0">
                            <a href="/" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form id="search-lg" method="get" action="{{route('search')}}">
                                <div class="header-search-wrapper mr-1">
                                    <input type="search" class="form-control" name="search" id="q" placeholder="Cautare pe site..." required>
                                    <div class="select-custom">
                                        <select id="srch" name="srch">
                                            <option value="">Cautare</option>
                                            <option value="1">---Furnizori(Nume, Email, Tel, Cui, J)</option>
                                            <option value="2">--- Continut(Cuvinte)</option>

                                            @auth

                                            @if(Auth::user()->account_type===1)
                                            <option value="3">--- Cereri(Numar, Judet, Domeniu, Oras)</option>
                                           @endif

                                           @endauth
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>
                        </div>
                        <!-- End .header-search -->

                     @guest 

                        @include('includes.platform.frontend.guest_header')

                     @endguest 



                     @auth 

                     @include('includes.platform.frontend.user_header')

                     @endauth
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->
        </header>
        <!-- End .header -->

        <main class="main home">
            <div class="container-fluid p-0">
                <div class="row m-0">
                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                    <aside class="col-lg-3 order-lg-first sidebar-home mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="side-menu-wrapper text-uppercase border-0 font2">
                            @foreach($gs->category as $cat)
                                <h2 class="side-menu-title ls-n-10 pb-2">{{$cat->cat_title}}</h2>

                                <nav class="side-nav">
                                    <ul class="menu menu-vertical sf-arrows d-block no-superfish">
                                        @foreach($cat->subcategory as $sbcategory)
                                        <li>
                                            <a href="">{{$sbcategory->subcat_title}}<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                @foreach($sbcategory->domain as $domain)

                                                <li>
                                                <a href="{{route('send-request',$domain->domain_url)}}">{{$domain->domain_title}}</a>
                                                <ul>
                                                    <li><a href="{{route('send-request',$domain->domain_url)}}">Cerere de oferta</a></li>
                                                    @if($domain->fast_request)
                                                    <li><a href="{{route('quick-request',$domain->domain_url)}}">Formular Rapid</a></li>
                                                    @endif
                                                </ul>
                                                </li>
                                               
                                               @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                                @endforeach
                            </div>
                            <!-- End .side-menu-container -->
                        </div>
                        <!-- End .sidebar-wrapper -->
                    </aside>
                    <!-- End .col-lg-3 -->


                    @yield('content')



                   <footer class="footer font2">
                                <div class="footer-top appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                                    <div class="widget-newsletter d-flex align-items-center align-items-sm-start flex-column flex-xl-row  justify-content-xl-between">
                                        <div class="widget-newsletter-info text-center text-sm-left d-flex flex-column flex-sm-row align-items-center mb-1 mb-xl-0">
                                            <i class="icon-envolope"></i>
                                            <div class="widget-info-content">
                                                <h5 class="widget-newsletter-title mb-0">
                                                    Abonament Sistem</h5>
                                                <p class="widget-newsletter-content mb-0">Wawto abonament sistem pentru noutatile....
                                                </p>
                                            </div>
                                        </div>
                                        <form action="{{route('newsletter')}}" method="post" class="mb-0 w-lg-max mt-2 mt-md-0">
											{{csrf_field()}}
                                            <div class="footer-submit-wrapper d-flex align-items-center">
                                                <input type="email" class="form-control mb-0" placeholder="E-mail Adresa" size="40" name="email" required>
                                                <button type="submit" class="btn btn-primary btn-sm text-transform-none">Trimiteti!</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="footer-middle">
                                    <div class="row">
                                        @foreach($gs->footer as $col)
                                        <?=$col->html;?>
                                       @endforeach
                                       <div class="col-md-6 col-lg-3">
                                            <div class="widget">
                                                <h3 class="widget-title">Linkuri Importante</h3>
                                                <div class="widget-content">
                                                 
													<ul>
                                                        @foreach($gs->link as $li)                                                  

                                                       <?=$li->html;?>
													   
                                                        @endforeach
                                                    </ul>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="widget">
                                                <h3 class="widget-title">Meniu de subsol</h3>
                                                <div class="widget-content">
                                                    <ul>
                                                        @foreach($gs->menu as $fmenu)
                                                        @if($fmenu->is_footer)
                                                        <li><a href="{{$fmenu->menu_url}}">{{$fmenu->menu_title}}</a></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-6 col-lg-3">
                                            <div class="widget">
                                                <h3 class="widget-title">Urmariti Ne</h3>
                                                <div class="widget-content">
                                                    <div class="social-icons">
                                                        <a href="demo40.html#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                                        <a href="demo40.html#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                                        <a href="demo40.html#" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget">
                                                <h3 class="widget-title">Inregistrare</h3>
                                                <div class="widget-content">
                                                    <div class="social-icons">
                                                        <a href="{{route('login-facebook')}}" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                                     
                                                        <a href="{{route('login-google')}}" class="social-icon social-instagram fab fa-google" target="_blank" title="Gmail"></a>
                                                        <a href="{{route('register')}}" class="social-icon social-instagram" target="_blank" title="Wawto">W</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-bottom d-sm-flex align-items-center">
                                    <div class="footer-left">
                                        <span class="footer-copyright">{{$gs->copyright}}</span>
                                    </div>

                                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                                        <div class="payment-icons mr-0">
                                            <span class="payment-icon visa" style="background-image: url(../frontend/assets/images/payments/payment-visa.svg)"></span>
                                            <span class="payment-icon paypal" style="background-image: url(../frontend/assets/images/payments/payment-paypal.svg)"></span>
                                            <span class="payment-icon stripe" style="background-image: url(../frontend/assets/images/payments/payment-stripe.png)"></span>
                                            <span class="payment-icon verisign" style="background-image:  url(../frontend/assets/images/payments/payment-verisign.svg)"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .footer-bottom -->
                            </footer>
                            <!-- End .footer -->
                </div>
            </div>
        </div>
    </div>
</main>
<!-- End .main -->
</div>
<!-- End .page-wrapper -->

<div class="loading-overlay">
<div class="bounce-loader">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
</div>
</div>

<div class="mobile-menu-overlay"></div>
<!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="/">Acasa</a></li>
					@foreach($gs->menu as $mobmen)
					@if($mobmen->is_header)
					<li><a href="/{{$mobmen->menu_url}}">{{$mobmen->menu_title}}</a></li>	
					@endif
					@endforeach
					<li><a href="{{route('contact')}}">Contact</a></li>
					
                    <li>
                        <a href="">Categorii</a>
					
                        <ul>
							@foreach($gs->category as $mobcat)
                            <li><a href="category.html">{{$mobcat->cat_title}}</a>
							<ul> 
							@foreach($mobcat->domain as $mobdom)
								<li><a href="">{{$mobdom->domain_title}}</a>
								<ul>
									<li><a href="{{route('send-request',$mobdom->domain_url)}}">Cerere de oferta</a></li>
									@if($mobdom->fast_request)
									<li><a href="{{route('quick-request',$mobdom->domain_url)}}">Cerere formular rapid</a></li>
									@endif
								</ul>
								</li>
							@endforeach
							</ul>
					
							</li>
                      @endforeach
                        </ul>
                    </li>
                  </ul>
            </nav>
            <!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="/search">
                <input type="text" class="form-control mb-0" name="search"  placeholder="Cauta pe site..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="{{route('login-facebook')}}" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="{{route('login-google')}}" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="demo40.html#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div>
<!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->
  @guest
    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="/">
                <i class="icon-home"></i>Acasa
            </a>
        </div>
		<div class="sticky-info">
            <a href="{{route('register')}}" class="">
                <i class="icon-user-2"></i>Inregistrare
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{route('login-facebook')}}" class="">
                <i class="icon-facebook"></i>Login Facebook
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{route('login-google')}}" class="">
                <i class="fab fa-google mt-1"></i>Gmail Login
            </a>
        </div>
        
        <div class="sticky-info">
            <a href="{{route('contact')}}" class="">
                <i class="sicon-envelope position-relative">
                   
                </i>Contact
            </a>
        </div>
    </div>
@endguest
@auth 
<div class="sticky-navbar">
        <div class="sticky-info">
            <a href="/">
                <i class="icon-home"></i>Acasa
            </a>
        </div>
		<div class="sticky-info">
            <a href="{{route('my-account')}}" class="">
                <i class="icon-user-2"></i>Contul Meu
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{route('suppliers')}}" class="">
                <i class="sicon-users"></i>Furnizori
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{route('contact')}}" class="">
                <i class="sicon-envelope"></i>Contact
            </a>
        </div>
        
        <div class="sticky-info">
              <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="sicon-logout position-relative">
                   
                </i>Logout
            </a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
        </div>
    </div>
	
	@endauth
@if(session('visited'))
<div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(assets/images/newsletter_popup_bg.jpg)">
<div class="newsletter-popup-content">
    <img src="assets/images/logo-black.png" alt="Logo" class="logo-newsletter" width="111" height="44">
    <h2>Subscribe to newsletter</h2>

    <p>
        Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
    </p>

    <form action="demo40.html#">
        <div class="input-group">
            <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
            <input type="submit" class="btn btn-primary" value="Submit" />
        </div>
    </form>
    <div class="newsletter-subscribe">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
            <label for="show-again" class="custom-control-label">
                Don't show this popup again
            </label>
        </div>
    </div>
</div>
<!-- End .newsletter-popup-content -->

<button title="Close (Esc)" type="button" class="mfp-close">
    ×
</button>
</div>
<!-- End .newsletter-popup -->
@endif
<a id="scroll-top" href="demo40.html#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<!-- Plugins JS File -->
<script src="{{URL::to('platform/frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/assets/js/optional/custom/search_settings.js')}}"></script>
<script src="{{URL::to('platform/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/assets/js/optional/isotope.pkgd.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/assets/js/plugins.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/assets/js/jquery.plugin.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/assets/js/jquery.appear.min.js')}}"></script>
<script src="{{URL::to('platform/frontend/assets/js/jquery.countdown.min.js')}}"></script>

<!-- Main JS File -->
<script src="{{URL::to('platform/frontend/assets/js/main.min.js')}}"></script>

@stack('scripts')
@auth
<script>
    $(document).on('click','.delete-notification',function(){
        var id= $(this).attr('data-id');
        $.ajax({
            url:'/delete-notification/'+id,
            method:'get',
            success:function(){
               getNotifications();
               check();
            }
        })
    });
function check(){
    $.ajax({
    url: '/refresh-notification-count', 
    success: function(data) {
      $('.counter').html(data);
      $('.notification-counter').html('Notificari '+data);
      
    },
});
}
</script>
<script>
    (function worker() {
  $.ajax({
    url: '/refresh-notification-count', 
    success: function(data) {
      $('.counter').html(data);
      $('.notification-counter').html('Notificari '+data);
         getNotifications();
    },
    complete: function() {
      // Schedule the next request when the current one's complete
      setTimeout(worker, 7000);
    }
  });
})();
function getNotifications(){
    $.ajax({
    url:'/json-notifications',
        success:function(data){
            
            var html='';
            
           
            for(var i=0; i<data.length; i++){
               
                    html+=' <div class="product controller">';
                    html+='<div class="product-details">';
                    html+=' <h4 class="product-title"> <a href="'+data[i].url+'">'+data[i].notification+' </a> </h4>';
                    html+='   <span class="cart-product-info"><span class="cart-product-qty">Trimis: </span>Wawto Robot </span>';
                    html+='</div>';
                    html+='   <figure class="product-image-container">';
                    html+=' <a href="'+data[i].url+'" class="product-image"> <img src="../platform/frontend/assets/images/logo/logo.png" alt="product" width="80" height="80"> </a>';
                    html+=' <a style="cursor:pointer" class="btn-remove delete-notification" data-id='+data[i].notification_id+' title="Stergeti Notificare"><span>×</span></a>';
                    html+='</figure>';
                    html+='</div>';
                
                   
            }
            $('#notifications').html(html);  
                   
                    
            
        }
   });
}
</script>
@endauth
</body>
<?php $visited=''; session()->put('visited',$visited);?>
</html>