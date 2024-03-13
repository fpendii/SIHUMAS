<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class GrafikPermohonanBulanan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Data Perhomohan Jasa Bulanan')
            ->setSubtitle('Total permohan jasa Humas Politeknik Negeri Tanah Laut tiap bulan')
            ->addData('San Francisco', [6, 9, 10, 4, 10, 8])
            ->setHeight('300')
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
