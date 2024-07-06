<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\PesananModel;
use Illuminate\Support\Carbon;


class GrafikPermohonanBulanan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $dataPermohonan = PesananModel::selectRaw('MONTH(created_at) as bulan, COUNT(*) as jumlah_permohonan')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $bulanLabels = [];
        $jumlahPermohonan = [];

        foreach ($dataPermohonan as $data) {
            $bulanLabels[] = Carbon::create()->month($data->bulan)->format('F');
            $jumlahPermohonan[] = $data->jumlah_permohonan;
        }
        return $this->chart->barChart()
            ->setTitle('Data Permohonan Jasa Bulanan')
            ->setSubtitle('Total permohonan jasa Humas Politeknik Negeri Tanah Laut tiap bulan')
            ->addData('Jumlah Permohonan', $jumlahPermohonan)
            ->setXAxis($bulanLabels)
            ->setHeight(300);
    }
}
