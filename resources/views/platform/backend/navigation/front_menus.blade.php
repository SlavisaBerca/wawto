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
                                    <h4 class="mb-sm-0">Meniu</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Meniu</a></li>
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
                                        <h4 class="card-title mb-0">Meniu Management</h4>
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
                                                       
                                                            <th class="sort" data-sort="customer_name">Denumire</th>
                                                            <th class="sort" data-sort="email">Url</th>
                                                            <th class="sort" data-sort="phone">Pozitie</th>
                                                            <th class="sort" data-sort="date">Restrictii</th>
                                                            <th class="sort" data-sort="status">Status</th>
                                                            <th class="sort" data-sort="action">Action</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        @foreach($menus as $menu)
                                                        <?php   
                                                            $vis='Undefined';
                                                            $show='Undefined';
                                                            if($menu->is_header && $menu->is_footer){
                                                                $vis='Top si Subsol';
                                                            }
                                                            if($menu->is_header && !$menu->is_footer){
                                                                $vis='Top';
                                                            }
                                                            if(!$menu->is_header && $menu->is_footer){
                                                                $vis='Subsol';
                                                            }if($menu->show_rules===1){
                                                                $show='Doar Furnizori';
                                                            }if($menu->show_rules===2){
                                                                $show='Doar utiliatori logati';
                                                            }if($menu->show_rules===0){
                                                                $show='Toata Lumea';
                                                            }
                                                            if($menu->is_visible){
                                                                $st='Activ';
                                                            }else{
                                                                $st='Inactiv';
                                                            }
                                                        ?>
                                                        <tr>
                                                        
                                                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                                                            <td class="customer_name">{{$menu->menu_title}}</td>
                                                            <td class="email">{{$menu->menu_url}}</td>
                                                            <td class="phone">{{$vis}}</td>
                                                            <td class="date">{{$show}}</td>
                                                            <td class="status"><span class="badge @if($st=='Activ') badge-soft-success @else badge-soft-danger @endif text-uppercase">{{$st}}</span></td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#showModal{{$menu->id}}">Editare</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{$menu->id}}">Sterge</button>
                                                                    </div>
                                                                    @if($menu->page)

                                                                    <div class="remove">
                                                                        <a href="{{route('page-constructor',$menu->page->id)}}" class="btn btn-sm btn-warning remove-item-btn">Constructor Pagini</a>
                                                                    </div>
                                                                   
                                                                    @else 

                                                                    <div class="remove">
                                                                        <a class="btn btn-sm btn-warning remove-item-btn" href="{{route('create-page',$menu->id)}}">Pagina Pentru meniu</a>
                                                                    </div>

                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>


                              <div class="modal fade" id="showModal{{$menu->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
                                    <form action="{{route('edit-menu',$menu->id)}}" method="post" >
                                        {{csrf_field()}}
                                        <div class="modal-body">

                                           

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Denumire</label>
                                                <input type="text" id="menu_title" value="{{$menu->menu_title}}" name="menu_title" class="form-control" placeholder="Denumire" required />
                                            </div>

                                            <div class="mb-3">
                                                <label for="email-field" class="form-label">URL</label>
                                                <input type="text" id="email-field" value="{{$menu->menu_url}}" name="url" class="form-control" placeholder="Link" required />
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label for="phone-field" class="form-label">Afisare</label>
                                              <select name="show_rules" id="show_rules" class="form-control">
                                                  <option value="" selected>Alegeti Optiune</option>
                                                  <option value="1">Doar Furnizori</option>
                                                  <option value="2">Doar Utilizatori Logati</option>
                                                  <option value="0">Toata Lumea</option>
                                              </select>
                                            </div>

                                           <div class="row">
                                               <div class="col-md-4">
                                                   <label><input type="checkbox" name="is_header" value="1" @if($menu->is_header) checked disabled @endif >Pozitie de top</label>
                                                   @if($menu->is_header)
                                                   <label for=""><input type="checkbox" name="change_header" value="1">Anulare</label>
                                                 @endif
                                                </div>
                                               <div class="col-md-4">
                                                   <label><input type="checkbox" id="is_footer" name="is_footer" value="1"  @if($menu->is_footer) checked disabled @endif >Pozitie de subsol</label>
                                                  @if($menu->is_footer)
                                                   <label for=""><input type="checkbox" name="change_footer" value="1">Anulare</label>
                                                 @endif
                                               </div>
                                           </div>

                                            <div>
                                                <label for="status-field" class="form-label">Status</label>
                                                <select class="form-control" data-trigger name="is_visible" id="status-field" >
                                                    <option value="">Alegeti optiune</option>
                                                    <option value="1">Activ</option>
                                                    <option value="2">Inactiv</option>
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

                        <!-- Modal -->
                        <div class="modal fade zoomIn" id="deleteRecordModal{{$menu->id}}" tabindex="-1" aria-hidden="true">
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


                        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
                                    <form action="{{route('add-menu')}}" method="post" >
                                        {{csrf_field()}}
                                        <div class="modal-body">

                                           

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Denumire</label>
                                                <input type="text" id="menu_title" name="menu_title" class="form-control" placeholder="Denumire" required />
                                            </div>

                                            <div class="mb-3">
                                                <label for="email-field" class="form-label">URL</label>
                                                <input type="text" id="email-field" name="url" class="form-control" placeholder="Link" required />
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label for="phone-field" class="form-label">Afisare</label>
                                              <select name="show_rules" id="show_rules" class="form-control">
                                                  <option value="" selected>Alegeti Optiune</option>
                                                  <option value="1">Doar Furnizori</option>
                                                  <option value="2">Doar Utilizatori Logati</option>
                                                  <option value="0">Toata Lumea</option>
                                              </select>
                                            </div>

                                           <div class="row">
                                               <div class="col-md-4">
                                                   <label><input type="checkbox" name="is_header" value="1" >Pozitie de top</label>
                                               </div>
                                               <div class="col-md-4">
                                                   <label><input type="checkbox" name="is_footer" value="1" >Pozitie de subsol</label>
                                               </div>
                                           </div>

                                            <div>
                                                <label for="status-field" class="form-label">Status</label>
                                                <select class="form-control" data-trigger name="is_visible" id="status-field" >
                                                    <option value="">Alegeti optiune</option>
                                                    <option value="1">Activ</option>
                                                    <option value="2">Inactiv</option>
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
                                            <a href="{{route('delete-menus')}}" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</a>
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
<script src="{{URL::to('backend/assets/libs/prismjs/prism.js')}}"></script>
        <script src="{{URL::to('backend/assets/libs/list.js/list.min.js')}}"></script>
        <script src="{{URL::to('backend/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>

        <!-- listjs init -->
        <script src="{{URL::to('backend/assets/js/pages/listjs.init.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- App js -->
<script>
    $(document).on('click','#is_footer',function(){
        var is_footer=$(this).val();
        if(is_fooer !== ''){
            alert('bine');
        }else{
            alert('rau');
        }
    });
</script>
@endpush