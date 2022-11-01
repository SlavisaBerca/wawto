@extends('layouts.platform.frontend')
<?php 
$gs=generalsetting();
$suppliers = getSuppliers();
?>
@section('content')
                    <div class="col-lg-9">
                        <div class="main-content">
	
	<div class="mapouter"><div class="gmap_canvas"><iframe style="width:100%;"width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Splaiul%20unirii%20nr%20450%20bucuresti&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div></div>

	<div class="row mt-5">

	@if(session()->has('success'))
			<div class="col-md-12">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{session()->get('success')}}

		</div>
	</div>
	@endif
	    <div class="col-md-12">
			<div class="card">
				<div class="card-header"><h3 class="text-center">Wawto Contact</h3>
			</div>
		</div>
		<div class="col-md-12">
			 <div class="card">
            <div class="card-header">
                <i class="fa fa-envelope"></i> Formular de contact
            </div>
            <div class="card-body">
			 <form action="{{route('send-message')}}" method="post" id="contact">
       {{csrf_field()}}
       @auth
	   <label>E-mail Adresa</label>
	   <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
	   @endauth
	   @guest 
	   <label>E-mail Adresa</label>
	   <input type="text" class="form-control" name="email">
	   @endguest
	   <label>Subiect</label>
       <input type="text" name="subject" class="form-control">
	   <label>Mesajul</label>
       <textarea name="message" id="" cols="30" rows="10" class="form-control">
       </textarea>
       </form>
            </div>
            <div class="card-footer bg-primary">
			<button class="btn btn-success" type="submit" form="contact"><i class="fa fa-envelope"></i>Trimiteti Mesajul</button>
            </div>
        </div>
		</div>
		
	
		
	</div><!--End Row-->
@endsection
