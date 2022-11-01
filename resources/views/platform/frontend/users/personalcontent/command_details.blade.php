@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Comanda: {{$command->number}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Acasa</a></li>
              <li class="breadcrumb-item active">Checkout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{session()->get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
      </div>
    @endif
    @if(session()->has('error'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{session()->get('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @if(!$command->supplier->profile_image)
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">

                       @else 
                       <img class="profile-user-img img-fluid img-circle"
                       src="{{URL::to('platform/frontend/assets/images/customer_images/'.$command->supplier->personal_code.'/profile_images/'.$command->supplier->profile_image)}}"
                       alt="User profile picture">

                       @endif
                </div>

                <h3 class="profile-username text-center">{{$command->supplier->name}}</h3>

                <p class="text-muted text-center">Furnizor</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Vanzari</b> <a class="float-right">{{$command->supplier->checkoutsupplier->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Retur</b> <a class="float-right">{{$command->supplier->getretur->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Reiting</b> <a class="float-right">
                        <?php
                        $start_rate=$command->supplier->rating->sum('rating');

$devide=$command->supplier->rating->count();

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

if($command->supplier->rating->count()){
           
      
if($rating > 0 && $rating < 1.6){
    $rating ='
     <i class="far fa-star"></i>
     <i class="far fa-star"></i>
     <i class="far fa-star-half"></i>
     <i class="far fa-star"></i>
    <i class="far fa-star-half"></i>
    ';
}
if($rating > 1.5 && $rating < 2.1){
$rating = '
<i class="fa fa-star"></i>
<i class="fa fa-star-half"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
';

}
if($rating > 2 && $rating < 2.6){
$rating ='
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
';
}
if($rating > 2.5 && $rating < 3.1){
$rating ='
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="far fa-star-half"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
';
}
if($rating > 3 && $rating < 3.6){
$rating = '
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
';
}
if($rating > 3.5 && $rating < 4.1){
$rating ='
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half"></i>
<i class="far fa-star"></i>
';
}
if($rating > 4.0 && $rating < 4.6){
$rating ='
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="far fa-star"></i>
';
}
if($rating > 4.6){
$rating = '
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half"></i>
';
}
else 
$rating  ='
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
 <i class="far fa-star"></i>
 ';
}
                        
                        ?>
                        <div class="ratings-container">
                            <?=$rating;?>
                        </div>
                    </a>
                  </li>
                </ul>

             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detali Furnizor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Firma</strong>

                <p class="text-muted">
                Cui: {{$command->supplier->cui}}<br>
                
                <strong> Certificat (J):</strong> {{$command->supplier->registration_number}}<br>
                 <strong> IBAN:</strong> {{$command->supplier->iban}}<br>
                <strong> Banca: </strong> {{$command->supplier->bank}}<br>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Locatie</strong>

                <p class="text-muted">Judet: {{$command->supplier->region->region_name}},<br> Oras: {{$command->supplier->city->city_name}}</p>

                <hr>

               

                <hr>

               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Oferta: {{$command->offer->number}}</div>
                                   
                                    <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Cerere: </th>
                                            <th>{{$command->request->request_number}}</th>
                                        </tr>
                                        <?php $domain = $command->request->domain;  $form = $domain->requestform;?>
                                        @if($form->has_part)
											<?php $part = \App\Models\Platform\Part::where('part_id',$command->offer->part_id)->first();?>
                                        <tr>
                                            <th>Unitate Masura</th>
                                            <th>{{$part->measure_unity}}</th>
                                        </tr>
                                        <tr>
                                            <th>Denumire:</th>
                                            <th>{{$part->part_title}}</th>
                                        </tr>
                                        <tr>
                                            <th>Cod Produs:</th>
                                            <th>{{$command->offer->part_code}}</th>
                                        </tr>
                                        <tr>
                                            <th>Cantitate:</th>
                                            <th>{{$part->quantity}}</th>
                                        </tr>
                                        <tr>
                                            <th>Pret:</th>
                                            <th>{{$command->offer->value}} {{$command->offer->currency}}</th>
                                        </tr>
                                        <tr>
                                            <th>Tva %:</th>
                                            <th>{{$command->offer->tva}}</th>
                                        </tr>
                                        
                                        @else 
                                        <tr>
                                            <th>Cerere: </th>
                                            <th>{{$command->request->request_number}}</th>
                                        </tr>
                                        @foreach($command->offer->offerdata as $data)
                                        <tr>
                                            <th>{{$data->data_label}}</th>
                                            <th>{{$data->data_content}}</th>
                                        </tr>
                                        
                                        @endforeach
                                        <tr>
                                            <th>Pret:</th>
                                            <th>{{$command->offer->value}}</th>
                                        </tr>
                                        <tr>
                                            <th>Tva %:</th>
                                            <th>{{$command->offer->tva}}</th>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            </div>
                           <!--Col-md-6-->

                           <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Comanda: {{$command->number}}
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <?php 
                                                        if($command->delivery_option===1)
                                                        {
                                                            $delivery='Courier dedicat';
                                                        }
                                                        else 
                                                        {
                                                            $delivery = 'Ridicare Personala';
                                                        }
                                                        if($command->payment_option===1)
                                                        {
                                                            $payment = 'Plata cu cardul';
                                                        }
                                                        if($command->payment_option===2)
                                                        {
                                                            $payment='Plata numerar';

                                                        }
                                                        if($command->payment_option ===3)
                                                        {
                                                            $payment = 'Transfer BancarOP';
                                                        }
														if($command->payment_option ===4)
                                                        {
                                                            $payment = 'Ramburs';
                                                        }
														
														if($command->delivery_option==1)
														{
															$weight = $command->offer_weight;
															$courier = getCourier();
															
															if($command->offer->weight > $courier->payload_limit)
															{
																$prepare = $command->offer_weight-$courier->payload_limit;
																
																$cost = $prepare * $courier->over_load;	
															}
															else 
															{
																$cost=$courier->pay_load;
															}
															
															$transport_val = round($cost,2);
														}
														else 
														{
															$transport_val='Neestimabil';
														}
                                            ?>
                                            <th>Livrare:</th>
                                            <th>{{$delivery}}</th>
                                        </tr>
                                        <tr>
                                            <th>Plata:</th>
                                            <th>{{$payment}}</th>
                                        </tr>
                                        <tr>
                                            <th>Suma</th>
                                            <th>{{$command->offer_price}} {{$command->offer->currency}}</th>
                                        </tr>
										  <tr>
                                            <th>Valoare TVA</th>
                                            <th>{{$command->tva}} {{$command->offer->currency}}</th>
                                        </tr>
										  <tr>
                                            <th>Transport</th>
                                            <th>{{$transport_val}} {{$command->offer->currency}}</th>
                                        </tr>
                                        <tr>
                                            <th>Total de plata</th>
                                            <th>{{$command->total_ammount}} {{$command->offer->currency}}</th>
                                        </tr>
                                       
                                    </table>
                                </div>
								@if($command->client_id !== Auth::user()->id)
									@if($command->status ===0)
										<div class="card-footer">
										<a href="{{route('confirm-command',$command->command_id)}}" class="btn btn-success"><i class="fa fa-check"></i>Confirmare</a>
										</div>
									@else 
									<div class="card-footer">
										<a href="{{route('my-commands')}}" class="btn btn-info"><i class="fa fa-undo"></i>Inapoi</a>
										</div>
									@endif
								@else 
									<div class="card-footer">
                                <a href="{{route('post-checkout',$command->command_id)}}" class="btn btn-success"><i class="fa fa-check"></i>Checkout</a>
                                </div>
							   @endif
                            </div>
                        </div>
                        <!--Col-md-6-->
                        </div>
                      </div>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                   

                   
               
                

                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 
@endsection