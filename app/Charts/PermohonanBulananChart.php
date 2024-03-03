<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class PermohonanBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = 10;

        $dataPermohonan = [20,30,100,60,10,20,40,80,95,12,23,33];

        for ($i=1; $i <= $bulan ; $i++) {
            $totalPermohonan = $dataPermohonan[$i-1];
            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalPermohonan[] = $totalPermohonan;
        }
        return $this->chart->lineChart()
            ->setTitle('Data Perhomohan Jasa Bulan')
            ->setSubtitle('Total permohan jasa Humas Politeknik Negeri Tanah Laut tiap bulan')
            ->addData('Total Permohonan',$dataTotalPermohonan)
            ->setHeight('320')
            ->setXAxis($dataBulan);
    }
}
