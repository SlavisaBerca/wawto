@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cereri Postate</h1>
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
                <h3 class="card-title">Lista cereri Dumneavoastra</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numarul</th>
                    <th>Judet</th>
                    <th>Oras</th>
                    <th>Domeniu</th>
                    <th>Vizualizare</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($user->myrequest as $request)
                  <tr>
                    <td>{{$request->request_number}}</td>
                    <td>{{$request->location->region_name}}
                    </td>
                    <td>{{$request->city->city_name}}</td>
                    <td>{{$request->domain->domain_title}}</td>
                    <td><a href="/request-details/{{$request->request_url}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a> <a class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i> </a></td>
                  </tr>
                 @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Numarul</th>
                      <th>Judet</th>
                      <th>Oras</th>
                      <th>Domeniu</th>
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