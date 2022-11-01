@extends('layouts.platform.user')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tip: Persoana Juridica</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Acasa</a></li>
              <li class="breadcrumb-item active">Rol: Furnizor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session()->get('success')}}
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
                <h3 class="card-title">Lista de comenzi in asteptare</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-stripped" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Numarul</th>
                    <th>Oferta</th>
                    <th>Cerere</th>
                    <th>Valoare</th>
                    <th>Actiuni</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($user->unconfirmed as $command)
                  <tr>
                    <td>{{$command->number}}</td>
                    <td>{{$command->offer->number}}
                    </td>
                    <td>{{$command->request->request_number}}</td>
                    <td> {{$command->total_ammount}} {{$command->offer->currency}}</td>
					@if($command->status==0)
                   <td><a class="btn btn-info btn-sm" href="{{route('command-details',$command->command_id)}}"><i class="fa fa-eye"></i></a></td>
				    @else 
					 <td><a class="btn btn-info btn-sm" href="{{route('my-commands')}}"><i class="fa fa-undo"></i></a></td>	
					@endif
				  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Numarul</th>
                        <th>Oferta</th>
                        <th>Cerere</th>
                        <th>Valoare</th>
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