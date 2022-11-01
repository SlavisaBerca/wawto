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
                                    <h4 class="mb-sm-0">Setari Generale</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Vizualizare</a></li>
                                            <li class="breadcrumb-item active">Optiuni</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
						<form action="{{route('set-platform',$settings->id)}}" method="post" enctype="multpart/form-data">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Setari Mod de lucru</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div>
                              <div class="mt-4 pt-2">
                                                <div class="row gy-4">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <h5 class="fs-13 fw-medium text-muted">Cereri pa pagina</h5>
                                                            <div class="input-step full-width">
                                                                <button type="button" class="minus">–</button>
                                                                <input type="number" name="request_perpage" value="{{$settings->request_perpage}}" class="product-quantity" min="0" max="1000000" readonly>
                                                                <button type="button" class="plus">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <h5 class="fs-13 fw-medium text-muted">Furnizori pe pagina</h5>
                                                            <div class="input-step full-width light">
                                                                <button type="button" class="minus">–</button>
                                                                <input type="number" class="product-quantity"value="{{$settings->suppliers_perpage}}" name="suppliers_perpage" min="0" max="1000000" readonly>
                                                                <button type="button" class="plus">+</button>
                                                            </div>
                                                        </div>
                                                    </div>
													
													
                                                </div>
                                                <!-- end row -->
                                            </div>
                                            <!-- end row -->


                                         
                                        </div>
									<div class="row">
									<div class="col-md-4 mt-5">
										<h3>Logo</h3>
										<img src ="platform/frontend/assets/images/logo/{{$settings->site_logo}}">
										<input type="file" name="site_logo" class="form-control">
									</div>
									@foreach($settings->footer as $footer)
									<div class="col-md-5 mt-5">
									<?=$footer->html;?>
									</div>
								   <div class="col-md-3 mt-5">
								   <label>Imagina</label>
								   <input type="file" class="form-control" name="fimg">
										<label>Continut</label>
										<textarea name="footer_html" cols="10" rows="15" class="form-control">
											<?=$footer->html;?>
										</textarea>
										
										<input type="text" id="test_attr" value ="ab" maxlength="4">
								   </div>
									@endforeach
									</div>
                                    </div><!-- end card-body -->
								
                                </div><!-- end card -->
								<button class="btn btn-danger mb-5">Aplica Setarile</button>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
					</form>

                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
 

@endsection

@push('scripts')

         <!-- multi.js -->
        <script src="{{URL::to('platform/backend/assets/libs/multi.js/multi.min.js')}}"></script>
        <!-- autocomplete js -->
        <script src="{{URL::to('platform/backend/assets/libs/@tarekraafat/autocomplete.js/autoComplete.min.js')}}"></script>

        <!-- init js -->
        <script src="{{URL::to('platform/backend/assets/js/pages/form-advanced.init.js')}}"></script>
        <!-- input spin init -->
        <script src="{{URL::to('platform/backend/assets/js/pages/form-input-spin.init.j')}}s"></script>
		<script src="{{URL::to('platform/backend/assets/js/tinymce/tinymce.min.js')}}"></script>
		     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="  crossorigin="anonymous"></script>

		<script>tinymce.init({ selector:'textarea'});</script>

@endpush