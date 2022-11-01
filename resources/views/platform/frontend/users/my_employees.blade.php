@extends('layouts.platform.user')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Angajati Firmei</h1>
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
                <h3 class="card-title">Optiuni Angajati</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nume</th>
                    <th>Nume Utilizator</th>
                    <th>Codul Personal</th>
                    <th>Pozitie</th>
                    <th>Actiuni</th>
                  </tr>
                  </thead>
                  <tbody>
				  @foreach($employees as $employee)
                  <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}
                    </td>
                    <td>{{$employee->personal_code}}</td>
                    <td> {{$employee->position}}</td>
                    <td>Optiuni</td>
                  </tr>
                 @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nume</th>
                    <th>Nume Utilizator</th>
                    <th>Codul Personal</th>
                    <th>Pozitie</th>
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