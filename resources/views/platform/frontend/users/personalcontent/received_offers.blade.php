@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Oferte Primite</h1>
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
                <h3 class="card-title">Lista oferte Dumneavoastra</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numarul</th>
                    <th>Cerere</th>
                    <th>Furnizor</th>
                    <th>Pret</th>
                   
                   
					<th>Vizualizare</th>
                  </tr>
                  </thead>
                  <tbody>
				 @foreach($user->offerclient as $my_offer)
				 
                  <tr>
                    <td>{{$my_offer->number}}</td>
                    <td>{{$my_offer->sentrequest->request_number}}</td>
                
                    <td>{{$my_offer->supplier->name}}</td>
                    <td>{{$my_offer->value}}</td>
                 
					<td style="width:30px;"><a href="{{route('offer-details',$my_offer->number)}}" class="button btn btn-sm btn-info"><i class="fa fa-eye"></i> </a></td>
                  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                   <tr>
                    <th>Numarul</th>
                    <th>Cerere</th>
                    <th>Furnizor</th>
                    <th>Pret</th>                   
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