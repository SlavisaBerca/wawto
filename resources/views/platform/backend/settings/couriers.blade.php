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
                                    <h4 class="mb-sm-0">Curieri</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Vizualizare</a></li>
                                            <li class="breadcrumb-item active">Acasa</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                          <!-- end page title -->
                          @if(session()->has('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Sucess!</strong> {{session()->get('success')}}.
                          
                            </div>
                          @endif
                          @if(session()->has('error'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Eroare!</strong> {{session()->get('error')}}.
                          
                            </div>
                          @endif
                          @if ($errors->any())
                          <div class="alert alert-danger alert-dissmissible">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Adauga, Editare & Stergere</h4>
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
                                                           
                                                            <th class="sort" data-sort="customer_name">Nume</th>
                                                            <th class="sort" data-sort="email">Pret Initial</th>
                                                            <th class="sort" data-sort="phone">Limita KG</th>
                                                            <th class="sort" data-sort="action">Peste limita Lei/Kg</th>
                                                            <th>Dedicat</th>
                                                            <th>Actiuni</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        @foreach($couriers as $courier)
                                                        <tr>
                                                           
                                                         
                                                            <td class="customer_name">{{$courier->name}}</td>
                                                            <td class="email">{{$courier->pay_load}}</td>
                                                            <td class="email">{{$courier->payload_limit}}</td>
                                                            <td class="email">{{$courier->overload}}</td>
                                                            @if($courier->is_default)

                                                            <td><i class="fa fa-check"></i> </td>
                                                            @else 

                                                            <td><i class="fa fa-times circle"></i></td>

                                                            @endif
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#showModal{{$courier->id}}"><i class="fa fa-edit"></i> Editare</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <a class="btn btn-sm btn-danger remove-item-btn" href="{{route('delete-courier',$courier->id)}}"><i class="fa fa-trash"></i> Sterge</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>



                                                        <!-- Edit modal -->

                                                        
                        <div class="modal fade" id="showModal{{$courier->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form action="{{route('edit-courier',$courier->id)}}" method="post" enctype="multipart/form-data">

                                    {{csrf_field()}}

                                    <div class="modal-body">

                                       

                                        <div class="mb-3">
                                            <label for="customername-field" class="form-label">Denumire</label>
                                            <input type="text" id="customername-field" class="form-control" value="{{$courier->name}}" name="name" placeholder="Denumire" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="customername-field" class="form-label">Pret initial</label>
                                            <input type="number" id="customername-field" class="form-control" value="{{$courier->pay_load}}" name="pay_load" placeholder="Denumire" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="customername-field" class="form-label">Limita KG</label>
                                            <input type="number" id="customername-field" name="payload_limit" value="{{$courier->payload_limit}}" class="form-control" />
                                        </div>
                                      

                                        <div class="mb-3">
                                            <label for="customername-field" class="form-label">Peste limita Lei/Kg</label>
                                            <input type="number" step="1" id="customername-field" value="{{$courier->overload}}" name="over_load" class="form-control" />
                                        </div>
                                        @if(!$courier->is_default)
                                        <div class="mb-3">
                                            <label for="customername-field" class="form-label">Dedicat
                                            <input type="checkbox"  id="customername-field" value="1" name="is_default" />
                                       </label>
                                        </div>

                                        @else 

                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Inchide</button>
                                            <button type="submit" class="btn btn-success" id="add-btn">Editare</button>
                                          
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                                                        <!--Edit modal ends-->
                                                       @endforeach
                                                       
                                                    </tbody>
                                                </table>
                                                <div class="noresult" style="display: none">
                                                    <div class="text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                                        </lord-icon>
                                                        <h5 class="mt-2">Imi cer scuze!!!</h5>
                                                        <p class="text-muted mb-0">Momentan nu am gasit niciun rezultat pentru cautare Dumneavoastra. Incercati cu alte cuvinte....</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex justify-content-end">
                                                <div class="pagination-wrap hstack gap-2">
                                                    <a class="page-item pagination-prev disabled" href="{{route('categories')}}">
                                                        Prima
                                                    </a>
                                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                                    <a class="page-item pagination-next" href="{{route('categories')}}#">
                                                        Ultima
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
                                    <form action="{{route('add-courier')}}" method="post" enctype="multipart/form-data">

                                        {{csrf_field()}}

                                        <div class="modal-body">

                                           

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Denumire</label>
                                                <input type="text" id="customername-field" class="form-control" name="name" placeholder="Denumire" required />
                                            </div>

                                           

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Limita/KG</label>
                                                <input type="number" id="customername-field" name="payload_limit" class="form-control" />
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Peste Limita/Lei KG</label>
                                                <input type="number" step="1" id="customername-field"  name="overload" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Pretul initial</label>
                                                <input type="number"  id="customername-field"  name="pay_load" class="form-control" />
                                            </div>

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label"><input type="checkbox" value="1" name="is_default"> Curier Dedicat</label>
                                               
                                            </div>

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

                      

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

               
@endsection
@push('scripts')
        <!-- prismjs plugin -->
        <script src="{{URL::to('Platform/backend/assets/libs/prismjs/prism.js')}}"></script>
        <script src="{{URL::to('Platform/backend/assets/libs/list.js/list.min.js')}}"></script>
        <script src="{{URL::to('Platform/backend/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>

        <!-- listjs init -->
        <script src="{{URL::to('Platform/backend/assets/js/pages/listjs.init.js')}}"></script>

        <!-- App js -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="  crossorigin="anonymous"></script>
  <script type="text/javascript">
@endpush