@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();
$suppliers = getSuppliers();
?>
@section('content')
                    <div class="col-lg-9">
                        <div class="main-content">
                            <section class="home-section mb-2">
                                <div class="row">
                                    <div class="col-md-12 col-xl-8 col-lg-12 mb-xl-0 mb-2">
                                        <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover dot-inside nav-big h-100 text-uppercase" data-owl-options="{
                                            'loop': false,
                                            'nav' : false,
                                            'dots' : true
                                        }">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <?php $i=0;?>
        @foreach($gs->slide as $dot)
        @if($dot->page_type=='home')
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i++}}" class="active"></li>
        @endif
        @endforeach
        </ol>
        <div class="carousel-inner">
        @foreach($gs->slide as $slide)
        @if($slide->page_type=='home')
        <div class="carousel-item  @if($loop->first) active @endif">
        <a href="{{$slide->link}}">
        <img class="d-block w-100" src="{{URL::to('platform/frontend/assets/images/slider/'.$slide->folder.'/'.$slide->image)}}" alt="First slide">
        </a>
        <div class="carousel-caption d-none d-md-block">
        <?=$slide->html;?>
        </div>
        </div>
        @endif
        @endforeach
        
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
        </div>
        
                                  
                                </div>
                                <!-- End .home-slider -->
                                    </div>
                                    <div class="col-md-12 col-xl-4 col-lg-12 d-sm-flex d-xl-block">
                                        @foreach($gs->banner as $banner)
                                        @if($banner->type=='mini' && $banner->page_type=='home' && $banner->is_visible)
                                                <?=$banner->html;?>
                                        @endif
                                        @endforeach
        
                                        
                                    </div>
                                </div>
                            </section>
                            <hr>
                            <div class="info-boxes-slider owl-carousel owl-theme appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-owl-options="{
                                'dots': false,
                                'loop': false,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 2
                                    },
                                    '1200': {
                                        'items': 3
                                    }
                                }
                            }">
                              

                               @foreach($gs->box as $minibox)
                               @if($minibox->page_type == 'home' && !$minibox->box_type)
                                <?=$minibox->html;?>

                                @endif
                               @endforeach
                            </div>
                            <!-- End .info-boxes-slider -->
                            <hr>
                            <section class="feature-boxes-container">
                                <h2 class="text-transform-none mb-0 text-center">DE CE WAWTO?</h2>
                                <div class="container appear-animate animated fadeInUpShorter appear-animation-visible" data-animation-name="fadeInUpShorter" style="animation-duration: 1000ms;">
                                    <div class="row">
                                        
                                        @foreach($gs->box as $maxibox)
                                        
                                        @if($maxibox->box_type == 'maxi')
                                        
                                        <?=$maxibox->html;?>
                
                                         @endif 

                                        @endforeach 


                                    </div>
                                    <!-- End .row -->
                                </div>
                                <!-- End .container-->
                            </section>

                            <section class="featured-section appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                                <div class="heading d-flex align-items-center">
                                    <h2 class="text-transform-none mb-0">CATEGORII</h2>
                                    
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="best-products" role="tabpanel" aria-labelledby="best-products-tab">
                                        <div class="products-slider owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'margin': 20,
                                            'dots': false,
                                            'nav': true,
                                            'loop': false,
                                            'responsive': {
                                                '0': {
                                                    'items': 2
                                                },
                                                '576': {
                                                    'items': 3
                                                },
                                                '768': {
                                                    'items': 4
                                                },
                                                '992': {
                                                    'items': 4
                                                },
                                                '1500': {
                                                    'items': 6
                                                }
                                            }
                                        }">
                                        @foreach($gs->category as $category)
                                        <div class="product-default inner-quickview inner-icon">
                                        
                                                <a href="/">
                                                    <img src="{{URL::to('platform/frontend/assets/images/categories/'.$category->cat_image)}}" width="205" height="205" alt="product" style="max-height:200px; min-height:200px;">
                                                </a>
                                        
                                                
                                   
                                        
                                            <div class="product-details">
                                                <div class="category-wrap">
                                                    <div class="category-list">
                                                        <a class="product-category">{{$category->cat_title}}</a>
                                                    </div>
                                                    <a class=""><i
                                                            class="fa fa-arrow-left"></i></a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a>Subcategorii: {{$category->subcategory->count()}}</a>
                                                </h3>
                                          
                                        
                                                
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                     @endforeach
                                        <!-- End .products-slider -->
                                    </div>
                                   
                                </div>
                            </section>

                         

                            <section class="products-container">
                                <div class="heading d-flex align-items-center appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="150">
                                    <h2 class="text-transform-none mb-0">DOMENII</h2>
                                    <a class="d-block view-all ml-auto">{{$gs->domain->count()}} Domenii<i
                                            class="fas fa-chevron-left"></i></a>
                                </div>
                                <div class="products-slider owl-carousel owl-theme  appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-owl-options="{
                                            'margin': 20,
                                            'dots': false,
                                            'nav': false,
                                            'loop': false,
                                            'responsive': {
                                                '0': {
                                                    'items': 2
                                                },
                                                '576': {
                                                    'items': 3
                                                },
                                                '768': {
                                                    'items': 4
                                                },
                                                '992': {
                                                    'items': 4
                                                },
                                                '1500': {
                                                    'items': 6
                                                }
                                            }
                                        }">
                                  
                                        @foreach($gs->domain as $domain)
                                        <div class="product-default inner-quickview inner-icon">
                            
                                                <a href="{{route('domain-suppliers',$domain->domain_url)}}">
                                                    <img src="{{URL::to('platform/frontend/assets/images/domains/'.$domain->domain_picture)}}" width="205" height="205" alt="product" style="min-height:200px;max-height:200px;">
                                                </a>
    
                                               
     
                                           
                                            <div class="product-details">
                                                <div class="category-wrap">
                                                    <div class="category-list">
                                                        <a href="{{route('domain-suppliers',$domain->domain_url)}}" class="product-category">{{$domain->subcategory->subcat_title}}</a>
                                                    </div>
                                                    <a href="{{route('domain-suppliers',$domain->domain_url)}}" class=""><i
                                                            class="fa fa-arrow-left"></i></a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="{{route('domain-suppliers',$domain->domain_url)}}">{{$domain->domain_title}}</a>
                                                </h3>
                                                <div class="category-list">
                                                    <a href="{{route('domain-suppliers',$domain->domain_url)}}" class="product-category"><i class="fa fa-users"></i> {{$domain->domainparam->count()}} @if($domain->domainparam->count() > 0 && $domain->domainparam->count() < 2) Furnizor @else Furnizori @endif</a>
                                                </div>
    
                                                <!-- End .price-box -->
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                        @endforeach
                                </div>
                                <!-- End .products-slider -->
                            </section>


                        


                      



                            <section class="products-container products-section-with-border appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                                <div class="heading d-flex align-items-center">
                                    <h2 class="d-flex align-items-center text-transform-none mb-0">FURNIZORI</h2>
                                  
                                    <a class="d-block view-all ml-auto mt-0" href="{{route('suppliers')}}">Vezi toate<i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                                <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                            'margin': 20,
                                            'dots': false,
                                            'nav': false,
                                            'loop': false,
                                            'responsive': {
                                                '0': {
                                                    'items': 2
                                                },
                                                '576': {
                                                    'items': 3
                                                },
                                                '768': {
                                                    'items': 4
                                                },
                                                '992': {
                                                    'items': 4
                                                },
                                                '1500': {
                                                    'items': 6
                                                }
                                            }
                                        }">
     @foreach($suppliers as $supplier)
                                    <div class="product-default inner-quickview inner-icon">
                                       
                                          
                                        @if($supplier->profile_image)

                                        <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$supplier->personal_code.'/profile_images/'.$supplier->profile_image)}}" alt="" class="rounded-circle" style="min-height:150px;max-height:150px;">
                                        
                                        @else 

                                        <img src="{{URL::to('platform/frontend/assets/images/customer_images/no_image.jpg')}}" alt="" class="rounded-circle" style="min-height:150px;max-height:150px;">

                                        @endif

                                            
                                            
                                       
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="https://www.portotheme.com/html/porto_ecommerce/demo40-shop.html" class="product-category">{{$supplier->created_at}}</a>
                                                </div>
                                               
                                            </div>
                                            <h3 class="product-title">
                                                <a href="https://www.portotheme.com/html/porto_ecommerce/demo40-product.html">{{$supplier->name}}</a>
                                            </h3>
                                            <h3 class="product-title">
                                                <a href="https://www.portotheme.com/html/porto_ecommerce/demo40-product.html">Jud: {{$supplier->region->region_name}}, Oras: {{$supplier->city->city_name}}</a>
                                            </h3>
                                             <h5 class="d-flex">
                                                <th>
                                                    <?php 
                             $start_rate=$supplier->rating->sum('rating');
                             $devide=$supplier->rating()->count();
                             if($devide > 0){
                                 $rating=$start_rate/$devide;
                             }
                            
         
                            ?>
                            @if($supplier->rating->count())
                           
                      
                            @if($rating > 0 && $rating < 1.6)
                                 <i class="fa fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                 <i class="far fa-star"></i>
                                <i class="far fa-star-half"></i>
                            @endif
                            @if($rating > 1.5 && $rating < 2.1)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                           
                            @endif
                            @if($rating > 2 && $rating < 2.6)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star-half"></i>
                            @endif
                            @if($rating > 2.5 && $rating < 3.1)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @endif
                            @if($rating > 3 && $rating < 3.6)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            @endif
                            @if($rating > 3.5 && $rating < 4.1)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                            <i class="far fa-star"></i>
                            @endif
                            @if($rating > 4.0 && $rating < 4.6)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                            @endif
                            @if($rating > 4.6)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                            @endif
                            @else 
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                           <i class="far fa-star"></i>
                            @endif
                         </th>
                                             </h5>

                                      <span class="rating-stars"> 
                                                            <a class="star-1"  href="/add-rating-one/{{$supplier->id}}">1</a>
                                                            <a class="star-2" href="/add-rating-two/{{$supplier->id}}">2</a>
                                                            <a class="star-3" href="/add-rating-three/{{$supplier->id}}">3</a>
                                                            <a class="star-4" href="/add-rating-four/{{$supplier->id}}">4</a>
                                                            <a class="star-5"href="/add-rating-five/{{$supplier->id}}">5</a>
                                                        </span>    
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    
                            <!--Supplier Details Modal-->
    

                            <!--End details modal -->
     @endforeach
                                </div>
                                <!-- End .products-slider -->
                            </section>
							<div class="brands-slider owl-carousel owl-theme images-center appear-animate owl-loaded owl-drag animated fadeIn appear-animation-visible mt-3" data-animation-name="fadeIn" data-animation-duration="500" data-owl-options="{
					'margin': 0}" style="animation-duration: 500ms;">
                        
                        
                        
                        
                        
                        
                    <div class="owl-stage-outer owl-height" style="height: 56.7656px;">
					<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1181px;">
					@foreach($gs->brand as $brand)
					<div class="owl-item active" style="width: 60.667px;">
					<img src="{{URL::to('platform/frontend/assets/images/brands/'.$brand->brand_image)}}" width="56" height="56" alt="brand" style="min-height:80px;max-height:56px;"></div>
					
                      @endforeach
					</div></div>
					<div class="owl-nav disabled"><button type="button" title="nav" role="presentation" class="owl-prev">
					<i class="icon-left-open-big"></i></button><button type="button" title="nav" role="presentation" class="owl-next">
					<i class="icon-right-open-big"></i></button></div><div class="owl-dots disabled">
					</div>
					</div>
                            <hr>
							
                            <h2 class="text-transform-none mb-0">MARKETING</h2>
                            @foreach($gs->banner as $banner)

                            @if($banner->page_type=='home' && $banner->type=='maxi')

                            <?=$banner->html;?>

                            @endif



                       

                          
                            @endforeach
                            

@endsection
