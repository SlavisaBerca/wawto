@extends('layouts.platform.backend')
<?php $gs= generalsetting();?>
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
                                    <h4 class="mb-sm-0">Slidere</h4>

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
                                                            
                                                            <th class="sort" data-sort="email">Pagina</th> 
                                                            <th>Test</th>                                                         
                                                            <th class="sort" data-sort="action">Actiuni</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        @foreach($slides as $slide)
                                                        <tr>
                                                            
                                                           
                                                            <td class="customer_name">{{$slide->page_type}}</td>
                                                      
                                                            <td><?=$slide->html;?></td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#viewModal{{$slide->slide_id}}"><i class="fa fa-eye"></i> Vizualizare</button>
                                                                    </div>
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#editModal{{$slide->slide_id}}"><i class="fa fa-edit"></i> Editare</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <a class="btn btn-sm btn-danger remove-item-btn" href="{{route('delete-slide',$slide->slide_id)}}"><i class="fa fa-trash"></i> Sterge</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        
                        <div class="modal fade" id="viewModal{{$slide->slide_id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form action="{{route('add-slide')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="modal-body">

                                        

                                        <div class="mb-3">
                                           <img style="width:100%;" src="{{URL::to('platform/frontend/assets/images/slider/'.$slide->folder.'/'.$slide->image)}}">
                                        </div>

                                        
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Incjide</button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                    <div class="modal fade" id="editModal{{$slide->slide_id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                            </div>
                            <form action="{{route('edit-slide',$slide->slide_id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-body">

                                    

                                    <div class="mb-3">
                                        <label for="customername-field" class="form-label">Descriptie</label>
                                      <textarea name="html" id="html" cols="30" class="form-control" rows="10"><?=$slide->html;?></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="email-field" class="form-label">Poza</label>
                                        <input type="file" id="email-field" class="form-control" name="image" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone-field" class="form-label">Link(optional)</label>
                                        <input type="text" id="phone-field" name="link" value="{{$slide->link}}" class="form-control"  placeholder="Link" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="date-field" class="form-label">Fisier</label>
                                        <input type="text" id="date-field" class="form-control" name="folder" value="{{$slide->folder}}" placeholder="Denumiti fisier unde se va salva" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="date-field" class="form-label">Latime(landscape sau patrat)</label>
                                        <input type="text" id="date-field" name="width" class="form-control" value="600"  name="folder" placeholder="Select Date" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="date-field" class="form-label">Inaltime</label>
                                        <input type="text" id="date-field" name="height" class="form-control" value="400"  name="folder" placeholder="Select Date" required />
                                    </div>
                                    <div>
                                        <label for="status-field" class="form-label">Visibil</label>
                                        <select class="form-control" data-trigger name="is_visible" id="status-field" >
                                            <option value="1" @if($slide->is_visible) selected @endif>Vizibil Imediat</option>
                                            <option value="0" @if(!$slide->is_visible) selected @endif>Suspendat Momentan</option>
                                         
                                        </select>
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

                                    <div>
                                        <label for="status-field" class="form-label">Pagini Statice</label>
                                        <select class="form-control" data-trigger name="page_type" id="status-field" >
                                            <option @if($slide->page_type) value="{{$slide->page_type}}" @else value="" selected @endif>@if($slide->page_type) {{$slide->page_type}} @else Pagini statice @endif</option>
                                            <option value="home">Pagina Home</option>
                                            <option value="search">Pagina De cautari</option>
                                            <option value="users">Pagina cu utilizatori</option>                                                   
                                         
                                        </select>
                                    </div>
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
                                    <form action="{{route('add-slide')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">

                                            

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Descriptie</label>
                                              <textarea name="html" id="html" cols="30" class="form-control" rows="10"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email-field" class="form-label">Poza</label>
                                                <input type="file" id="email-field" class="form-control" name="image" required />
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone-field" class="form-label">Link(optional)</label>
                                                <input type="text" id="phone-field" name="link" class="form-control"  placeholder="Link" />
                                            </div>

                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Fisier</label>
                                                <input type="text" id="date-field" class="form-control" name="folder" placeholder="Denumiti fisier unde se va salva" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Latime(landscape sau patrat)</label>
                                                <input type="text" id="date-field" name="width" class="form-control" value="600"  name="folder" placeholder="Select Date" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Inaltime</label>
                                                <input type="text" id="date-field" name="height" class="form-control" value="400"  name="folder" placeholder="Select Date" required />
                                            </div>
                                            <div>
                                                <label for="status-field" class="form-label">Visibil</label>
                                                <select class="form-control" data-trigger name="is_visible" id="status-field" >
                                                    <option value="1" selected>Vizibil Imediat</option>
                                                    <option value="0">Suspendat Momentan</option>
                                                 
                                                </select>
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

                                            <div>
                                                <label for="status-field" class="form-label">Pagini Statice</label>
                                                <select class="form-control" data-trigger name="page_type" id="status-field" >
                                                    <option value="" selected>Pagini statice</option>
                                                    <option value="home">Pagina Home</option>
                                                    <option value="search">Pagina De cautari</option>
                                                    <option value="users">Pagina cu utilizatori</option>                                                   
                                                 
                                                </select>
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

               
@endsection
@push('scripts')
<script src="{{URL::to('platform/backend/assets/js/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector:'textarea'});</script>
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