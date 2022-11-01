@extends('layouts.platform.backend')

@section('content')

            <div class="vertical-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Orase Vechi</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Recuperare</a></li>
                                            <li class="breadcrumb-item active">Acasa</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Editare Orase Vechi</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div id="customerList">
                                            <div class="row g-4 mb-3">
                                                <div class="col-sm-auto">
                                                    <div>
                                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div class="d-flex justify-content-sm-end">
                                                        <div class="search-box ms-2">
                                                            <input type="text" class="form-control search" placeholder="Search...">
                                                            <i class="ri-search-line search-icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="table-responsive table-card mt-3 mb-1">
                                                <table class="table align-middle table-nowrap" id="customerTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col" style="width: 50px;">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                                </div>
                                                            </th>
                                                            <th class="sort" data-sort="customer_name">Denumire</th>
                                                            <th class="sort" data-sort="email">Judet</th>
                                                            <th class="sort" data-sort="phone">Actiune</th>
                                                           
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
													@foreach($city as $city)
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                                                </div>
                                                            </th>
                                                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                                            <td class="customer_name">{{$city->city_name}}</td>
															<?php $regi = \App\Models\Platform\Region::where('region_id',$city->region_id)->first();?>
															@if($regi)
                                                            <td class="email">{{$regi->region_name}}</td>
														
															@else 
																 <td class="email">Fara Judet</td>
														
															@endif
                                                            <td class="phone">580-464-4694</td>
                                                            <td class="date">06 Apr, 2021</td>
                                                            <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#city{{$city->city_id}}">Editare</button>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
														

                        <div class="modal fade" id="city{{$city->city_id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
									<div class="modal-body">
									 <form action="{{route('change-city',$city->city_id)}}" method="post" id="cit{{$city->city_id}}">
		{{csrf_field()}}
		<label>Nume</label>
		<input type="text" name="city_name" class="form-control" value="{{$city->city_name}}">
		<label>Judet</label>
		<select name="region_id" class="form-control">
		<option value="" selected>Alegeti Judet</option>
		@foreach($region as $ir)
			<option value="{{$ir->region_id}}">{{$ir->region_name}}</option>
	    @endforeach
		</select>
	</form>				
									</div>
									<div class="modal-footer">
        <button type="submit" form="cit{{$city->city_id}}" class="btn btn-primary">Editare</button>
        
      </div>
                                </div>
                            </div>
                        </div>

                       

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
														
@endforeach
                                                    </tbody>
                                                </table>
                                                <div class="noresult" style="display: none">
                                                    <div class="text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                                        </lord-icon>
                                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                                            orders for you search.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex justify-content-end">
                                                <div class="pagination-wrap hstack gap-2">
                                                    <a class="page-item pagination-prev disabled" href="tables-listjs.html#">
                                                        Previous
                                                    </a>
                                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                                    <a class="page-item pagination-next" href="tables-listjs.html#">
                                                        Next
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

@endsection
@push('scripts')
 <!-- JAVASCRIPT -->

         <!-- prismjs plugin -->
              <!-- prismjs plugin -->
        <script src="{{URL::to('platform/backend/assets/libs/prismjs/prism.js')}}"></script>
        <script src="{{URL::to('platform/backend/assets/libs/list.js/list.min.js')}}"></script>
        <script src="{{URL::to('platform/backend/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>

        <!-- listjs init -->
        <script src="{{URL::to('platform/backend/assets/js/pages/listjs.init.js')}}"></script>

        <!-- App js -->

        <!-- App js -->

       

        <!-- App js -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="  crossorigin="anonymous"></script>
  <script type="text/javascript">
@endpush