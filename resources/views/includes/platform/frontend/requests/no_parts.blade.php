@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();
$suppliers = getSuppliers();
$offerform=$domain->offerform;
$courier = getCourier();
?>

@section('content')
<style>
    .offin{
        border:none;
        border-bottom:solid black 1px;

    }
	
</style>
<main class="main col-lg-9">
    <div class="container">

        @if($errors->any())

        @foreach($errors->all() as $error)

        @if($loop->first)

        <div class="row">
            <div class="col-md-12">
            
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$error}}
                    
                  </div>
        </div>
        </div>


        @endif

        @endforeach

        @endif

        @if(session()->has('success'))
        <div class="row">
            <div class="col-md-12">
            
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('success')}}
                    
                  </div>
        </div>
        </div>

        @endif

        @if(session()->has('error'))
        <div class="row">
            <div class="col-md-12">
            
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session()->get('error')}}
                    
                  </div>
        </div>
        </div>
        @endif
    
     <div class="product-single-container product-single-default">
           

            <div class="row">
                <div class="col-lg-6 col-md-6 product-single-gallery">
                    <div class="product-slider-container">
                       

                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">


                          
                            
                            @if($request->requestimage->count())

                            @foreach($request->requestimage as $image)

                            <div class="product-item">
                                <img class="product-single-image" src="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/parts/'.$image->image)}}" data-zoom-image="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/parts/'.$image->image)}}" width="468" height="468" alt="product" />
                            </div>

                            @endforeach


                            @endif
                            
                           
                            @if(!$request->requestimage->count())
                            @foreach($gs->category as $image)

                            <div class="product-item">
                                <img class="product-single-image" src="{{URL::to('platform/frontend/assets/images/categories/'.$image->cat_image)}}" data-zoom-image="{{URL::to('platform/frontend/assets/images/categories/'.$image->cat_image)}}" width="468" height="468" alt="product" style="height:468px" />
                            </div>

                            @endforeach

                          @endif
                            <!--Big images verification-->
                        </div>
                        <!-- End .product-single-carousel -->
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>

                    <div class="prod-thumbnail owl-dots">
                       

                       

                        @if($request->requestimage->count())<!--Count start-->
                        @foreach($request->requestimage as $image)
                        <div class="owl-dot">
                            <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$request->client->personal_code.'/requests/'.$request->request_number.'/parts/'.$image->image)}}" width="110" height="110" alt="product-thumbnail" />
                        </div>

                        @endforeach
                

                        @endif
                        @if(!$request->requestimage->count())<!--Count start-->
                        @foreach($gs->category as $miniimage)

                        <div class="owl-dot">
                            <img src="{{Url::to('platform/frontend/assets/images/categories/'.$miniimage->cat_image)}}" width="110" height="110" alt="product-thumbnail" />
                        </div>

                        @endforeach
                       @endif<!--Conunt ends-->
                    </div>
                </div>
                <!-- End .product-single-gallery -->

                <div class="col-lg-6 col-md-6 product-single-details">
                    <div class="card">
                        <div class="card-header bg-primary">
                         Detali: {{$request->request_number}}
                        </div>
                        <div class="card-body">

                        

                            <table class="table table-bordered">
                                @foreach($request->data as $data)

                                <?php 
                                    $data_display = $data->data_content;
                                    if($data_display=='99999999999'){
                                        $display = '<i class="fa fa-check"></i>';
                                    }
                                    if($data_display =='99999999998')
                                    {
                                        $display = '<i class="fa fa-times"></i>';
                                    }
                                    if($data_display !== '99999999999' && $data_display !=='99999999998')
                                    {
                                        $display = $data->data_content;
                                    }
                                ?>
                                <tr>
                                    <th>{{$data->data_label}}</th>
                                    <!--Formating Data display-->
                                    @if($data_display=='99999999999')

                                    <th><?=$display;?></th>

                                    @elseif($data_display=='99999999998')

                                    <th><?=$display;?></th>

                                    @else 

                                    <th>{{$display}}</th>

                                    @endif
                              <!--End formating Data-->
                              
                                </tr>

                                
                                @endforeach
                                <tr>
                                <th>Statistica: </th>
							@if($request->offer->count())
                           <?php 
                                                            $offers = $request->offer->count();
                                                        if($offers)
                                                        {
                                                            $percent=$offers/20;

                                                            $count=$percent*100;

                                                            $value=ceil($count);
                                                        }
                            ?>
                            <th><progress max="100" value="{{$value}}" style="height:2em;border-radius:2px;"> 25% </progress></th>
                                                   
                            @else 
                             <th><progress max="100" value="1" style="height:2em;border-radius:2px;"> 25% </progress></th>
                                                   
                          @endif
                        <!--Statistic ends-->
                                </tr>
                            </table>
									@if($checks)
									<h5 class="text-center">Necesar</h5>
									<table class="table table-bordered">
								@foreach($checks as $check)
										<tr>
											<th>{{$check->label}}</th>
											<th style="width:50px;"><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#check-modal{{$check->check_id}}"><i class="fa fa-plus"></i> Oferta</button>
										</tr>
										
										
							<div class="modal" tabindex="-1" role="dialog" id="check-modal{{$check->check_id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Oferta pentru: {{$check->label}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('dinamyc-offer',$request->request_id)}}" method="post" enctype="multipart/form-data" id="check-form{{$check->check_id}}">
			{{csrf_field()}}
			<div class="row">
			<div class="col-md-6">
			<label>Denumire*</label>
			<input type="hidden" name="part_id" value="{{$check->check_id}}">
			<input type="text" name="label[]" class="form-control" value="{{$check->label}}" style="border:none;border-bottom:1px solid black;">
			</div>
			<div class="col-md-6">
			<label>Info*</label>
			<input type="text" name="input[]" class="form-control" placeholder="Exemplu data programari(livrari)" style="border:none;border-bottom:1px solid black;">
			</div>
			<div class="col-md-6">
			<label>Pret*</label>
			<input type="text" name="value" class="form-control" placeholder="Exemplu data programari(livrari)" style="border:none;border-bottom:1px solid black;">
			</div>
		<div class="col-md-6" id="tw" style="display:none;">
			<label>Tva*</label>
			<input type="text" name="tva" class="form-control" value="0" style="border:none;border-bottom:1px solid black;">
			</div>
			<div class="col-md-6" id="wd" style="display:none;">
			<label>Greutate*</label>
			<input type="text" name="weight" class="form-control" value="0" style="border:none;border-bottom:1px solid black;">
			</div>
			 <div class="col-md-6">
                            <label for="">Valuta(Setata de wawto)</label>
                            <input type="text" class="form-control offin" value="RON" readonly>
                        </div>
			<div class="col-md-12">
			<label><input type="checkbox" id="tva">Se aplica tva</label>
			</div>
			<div class="col-md-12">
			<label><input type="checkbox" id="weight">Greutate peste {{$courier->payload_limit}} KG</label>
			</div>
			
			</div>
			<div id="more"></div>
		</form>
      </div>
      <div class="modal-footer">
	   
        <button type="submit" form="check-form{{$check->check_id}}" class="btn btn-success btn-md">Trimite Oferta</button>
        <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Inchide</button>
      </div>
    </div>
  </div>
</div>
								@endforeach
									 </table>
								@endif
                          
                        </div>
                       
                    </div>
                    </div>

                   
                   

                  
                  

                   
                    <!-- End .product single-share -->
                </div>
                <!-- End .product-single-details -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .product-single-container -->



    <!--Info and offers section-->
    <div class="product-single-container product-single-default">
       
        <div class="row">
           <!--Equipment check-->
         

           <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-warning">
 
                 Client&Localizare
 
                </div>
 
                <div class="card-body">
                    
                <table class="table table-bordered">
                <tr>
                    <th>Client: </th>
                    <th>{{$request->client->name}}</th>
                </tr>

                <tr>

            
                    <th>Reiting:</th>
					<th>
                    <?php

                            $start_rate=$request->client->rating->sum('rating');

                            $devide=$request->client->rating()->count();

                            if($devide > 0)
                            {

                                $rating=$start_rate/$devide;
                            }


                            else{
                                $rating  = '
							
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
								<i class="far fa-star"></i>
								
                                ';
                            }
                           
                    ?>
                    @if($request->client->rating->count())
                 
                    @if($rating > 0 && $rating < 1.6)
                    <i class="fa fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star-half"></i>
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
               <i class="far fa-star"></i>
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
              <?=$rating;?>
               @endif
				</th>
                </tr>
                <tr>
                    <th>Bazat pe:</th>
                    <th>{{$request->client->rating->count()}} Revizii</th>
                </tr>
                    <th>Judet:</th>
                    <th>{{$request->location->region_name}}</th>
                </tr>
                <tr>
                    <th>Oras:</th>
                    <th>{{$request->city->city_name}}</th>
                </tr>

                @if($request->rural_name)
                <tr>
                    <th>Comuna/Sat:</th>
                    <th>{{$request->rural_name}}</th>
                </tr>
                @endif
                <tr>
                    <th>Adresa de livrare</th>
                    <th>{{$request->delivery_address}}</th>
                </tr>
                <tr>
                    <th>Capacitate de ofertare: </th>
                    <th>{{$gs->request_capacity}} de oferte</th>
                </tr>
                <tr>
                    <th>Oferte Primite</th>
                    <th>{{$request->offer->count()}}</th>
                </tr>
                <tr>
                    <th>Liber:</th>
                    <th>{{$gs->request_capacity-$request->offer->count()}} locuri</th>
                </tr>
                </table> 

                </div>
                
            </div>
 
         </div>
		 @if(!$checks)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">Formular de oferta</div>
            <div class="card-body">
                <form action="{{route('dinamyc-offer',$request->request_id)}}" method="post" enctype="multipart/form-data" id="offer-form">
                        {{csrf_field()}}
                    <div class="row">
						<div class="col-md-6">
						<label>Denumire Servicii(Produs)*</label>
						<input type="text" name="label[]" style="border:none;border-bottom:solid 1px black;" class="form-control" required>
						</div>
						<div class="col-md-6">
						<label>Explicativ*</label>
						<input type="text" name="input[]" style="border:none;border-bottom:solid 1px black;" class="form-control" required>
						</div>
                        <div class="col-md-12">
                            <label for="">Pret *</label>
                            <input type="number" step="0.01" name="value" class="form-control offin" value="{{old('price')}}" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Tva</label>
                            <input type="text" name="tva" value="0" class="form-control offin" value="{{old('tva')}}">
                        </div>  
						 
                        <div class="col-md-12" id="wg" style="display:none;">
                            <label for="">Greutate Aproximativ *</label>
                            <input type="number" id="weight" name="weight" value="0" class="form-control offin" value="{{old('weight')}}">
                        </div>                       
                       
                        <div class="col-md-12">
                            <label for="">Valuta(Setata de wawto)</label>
                            <input type="text" class="form-control offin" value="RON" readonly>
                        </div>
						
						<div class="col-md-12"><label><input type="checkbox" id="courier">Colet va fi mai greu de {{$courier->payload_limit}} KG </div>
                    </div>
               
                </form>
                <?php $blocked = \App\Models\Platform\Blocked::where('blocker',$request->client->id)->where('blocked',Auth::user()->id)->first();?>
                @if($blocked)
                <div class="card-footer">
                    <div class="alert alert-danger fade show" role="alert">
                       Ne pare rau!!! Clientul a decis ca nu doreste oferte din partea Dumneavoastra...Incercati cu alte cereri. Multumim!!!!.
                        
                      </div>
                </div>
                @else 
                    @if($request->offer->count() < $gs->request_capacity)
                <div class="card-footer">
                    <button class="btn btn-success" type="submit" form="offer-form"><i class="fa fa-arrow-up"></i> Trimiteti Oferta</button>
                </div>
                    @else 
                    <div class="card-footer">
                        <button class="btn btn-danger" type="button"><i class="fa fa-exclamation-triangle"></i> Limita a fost atinsa</button>
                    </div>
                    @endif
                @endif
        </div>
      
         
        </div>
        <!-- End .row -->
    </div>
    <!-- End .product-single-container -->
  @endif
    <hr>
    
    <div class=" col-md-12" style="border:solid 6px black;">
        <h4 class="text-center">Diagrama Explicativa</h4>
    <label for="">Limita Atinsa(Full)</label>
    <progress max="100" value="100" class="lm" style="height:2em;border-radius:2px;"> 25% </progress>
    <label for="">Aproape de limita</label>
    <progress max="100" class="al" value="85" style="height:2em;border-radius:2px;"> 25% </progress>
    <label for="">Jumatate</label>
    <progress max="100" value="50" class="ml" style="height:2em;border-radius:2px;"> 25% </progress>
    <label for="">Departe de limita</label>
    <progress max="100" value="15" class="dl" style="height:2em;border-radius:2px;"> 25% </progress>
    </div>
    <style>
        .dl {
border: none;
width: 100%;
height: 60px;
background: crimson;
}

.dl {
color: lightblue;
}

.dl::-moz-progress-bar {
background: lightcolor;
}





.dl::-webkit-progress-value {
 background: green; 
}



.dl::-webkit-progress-bar {
background: lightblue;
}                          

.lm {
border: none;
width: 100%;
height: 60px;
background: crimson;
}

.lm {
color: lightblue;
}

.lm::-moz-progress-bar {
background: lightcolor;
}





.lm::-webkit-progress-value {
 background: red; 
}



.lm::-webkit-progress-bar {
background: lightblue;
} 



                 
                 progress {
border: none;
width: 100%;
height: 60px;
background: crimson;
}
      .ml {
border: none;
width: 100%;
height: 60px;
background: crimson;
}

.ml {
color: lightblue;
}

.ml::-moz-progress-bar {
background: lightcolor;
}





.ml::-webkit-progress-value {
 background: yellow; 
}



.ml::-webkit-progress-bar {
background: lightblue;
}                          





                 
                 progress {
border: none;
width: 100%;
height: 60px;
background: crimson;
}     
    .al {
border: none;
width: 100%;
height: 60px;
background: crimson;
}

.al {
color: lightblue;
}

.al::-moz-progress-bar {
background: lightcolor;
}





.al::-webkit-progress-value {
 background: maroon; 
}



.al::-webkit-progress-bar {
background: lightblue;
}                          





                 
                 progress {
border: none;
width: 100%;
height: 60px;
background: crimson;
}

progress {
color: lightblue;
}

progress::-moz-progress-bar {
background: lightcolor;
}

<?php 
$offers = $request->offer->count();
if($offers <= 5 && $offers < 10){


echo 'progress::-webkit-progress-value {
 background: green; }';
}
if($offers > 10 && $offers < 15){


 echo 'progress::-webkit-progress-value {
     background: yellow; }';
 }
 if($offers > 15 && $offers < 20){


     echo 'progress::-webkit-progress-value {
         background: maroon; }';
     }
     if($offers >= 20){


         echo 'progress::-webkit-progress-value {
             background: red; }';
         }
?>

progress::-webkit-progress-bar {
background: blue;
}                
               
</style>

@endsection
@push('scripts')
<script>
	$(document).on('click','#courier',function(){
		$('#courier').addClass('courier');
		$('#wg').removeAttr('style');
		$('#weight').attr('required','required');

	});
		$(document).on('click','.courier',function(){
		$('#wg').attr('style','display:none');
		$('#courier').removeClass('courier');
		$('#weight').removeAttr('required');
	});
</script>
<script>
$('#add').click(function(e){
	e.preventDefault();
	$('#more').append('<div id="show" class="row"><div class="col-md-6"><label>Denumire*</label><input type="text" value="{{$check->label}}" style="border:none;border-bottom:1px solid black;" name="input[]" class="form-control"></div><div class="col-md-6"><label>Explicativ</label><input type="text" name="input[]" style="border:none;border-bottom:solid 1px black;" placeholder="Exemplu data"class="form-control"></div><div class="col-md-6"><label>Pret*</label><input type="text"style="border:none;border-bottom:solid 1px black;" name="value" class="form-control"></div><div class="col-md-6"><label>Valuta</label><select name="currency" class="form-control" style="border:none;border-bottom:solid black 1px; height:46px;"><option value="RON" selected disabled>RON</option></select></div><div class="col-md-6"><label>Poza</label><input type="file" name="image[]" class="form-control"></div><div class="col-md-6"><label>Poza2</label><input type="file" name="image[]" class="form-control"></div><div class="col-md-6"><button class="btn btn-sm btn-danger" id="remove"><i class="fa fa-trash"></i> Sterge</button></div></div>');
});

$(document).on('click','#remove',function(e){
                e.preventDefault();
                let show =$(this).parent().parent();

                $(show).remove();
            });
</script>
<script>
	$(document).on('click','#tva',function(){
		$('#tva').addClass('tva');
		$('#tw').removeAttr('style');
	});
	$(document).on('click','.tva',function(){
		$('#tva').removeClass('tva');
		$('#tw').attr('style','display:none');
	});
</script>
<script>
	$(document).on('click','#weight',function(){
		$('#weight').addClass('weight');
		$('#wd').removeAttr('style');
	});
	$(document).on('click','.weight',function(){
		$('#weight').removeClass('weight');
		$('#wd').attr('style','display:none;');
	});
</script>


@endpush
