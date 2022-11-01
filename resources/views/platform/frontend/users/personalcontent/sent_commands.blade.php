@extends('layouts.platform.user')

@section('content')
<?php $gs = generalsetting();?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Comenzi Trimise</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Acasa</a></li>
              <li class="breadcrumb-item active">Vizualizare</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if($errors->any())

    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
      </div>
    @endforeach

    @endif

    @if(session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{session()->get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
      </div>
    @endif

    @if(session()->has('error'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{session()->get('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista comenzi trimise</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numarul</th>
                    <th>Cerere</th>
                    <th>Oferta</th>
                    <th>Pretul</th>
                    <th>Total de plata</th>
                    <th>Actiuni</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($user->commandclient as $client)
                  <tr>
                    <td>{{$client->number}}</td>
                    <td>{{$client->request->request_number}}
                    </td>
                    <td>{{$client->offer->number}}</td>
                    <td> {{$client->offer->value}} {{$client->offer->currency}}</td>
                    <td>{{$client->total_ammount}} {{$client->offer->currency}}</td>
                    @if(!$client->checked)
                    <td><a href="{{route('checkout',$client->command_id)}}" class="btn btn-success btn-sm">Checkout</a></td>

                    @else 
                    <td>@if($client->retur) <p>Cerere retur nr. {{$client->retur->number}} @else @if($client->status==4) Colet Ridicat @else <a href="{{route('confirm-collet',$client->command_id)}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Confirma Ridicare</a> @endif <button data-toggle="modal" data-target="#retur-modal{{$client->command_id}}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i>RETUR</button> @endif </td>
                    @endif
                  </tr>


                  <div class="modal" tabindex="-1" role="dialog" id="retur-modal{{$client->command_id}}">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Cerere retur</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="card">
                      
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">Comanda: {{$client->number}}</li>
                                    <li class="list-group-item">Oferta: {{$client->offer->number}}</li>
                                    <li class="list-group-item">Suma: {{$client->total_ammount}} {{$client->offer->currency}}</li>
                                  
                                  </ul>
                             
                              <form id="retur-form{{$client->command_id}}" action="{{route('send-retur',$client->command_id)}}" enctype="multipart/form-data" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                  <div class="col-md-12">
                                      <label for="">Poza *</label>
                                      <input type="file" name="image" class="form-control">
                                      <label for="">Poza2 *</label>
                                      <input type="file" name="image1" class="form-control">

                                      <label for="">Mentiuni</label>
                                      <textarea name="mentions" id="" cols="30" rows="10" class="form-control"></textarea>
                                  </div>
                              </div>
                              </form>
                            </div>
                            <div class="card-footer">
                              <?=$gs->retur_message;?>
                              
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" form="retur-form{{$client->command_id}}" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Trimite</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Inchide</button>
                        </div>
                      </div>
                    </div>
                  </div>
                 @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

@endsection