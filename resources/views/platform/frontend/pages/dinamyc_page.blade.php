@extends('layouts.platform.frontend')     

@section('content')
                    <!-- End .col-lg-3 -->
<div class="col-lg-9">
                    @if($page->has_slider)
                    <section class="home-section mb-2">
                        <div class="row">
<div id="carouselExampleIndicators" class="carousel slide  col-md-12" data-ride="carousel">
<?php $i=0;?>

<ol class="carousel-indicators">
@foreach($page->slide as $count)
<li data-target="#carouselExampleIndicators" data-slide-to="{{$i++}}" class="active"></li>
@endforeach
</ol>

<div class="carousel-inner">
@foreach($page->slide as $slide)
<div class="carousel-item @if($loop->first) active @endif">
<a href="{{$slide->link}}">  <img class="d-block w-100" src="{{URL::to('platform/frontend/assets/images/slider/'.$slide->folder.'/'.$slide->image)}}" alt="Slide" style="height:400px;"></a>
<div class="carousel-caption d-none d-md-block">
<?=$slide->html;?>
</div>
</div>

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
                      
                    </section>
@else 
@if(!$page->has_slider && $page->has_banner)
@foreach($page->banner as $banner)
<?=$banner->html;?>
@endforeach
@endif

@endif
@if($page->box->count())
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
                       

                     

                       @foreach($page->box as $ib)
                       @if(!$ib->box_type)
                        <?=$ib->html;?>
                       @endif
                       @endforeach
                    </div>
@endif    
                    <hr class="pb-0 mb-0 pt-0 mt-0">
                    <section class="products-container appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                        @foreach($page->section as $section)
                        <?=$section->html;?>
                        @endforeach
                    </section>
                    
                    @if($page->has_slider && $page->has_banner)
                    <hr>
                    <h2 class="">Marketing</h2>
                    @foreach($page->banner as $banner)
                    <?=$banner->html;?>
                    @endforeach
                    @endif
                </section>
                <hr>
@endsection