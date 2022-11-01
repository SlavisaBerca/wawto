@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Oferte Trimise</h1>
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
                <h3 class="card-title">Lista oferte trimise</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numarul</th>
                    <th>Cerere</th>
                    <th>Pretul</th>
                    <th>Tva</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($user->offersupplier as $sentoffer)
                  <tr>
                    <td>{{$sentoffer->number}}</td>
                    <td>{{$sentoffer->sentrequest->request_number}}
                    </td>
                    <td>{{$sentoffer->value}}</td>
                    <?php 
                          $tva = $sentoffer->tva;
                          $tva_calc = $tva/100;
                          $res = round($tva_calc*$sentoffer->value,2);
                    ?>
                    <td> {{{$res}}}</td>
                   
                  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Numarul</th>
                      <th>Cerere</th>
                      <th>Pretul</th>
                      <th>Tva</th>
                     
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