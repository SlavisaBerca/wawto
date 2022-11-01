@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();
$suppliers = getSuppliers();
?>
@section('content')
 <div class="col-lg-9">
                        <div class="main-content">
                         
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
                            <div class="product-single-container product-single-default">
                               
                                <div class="row">
                             <div class="col-lg-6 col-md-6 product-single-gallery">
                    <div class="product-slider-container">
                       

                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">

                          
                            
                            @if($request->requestimage)

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

                                    <div class="col-xl-6 col-md-6 product-single-details">
										<div class="card">
											<div class="card-header"><h3>Nr. {{$request->request_number}}</div>
											<div class="card-body">
											<ul class="list-group">
													  <li class="list-group-item">Client: {{$request->client->name}}</li>
													  <li class="list-group-item">Reiting: 
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
                    <i class="far fa-star"></i>
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
               <i class="far fa-star"></i>
               <i class="far fa-star"></i>
               <i class="far fa-star"></i>
               <i class="far fa-star"></i>
              <i class="far fa-star"></i>
               @endif
													  </li>
													  
													<li class="list-group-item">Bazat pe: {{$client->rating->count()}} Revizii
													  <li class="list-group-item">Judet: {{$request->location->region_name}}</li>
													  <li class="list-group-item">Oras: {{$request->city->city_name}}</li>
													  <li class="list-group-item">Comuna/Sat: {{$request->rural_name}}</li>
													  <li class="list-group-item">Capacitate de oferte: {{$gs->request_capacity}}
													  <li class="list-group-item">Oferte Primite{{$request->offer->count()}}</li>
													  <li class="list-group-item">Locuri libere{{$gs->request_capacity-$request->offer->count()}}</li>
													 
											</ul>
											</div>
										</div>
                                    </div>
                                    <!-- End .product-single-details -->
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .product-single-container -->

                            <div class="product-single-tabs font2">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Detali</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Piese
										({{$request->part->count()}})</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
										<ul class="list-group">
										@if(!$request->form_used)
										@foreach($request->data as $data)
										
											  <li class="list-group-item">{{$data->data_label}}: {{$data->data_content}}</li>
											
											 

										
										@endforeach
										@else 
										<li class="list-group-item">
										{{$gs->no_details}}
										</li>
										@endif
										</ul>
                                    </div>
                                    <!-- End .tab-pane -->

                                    <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                                              <div class="product-desc-content">
										<div class="row">
										
										@foreach($request->part as $part)
										<div class="col-md-6">
												<div class="card">
													<div class="card-header">
													{{$part->part_title}}
													</div>
													<div class="card-body">
													<ul class="list-group">
														  <li class="list-group-item">Unitate de masura: {{$part->measure_unity}}</li>
														  <li class="list-group-item">Denumire: {{$part->part_title}}</li>
														  <li class="list-group-item">Cod produs: {{$part->part_code}}</li>
														  <li class="list-group-item">Cantitate: {{$part->quantity}}</li>
														 
													</ul>
													</div>
													
													 <?php $blocked = \App\Models\Platform\Blocked::where('blocker',$request->client->id)->where('blocked',Auth::user()->id)->first();?>
                        @if($blocked)
                        <div class="card-footer">
                            <div class="alert alert-danger fade show" role="alert">
                                Cu parere de rau va informam, Clientul a decis ca nu doreste oferte din partea Dumneavoastra...Incercati cu alte cereri. Multumim!!!!.
                                
                              </div>
                        </div>
                        @else 
                            @if($request->offer->count() < $gs->request_capacity)
                        <div class="card-footer">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#part-modal{{$part->part_id}}"><i class="fa fa-arrow-up"></i> Trimiteti Oferta</button>
                        </div>
                            @else 
                            <div class="card-footer">
                                <button class="btn btn-danger" type="button"><i class="fa fa-exclamation-triangle"></i> Limita a fost atinsa</button>
                            </div>
                            @endif
                        @endif
												</div>
												
										</div><!--Md 6-->
										<div class="modal" tabindex="-1" role="dialog" id="part-modal{{$part->part_id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Oferta pentru: {{$part->part_title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{route('send-offer',$request->request_id)}}" method="post" enctype="multipart/form-data">
	  {{csrf_field()}}
	  <div class="row">
		<div class="col-md-6">
		<label>Unitate de masura*</label>
			<input type="text" class="form-control" name="measure_unity" required style="border:none;border-bottom:solid 1px black;" value="{{$part->measure_unity}}">
			<input name="part_id" value="{{$part->part_id}}" type="hidden">
		</div>
		<div class="col-md-6">
		<label>Denumire*</label>
			<input type="text" class="form-control" name="part_title" required style="border:none;border-bottom:solid 1px black;" value="{{$part->part_title}}">
		</div>
		<div class="col-md-6">
		<label>Cod Produs*</label>
			<input type="text" class="form-control" name="part_code" required style="border:none;border-bottom:solid 1px black;" value="{{$part->part_code}}">
		</div>
		<div class="col-md-6">
		<label>Cantitate*</label>
			<input type="number" class="form-control" name="quantity" required style="border:none;border-bottom:solid 1px black;" value="{{$part->quantity}}">
		</div>
		
		<div class="col-md-6">
		<label>Pret*</label>
			<input type="number" step="any" class="form-control" name="value" required style="border:none;border-bottom:solid 1px black;">
		</div>
		<div class="col-md-6">
		<label>Producator*</label>
			<input type="text" class="form-control" name="manufacturer" required style="border:none;border-bottom:solid 1px black;">
		</div>
		<div class="col-md-6">
		<label>Greutate Aproximativ*</label>
			<input type="number" step="any" value="0"class="form-control" name="weight" required style="border:none;border-bottom:solid 1px black;">
		</div>
		<div class="col-md-6">
		<label>TVA/%(Procentul TVA)*</label>
			<input type="number" step="any" min="0" max="30" value="0"class="form-control" name="tva" required style="border:none;border-bottom:solid 1px black;">
		</div>
		
	
			<div class="col-md-6">
		<label>Poza(Optional)</label>
			<input type="file" class="form-control" name="image"style="border:none;border-bottom:solid 1px black;">
		</div>
		<div class="col-md-6">
		<label>Poza2(Optional)</label>
			<input type="file" class="form-control" name="image1"style="border:none;border-bottom:solid 1px black;">
		</div>
		<div class="col-md-6">
		<label>Valuta*</label>
			<select name="currency" class="form-control" style="border:none;border_bottom:solid 1px black;">
				<option value="RON" selected disabled>RON</option>
			</select>
		</div>
		<div class="col-md-6">
		<label>Disponibilitate*</label>
			<select name="disponibility" class="form-control" style="border:none;border_bottom:solid 1px black;">
				<option value="" selected disabled>Alegeti Optiune</option>
				<option value="Disponibil">Disponibil</option>
				<option value="Pe Comanda">Pe Comanda</option>
			</select>
		</div>
	  </div>
	  </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Trimite Oferta</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
      </div>
	   </form>
      
    </div>
  </div>
</div>
									@endforeach
										</div>
                                        </div>
                                        <!-- End .product-desc-content -->
                                    </div>
                                    <!-- End .tab-pane -->
                                </div>
                                <!-- End .tab-content -->
                            </div>
                            <!-- End .product-single-tabs -->

                       
                    
                            

@endsection
