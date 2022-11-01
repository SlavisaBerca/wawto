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
                                    <h4 class="mb-sm-0">Marci</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Management</a></li>
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
                                        <h4 class="card-title mb-0">Management Marci</h4>
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
                                                            <input type="text" class="form-control search" placeholder="Cautare...">
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
                                                            <th class="sort" data-sort="email">Domeniu</th>
                                                            <th class="sort" data-sort="phone">Poza</th>
                                                            <th class="sort" data-sort="phone"> Actiuni
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Sterge Toate</button>
                                                    </div>
                                                            </th>
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        @foreach($gs->brand as $brand)
                                                        <tr>
                                                           
                                                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                                            <td class="customer_name">{{$brand->brand_title}}</td>
                                                            <td class="status"><span class="badge badge-soft-success text-uppercase">{{$brand->domain->domain_title}}</span></td>
                                                            <td class="status"><img src="{{URL::to('platform/frontend/assets/images/brands/'.$brand->brand_image)}}" style="height:50px; width:50px;"></td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#showModal{{$brand->id}}">Editare</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Sterge</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>


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
                                            <h4>Sunteti constienti de consequente ?</h4>
                                            <p class="text-muted mx-4 mb-0">Ce sa va intampla daca stergeti Marca {{$brand->brand_title}} ?</p>
                                                <p>Se va ascunde cereri care sunt filtrate dupa marca si furnizori nu le mai pot vede in interfata platformei!!!</p>
                                                <p>Acest lucru nu este reversibil....!!!</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Inchide</button>
                                            <a href="{{route('delete-brand',$brand->id)}}" class="btn w-sm btn-danger " id="delete-record">Da, Sterge le!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal -->

                                                        <div class="modal fade" id="showModal{{$brand->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
                                    <form action="{{route('edit-brand',$brand->id)}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">

                                           

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Domeniu *</label>
                                               <select name="domain_id" id="domain_id" class="form-control">
                                                   <option value="{{$brand->domain->id}}" selected>{{$brand->domain->domain_title}}</option>
                                                   @foreach($gs->domain as $domain)
                                                   <option value="{{$domain->id}}">{{$domain->domain_title}}</option>
                                                   @endforeach
                                               </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email-field" class="form-label">Denumire *</label>
                                                <input type="text" id="email-field" name="title" value="{{$brand->brand_title}}" class="form-control" placeholder="Denumire" required />
                                            </div>

                                            <div class="mb-3">
                                                <img src="{{URL::to('frontend/assets/images/brands/'.$brand->brand_image)}}" style="width:100px;height:100px;"/>
                                                <label for="phone-field" class="form-label">Image *</label>
                                                <input type="file" name="image"id="phone-field" class="form-control"required />
                                            </div>

                                           

                                            
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                              
                                                <button type="submit" class="btn btn-success" id="edit-btn">Editare</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                                                      @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="noresult" style="display: none">
                                                    <div class="text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                                        </lord-icon>
                                                        <h5 class="mt-2">Imi pare rau! Nu am gasit niciun rezultat</h5>
                                                        <p class="text-muted mb-0">In tabela nu se a gasit nicio marca care contine ceva din criterii de cautare care am incercat. Sa incercam altceva?</p>
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
                                    <form action="{{route('add-brand')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">

                                           

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Domeniu *</label>
                                               <select name="domain_id" id="domain_id" class="form-control">
                                                   <option value="">Alegeti Domeniu</option>
                                                   @foreach($gs->domain as $domain)
                                                   <option value="{{$domain->id}}">{{$domain->domain_title}}</option>
                                                   @endforeach
                                               </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email-field" class="form-label">Denumire *</label>
                                                <input type="text" id="email-field" name="title" class="form-control" placeholder="Denumire" required />
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone-field" class="form-label">Image *</label>
                                                <input type="file" name="image"id="phone-field" class="form-control"required />
                                            </div>

                                           

                                            
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                              
                                                <button type="submit" class="btn btn-success" id="edit-btn">Adauga</button>
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
                                            <h4>Sunteti constienti de consequente ?</h4>
                                            <p class="text-muted mx-4 mb-0">Ce sa va intampla daca stergeti Marca?</p>
                                                <p>Se va ascunde cereri care sunt filtrate dupa marca si furnizori nu le mai pot vede in interfata platformei!!!</p>
                                                <p>Acest lucru nu este reversibil....!!!</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Inchide</button>
                                            <a href="{{route('delete-brands')}}" class="btn w-sm btn-danger " id="delete-record">Da, Sterge le!</a>
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
        <!-- prismjs plugin -->
        <script src="{{URL::to('backend/assets/libs/prismjs/prism.js')}}"></script>
        <script src="{{URL::to('backend/assets/libs/list.js/list.min.js')}}"></script>
        <script src="{{URL::to('backend/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>

        <!-- listjs init -->
        <script src="{{URL::to('backend/assets/js/pages/listjs.init.js')}}"></script>

        <!-- App js -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="  crossorigin="anonymous"></script>

@endpush