<?php

namespace App\Http\Controllers\Admin;

use App\Charts\ReportsChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
      public function __construct()
      {
          
      }


    public function months(ReportsChart $chart)
    {

      
        $numeroDeDiasDoMes = 30;
         
        $numeroDeSemanaNoMes = 30 / 7;
        $visitasSemana1 = 0;
        $visitasSemana2 = 0;
        $visitasSemana3 = 0;
        $visitasSemana4 = 60;
        for($x = 1; $x<$numeroDeDiasDoMes; $x++) {
            if( $x  <= 7)  {             
                $visitasSemana1 += 3;
            }

            if( $x  >= 8 && $x  <= 14)  {           
                $visitasSemana2 += 3;               
            }

            if( $x  >= 15 && $x <= 21)  {             
                $visitasSemana3 += 5;
            }

            if( $x  >= 22 && $x <= 28)  {             
                $visitasSemana4 += 6;            
            }
            

        }

    



        $chart->labels(['Semana 01','Semana 02','Semana 03','Semana 04']);
        $chart->dataset('2019','bar',[
            $visitasSemana1,$visitasSemana2,$visitasSemana3, $visitasSemana4
        ])
        ->options([
            'backgroundColor' => '#999'
        ]);
        return view('admin.charts.chart',compact('chart'));
    }
}
