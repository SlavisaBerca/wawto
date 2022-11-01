@extends('layouts.platform.backend')

@section('content')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="profile-foreground position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg">
                            <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image)}}" alt="" class="profile-wid-img" />
                        </div>
                    </div>
                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                        <div class="row g-4">
                            <div class="col-auto">
							@if($user->profile_image)
                                <div class="avatar-lg">
                                    <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image)}}" alt="user-img"
                                        class="img-thumbnail rounded-circle" />
                                </div>
							@else 
								  <div class="avatar-lg">
                                    <img src="{{URL::to('platform/frontend/assets/images/no_image.png')}}" alt="user-img"
                                        class="img-thumbnail rounded-circle" />
                                </div>
							@endif
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1">{{$user->name}}</h3>
                                    <p class="text-white-75">{{$user->email}}</p>
                                    <div class="hstack text-white-50 gap-1">
                                        <div class="me-2"><i
                                                class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{$user->region->region_name}}</div>
                                        <div><i
                                                class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>{{$user->city->city_name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-12 col-lg-auto order-last order-lg-0">
                                <div class="row text text-white-50 text-center">
                                    <div class="col-lg-6 col-4">
                                        <div class="p-2">
                                            <h4 class="text-white mb-1">{{$user->myoffer->count()}}</h4>
                                            <p class="fs-14 mb-0">Oferte Trimise</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-4">
                                        <div class="p-2">
                                            <h4 class="text-white mb-1">{{$user->getcommand->count()}}</h4>
                                            <p class="fs-14 mb-0">Comenzi Primite</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex">
                               @if(!$user->wawto_status && $user->user_type===1)
								   <div class="flex-shrink-0">
                                        <a href="{{route('approve',$user->id)}}" class="btn btn-success"><i
                                                class="fa fa-check"></i> Se aproba</a>
												 <a href="{{route('approve',$user->id)}}" class="btn btn-danger"><i
                                                class="fa fa-trash align-bottom"></i> Se Respinge</a>
                                    </div>
							   @else 
                                    <div class="flex-shrink-0">
                                        <a href="{{route('approve',$user->id)}}" class="btn btn-success"><i
                                                class="fa fa-check"></i>Blocheaza</a>
												
                                    </div>
								@endif
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content pt-4 text-muted">
                                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xxl-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-5">Informatii Introduse</h5>
													@if(!$user->user_phone && !$user->user_city && !$user->user_address)
                                                        <div
                                                            class="progress animated-progress custom-progress progress-label">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                                <div class="label">30%</div>
                                                            </div>
                                                        </div>
												    
													@elseif($user->user_phone && $user->user_city && $user->user_address && !$user->cui && !$user->registration_number && !$user->iban && !$user->bank)
													<div
                                                            class="progress animated-progress custom-progress progress-label">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                                <div class="label">50%</div>
                                                            </div>
                                                        </div>
												 
													@elseif($user->user_phone && $user->user_city && $user->user_address && $user->cui && $user->registration_number && $user->iban && $user->bank)
													<div
                                                            class="progress animated-progress custom-progress progress-label">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                                <div class="label">100%</div>
                                                            </div>
                                                        </div>
												
												@endif
													

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Profil</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Denumire :</th>
                                                                        <td class="text-muted">{{$user->name}}</td>
                                                                    </tr>
																	@if($user->user_phone)
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Telefon :</th>
                                                                        <td class="text-muted">{{$user->user_phone}}</td>
                                                                    </tr>
																	@endif
																	
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                                        <td class="text-muted">{{$user->email}}</td>
                                                                    </tr>
																	@if($user->user_region)
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Judet :</th>
                                                                        <td class="text-muted">{{$user->region->region_name}}
                                                                        </td>
                                                                    </tr>
																	@endif 
																	@if($user->user_city)
																	 <tr>
                                                                        <th class="ps-0" scope="row">Oras :</th>
                                                                        <td class="text-muted">{{$user->city->city_name}}
                                                                        </td>
                                                                    </tr>
																	@endif
																	 <tr>
                                                                        <th class="ps-0" scope="row">Cui :</th>
                                                                        <td class="text-muted">{{$user->cui}}
                                                                        </td>
                                                                    </tr>
																	 <tr>
                                                                        <th class="ps-0" scope="row">Numarul de inregistrare J :</th>
                                                                        <td class="text-muted">{{$user->registration_number}}
                                                                        </td>
                                                                    </tr>
																	 <tr>
                                                                        <th class="ps-0" scope="row">IBAN :</th>
                                                                        <td class="text-muted">{{$user->iban}}
                                                                        </td>
                                                                    </tr>
																	 <tr>
                                                                        <th class="ps-0" scope="row">Banca :</th>
                                                                        <td class="text-muted">{{$user->bank}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Inregistrat</th>
																		<?php $created = \Carbon\Carbon::parse($user->created_at)->format('d-m-Y');?>
                                                                        <td class="text-muted">{{$created}}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">Portofolio</h5>
                                                        <div class="d-flex flex-wrap gap-2">
                                                          @if($user->profile_image1)
															  
                                                            <div>
                                                               <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image1)}}" style="width:100%;">
                                                            </div>
														  @endif
														   @if($user->profile_image2)
															  
                                                            <div>
                                                               <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image2)}}" style="width:100%;">
                                                            </div>
														  @endif
														   @if($user->profile_image3)
															  
                                                            <div>
                                                               <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image3)}}" style="width:100%;">
                                                            </div>
														  @endif
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->	
											</div>
                                         </div>                              
                                       </div>      
                                </div>
                                <!--end tab-content-->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div><!-- container-fluid -->
            </div><!-- End Page-content -->

           
@endsection