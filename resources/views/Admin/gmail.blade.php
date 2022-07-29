@extends('adminlte::page')

@section('plugins.Chartjs',true)
    
@section('title','Painel')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
<script src="https://cdn.tiny.cloud/1/twxm2c36o1xzxedn12eloly7xttt3qpyqii8vz02394gtz15/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@section('content_header')
<div class="row">
    <div class="col-md-6">
       <h1>Dashboard</h1>
    </div>
  
</div>


@endsection

@section('content')

{{dd($maps)}}

   
</div>
<div class="row">
 

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sobre o Sistema</h3>
            </div>
            <div class="card-body">
               <div class="maps">

               </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/googlemaps.js') }}" defer></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7qcQHcvwSSO496P_6cW0HNrnZut1Wu6Y&callback=initMap" async defer></script>

@endsection