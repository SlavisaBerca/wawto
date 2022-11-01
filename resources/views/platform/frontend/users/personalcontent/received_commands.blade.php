@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Comenzi Primite</h1>
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
                <h3 class="card-title">Lista comenzi primite</h3>
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
                    <th>Status</th>
                    <th>Actiuni</th>
					<th>Vizualizare</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($commands as $mycommand)
                <?php 
                $checkout = $mycommand->checked; 

                $offer = $mycommand->offer; 

          
               
                if($mycommand->status===1)
                {
                  $status = 'Confirmata';
                }

                if($mycommand->status === 2)
                {
                  $status='Realizata';

                }

                if($mycommand->status==0)
                {
                  $status ='Neconfirmata';
                }
				
				if($mycommand->status==4)
				{
					$status = 'Colet Ridicat';
				}
				
                if($mycommand->status == 8)
                {
                  $status ='Expirata';
                }

                ?>
                  <tr>
                    <td>{{$mycommand->number}}</td>
                    <td>{{$offer->number}}
                    </td>
                    <td>{{$offer->sentrequest->request_number}}</td>
                    <td>{{$offer->value}}</td>
                    <td>{{$mycommand->total_ammount}}</td>
                    <td> {{$status}}</td>
                    @if($checkout)

                    <td>Realizat cu checkout</td>

                    @else 
                    <td>{{$status}} Fara Realizare</td>
                    @endif
					<td><a class="btn btn-info btn-sm" href="{{route('command-details',$mycommand->command_id)}}"><i class="fa fa-eye"></i></a></td>
                  </tr>
				  
                 @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Numarul</th>
                      <th>Cerere</th>
                      <th>Oferta</th>
                      <th>Pretul</th>
                      <th>Total de plata</th>
                      <th>Status</th>
                      <th>Actiuni</th>
					  <th>Vizualizare</th>
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