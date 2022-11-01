@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Retur Trimise</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista retur Dumneavoastra</h3>
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
                  </tr>
                  </thead>
                  <tbody>
                @foreach($user->sentretur as $retur)
                <?php $date = \Carbon\Carbon::parse($retur->created_at)->format('d-m-Y');?>
                  <tr>
                    <td>{{$retur->number}}</td>
                    <td>{{$retur->command->number}}
                    </td>
                    
                    <td>{{$retur->ammount}} {{$retur->command->offer->number}}</td>
                    <th>{{$retur->supplier->name}}</th>
                    <td>{{$retur->ammount}} {{$retur->command->offer->currency}}</td>
                    <td>{{$date}}</td>
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