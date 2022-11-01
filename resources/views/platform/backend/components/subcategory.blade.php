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
                                    <h4 class="mb-sm-0">Subcategorii</h4>

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
                                                            
                                                            <th class="sort" data-sort="customer_name">Pozitie</th>
                                                            <th class="sort" data-sort="email">Denumire</th>
                                                     
                                                            <th class="sort" data-sort="date">Domenii</th>
                  
                                                            <th class="sort" data-sort="action">Actiuni</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        @foreach($categories as $cats)
                                                        @foreach($cats->subcategory as $category)
                                                        <tr class="row1" data-id="{{ $category->id }}">
                                                            
                                                            
                                                            <td class="customer_name"><i class="fa fa-sort-amount-up"></i> {{$category->position}}</td>
                                                            <td class="email">{{$category->subcat_title}}</td>                                                            
                                                            <td class="phone">{{$category->domain->count()}}</td>
                                                           
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-warning edit-item-btn"
                                                                        data-bs-toggle="modal" data-bs-target="#editModal{{$category->id}}"><i class="fa fa-edit"></i> Editare</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <a class="btn btn-sm btn-danger remove-item-btn" href="{{route('delete-subcategory',$category->id)}}"><i class="fa fa-trash"></i> Sterge</a>
                                                                    </div>
																	 <div class="remove">
                                                                        <a class="btn btn-sm btn-warning remove-item-btn" href="{{route('domain-settings',$category->id)}}"><i class="fa fa-cog"></i>Sortare Domenii</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                       <!-- Edit modal -->

                                                        
                        <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Inchide"
                                        id="close-modal"></button>
                                </div>
                                <form action="{{route('edit-subcategory',$category->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="modal-body">

                                        

                                        <div class="mb-3">
                                            <label for="customername-field" class="form-label">Denumire</label>
                                            <input type="text" id="customername-field" value="{{$category->subcat_title}}" name="subcat_title" class="form-control" placeholder="Denumire" required />
                                        </div>
                                        
                                       
                                        
                                        
                                       
                                        <div class="mb-3">
                                            <label for="">Categorie</label>
                                            <select name="category_id" id="position" class="form-control">
                                                <option value="{{$category->category->id}}"selected>{{$category->category->cat_title}}</option>
                                                @foreach($categories as $id_cat)
                                                @if($id_cat->id !== $category->category_id)
                                                <option value="{{$id_cat->id}}">{{$id_cat->cat_title}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone-field" class="form-label">Pozitie</label>
                                            <input type="text" id="phone-field" name="position" class="form-control" value="{{$category->position}}" placeholder="Enter Phone no." required />
                                        </div>

                                       

                                        <div>
                                       
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


                                                       <!--Edit Modal-->
                                                       @endforeach
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
                                    <form action="{{route('add-subcategory')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">

                                            

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Denumire</label>
                                                <input type="text" id="customername-field" name="subcat_title" class="form-control" placeholder="Denumire" required />
                                            </div>                                        
                                            
                                            <div class="mb-3">
                                                <label for="">Categorie</label>
                                                <select name="category_id" id="position" class="form-control">
                                                    <option value=""selected>Alegeti categorie</option>
                                                    @foreach($categories as $cat_id)
                                                    <option value="{{$cat_id->id}}">{{$cat_id->cat_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                           

                                           

                                            <div>
                                           
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

       

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="  crossorigin="anonymous"></script>
  <script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

 <script type="text/javascript">

      $(function () {

// this is need to Move Ordera accordin user wish Arrangement
        $('table tbody').sortable({
        
          update: function() {
              sendOrderToServer();
          }
        });
        function sendOrderToServer() {
          var order = [];

        //   by this function User can Update hisOrders or Move to top or under
          $('.row1').each(function(index,element) {
            order.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });
// the Ajax Post update 
          $.ajax({
            type: "POST", 
            dataType: "json", 
            url: '/sort-subcategories',
                data: {
                order: order,
              "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);
                } else {
                  console.log(response);
                }
            }
          });
        }
      });
    </script>
@endpush