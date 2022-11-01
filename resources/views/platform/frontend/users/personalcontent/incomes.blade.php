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
			<h4>Total: {{$user->checkoutsupplier->sum('ammount')}} RON</h4>
			
			@if($user->checkoutsupplier->count())
				<?php 
				$starting = $commission->value/100;
				$ending = $starting*$user->checkoutsupplier->sum('ammount');
				$comission = round($ending,2);
			?>
			<h5>Comision Wawto:{{$comission}} Ron</h5>
			@else 
				<h5>Comision Wawto:0.00 Ron</h5>
			@endif
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
                    <th>Client</th>
                    <th>Total</th>
                    <th>Data</th>
                    <th>Status</th>
					
                  </tr>
                  </thead>
                  <tbody>
				@foreach($user->checkoutsupplier as $supplier)
				<?php $status =''; if($supplier->status ===1){$status='Confirmat';}else{$status='Colet Ridicat';}?>
                  <tr>
                    <td>{{$supplier->command->number}}</td>
                    <td>{{$supplier->checkedsupplier->name}}
                    </td>
                    <td>{{$supplier->ammount}} RON</td>
					<?php $date = \Carbon\Carbon::parse($supplier->created_at)->format('d-m-Y');?>
                    <td> {{$date}}</td>
                    <td>{{$status}}</td>
				
                  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Comanda</th>
                    <th>Client</th>
                    <th>Total</th>
                    <th>Data</th>
                    <th>Status</th>
					
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