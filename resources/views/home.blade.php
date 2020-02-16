@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            
            <div class="simple text">
            	<br>
            	<h3 style="text-align: center">Selamat Datang Admin</h3>
            	<br>
            	<center><img src="{{URL::to('/')}}/image/learning.png" width="200" height="200" alt=""></center>
            	<br>
            	<br>
            	You are logged in! Welcome {{ auth()->user()->name }}
            	<p style="text-align: center">Silahkan pilih menu-menu dan silahkan mengatur konten-konten dari data yang sudah disediakan.</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection