@extends('layouts.platform.user')

@section('content')

<?php $gs=generalsetting();?>
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

                <p class="text-muted text-center">Persoana Fizica</p>

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
                <strong><i class="fas fa-book mr-1"></i>@if($user->user_region) {{$user->region->region_name}} @endif</strong>

               

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Oras:</strong>

                <p class="text-muted">@if($user->user_city) {{$user->city->city_name}} @endif</p>

               

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Adresa </strong>

                <p class="text-muted">@if($user->user_address) {{$user->user_address}}. @endif</p>
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
                 {{$error}}
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
		  <li class="nav-item"><a class="nav-link" href="#passwords" data-toggle="tab">Schimba Parola</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
             <div class="{{ request()->is('notifications') ? 'active' : '' }} tab-pane" id="activity">
                  
				<div id="notifications"></div>
                  
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

                  <div class="{{ request()->is('profile') ? 'active' : '' }} tab-pane " id="settings">
                    <form class="form-horizontal" action="{{route('edit-personal',$user->id)}}" method="post" enctype="multipart/form-data">
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
                          <input type="text" name="user_phone" value="@if($user->user_phone) {{$user->user_phone}} @endif" class="form-control" id="inputName2" placeholder="Telefon">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Judet</label>
                        <div class="col-sm-10">
                         <select name="user_region" id="user_region" class="form-control">
                             <option value="@if($user->user_region) {{$user->region->region_id}} @endif" selected>@if($user->user_region) {{$user->region->region_name}} @endif</option>

                             @foreach($regions as $region)						

                            <option value="{{$region->region_id}}">{{$region->region_name}}</option>
							
                            
                             @endforeach

                         </select>
                        </div>
                      </div>

                      <div class="form-group row uc">
                        <label for="inputName2" class="col-sm-2 col-form-label">Oras</label>
						
                        <div class="col-sm-10">
                         <select name="" id="" class="form-control">
                             <option value ="@if($user->user_city) {{$user->city->city_name}} @endif">@if($user->user_city) {{$user->city->city_name}} @else Alegeti Oras @endif</option>


                         </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Adresa</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="user_address" value="@if($user->user_address) {{$user->user_address}} @endif" id="inputExperience" placeholder="Adresa">{{$user->user_address}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Comuna/Sat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="rural_name" value="{{$user->user_address}}" id="inputExperience" placeholder="Comuna/Sat">{{$user->rural_name}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Poza de profil</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="profile_image" id="inputEmail" >
                        </div>
                      </div>
					    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Tip Utilizator</label>
						
                        <div class="col-sm-10">
                         <select name="user_type" id="user_type" class="form-control">
                             <option value ="">Persoana Fizica</option>
							<option value="1">Persoana Juridica

                         </select>
                        </div>
                      </div>
					  <div class="form-group row tc">
                        <label for="inputName2" class="col-sm-2 col-form-label">Tip Cont</label>
						
                        <div class="col-sm-10">
                         <select name="account_type" id="account_type" class="form-control">
                             <option value ="2" selected>Client</option>
							<option value="1">Furnizor</option>

                         </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-info">Editare</button>
                        </div>
                      </div>
                    </form>
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
	
<script>
$(document).ready(function(){
	$('.tc').attr('style','display:none');
	$(document).on('change','#user_type',function(){
	var user_type = $(this).val();
	
	if(user_type=='1')
	{
		$('.tc').removeAttr('style');
	}
	else 
	{
		$('.tc').attr('style','display:none');
	}
	});
});
</script>

@endpush