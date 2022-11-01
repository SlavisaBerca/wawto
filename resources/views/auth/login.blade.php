@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();
$suppliers = getSuppliers();
?>
@section('content')
                    <div class="col-lg-9">
                        <div class="main-content">
                            
                           <div class="card">
                               <div class="card-header bg-primary">
                                <h4>Formular Login</h4>
                               </div>
                               <div class="card-body">
                                <form method="post" action="{{route('login')}}" id="main-form">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Email/Telefon *</label>
                                            <input type="text" name="username" required class="form-control">
                                            @if(session()->has('error'))
                                            <span for="" class="text-danger">{{session()->get('error')}}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Parola *</label>
                                            <input type="password" name="password" required class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <a style="font-size:14px; color:blue;" href="{{ route('password.request') }}">
                                               Ati uitat parola?
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a style="font-size:14px; color:blue;" href="{{ route('register') }}">
                                              Nu aveti cont? Click aici...
                                            </a>
                                        </div>
                                        <div class="col-md-8 mt-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Tine ma logat
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                               </div>
                               <div class="card-footer">
                                <button class="btn btn-info" type="submit" form="main-form"><i class="">W</i>awto Login</button>
                             
                             
                               </div>
                           </div>
                            

@endsection
