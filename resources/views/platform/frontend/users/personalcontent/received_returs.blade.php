@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Retur Primite</h1>
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista retur de la clienti</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numarul</th>
                    <th>Comanda nr.</th>
                    <th>Oferta nr.</th>
                    <th>Furnizor</th>
                    <th>Suma & valuta</th>
                    <th>Data</th>
                    @if($user->getretur->count())
                    <th>Actiuni</th>
                    @endif
                  </tr>
                  </thead>
                  <tbody>
                @foreach($user->getretur as $retur)
                <?php $date = \Carbon\Carbon::parse($retur->created_at)->format('d-m-Y');?>
                  <tr>
                    <td>{{$retur->number}}</td>
                    <td>{{$retur->command->number}}
                    </td>
                    
                    <td> {{$retur->command->offer->currency}}</td>
                    <th>{{$retur->client->name}}</th>
                    <td>{{$retur->ammount}} {{$retur->command->offer->currency}}</td>
                    <td>{{$date}}</td>
                    @if($retur->status < 2)
                    <td><a class="btn btn-success" href="{{route('confirm-retur',$retur->id)}}"><i calss="fa fa-check"></i> Confirma Colet</a></td>
                    @else 
                    <td><p>Colet confirmat</p></td>
                    @endif
                  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Numarul</th>
                      <th>Comanda nr.</th>
                      <th>Oferta nr.</th>
                      <th>Furnizor</th>
                      <th>Suma & valuta</th>
                      <th>Data</th>
                      @if($user->getretur->count())
                      <th>Actiuni</th>
                      @endif
                    </tr>
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