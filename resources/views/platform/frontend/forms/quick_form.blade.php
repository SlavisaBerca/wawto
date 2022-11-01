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
                              

                               @foreach($gs->box as $minibox)
                               @if($minibox->page_type == 'home' && !$minibox->box_type)
                                <?=$minibox->html;?>

                                @endif
                               @endforeach
                            </div>
                            <!-- End .info-boxes-slider -->
                            <hr>
                        <div class="card">
                            <div class="card-header d-flex">
                                <img src="{{URL::to('platform/frontend/assets/images/logo/'.$gs->site_logo)}}" alt="" style="float:right;height:30px;">
                                <h4 class="ml-3">Cerere de oferta {{$domain->domain_title}}</h4>
                              
                            </div>
                            <div class="card-body">
                                <form action="{{route('post-quick')}}" method="post" enctype="multipart/form-data" id="main-form">
                                    {{csrf_field()}}
                                    <div class="row">
                                      
                                       
                                            <div class="col-md-12 mb-2" style="border:solid blue 1px;">
                                              <h5 class="text-center">Piese</h5>
                                              <div class="row">
                                              <div class="col-md-6">
                                                  <label for="">Unitate de masura *</label>
                                                  <input type="text" name="measure_unity" id="measure_unity"class="form-control">
                                              </div>
                                              <div class="col-md-6">
                                                  <label for="">Denumire *</label>
                                                  <input type="text" name="part_title"id="part_title" class="form-control">
                                              </div>
                                              <div class="col-md-6">
                                                  <label for="">Cod Produs(Optional)</label>
                                                  <input type="text" name="part_code" id="part_code"class="form-control">
                                              </div>
                                              <div class="col-md-6">
                                                  <label for="">Cantitate *</label>
                                                  <input type="number" name="quantity" id="quantity" class="form-control">
                                              </div>
                                              <div class="col-md-6">
                                                  <label for="">Poza *</label>
                                                  <input type="file" name="part_image" id="part_imge" class="form-control">
                                              </div>
                                              <div class="col-md-6">
                                                  <label for="">Poza2 *</label>
                                                  <input type="file" name="image[]" id="image[]" class="form-control">
                                              </div>
                                            
									
												
											
                                              </div>
											  <div id="more"></div>
											  <div class="col-md-12"></div>
												<div class="col-md-4 mt-3 mb-2" id="prepend">
												<button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Inca o piesa</button>
												</div>
												
												<div class="row">
												  <div class="col-md-4">
                                                  <label for=""><input type="radio" name="part_type" id="part_type1" value="1">Piese Noi</label>
                                              </div>
                                              <div class="col-md-4">
                                                  <label for=""><input type="radio" name="part_type" id="part_type1" value="2">Piese din dezmembrari</label>
                                              </div>
                                              <div class="col-md-4">
                                                  <label for=""><input type="radio" name="part_type" id="part_type1" value="99999999999">Indiferent</label>
                                              </div>
												</div>
                                          </div>
                                     
                                        <div class="col-md-12">
                                            <h5 class="text-center">Setari Aditionale</h5>
                                        
                                        <div class="row" style="border:solid blue 1px;">
                                        <div class="col-md-12">
                                            <p class="text-dark">Daca nu doriti livrate la alta adresa de cat la adresa care ati specificat in contul Dumneavoastra. Lasati setari acesta necompletate...Multumim!!!!</p>
                                        </div>
                                          <div class="col-md-6 mt-2 mb-2">
                                              <label for="">Judet</label>
                                              <select name="request_location" id="user_region" class="form-control" style="height:46px;">
                                              <option value="">Alegeti Judet *</option>
                                              @foreach($regions as $region)
                                              <option value="{{$region->region_id}}">{{$region->region_name}}</option>
                                              @endforeach
                                          </select>
                                          </div>
                                          <div class="col-md-6 mt-2 mb-2 rc">
                                              <label for="">Alegeti Oras(Dupa Judet)</label>
                                              <select name="" id="" class="form-control" style="height:46px;">
                                              <option value="">Alegeti Oras</option>    
                                          </select>
                                          </div>
                                          <div class="col-md-4">
                                              <label for="">Adresa de livrare</label>
                                              <input type="text" class="form-control" name="delivery_address" value="{{$user->user_address}}">
                                              <input type="hidden" name="request_domain" value="{{$domain->id}}">
                                              <input type="hidden" name="request_number" value="{{mt_rand()}}">
                                          </div>
                                          <div class="col-md-4">
                                              <label for="">Comuna/Sat</label>
                                              <input type="text" class="form-control" name="rural_name" value="{{$user->rural_name}}">
                                          </div>
                                          <div class="col-md-4">
                                              <label for="">Alegeti marca(Optional)</label>
                                              <select name="brand" id="brand" class="form-control" style="height:46px;">
                                              <option value="">Alegeti Marca</option>
                                              @foreach($domain->brand as $brand)
                                              <option value="{{$brand->id}}">{{$brand->brand_title}}</option>
                                              @endforeach
                                              </select>
                                          </div>
                                          <div class="col-md-12">
                                              <h5 class="text-center">Optiuni de cautare(Obligatoriu)</h5>
                                          </div>
                                          <div class="col-md-4">
                                              <label for=""><input type="radio" name="searching_params" id="sp" value="1">Cautare Locala *</label>
                                          </div>
                                          <div class="col-md-4">
                                              <label for=""><input type="radio" name="searching_params" id="sp" value="2">Cautare Nationala *</label>
                                          </div>
                                        </div>
                                        </div>
										<div class="col-md-12 mb-2 mt-2">
                         		
                               
                                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                
								@if($errors->has('g-recaptcha-response'))
                                             <span class="help-block">
                                                              <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                          </span>                                                                      
                                             @endif
								</div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success" type="submit" form="main-form">
                                    Trimiteti Cerere
                                </button>
                            </div>
                            </div>
                        </div>
                    @if($gs->category->count())
                        <hr>
                    @endif
                   
                        <div class="row">   
                               @foreach($gs->section as $section)
                               @if($section->page_type=='small')
                               <?=$section->html;?>

                               @endif
                                @endforeach
                        </div>
                  
                   

@endsection
@push('scripts')
<<script>
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
  
            op+='<label>Oras</label><select style="color:black; height:46px;" name="request_city" id="city" class="form-control" required>';
            op+='<option style="color:black" value="">Alegeti Oras</option>';
            for(var i=0;i < data.length;i++){
  
            op+='<option style="color:black" value="'+data[i].city_id+'">'+data[i].city_name+'</option>';
            }
           
            op+='</select>@if($errors->has('city_param'))<span class="help-block"><strong>{{ $errors->first('city_param') }}</strong></span>@endif';
  
  
          $('.rc').html(op);
  
  
          },
          error:function(){
     
          }
        });
      });
});
   
    </script>
	
	<script>
$('#prepend').click(function(e){
	e.preventDefault();
	$('#more').append('<div id="show" class="row"><div class="col-md-6"><label>Unitate de masura</label><input type="text" name="part_input1[]" class="form-control"></div><div class="col-md-6"><label>Denumire</label><input type="text" name="part_input2[]" class="form-control"></div><div class="col-md-6"><label>Cod Produs</label><input type="text" name="part_input3[]" class="form-control"></div><div class="col-md-6"><label>Cantitate</label><input type="number" class="form-control" name="part_input4[]"></div><div class="col-md-6"><label>Poza</label><input type="file" name="image[]" class="form-control"></div><div class="col-md-6"><label>Poza2</label><input type="file" name="image[]" class="form-control"></div><div class="col-md-6"><button class="btn btn-sm btn-danger" id="remove"><i class="fa fa-trash"></i> Sterge</button></div></div>');
});

$(document).on('click','#remove',function(e){
                e.preventDefault();
                let show =$(this).parent().parent();

                $(show).remove();
            });
</script>
    
@endpush
