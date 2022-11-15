@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();
$suppliers = getSuppliers();
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

$total_pages=ceil($requests_count/$per_page);
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
                            <div class="sticky-wrapper"><nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                                <div class="toolbox-left">
                                    <a href="#" class="sidebar-toggle">
                                        <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
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
    
                                    <div class="toolbox-item toolbox-sort">
                                        <label>Sortare:</label>
    
                                        <div class="select-custom">
                                            <select name="orderby" class="form-control">
                                                <option value="menu_order" selected="selected">Sortare</option>
                                                <option value="popularity">Mai noi catre mai vechi</option>
                                                <option value="rating">Mai vechi catre mai noi</option>
                                               
                                            </select>
                                        </div>
                                        <!-- End .select-custom -->
    
    
                                    </div>
                                    <!-- End .toolbox-item -->
                                </div>
                                <!-- End .toolbox-left -->
    
                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-show">
                                        <label>Afiseaza:</label>
    
                                        <div class="select-custom">
                                            <select name="count" class="form-control">
                                                <option value="12">{{$requests_count}}</option>
                                                <option value="24">{{$gs->local_set * 2}}</option>
                                                <option value="36">{{$gs->local_set * 4}}</option>
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
                            </nav></div>
                            <hr>
                            <div class="row">
                            <?php getLocalRequests();?>
                            </div>
                            <!-- End .row -->
    
                            <nav class="toolbox toolbox-pagination">
                                <div class="toolbox-item toolbox-show">
                                    <label>Afiseaza:</label>
    
                                    <div class="select-custom">
                                        <select name="count" class="form-control">
                                            <option value="12">{{$requests_count}}</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                </div>
                                <!-- End .toolbox-item -->
    
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
@endsection              