@extends('layouts.platform.frontend')
@section('content')
<?php 
$gs = generalsetting();
$courier = getCourier();

$tva = $offer->tva;

$start = $tva/100;

$sum = round($start*$offer->value,2);

$delivery = $courier->pay_load;

$weigth = $offer->weight;

if($weigth < $courier->payload_limit)
{
    $delivery_price = $courier->pay_load;
}else
{
$calc = $weigth-$courier->payload_limit;

$calc_price = $calc*$courier->overload;

$delivery_price = round($calc_price+$courier->pay_load,2);
}
?>
<main class="main col-md-9">
    <div class="container">
       <div class="product-single-container product-single-default">
           <div class="row">
                <div class="col-lg-6 col-md-6 product-single-gallery">
                    <div class="product-slider-container">
                        @if(session()->has('error'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                                 {{session()->get('error')}}
                               
                              </div>
                            </div>
                        @endif
                        @if(session()->has('forbiden'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                                 {{session()->get('forbiden')}}
                               
                              </div>
                            </div>
                        @endif
                        @if($errors->any())

                        @foreach($errors->all() as $error)
                        <div class="row">
                        <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                             {{$error}}
                           
                          </div>
                        </div>
                        @endforeach

                        @endif

                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                            @if(!$offer->offerimage->count())
                            @if($request->requestimage->count())
                            
                            @foreach($request->requestimage as $image)
                            
                            <div class="owl-dot">
                                <img class="product-single-image" src="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/parts/'.$image->image)}}" data-zoom-image="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/parts/'.$image->image)}}" width="468" height="468" alt="product" />
                            </div>
                            
                            @endforeach
                            
                            @endif <!--Count-->
                            
                            <!--Part Images-->
                          
                            
                          

                            <!--Category images --->
                            @if(!$request->requestimage->count())

                            @foreach($gs->category as $main_image)
                            
                            <div class="owl-dot">
                                <img class="product-single-image" src="{{URL::to('platform/frontend/assets/images/categories/'.$main_image->cat_image)}}" width="468" height="468" alt="product" />
                            </div>
                        
                            @endforeach

                            @endif
                            <!--End category images-->
                            
                            @else <!--Offer image check else -->
                            
                            @if($offer->offerimage->count())

                            @foreach($offer->offerimage as $image)
                            <div class="owl-dot">
                                <img class="product-single-image" src="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/offers/'.$offer->number.'/'.$image->image)}}" data-zoom-image="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/offers/'.$offer->number.'/'.$image->image)}}" width="468" height="468" alt="product" />
                            </div>
                            @endforeach
                            @endif
                            
                            <!--Offer image 2 check -->
                           
                            
                            <!--Offer image 2 check end-->
                            
                           <!--Images Alternative-->
                            
                             
                            
                            @endif<!--Offer image-->
                        </div>
                        <!-- End .product-single-carousel -->
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>

                    <div class="prod-thumbnail owl-dots">
                        @if(!$offer->offerimage->count())
                        @if($request->requestimage->count())
                        
                        @foreach($request->requestimage as $image)
                        
                        <div class="product-item">
                            <img class="product-single-image" src="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/parts/'.$image->image)}}" data-zoom-image="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/parts/'.$image->image)}}" width="468" height="468" alt="product" />
                        </div>
                        
                        @endforeach
                        
                        @endif <!--Count-->
                        
                        <!--Part Images-->
                      

                        <!--Category image -->
                        @if(!$request->requestimage->count())

                        @foreach($gs->category as $secondary_image)
                        
                        <div class="owl-dot">
                            <img class="product-single-image" src="{{URL::to('platform/frontend/assets/images/categories/'.$secondary_image->cat_image)}}" width="468" height="468" alt="product" />
                        </div>
                    
                        @endforeach


                        @endif

                        <!--End category image-->
                        
                        @else <!--Offer image check else -->
                        
                        @if($offer->offeriamge->count())

                        @foreach($offer->offerimage as $sm)
                        <div class="product-item">
                            <img class="product-single-image" src="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/offers/'.$offer->number.'/'.$sm->image)}}" data-zoom-image="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/offers/'.$offer->number.'/'.$sm->image)}}" width="468" height="468" alt="product" />
                        </div>
                        @endforeach

                        @endif
                        
                        <!--Offer image 2 check -->
                       
                        
                        <!--Offer image 2 check end-->
                        
                       
                        
                   
                 
                        
                        @endif<!--Offer image-->
                    </div>
                </div>
                <!-- End .product-single-gallery -->

                <div class="col-lg-6 col-md-6 product-single-details">
                <div class="card">
                    <div class="card-header">
                        Oferta Nr. {{$offer->number}}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            @foreach($offer->offerdata as $data)
							
                            <tr>
                                <th>{{$data->data_label}}</th>
                                <th>{{$data->data_content}}</th>
                            </tr>
                            @endforeach
                            <tr>
                                <th>Greutate:</th>
                                <th>{{$offer->weight}}</th>
                            </tr>
                            <tr>
                                <th>Pret: </th>
                                <th>{{$offer->value}} {{$offer->currency}}</th>
                            </tr>
                            <?php 
                                $tva = $offer->tva;

                                $start = $tva/100;

                                $get_val = round($start*$offer->value,2);

                                $offer_total =  $offer->value+$get_val;
                            ?>
                            <tr class="text-danger nondelivery">
                                <th>Total cu TVA:</th>
                                <th class="total">{{$offer_total}} {{$offer->currency}}</th>
                            </tr>
                           
                            <tr id="delivery_price" style="display:none;">
                                <th>Pretul Livrari</th>
                                <th id="d_p"></th>
                            </tr>
                            <tr id="total_delivery" class="text-danger" style="display:none;">
                                <th>Total de plata: </th>
                                <th id="t_d"></th>
                            </tr>
                        </table>
                        <div class="card">
                            <div class="card-header">
                               Optiuni de plata si livrare
                            </div>
                            <div class="card-body">
                            <form action="{{route('send-command',$offer->id)}}" method="post" id="command">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for=""><input type="radio" id="delivery" name="delivery_options" value="1"> Courier Dedicat</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""><input type="radio" id="delivery" name="delivery_options" value="2"> Ridicare Personala</label>
                                    </div>
                                     <div class="col-md-12 mt-1 mb-1" style="border-top:solid 1px black; height:10px;"> </div>
                                    <div class="col-md-12"><h5 class="text-center">Optiuni de plata</h5></div>
                                    <div class="col-md-3">
                                        <label for=""><input type="radio" name="payment_options" value="1">Cu Cardul</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""><input type="radio" name="payment_options" value="2"> Numerar</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""><input type="radio" name="payment_options" value="3"> Transfer bancar</label>
                                    </div>
									 <div class="col-md-3">
                                        <label for=""><input type="radio" name="payment_options" value="4"> Ramburs</label>
                                    </div>
                                </div>
                            </form>
                            <hr class="mt-1 mb-1">
                             <p class="text-danger">
                                 Stimati Client {{Auth::user()->name}}, daca trimiteti comanda pe oferta respectiva furnizorului se va acorda 15 minute pentru confirmare si procesare mai departe. Mentionam ca comenzi trimise dupa ora 17:00 va fi procesate a doa zi pentru ca magazine au program de lucru si nu se poate acorda 15 minute de confirmare dupa program.
                                 Asta nu seamna ca furnizorul nu poate confirma comanda in orice ora, dar este posibil sa proceseaza a doa zi dupa ora 17 timpul de confirmare comenzi de catre furnizor care se acorda creste de la 15 min pana la 14 ore in functie care este ora actuala. Multumim!!!!
                                </p>

                            </div>
                        </div>
                    </div>
                  
                    @if($command_check)
                    <div class="card-footer text-danger">
                        Comanda dumneavostra a fost trimisa sub numarul {{$command_check->number}}. Urmatoare comanda pentru piesa respectiva puteti trimite la <?php $time = \Carbon\Carbon::parse($command_check->confirm_limit)->format('H:i:S d-m-Y');?> {{$time}}. Furnizorul are timp pana atunci sa confirma sau respige comanda. Multumim...
                    </div>
                    @else 
                    <div class="card-footer">
                        <button class="btn btn-success btn-md" type="submit" form="command"><i class="fa fa-arrow-up"></i> Trimite Comanda</button>
                        <a href="{{route('reject-offer',$offer->id)}}" class="btn btn-warning btn-md" type="submit" form="command"><i class="fa fa-trash"></i> Respinge</a>
                        <a href="{{route('block-supplier',$offer->id)}}" class="btn btn-danger btn-md" type="submit" form="command"><i class="fa fa-trash"></i> Respinge&Bloc</a>
                    </div>
                    @endif
                    
                </div>
                </div>
                <!-- End .product-single-details -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .product-single-container -->
        
        @foreach($gs->section as $section)
        @if($loop->first)
        <hr>
        
        @endif
        @if($section->page_type=='large')
        <?=$section->html;?>
        @endif
        @endforeach

@endsection

@push('scripts')

<script>
  $(document).on('click','#delivery',function()
  {
        var delivery = $(this).val();
        if(delivery=='1')
        {
            var price = '{{$delivery_price}}';
            var total_offer = '{{$offer_total}}';

            var sum = Number(price)+Number(total_offer);

            var currency = '{{$offer->currency}}';

            var html ='{{$sum}}'+currency;
            $('#delivery_price').removeAttr('style');
            $('#total_delivery').removeAttr('style');
            $('.nondelivery').attr('style','display:none');
            $('#d_p').html(price+' '+currency);
            $('#t_d').html(sum+' '+currency);
        }
        else
        {
            $('#delivery_price').attr('style','display:none');
            $('#total_delivery').attr('style','display:none');
            $('.nondelivery').removeAttr('style');
        }
  });
</script>
@endpush