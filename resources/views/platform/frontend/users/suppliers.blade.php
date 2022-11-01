@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();

if(isset($_GET['limit'])){
    $limit=$_GET['limit'];
    if($limit=='all'){
        $per_page=1000000000000;
    }else{
        $per_page=$limit;
    }
  
}else{
    $per_page=18;
}

$start=0;
$current_page=1;

$total_pages=ceil($count/$per_page);
if(isset($_GET['page'])){
$start=$_GET['page'];
	if($start >= 0){
		$start=0;
		$current_page=1;
	}else{
		$current_page=$start;
	$start=$_GET['page'];
	$start--;
	$start=$start*$per_page;	
	}

}

?>
@section('content')
                    <div class="col-lg-9">
                        <div class="main-content">
                          
               
                        <div class="category-banner banner text-uppercase" style="height:300px;background: no-repeat 60%/cover url('{{URL::to('platform/frontend/assets/images/banners/banner.jpg')}}');">
                            <div class="row">
                              
                                <div class="col-sm-4 offset-sm-0 offset-1">
                                   
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="sticky-wrapper"><nav class="toolbox sticky-header mt-2" data-sticky-options="{'mobile': true}">
                            <div class="toolbox-left">
                                <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
										<line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
										<line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
										<line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
										<line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
										<line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
										<path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
										<path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
										<path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
										<path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
									</svg>
									<span>Filter</span>
								</a>
                                <form action="{{route('suppliers')}}" method="get" id="order-form">
                                <div class="toolbox-item toolbox-sort">
                                    <label>Sortare:</label>

                                    <div class="select-custom">
                                        <select name="order" id="order" class="form-control">
											<option value="default" selected="selected">Sortare implicita</option>
											<option value="desc">Mai noi catre mai vechi</option>
											<option value="asc">Mai vechi catre mai noi</option>
											
										</select>
                                    </div>
                                    <!-- End .select-custom -->


                                </div>
                                <!-- End .toolbox-item -->
                            </form>
                            </div>
                            <!-- End .toolbox-left -->
                            <form action="{{route('suppliers')}}" method="get" id="limit-form">
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Afisez:</label>

                                    <div class="select-custom">
                                      
                                        <select name="limit" class="form-control" id="limit">
											<option value="">{{$suppliers->count()}}</option>
											<option value="48">48</option>
											<option value="96">96</option>
                                            <option value="all">Toate</option>
										</select>
                                    
                                    </div>
                                    <!-- End .select-custom -->
                             
                                </div>
                                <!-- End .toolbox-item -->

                                <div class="toolbox-item layout-modes">
                                    <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div>
                                <!-- End .layout-modes -->
                            </div>
                            <!-- End .toolbox-right -->
                        </form>
                        </nav></div>

                        <div class="row">
                          @foreach($suppliers as $supplier)
                          <div class="col-6 col-sm-4">
                            <div class="product-default">
                                @if($supplier->profile_image)

                                    <a href="{{route('suppliers')}}">
                                        <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$supplier->personal_code.'/profile_images/'.$supplier->profile_image)}}"class="rounded-circle mb-2"  width="280" height="280" alt="product" style="width:100%;">
                                       
                                    </a>

                                    @else 
                                      <a href="{{route('suppliers')}}">
                                        <img src="{{URL::to('platform/frontend/assets/images/customer_images/no_image.jpg')}}" width="280" height="280" alt="product" style="width:100%;" class="rounded-circle">
                                     
                                    </a>
                                
                                    @endif
									
                                <div class="product-details">
                                 
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Firma:</th>
                                        <th>{{$supplier->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Judet:</th>
                                        <th>{{$supplier->region->region_name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Oras: </th>
                                        <th>{{$supplier->city->city_name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Reiting</th>
                                        <th>
                                            <?php 
                     $start_rate=$supplier->rating->sum('rating');
                     $devide=$supplier->rating()->count();
                     if($devide > 0){
                         $rating=$start_rate/$devide;
                     }
                    
 
                    ?>
                    @if($supplier->rating->count())
                   
              
                    @if($rating > 0 && $rating < 1.6)
                         <i class="fa fa-star"></i>
                         <i class="far fa-star"></i>
                         <i class="far fa-star"></i>
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
                 </th>
                                    </tr>

                                    <tr>
                                        <th>Bazat pe:</th>
                                        <th>{{$supplier->rating->count()}} Revs.</th>
                                    </tr>
                                    <tr>
                                        <th>Vizualizare: </th>
                                        <th><button class="btn btn-gray btn-sm" data-toggle="modal" data-target="#view{{$supplier->id}}" id="view"><i class="fa fa-eye text-dark"></i></button> </th>
                                    </tr>
                                </table>
                                    <!-- End .price-box -->

                                   
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- End .col-sm-4 -->
                         

                             <!-- Modal -->
                             <div class="modal fade zoomIn" id="view{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content" style="background:turquoise;border-radius:30px 20px;">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Detali {{$supplier->name}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body" style="overflow:hidden;">
                                      <div class="row">
                                          <div class="col-md-5">
  
                                              @if($supplier->profile_image)
  
                                              <img src="{{URL::to('platform/frontend/assets/images/customer_images/'.$supplier->personal_code.'/profile_images/'.$supplier->profile_image)}}" alt="" class="rounded-circle">
                                              
                                              @else 
  
                                              <img src="{{URL::to('platform/frontend/assets/images/customer_images/no_image.jpg')}}" alt="" class="rounded-circle">
  
                                              @endif
										
											   
											   <span class="rating-stars"> 
                                                            <a class="star-1"  href="/add-rating-one/{{$supplier->id}}">1</a>
                                                            <a class="star-2" href="/add-rating-two/{{$supplier->id}}">2</a>
                                                            <a class="star-3" href="/add-rating-three/{{$supplier->id}}">3</a>
                                                            <a class="star-4" href="/add-rating-four/{{$supplier->id}}">4</a>
                                                            <a class="star-5"href="/add-rating-five/{{$supplier->id}}">5</a>
                                                        </span>
                                          </div>
                                          <div class="col-md-7">
                                          <div class="card">
                                              <div class="card-body">
                                                  <table class="table table-bordered">
  
                                                      <tr>
                                                          <th>Firma:</th>
                                                          <th>{{$supplier->name}}</th>
                                                      </tr>
  
                                                      <tr>
                                                          <th>Judet:</th>
                                                          <th>{{$supplier->region->region_name}}</th>
                                                      </tr>
  
                                                      <tr>
                                                          <th>Oras</th>
                                                          <th>{{$supplier->city->city_name}}</th>
                                                      </tr>
  
                                                      <tr>
                                                          <th>Cui:</th>
                                                          <th>{{$supplier->cui}}</th>
                                                      </tr>
  
                                                      <tr>
                                                          <th>Nr. Inregistrari (J)</th>
                                                          <th>{{$supplier->registration_number}}</th>
                                                      </tr>
  
                                                      <tr>
                                                          <th>IBAN:</th>
                                                          <th>{{$supplier->iban}}</th>
                                                      </tr>
  
                                                      <tr>
                                                          <th>Banca: </th>
                                                          <th>{{$supplier->bank}}</th>
                                                      </tr>
  
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                    </div>
                                   <div class="modal-footer mt-3"></div>
                                  </div>
                                </div>
                              </div>
                              <!--User Modal --ends-->


                          @endforeach
                        </div>
                        <!-- End .row -->

                        <nav class="toolbox toolbox-pagination">
                            <form action="{{route('suppliers')}}" method="get" id="limit-form-down">
                            <div class="toolbox-item toolbox-show">
                                <label>Afisez:</label>

                                <div class="select-custom">
                                    <select name="limit" id="limit-down" class="form-control">
										<option value="{{$suppliers->count()}}">{{$suppliers->count()}}</option>
										<option value="48">48</option>
										<option value="96">96</option>
                                        <option value="all">Toate</option>
									</select>
                                </div>
                                <!-- End .select-custom -->
                            </div>
                            <!-- End .toolbox-item -->
                        </form>
                            <ul class="pagination toolbox-item">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="demo40-shop.html#"><i class="icon-angle-left"></i></a>
                                </li>
                     @for($i=1;$i <= $total_pages; $i++)
               
                    <?php 
                    $class='';
                    if($current_page==$i){
                        $class="current";
                        $active='active';
                    }
                    ?>
                                <li class="page-item {{$active}}">
                                <a class="page-link" href="?page=<?=$i;?> "><?=$i;?> <span class="sr-only">({{$class}})</span></a>
                                </li>
                    @endfor 
                                <li class="page-item">
                                         <a class="page-link page-link-btn" href="?page=<?=$i++;?>"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                        <hr>
@endsection

@push('scripts')
<script>
    $(document).on('change','#limit',function(){
        $('#limit-form').submit();
    });
</script>
<script>
    $(document).on('change','#limit-down',function(){
        $('#limit-form-down').submit();
    });
</script>
<script>
    $(document).on('change','#order',function(){
        $('#order-form').submit();
    });
</script>
@endpush
