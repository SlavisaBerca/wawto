@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tip: Persoana Fizica</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Acasa</a></li>
              <li class="breadcrumb-item active">Rol: Client</li>
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
                <h3 class="card-title">Oferte Primite</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-stripped" style="width:100%;">
                  <thead>
                  <tr>
                    <th>Numarul</th>
                    <th>Cerere</th>
                    <th>Pretul</th>
                    <th>Total cu tva</th>
                    <th>Actiuni</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($user->myoffer as $offer)
                  <tr>
                    <td>{{$offer->number}}</td>
                    <td>{{$offer->sentrequest->request_number}}
                    </td>
                    <td>{{$offer->value}}</td>
                    <?php   
                        $val = $offer->value;
                        $tva = $offer->tva;
                        $tva_calc = $tva/100;

                        $tva_res = round($tva_calc * $offer->value,2);

                        $total_value = round($tva_res + $offer->value,2);
                    ?>
                    <td> {{$total_value}} {{$offer->currency}}</td>
                    <td><a href="{{route('offer-details',$offer->number)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Vizualizare</a></td>
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