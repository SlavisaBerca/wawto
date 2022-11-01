@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rulaj Pe Wawto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Acasa</a></li>
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
                <h3 class="card-title">Vizualizare Rulaj</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Comanda</th>
                    <th>Furnizor</th>
                    <th>Total</th>
                    <th>Data</th>
                    <th>Status</th>
					<th>Actiuni</th>
                  </tr>
                  </thead>
                  <tbody>
				@foreach($user->checkoutclient as $client)
                  <tr>
                    <td>{{$client->command->number}}</td>
                    <td>{{$client->checkedsupplier->name}}
                    </td>
                    <td>{{$client->ammount}} RON</td>
					<?php $date = \Carbon\Carbon::parse($client->created_at)->format('d-m-Y');?>
                    <td> {{$date}}</td>
                    <td>{{$client->status}}</td>
					 <td>X</td>
                  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Comanda</th>
                    <th>Furnizor</th>
                    <th>Total</th>
                    <th>Data</th>
                    <th>Status</th>
					<th>Actiuni</th>
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