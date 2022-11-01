@extends('layouts.platform.user')

@section('content')

<?php 
$gs=generalsetting();
$domains = getDomains();
$locations = getLocations();
$brands = getBrands();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Acasa</a></li>
              <li class="breadcrumb-item active">Vizualizre&Editare</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
                  <img class="profile-user-img img-fluid img-circle"
                  @if($user->profile_image)
                       src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image)}}"

                       @else 
                       src="{{URL::to('platform/frontend/assets/images/no_image.png')}}"
                       @endif
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">Persoana Juridica</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Cereri Postate</b> <a class="float-right">{{$user->myrequest->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Oferte Primite</b> <a class="float-right">{{$user->myoffer->count()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Comenzi Trimise</b> <a class="float-right">{{$user->commandclient()->count()}}</a>
                  </li>
                </ul>

               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Judet:</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> {{$user->region->region_name}}</strong>

               

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Oras:</strong>

                <p class="text-muted">{{$user->city->city_name}}</p>

               

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Adresa </strong>

                <p class="text-muted">{{$user->user_address}}.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">

            @if($errors->any())

            @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
              </div>
            @endforeach

            @endif

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


            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                 <li class="nav-item"><a class="{{ request()->is('notifications') ? 'active' : '' }} nav-link" href="#activity" data-toggle="tab">Notificari</a></li>
					
                  <li class="nav-item"><a class="{{ request()->is('profile') ? 'active' : '' }} nav-link" href="#settings" data-toggle="tab">Setari</a></li>
                  <li class="nav-item"><a class="nav-link" href="#domains" data-toggle="tab">Domenii</a></li>
                  <li class="nav-item"><a class="nav-link" href="#locations" data-toggle="tab">Puncte de lucru</a></li>
                  <li class="nav-item"><a class="nav-link" href="#parts" data-toggle="tab">Piese</a></li>
                  <li class="nav-item"><a class="nav-link" href="#brands" data-toggle="tab">Marci</a></li>
                   <li class="nav-item"><a class="nav-link" href="#passwords" data-toggle="tab">Schimba Parola</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 <div class="{{ request()->is('notifications') ? 'active' : '' }} tab-pane" id="activity">
                  <div id = "notifications"></div>
                  </div>
                  <div class="tab-pane" id="domains">
                    <!-- Post -->
               
                    <div class="post">
                        <div class="user-block">
                          
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#domainparam"><i class="fa fa-plus"></i> Adauga</button>
                            </div>
                            @foreach($user->domainparam as $domain)
                            <?php $mydomain = \App\Models\Platform\Domain::where('id',$domain->domain)->first();?>
                            <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                   Denumire
                                </div>
                                <div class="card-body">
                                    {{$mydomain->domain_title}}
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('delete-domainparam',$domain->param_id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                      </div>
                      <!-- /.post -->    

                  </div>


                  <div class="tab-pane" id="locations">
                    <!-- Post -->
               
                    <div class="post">
                        <div class="user-block">
                          
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#locationparam"><i class="fa fa-plus"></i> Adauga</button>
                            </div>
                            @foreach($user->locationparam as $location)
                            <?php $mylocation = \App\Models\Platform\Region::where('region_id',$location->location)->first();?>
                            <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                   Denumire
                                </div>
                                <div class="card-body">
                                    {{$mylocation->region_name}}
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('delete-locationparam',$location->param_id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                      </div>
                      <!-- /.post -->    

                  </div>


                  <div class="tab-pane" id="parts">
                    <!-- Post -->
               
                    <div class="post">
                        <div class="user-block">
                          
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#partparam"><i class="fa fa-plus"></i> Adauga</button>
                            </div>
                            @foreach($user->partparam as $pp)
                           <?php 
                                    $param = 'Nesetat';

                                    if($pp->param==1)
                                    {
                                        $param = 'Piese Noi';
                                    }
                                    if($pp->param==2)
                                    {
                                        $param = 'Piese din dezmembrari';
                                    }

                                    if($pp->param==99999999999)
                                    {
                                        $param ='Indiferent(Sau fara piese)';
                                    }

                                    
                           ?>
                            <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                   Denumire
                                </div>
                                <div class="card-body">
                                    {{$param}}
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('delete-partparam',$pp->param_id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                      </div>
                      <!-- /.post -->    

                  </div>

                  <div class="tab-pane" id="brands">
                    <!-- Post -->
               
                    <div class="post">
                        <div class="user-block">
                          
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#brandparams"><i class="fa fa-plus"></i> Adauga</button>
                            </div>
                            @foreach($user->brandparam as $bp)
                            <?php $brand = \App\Models\Platform\Brand::where('id',$bp->brand_id)->first();?>
                            <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                   Denumire
                                </div>
                                <div class="card-body">
                                    @if($brand)
                                    {{$brand->brand_title}}
                                    @else 
                                        @if($bp->brand_id == 99999999999)
                                            Multimarca
                                        @endif

                                    @endif
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('delete-brandparam',$bp->param_id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                      </div>
                      <!-- /.post -->    

                  </div>
					 <div class=" tab-pane" id="passwords">
                    <div class="card">
						<div class="card-header">Reset Prola</div>
						<div class="card-body">
							<form action = "{{route('reset-password',Auth::user()->id)}}" method="post">
							{{csrf_field()}}
							<label>Parola veche * </label>
							<input class="form-control" name="old_password">
							<label>Parola Nou</label>
							<input class="form-control" name="password">
							<label>Confirma Parola</label>
							<input class="form-control" name="password_confirmation">
							
							<button class="btn btn-success mt-5" type="submit">Confirma</button>
							</form>
						</div>
					</div>
                  </div>
                  <div class="{{ request()->is('profile') ? 'active' : '' }} tab-pane" id="settings">
                    <form class="form-horizontal" action="{{route('edit-company',$user->id)}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nume si prenume</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" value="{{$user->name}}" id="inputName" placeholder="Nume si Prenume">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" value="{{$user->email}}" id="inputEmail" placeholder="E-mail">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Telefon</label>
                        <div class="col-sm-10">
                          <input type="text" name="user_phone" value="{{$user->user_phone}}" class="form-control" id="inputName2" placeholder="Telefon">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Judet</label>
                        <div class="col-sm-10">
                         <select name="user_region" id="user_region" class="form-control">
                             <option value="{{$user->region->region_id}}" selected>{{$user->region->region_name}}</option>

                             @foreach($regions as $region)

                             @if($region->region_id !== $user->region->region_id)

                            <option value="{{$region->region_id}}">{{$region->region_name}}</option>

                            @endif
                             @endforeach

                         </select>
                        </div>
                      </div>

                      <div class="form-group row uc">
                        <label for="inputName2" class="col-sm-2 col-form-label">Oras</label>
                        <div class="col-sm-10">
                         <select name="" id="" class="form-control">
                             <option value="{{$user->city->city_name}}" selected>{{$user->city->city_name}}</option>


                         </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Adresa</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="user_address" value="{{$user->user_address}}" id="inputExperience" placeholder="Adresa">{{$user->user_address}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Comuna/Sat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="rural_name" value="{{$user->user_address}}" id="inputExperience" placeholder="Comuna/Sat">{{$user->rural_name}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Cui</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="cui" value="{{$user->cui}}" id="inputEmail" placeholder="Cui">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Numarul inregistrari(J)</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="registration_number" value="{{$user->registration_number}}" id="inputEmail" placeholder="Numarul inregistrari(J)">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">IBAN</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="iban" value="{{$user->iban}}" id="inputEmail" placeholder="IBAN">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Banca</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="bank" value="{{$user->bank}}" id="inputEmail" placeholder="Banca">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nume de administrator</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="administrator_name" value="{{$user->administrator_name}}" id="inputEmail" placeholder="Nume de administrator">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Poza de profil</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="profile_image" id="inputEmail" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Poza certificat(J)</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="profile_image1" id="inputEmail" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Poza dupa Buletin</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="profile_image2" id="inputEmail" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Poza dovada platii(Optional)</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="profile_image3" id="inputEmail" >
                        </div>
                      </div>
					  <div class="form-group row uc">
                        <label for="inputName2" class="col-sm-2 col-form-label">Tip Cont</label>
                        <div class="col-sm-10">
                         <select name="account_type" id="" class="form-control">
						 @if($user->account_type===2)
							 <option value="2" selected>Cliient</option>
								<option value="1" >Furnizor</option>
								
						 @endif
						 @if($user->account_type===1)
								<option value="1" selected>Furnizor</option>
								<option value="2" >Cliient</option>
						 @endif
                         </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-info">Editare</button>
                        </div>
                      </div>
                    </form>
                    <h3 class="text-center">Portofolio</h3>
                    <div class="row">
                       @if($user->profile_image1)
                        <div class="col-md-4">
                            <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image1)}}" alt="" style="width:100%; height:300px;">
                        </div>
					@else 
						<div class="col-md-4">
                            <img src="{{URL::to('platform/frontend/assets/images/no_image.png')}}" alt=""style="width:100%; height:300px;">
                        </div>
					@endif 
					
					@if($user->profile_image2)
                        <div class="col-md-4">
                            <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image2)}}" alt=""style="width:100%; height:300px;">
                        </div>
				    @else 
						
					<div class="col-md-4">
                            <img src="{{URL::to('platform/frontend/assets/images/no_image.png')}}" alt=""style="width:100%; height:300px;">
                        </div>
					@endif
					
					@if($user->profile_image3)
                        <div class="col-md-4">
                            <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$user->personal_code.'/profile_images/'.$user->profile_image3)}}" alt=""style="width:100%; height:300px;">
                        </div>
					@else 
						
					 <div class="col-md-4">
                            <img src="{{URL::to('platform/frontend/assets/images/no_image.png')}}" alt=""style="width:100%; height:300px;">
                        </div>
					@endif
                    </div>
					

                  </div>
                  <!-- /.tab-pane -->
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


  <!--Domain param modal -->

  <div class="modal" tabindex="-1" role="dialog" id="domainparam">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adauga Domeniu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('add-domainparam',$user->id)}}" method="post" id="domainparam-add">
            {{csrf_field()}}

            <label for="">Domenii</label>
            <select name="domain" id="" class="form-control">
                <option value="">Alegeti Domeniu</option>
                @foreach($domains as $domain)
                <option value="{{$domain->id}}">{{$domain->domain_title}}</option>
                @endforeach
            </select>
        </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="domainparam-add" class="btn btn-primary">Adauga</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        </div>
      </div>
    </div>
  </div>


  <!--Domain param modal --->



  <!--Location param modal--->


  <div class="modal" tabindex="-1" role="dialog" id="locationparam">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adauga Punct de lucru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('add-locationparam',$user->id)}}" method="post" id="locationparam-add">
            {{csrf_field()}}
            <label for="">Domenii</label>
            <select name="location" id="" class="form-control">
                <option value="">Alegeti Locatie</option>
                @foreach($locations as $location)
                <option value="{{$location->region_id}}">{{$location->region_name}}</option>
                @endforeach
            </select>
        </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="locationparam-add" class="btn btn-primary">Adauga</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        </div>
      </div>
    </div>
  </div>
  <!-- LOcation param modal -->


  <!--Part param modal --->
  <div class="modal" tabindex="-1" role="dialog" id="partparam">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adauga Tip Piesa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('add-partparam',$user->id)}}" method="post" id="partparam-add">
                {{csrf_field()}}
                <label for="">Domenii</label>
                <select name="param" id="" class="form-control">
                    <option value="">Alegeti Tip</option>
                    <option value="1">Piese Noi</option>
                    <option value="2">Piese din dezmembrari</option>
                    <option value="99999999999">Noi&Din dezmembrari</option>
                    <option value="99999999999">Nu Vind Piese</option>
                </select>
            </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="partparam-add" class="btn btn-primary">Adauga</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        </div>
      </div>
    </div>
  </div>

  <!--Part param modal---->

  <!--Brand Param modal--->

  <div class="modal" tabindex="-1" role="dialog" id="brandparams">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adauga Marca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('add-brandparam',$user->id)}}" method="post" id="brandparam-add">
            {{csrf_field()}}

        <select name="brand" id="" class="form-control">
            <option value="" selected>Alegeti Marca</option>
            <option value="99999999999">Multimarca</option>
       
            @foreach($brands as $brand)
         
            <option value="{{$brand->id}}">{{$brand->brand_title}}</option>
            @endforeach
    

        </select>
        </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="brandparam-add" class="btn btn-primary">Adauga</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        </div>
      </div>
    </div>
  </div>

  <!--Brand param modal --->
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('.cm').attr('style','display:none');
    $(document).on('change','#user_region',function(){
      var region_find_id=$(this).val();
      var op='';
      $('#b').hide();
  
        $.ajax({
          type:'get',
          url:'{!!URL::to('viewCity')!!}',
          data:{'region_id':region_find_id},
          success:function(data){
  
            op+=' <label for="inputName2" class="col-sm-2 col-form-label">Oras</label> <div class="col-sm-10"><select style="color:black;" name="request_city" id="city" class="form-control ri" required>';
            op+='<option style="color:black" value="">Alegeti Oras</option>';
            for(var i=0;i < data.length;i++){
  
            op+='<option style="color:black" value="'+data[i].city_id+'">'+data[i].city_name+'</option>';
            }
           
            op+='</select></div>@if($errors->has('city_param'))<span class="help-block"><strong>{{ $errors->first('city_param') }}</strong></span>@endif';
  
  
          $('.uc').html(op);
  
  
          },
          error:function(){
     
          }
        });
      });
});
   
    </script>
@endpush