@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();
$suppliers = getSuppliers();
?>
@section('content')
                    <div class="col-lg-9">
                        <div class="main-content">
                                                                               
                    <!-- End .col-lg-3 -->



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
                       

                     

                       @foreach($gs->box as $ib)
                       @if(!$ib->box_type && $ib->page_type=='search')

                        <?=$ib->html;?>

                       @endif
                       @endforeach
                    </div>
                   
                    <hr class="pb-0 mb-0 pt-0 mt-0">
                    <section class="products-container appear-animate pb-0 mb-0 pt-0 mt-0" data-animation-name="fadeIn" data-animation-delay="100">
                        @foreach($result as $section)
                        <?=$section->html;?>
                        @endforeach
                     
                    </section>
                    <hr class="mt-0">
                   
                    @foreach($gs->banner as $banner)
                    @if($banner->type=='maxi' && $banner->page_type == 'search')

                    <?=$banner->html;?>

                    @endif

                    @endforeach
                 
                    <hr>

@endsection
