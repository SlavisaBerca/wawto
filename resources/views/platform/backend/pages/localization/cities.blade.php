@extends('layouts.platform.backend')
@section('content')

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
                                    <h4 class="mb-sm-0">Judete</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Administatie</a></li>
                                            <li class="breadcrumb-item active">Vizualizare</li>
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
                                        <h4 class="card-title mb-0">Administratie de judete</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div id="customerList">
                                            <div class="row g-4 mb-3">
                                                <div class="col-sm-auto">
                                                    <div>
                                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Adauga</button>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div class="d-flex justify-content-sm-end">
                                                        <div class="search-box ms-2">
                                                            <input type="text" class="form-control search" placeholder="cautare...">
                                                            <i class="ri-search-line search-icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="table-responsive table-card mt-3 mb-1">
                                                <table class="table align-middle table-nowrap" id="customerTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                           
                                                            <th class="sort" data-sort="customer_name">Denumire</th>
                                                           
                                                            <th class="sort" data-sort="phone">Judet</th>
                                                           
                                                            <th class="sort" data-sort="action">Action</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
													@foreach($citys as $city)
													<?php $region=\App\Models\Platform\Region::where('region_id',$city->region_id)->first();?>
                                                        <tr>
                                                           
                                    
                                                            <td class="customer_name">{{$city->city_name}}</td>
                                                           
                                                        
                                                    
															<td class="email">{{$region->region_name}}</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#showModal{{$city->city_id}}">Editare</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{$city->city_id}}">Sterge</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
														
														
														
														 <div class="modal fade" id="showModal{{$city->city_id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
                                    <form action="{{route('edit-city',$city->city_id)}}" method="post">
										{{csrf_field()}}
                                        <div class="modal-body">

	  <div>
                                                <label for="status-field" class="form-label">Judet</label>
                                               <select name="region_id" class="form-control" reguired>
                                                    <option value="">Alegeti Judet</option>
													<?php $regions=\App\Models\Platform\Region::all();?>
													@foreach($regions as $region_add)
													@if($region_add->region_id !== $city->region_id)
                                                    <option value="{{$region_add->region_id}}">{{$region_add->region_name}}</option>
													@endif
													@endforeach
                                                  
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Denumire</label>
                                                <input type="text" name="city_name" value="{{$city->city_name}}" id="customername-field" class="form-control" placeholder="Denumire" required />
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Inchide</button>
                                                
                                                <button type="submit" class="btn btn-success" id="edit-btn">Editare</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
						
						
                        <!-- Modal -->
                        <div class="modal fade zoomIn" id="deleteRecordModal{{$city->city_id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mt-2 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                <h4>Sigur doriti sa stergeti Oras {{$city->city_name}} ?</h4>
                                                <p class="text-muted mx-4 mb-0">Ce se va intampla?</p>
												 <p class="mx-4 mb-0">Va dispare orasul din baza de date, odata cu el vor dispare si comune daca sunt alocate!!</p>
												 <p>Acest lucru este ireversibil....</p>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Inchide</button>
                                            <a href="{{route('delete-city',$city->city_id)}}" class="btn w-sm btn-danger " id="delete-record">Da, Sterge Oras!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal -->

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="noresult" style="display: none">
                                                    <div class="text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                                        </lord-icon>
                                                        <h5 class="mt-2">Imi pare rau !</h5>
                                                        <p class="text-muted mb-0">Nu am gasit niciun rezultat pentru cautare Dumneavoastra, incercam cu altceva?.</p>
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


                        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
                                    <form action="{{route('add-city')}}" method="post">
										{{csrf_field()}}
                                        <div class="modal-body">

                                           
												  <div>
                                                <label for="status-field" class="form-label">Judet</label>
                                               <select name="region_id" class="form-control" reguired>
                                                    <option value="">Alegeti Judet</option>
													<?php $regions=\App\Models\Platform\Region::all();?>
													@foreach($regions as $region_add)
                                                    <option value="{{$region_add->region_id}}">{{$region_add->region_name}}</option>
													@endforeach
                                                  
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Denumire</label>
                                                <input type="text" name="city_name" id="customername-field" class="form-control" placeholder="Enter Name" required />
                                            </div>

                                           
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Inchide</button>
                                                <button type="submit" class="btn btn-success" id="add-btn">Adauga</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mt-2 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                <h4>Are you Sure ?</h4>
                                                <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal -->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Velzon.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
			
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

       
 
			@endpush