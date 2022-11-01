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
                                    <h4 class="mb-sm-0">Pagini</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Constructor</a></li>
                                            <li class="breadcrumb-item active">Spatiu de lucru</li>
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Sectiune compacta cu poza</h4>
                                                <div class="flex-shrink-0">
                                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                                        <label for="default-example" class="form-label text-muted">Show Code</label>
                                                        <input class="form-check-input code-switcher" type="checkbox" id="default-example">
                                                    </div>
                                                </div>
                                            </div><!-- end card header -->
                                            <div class="card-body">
                                             
                                                <div class="live-preview">
                                                 <form action="{{route('add-section')}}" method="post" enctype="multipart/form-data">
                                                     {{csrf_field()}}
                                                     <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="">Fisier Pentru poza</label>
                                                            <input type="text" name="folder" class="form-control" required placeholder="Fisierul pentru a salva poze va rugam sa l specificati neaparat">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="">Pagina statica</label>
                                                            <select name="page_type" id="" class="form-control">
                                                             <option value="">Alegeti Pagina</option>
                                                             <option value="register">Pagina Inregistrari</option>
                                                             <option value="large">Pagina Cereri Major</option>
                                                             <option value="small">Cerere Rapida</option>
                                                             <option value="search">Pagina Cautare</option>
                                                             <option value="home">Pagina Cautare</option>
                                                            </select>
                                                        </div>
                                                         <div class="col-md-12">
                                                             <label for="">Poza</label>
                                                             <input type="file" name="image" class="form-control">
                                                             <label for="">Text</label>
                                                             <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
                                                             <input type="hidden" name="page_id" value="{{$page->id}}" >
                                                            <input type="hidden" name="admin_type" value="1">
                                                         </div>
                                                         <div class="col-md-4">
                                                             <button class="btn btn-success" type="submit">Adauga</button>
                                                         </div>
                                                     </div>
                                                 </form>
                                                    
                                                   
                                                </div>
        
                                                <div class="d-none code-view">
                                                    <div class="row" style="margin-left:-200px;">
        <pre style="margin-left:0px;">
           @foreach($page->section as $section)
           @if($section->admin_type===1)
            <?=$section->html;?>
           @endif
           @endforeach
        </pre>
        </div>
                                                </div>
                                            </div><!-- end card-body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div>
        <!--End sectiune compacta cu poza-->
        
        <!--Sectiune 2 componente-->
                     
                       <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Sectiune dubla</h4>
                                                <div class="flex-shrink-0">
                                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                                        <label for="default-example" class="form-label text-muted">Show Code</label>
                                                        <input class="form-check-input code-switcher" type="checkbox" id="default-example">
                                                    </div>
                                                </div>
                                            </div><!-- end card header -->
                                            <div class="card-body">
                                             
                                                <div class="live-preview">
                                                 <form action="{{route('add-section')}}" method="post" enctype="multipart/form-data">
                                                     {{csrf_field()}}
                                                     <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="">Fisier Pentru poza</label>
                                                            <input type="text" name="folder" class="form-control" required placeholder="Fisierul pentru a salva poze va rugam sa l specificati neaparat">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="">Pagina statica</label>
                                                            <select name="page_type" id="" class="form-control">
                                                             <option value="">Alegeti Pagina</option>
                                                             <option value="register">Pagina Inregistrari</option>
                                                             <option value="large">Pagina Cereri Major</option>
                                                             <option value="small">Cerere Rapida</option>
                                                             <option value="search">Pagina Cautare</option>
                                                             <option value="home">Pagina Cautare</option>
                                                            </select>
                                                        </div>
                                                         <div class="col-md-6">
                                                             <h3>Bucata Stanga</h3>
                                                             <label for="">Poza</label>
                                                             <input type="file" name="image" class="form-control">
                                                             <label for="">Text</label>
                                                             <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
                                                         
                                                         </div>
                                                         <div class="col-md-6">
                                                             <h3>Bucata Dreapta</h3>
                                                             <label for="">Poza</label>
                                                             <input type="file" name="image1" class="form-control">
                                                             <label for="">Text</label>
                                                             <textarea name="text1" id="text1" cols="30" rows="10" class="form-control"></textarea>
                                                             <input type="hidden" name="page_id" value="{{$page->id}}" >
                                                            <input type="hidden" name="admin_type" value="2">
                                                         </div>
                                                         <div class="col-md-4">
                                                             <button class="btn btn-success" type="submit">Adauga</button>
                                                         </div>
                                                     </div>
                                                 </form>
                                                    
                                                   
                                                </div>
        
                                                <div class="d-none code-view">
                                                    <div class="row" style="margin-left:-200px;">
        <pre style="margin-left:0px;">
           @foreach($page->section as $section)
           @if($section->admin_type===1)
            <?=$section->html;?>
           @endif
           @endforeach
        </pre>
        </div>
                                                </div>
                                            </div><!-- end card-body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div>
        
        
        <!--End sectiune 2 componente-->
        
        
        <!--Sectiune 2 componente-->
                     
        <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Sectiune tripla</h4>
                                                <div class="flex-shrink-0">
                                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                                        <label for="default-example" class="form-label text-muted">Show Code</label>
                                                        <input class="form-check-input code-switcher" type="checkbox" id="default-example">
                                                    </div>
                                                </div>
                                            </div><!-- end card header -->
                                            <div class="card-body">
                                             
                                                <div class="live-preview">
                                                 <form action="{{route('add-section')}}" method="post" enctype="multipart/form-data">
                                                     {{csrf_field()}}
                                                     <div class="row">
                                                         <div class="col-md-12">
                                                            <label for="">Fisier Pentru poza</label>
                                                            <input type="text" name="folder" class="form-control" required placeholder="Fisierul pentru a salva poze va rugam sa l specificati neaparat">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="">Pagina statica</label>
                                                             <select name="page_type" id="" class="form-control">
                                                              <option value="">Alegeti Pagina</option>
                                                              <option value="register">Pagina Inregistrari</option>
                                                              <option value="large">Pagina Cereri Major</option>
                                                              <option value="small">Cerere Rapida</option>
                                                              <option value="search">Pagina Cautare</option>
                                                              <option value="home">Pagina Cautare</option>
                                                             </select>
                                                         </div>
                                                         <div class="col-md-4">
                                                             <h3>Bucata Stanga</h3>
                                                             <label for="">Poza</label>
                                                             <input type="file" name="image" class="form-control">
                                                             <label for="">Text</label>
                                                             <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
                                                         
                                                         </div>
                                                         <div class="col-md-4">
                                                             <h3>Bucata Misloc</h3>
                                                             <label for="">Poza</label>
                                                             <input type="file" name="image1" class="form-control">
                                                             <label for="">Text</label>
                                                             <textarea name="text1" id="text1" cols="30" rows="10" class="form-control"></textarea>
                                                             
                                                   
                                                         </div>

                                                         <div class="col-md-4">
                                                             <h3>Bucata Dreapta</h3>
                                                             <label for="">Poza</label>
                                                             <input type="file" name="image2" class="form-control">
                                                             <label for="">Text</label>
                                                             <textarea name="text2" id="text2" cols="30" rows="10" class="form-control"></textarea>
                                                             <input type="hidden" name="page_id" value="{{$page->id}}" >
                                                            <input type="hidden" name="admin_type" value="3">
                                                         </div>
                                                         <div class="col-md-4">
                                                             <button class="btn btn-success" type="submit">Adauga</button>
                                                         </div>
                                                     </div>
                                                 </form>
                                                    
                                                   
                                                </div>
        
                                                <div class="d-none code-view">
                                                    <div class="row" style="margin-left:-200px;">
        <pre style="margin-left:0px;">
           @foreach($page->section as $section)
           @if($section->admin_type===1)
            <?=$section->html;?>
           @endif
           @endforeach
        </pre>
        </div>
                                                </div>
                                            </div><!-- end card-body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div>
        
                            </section>
        <!--End sectiune 2 componente-->
                        </div>
                    </div>                   
                                       
    
@endsection
@push('scripts')
<script src="{{URL::to('backend/assets/libs/prismjs/prism.js')}}"></script>

        <script src="{{URL::to('backend/assets/libs/list.js/list.min.js')}}"></script>
        <script src="{{URL::to('backend/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>

        <!-- listjs init -->
        <script src="{{URL::to('backend/assets/js/pages/listjs.init.js')}}"></script>
        <script src="{{URL::to('platform/backend/assets/js/tinymce/tinymce.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- App js -->
        <script>tinymce.init({ selector:'textarea'});</script>
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