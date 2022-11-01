@extends('layouts.platform.backend')
<?php $gs = generalsetting();?>
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
                                    <h4 class="mb-sm-0">Maxi Boxe</h4>

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
                                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addMoal"><i class="ri-add-line align-bottom me-1"></i> Adauga</button>
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
                                                            
                                                            <th class="sort" data-sort="customer_name">Tip</th>
                                                            <th class="sort" data-sort="email">Dizain</th>
                                                           
                                                            
                                                            <th class="sort" data-sort="phone">Actiuni</th>
                                                      
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        @foreach($maxiboxes as $box)
                                                        @if($box->box_type=='maxi')
                                                        <tr>
                                                           
                                                           
                                                            <td class="customer_name">{{$box->page_type}}</td>
                                                            <td class="email"><?=$box->html;?></td>
                                                          
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#editModal{{$box->box_id}}"><i class="fa fa-edit"></i> Editare</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <a class="btn btn-sm btn-danger remove-item-btn" href="{{route('delete-box',$box->box_id)}}"><i class="fa fa-trash"></i> Sterge</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endif

                                                        <!--Edit modal start-->


                                                        
                        <div class="modal fade" id="editModal{{$box->box_id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form action="{{route('edit-maxibox',$box->box_id)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-body">

                                     

                                        <div class="mb-3">
                                            <label for="customername-field" class="form-label">Icon</label>
                                            <input type="text" name="icon"  id="customername-field" value="{{$box->icon}}" class="form-control" placeholder="Exemplu fa fa-cog" required />
                                        </div>

                                        
                                        <div>
                                            <label for="status-field" class="form-label">Pagina</label>
                                            <select class="form-control" data-trigger name="page_id" id="status-field" >
                                                <option value="" selected>Alegeti Pagina</option>
                                                @foreach($gs->menu as $page)
                                                <option value="{{$page->menu_id}}">{{$page->menu_title}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>

                                        <div class="mb-3" id="page_type">
                                            <label for="date-field" class="form-label">Alegeti pagina statica</label>
                                            <select name="page_type" id="pt" class="form-control">
                                                <option value="" selected disabled>Pagini Statice</option>
                                                <option value="search">Pagina de cautare</option>
                                                <option value="home">Pagina Home</option>
                                                <option value="users">Pagina de utilizatori</option>
                                                <option value="request">Formular de cerere avansat</option>
                                                <option value="qick">Formular de cerere rapid</option>
                                                <option value="">Alaturi paginei</option>
                                                
                                            </select>
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


                                                        <!--Edit modal Edns-->


                                                         <!-- Modal -->
                                                        <div class="modal fade zoomIn" id="deleteModal{{$box->box_id}}" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Inchide" id="btn-close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mt-2 text-center">
                                                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                                <h4>Sigur doriti sa stergeti box ?</h4>
                                                                                <p class="text-muted mx-4 mb-0">Click pe inchide daca nu doriti acest lucru !</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Inchide</button>
                                                                            <a href = "{{route('delete-box',$box->box_id)}}" class="btn w-sm btn-danger " id="delete-record">Da, Sterge !</a>
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

                  
                        <div class="modal fade" id="addMoal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
                                    <form action="{{route('add-maxibox')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="modal-body">
    
                                         
    
                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Icon</label>
                                                <input type="text" name="icon"  id="customername-field"  class="form-control" placeholder="Exemplu fa fa-cog" required />
                                            </div>
    
                                            <div class="mb-3">
                                                <label for="">Continut Text</label>
                                                <textarea  name="html" id="" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                            <div>
                                                <label for="status-field" class="form-label">Pagina</label>
                                                <select class="form-control" data-trigger name="page_id" id="status-field" >
                                                    <option value="" selected>Alegeti Pagina</option>
                                                    @foreach($gs->menu as $page)
                                                    <option value="{{$page->menu_id}}">{{$page->menu_title}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
    
                                            <div class="mb-3"  id="page_type">
                                                <label for="date-field" class="form-label">Alegeti pagina statica</label>
                                                <select name="page_type" id="pt" class="form-control">
                                                    <option value="" selected disabled>Pagini Statice</option>
                                                    <option value="search">Pagina de cautare</option>
                                                    <option value="home">Pagina Home</option>
                                                    <option value="users">Pagina de utilizatori</option>
                                                    <option value="request">Formular de cerere avansat</option>
                                                    <option value="qick">Formular de cerere rapid</option>
                                                    <option value="">Alaturi paginei</option>
                                                    
                                                </select>
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
  <script src="{{URL::to('platform/backend/assets/js/tinymce/tinymce.min.js')}}"></script>
  <script>tinymce.init({ selector:'textarea'});</script>
  <script type="text/javascript">
  $(document).on('change','#pi',function(){
     var val = $('#pi').val();
     if(val == ''){
         $('#page_type').removeAttr('style');
     }
  });
  $(document).on('change','#pt',function(){
      var value = $('#pt').val();
      if(value == ''){
          $('#page_id').removeAttr('style');
          $('#pt').attr('required');
          $('#page_type').attr('style','display:none;')
      }
  });
  </script>
  
@endpush