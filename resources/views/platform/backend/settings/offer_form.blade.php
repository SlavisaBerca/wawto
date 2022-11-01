@extends('layouts.platform.backend')
@section('content')


   <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Formular</h4>

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
                                        <h4 class="card-title mb-0">Manager de formualr</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div id="customerList">
                                            <div class="row g-4 mb-3">
                                                <div class="col-sm-auto">
                                                    <div>
                                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Adauga</button>
														  <button type="button" class="btn btn-info add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModalSelect"><i class="ri-add-line align-bottom me-1"></i> Adauga SELECT</button>
                                                  
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
                                                            <th class="sort" data-sort="phone">Sortare</th>
                                                            <th class="sort" data-sort="customer_name">Componenta</th>
                                                            
                                                            <th class="sort" data-sort="phone">Pozitie</th>
                                                   
                                                           
                                                            <th class="sort" data-sort="action">Actiune<div class="form-check">
                                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Sterge Toate</button>
                                                                </div></th>
                                            
                                                     
                                                                
                                                          
                                                            </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        @foreach($offerform->components as $component)
                                                        <tr  class="row1" data-id="{{ $component->oc_id }}">
                                                            <td class="phone"><i class="fa fa-sort"></i></td>
                                                          
                                                            <td class="customer_name"><?=$component->html;?></td>
                                                            <td class="email">{{$component->position}}</td>
                                                          
                                                            <td class="phone">
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal{{$component->oc_id}}">Sterge</button>
                                                            </td>
                                                        </tr>


                                                          <!-- Modal -->
                        <div class="modal fade zoomIn" id="deleteRecordModal{{$component->oc_id}}" tabindex="-1" aria-hidden="true">
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
                                                <p class="text-muted mx-4 mb-0">Ce sa va intampla daca stergeti Componenta?</p>
                                                <p>Se va sterge componenta si va dispare din cerere pe care este alocata!!!</p>
                                                <p>Acest lucru nu este reversibil....!!!</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Inchide</button>
                                            <a href="{{route('delete-offer-component',$component->oc_id)}}" class="btn w-sm btn-danger " id="delete-record">Da, Sunt sigur!</a>
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
                                                        <h5 class="mt-2">Imi pare rau!!!</h5>
                                                        <p class="text-muted mb-0">Dupa cuvinte care ati introdus in cautare nu am gasit niciun rezultat. Incercati cu alte cuvinte....</p>
                                                    </div>
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
   <div class="modal fade" id="showModalSelect" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
                                    <form action="{{route('add-offer-component')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                        <input type="hidden" name="form_id" value="{{$offerform->of_id}}">
                                            <div class="mb-3" id="modal-id" style="display: none;">
                                                <label for="id-field" class="form-label">ID</label>
                                               <input type="hidden" name="type" value="select">
                                            </div>

                                            
                                           
                                            
                                               <div class="mb-3">
                                                
                                                <label for="email-field" class="form-label">Label</label>
                                                <input type="text" id="email-field"  name="label" class="form-control" placeholder="Label" required />
                                            </div>
                                            <div class="mb-3">
                                                
                                                <label for="email-field" class="form-label">Latime</label>
                                                <input type="number" id="email-field"  value="4" name="col" class="form-control" placeholder="Pozitie" required />
                                            </div>
												<div class="mb-3">
                                                
                                                <label for="email-field" class="form-label">Latime</label>
												<textarea class="form-control"name="options" rows="10" cols="8"><option vlaue=" Baza de date(grija la gilimele) "> Valoare Utilizator </option></textarea>
                                               </div>
											    <div class="mb-3">
                                                
                                                <label for="email-field" class="form-label"><input type="checkbox" value="required" name="required">Obligatoriu</label>
                                               
                                            </div>

                                            <div>
                                              
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Inchide</button>
                                             
                                                <button type="submit" class="btn btn-success" id="edit-btn">Adauga</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                                      <!-- Modal -->
 <div class="modal fade" id="showModalSetting" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
                                    <form action="{{route('set-form')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                        <input type="hidden" name="form_id" value="{{$offerform->of_id}}">
                                            <div class="mb-3" id="modal-id" style="display: none;">
                                                <label for="id-field" class="form-label">ID</label>
                                               <input type="hidden" name="type" value="select">
                                            </div>

                                            
                                           
                                            
                                               <div class="mb-3">
                                               
                                                <label for="email-field" class="form-label"><input type="checkbox" name="has_part" value="1" @if($form->has_part) checked disabled @endif>Formular cu piese</label>
                                                 @if($form->has_part)
													 <br>
													  <label for="email-field" class="form-label"><input type="checkbox" name="no_part" value="1">Anulare Piese</label>
												 @endif
                                            </div>
                                            <div class="mb-3">
                                                
                                                <label for="email-field" class="form-label"><input type="checkbox" name="has_equipment" value="1"@if($form->has_equipment) checked disabled @endif>Vehicol are echipamente </label>
                                                 @if($form->has_equipment)
													 <br>
													  <label for="email-field" class="form-label"><input type="checkbox" name="no_equipment" value="1">Anulare Dotari</label>
												 @endif
                                            </div>
												
                                            

                                            <div>
                                              
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Inchide</button>
                                             
                                                <button type="submit" class="btn btn-warning" id="edit-btn">Seteaza</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                                      <!-- Modal -->
                        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                            id="close-modal"></button>
                                    </div>
                                    <form action="{{route('add-offer-component')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                        <input type="hidden" name="form_id" value="{{$offerform->of_id}}">
                                            <div class="mb-3" id="modal-id" style="display: none;">
                                                <label for="id-field" class="form-label">ID</label>
                                             
                                            </div>

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Tip</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="">Alegeti Tip</option>
                                                    <option value="text">Text</option>
                                                    <option value="number">Numarul</option>
                                                    <option value="date">Data</option>
                                                    <option value="checkbox">Checkbox</option>
                                                    <option value="file">Imagina</option>
													<option value="text_area">Text Area<option>
													<option value="separator"></option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                
                                                <label for="email-field" class="form-label">Valoare(Optional)</label>
                                                <input type="text" id="email-field" name="value" class="form-control" placeholder="Valoare" />
                                            </div>
                                            <div class="mb-3">
                                                
                                                <label for="email-field" class="form-label">Setari(Optional)</label>
                                                <input type="text" id="email-field" name="settings" class="form-control" placeholder="Setari" />
                                            </div>
                                            <div class="mb-3">
                                                
                                                <label for="email-field" class="form-label">Label</label>
                                                <input type="text" id="email-field" name="label" class="form-control" placeholder="Label" required />
                                            </div>
                                            <div class="mb-3">
                                                
                                                <label for="email-field" class="form-label">Latime</label>
                                                <input type="number" id="email-field"  value="4" name="col" class="form-control" placeholder="Pozitie" required />
                                            </div>
											   <div class="mb-3">
                                                
                                                <label for="email-field" class="form-label"><input type="checkbox" value="required" name="required">Obligatoriu</label>
                                               
                                            </div>
                                            

                                            

                                            <div>
                                              
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Inchide</button>
                                             
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
                                                <p class="text-muted mx-4 mb-0">Ce sa va intampla daca stergeti Componente?</p>
                                                <p>Se va sterge componente si nu se mai afiseaza in cadru cereri de oferta!!!</p>
                                                <p>Acest lucru nu este reversibil....!!!</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Inchide</button>
                                            <a href="{{route('destroy-offer-components')}}" class="btn w-sm btn-danger " id="delete-record">Da, Sunt sigur!</a>
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
 <!-- JAVASCRIPT -->

        <!-- prismjs plugin -->
        <script src="{{URL::to('platform/backend/assets/libs/prismjs/prism.js')}}"></script>
        <script src="{{URL::to('platform/backend/assets/libs/list.js/list.min.js')}}"></script>
        <script src="{{URL::to('platform/backend/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>

        <!-- listjs init -->
        <script src="{{URL::to('platform/backend/assets/js/pages/listjs.init.js')}}"></script>

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
            url: '/offer-sorting',
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
