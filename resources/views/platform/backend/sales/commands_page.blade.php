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
                                    <h4 class="mb-sm-0">Cereri Pe Platforma</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Acasa</a></li>
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
                                        <h4 class="card-title mb-0">Monitoring Cereri</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div id="customerList">
                                            <div class="row g-4 mb-3">
                                           
                                            </div>
                                            
                                            <div class="table-responsive table-card mt-3 mb-1">
                                                <table class="table align-middle table-nowrap" id="customerTable">
                                                    <thead class="table-light">
                                                        <tr>
                                             
                                                            <th class="sort" data-sort="customer_name">Numarul</th>
                                                            <th class="sort" data-sort="email">Client</th>
                                                            <th class="sort" data-sort="phone">Furnizor</th>
                                                            <th class="sort" data-sort="date">Judet</th>
                                                            <th class="sort" data-sort="status">Oras</th>
                                                            <th class="sort" data-sort="action">Total</th>
															<th class="sort" data-sort="action">Status</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
														@foreach($commands as $command)
                                                        <tr>
                                                         
                                                             <td class="customer_name">{{$command->number}}</td>
                                                            <td class="customer_name">{{$command->commandclient->name}}</td>
                                                         <td class="customer_name">{{$command->supplier->name}}</td>
                                                            <td class="phone">{{$command->request->location->region_name}}</td>
                                                             <td class="phone">{{$command->request->city->city_name}}</td>
															<td class="date">{{$command->total_ammount}} {{$command->offer->currency}}</td>
                                                          @if(!$command->status && $command->confirm_limit > date('Y-m-d H:i:s'))
														  <td class="status"><span class="badge badge-soft-danger text-uppercase">Asteapta Confirmare</span></td>
														@endif
														@if(!$command->status && $command->confirm_limit < date('Y-m-d H:i:s'))
														  <td class="status"><span class="badge badge-soft-danger text-uppercase">Expirata</span></td>
														@endif
															@if($command->status===1)
														  <td class="status"><span class="badge badge-soft-info text-uppercase">Confirmata</span></td>
															@endif
															@if($command->status===2)
																<td class="status"><span class="badge badge-soft-warning text-uppercase">Realizata cu checkout</span></td>
															@endif
																@if($command->status===3)
																<td class="status"><span class="badge badge-soft-primary text-uppercase">Retur a fost cerut</span></td>
															@endif
																@if($command->status===4)
																<td class="status"><span class="badge badge-soft-success text-uppercase">Colet Ridicat</span></td>
															@endif
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