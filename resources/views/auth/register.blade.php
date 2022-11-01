@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();
$suppliers = getSuppliers();
$regions = getRegions();
$sections = getSections();
?>
@section('content')
<style>
    .ri{
        border:none;
        border-bottom:solid 1px black;
    }
</style>
                    <div class="col-lg-9">
                        <div class="main-content">
                        <div class="card">
                            <div class="card-header d-flex bg-primary">
                                <img src="{{URL::to('platform/frontend/assets/images/logo/'.$gs->site_logo)}}" alt="" style="float:right;height:30px;">
                                <h4 class="ml-3">Inregistrare</h4>
                              
                            </div>
                            <div class="card-body">
                                <form action="{{route('register')}}" method="post" enctype="multipart/form-data" id="register">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Nume/Firma *</label>
                                            <input type="text" name="name" class="form-control ri" placeholder="Nume/Firma *">
                                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Email *</label>
                                            <input type="email" name="email" class="form-control ri" placeholder="E-mail adresa *">
                                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Telefon *</label>
                                            <input type="tel" name="user_phone" pattern="07[0-9]{8}" class="form-control ri" placeholder="Telefon*">
                                            @if ($errors->has('user_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_phone') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Judet *</label>
                                            <select name="user_region" id="user_region" class="form-control ri" style="height:46px;">
                                                <option value="">Alegeti judet</option>
                                                @foreach($regions as $region)
                                                <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                                                @endforeach
                                                @if ($errors->has('user_region'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_region') }}</strong>
                                    </span>
                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-4 uc">
                                            <label for="">Oras *</label>
                                            <select name="" id="" class="form-control ri" style="height:46px;">
                                                <option value="">Alegeti Oras(Dupa judet)</option>
                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Adresa*</label>
                                            <input type="text" name="user_address" class="form-control ri" placeholder="Adresa *">
                                            @if ($errors->has('user_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_address') }}</strong>
                                    </span>
                                @endif
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Parola *</label>
                                            <input type="password" name="password" class="form-control ri" placeholder="Parola *">
                                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Confirma Parola *</label>
                                            <input type="password" name="password_confirmation" class="form-control ri" placeholder="Confirma parola *">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Poza de profil</label>
                                            <input type="file" name="profile_image" class="form-control ri">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Comuna sat(Optional)</label>
                                            <input type="text" name="rural_name" class="form-control ri">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Tip Utilizator *</label>
                                            <select name="user_type" id="user_type" class="form-control ri" style="height:46px;">
                                            <option value="">Alegeti Tip</option>
                                            <option value="2">Persoana Fizica</option>
                                            <option value="1">Persoana Juridica</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 cm">
                                            <label for="">Numele Administratorului *</label>
                                            <input type="text" name="administrator_name" class="form-control ri cri" placeholder="Administrator">
                                            @if ($errors->has('administrator_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('administrator_name') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4 cm">
                                            <label for="">Cui</label>
                                            <input type="text" name="cui" class="form-control ri cri" placeholder="Cui">
                                            @if ($errors->has('cui'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cui') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4 cm">
                                            <label for="">Numarul Inregistrarii(J)</label>
                                            <input type="text" name="registration_number" class="form-control ri cri" placeholder="Numarul de inregistrare">
                                            @if ($errors->has('registration_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('registration_number') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        <div class="col-md-4 cm">
                                            <label for="">IBAN*</label>
                                            <input type="text" class="form-control ri cri" name="iban">
                                            @if ($errors->has('iban'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('iban') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4 cm">
                                            <label for="">Banca *</label>
                                            <input type="text" class="form-control ri cri" name="bank">
                                            @if ($errors->has('bank'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4 cm">
                                            <label for="">Tip de cont *</label>
                                            <select name="account_type" id="account_type" class="form-control ri" style="height:46px;">
                                            <option value="">Alegeti Cont</option>
                                            <option value="2">Client</option>
                                            <option value="1">Furnizor(Drepturi de client)</option>
                                            </select>
                                            @if ($errors->has('account_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4 cm">
                                            <label for="">Poza dupa J *</label>
                                            <input type="file" class="form-control ri cri" name="profile_image1">
                                            @if ($errors->has('profile_image1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile_image1') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4 cm">
                                            <label for="">Poza dupa buletin *</label>
                                            <input type="file" class="form-control ri cri" name="profile_image2">
                                            @if ($errors->has('profile_image2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile_image2') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        <div class="col-md-4 cm">
                                            <label for="">Poza dovada platii(Si Similar) </label>
                                            <input type="file" class="form-control ri cri" name="profile_image3">
                                            @if ($errors->has('profile_image3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile_image3') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        
                                    <hr>
                                    <div class="col-md-4">
                                        <label for="">
                                        <input type="checkbox" name="terms" value="1">
                                       
                                        Accept Termeni si conditii </label>
                       
                                    </div>
                                    <div class="col-md-4 cm">
                                        <label for="">
                                        <input type="checkbox" name="employees" value="1">
                                        Contul va avea angajati </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">
                                        <input type="checkbox" name="newsletter">
                                        Accept wawto abonament </label>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit" form="register"><i class="">W</i>awto Inregistrare</button>
                              
                               </div>
                            </div>
                            </div>
                        </div>
                    @if($gs->category->count())
                        <hr>
                        <h3>Categorii</h3>
                        <hr>
                    @endif
                   
                        <div class="row">   
                               @foreach($gs->category as $section)
                                <div class="col-md-4">
                              
                                    <div class="card">
                                        <div class="car-header bg-primary">
                                            <h5 class="text-center mt-3">{{$section->cat_title}}</h5>
                                        </div>
                                        <div class="card-body">
                                          <img src="{{URL::to('platform/frontend/assets/images/categories/'.$section->cat_image)}}" alt="">          
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
  
            op+='<label>Oras *</label><select style="color:black; height:46px;border:none;border-bottom:solid 1px black;" name="user_city" id="city" class="form-control ri" required>';
            op+='<option style="color:black" value="">Alegeti Oras</option>';
            for(var i=0;i < data.length;i++){
  
            op+='<option style="color:black" value="'+data[i].city_id+'">'+data[i].city_name+'</option>';
            }
           
            op+='</select>@if($errors->has('city_param'))<span class="help-block"><strong>{{ $errors->first('city_param') }}</strong></span>@endif';
  
  
          $('.uc').html(op);
  
  
          },
          error:function(){
     
          }
        });
      });
});
   
    </script>
    <script>
        $(document).on('change','#user_type',function(){
            var type = $('#user_type').val();
            if(type == '1')
            {
                $('.cm').removeAttr('style');
                $('.cri').attr('required','required');
            }
            else 
            {
                $('.cm').attr('style','display:none');
            }
            
        })
    </script>
@endpush
