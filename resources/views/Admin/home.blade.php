@extends('adminlte::page')

@section('plugins.Chartjs',true)
    
@section('title','Painel')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Dashboard</h1>
    </div>
    <div class="col-md-6">
        <form action="" method="GET">
            <select onchange="this.form.submit()" name="interval"  class="float-md-right">
                <option {{$dateInterval==30 ? 'selected="selected':''}}  value="30">Ultimos 30 dias </option>
                <option {{$dateInterval==60 ? 'selected="selected':''}}  value="60">Ultimos 60 dias </option>
                <option {{$dateInterval==90 ? 'selected="selected':''}}  value="90">Ultimos 90 dias </option>
                <option {{$dateInterval==120 ? 'selected="selected':''}}  value="120">Ultimos 120 dias </option>
            </select>

        </form>
        <h1>Dashboard</h1>
    </div>
    <div class="col-md-6">     
     
    </div>
</div>


@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$visitisCount}}</h3>
                    <p>Acessos</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-eye"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$onlineCount}}</h3>
                    <p>usuários online</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-heart"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$pageCount}}</h3>
                    <p>paginas</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-sticky-note"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$userCount}}</h3>
                    <p>usuarios online</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-user"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pagina mais visitadas</h3>
            </div>
            <div class="card-body">
                <template>
                    <monthly-income :data={....} />
                  </template>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sobre o Sistema</h3>
            </div>
            <div class="card-body">
                ...
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function(){
        let ctx = document.getElementById('pagePie').getContext('2d');
        window.pagePie = new Chart(ctx,{
            type:'pie',
            data:{
                datasets:[{
                    data:{{}},
                    backgroundColor:'#0000ff'
                }],
                labels:""
    
            },
            options:{
                responsive:true,
                legend:{
                    display:false
                }
    
            }
        })
    }
    
import VueCharts from 'vue-chartjs'
import { Bar, Line } from 'vue-chartjs'

    Vue.component('line-chart', {
  extends: VueChartJs.Line,
  mounted () {
    this.renderChart({
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label: 'Data One',
          backgroundColor: '#f87979',
          data: [40, 39, 10, 40, 39, 80, 40]
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
  }
})
    </script>

@endsection