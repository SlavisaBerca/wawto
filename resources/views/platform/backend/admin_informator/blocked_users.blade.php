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
                                    <h4 class="mb-sm-0">Lista utilizatori blocati</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Acasa</a></li>
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
                                        <h4 class="card-title mb-0">Vizualizare Blocati</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div id="customerList">
                                            <div class="row g-4 mb-3">
                                                <div class="col-sm-auto">
                                                   
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
                                                            <th class="sort" data-sort="customer_name">Nume/Firma</th>
                                                            <th class="sort" data-sort="email">Email</th>
                                                            <th class="sort" data-sort="phone">Telefon</th>
                                                            <th class="sort" data-sort="date">Judet</th>
                                                            <th class="sort" data-sort="status">Oras</th>
                                                            <th class="sort" data-sort="action">Actiuni</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                     
														@foreach($clients as $client)
                                                        <tr>
                                                           
                                                            
                                                            <td class="customer_name">{{$client->name}}</td>
                                                            <td class="email">{{$client->email}}</td>
															@if($client->user_phone)
                                                            <td class="phone">{{$client->user_phone}}</td>
															@else 
															<th></th>
															@endif
                                                           @if($client->user_region)
                                                            <td class="phone">{{$client->region->region_name}}</td>
															@else 
															<th></th>
															@endif
                                                              @if($client->user_city)
                                                            <td class="phone">{{$client->city->city_name}}</td>
															@else 
															<th></th>
															@endif
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <a class="btn btn-sm btn-success edit-item-btn"
                                                                        href="{{route('preview',$client->id)}}">Vizualizare</a>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Blocheaza</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
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