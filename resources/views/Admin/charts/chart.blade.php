@extends('adminlte::page')

@section('title','Relatorio mensal de vendas')

@section('content_header')
    <h1>
        Relátorio Mensal de Vendas
       <a href="{{route('homecreate')}}" class="btn btn-sm btn-success">Editar Home</a>
    </h1>
@endsection

@section('content')

<div class="card">
    {{$chart->container()}}

</div>


@endsection

@push('js')
{!! $chart->script() !!}
@endpush