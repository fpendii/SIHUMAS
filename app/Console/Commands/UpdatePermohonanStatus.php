<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UpdatePermohonanStatus extends Command
{
    protected $signature = 'permohonan:update-status';
    protected $description = 'Update status permohonan yang melewati tenggat pengerjaan';

    public function __construct()
    {
        parent::__construct();
    }

    
    public function handle()
    {
        $now = Carbon::now();
        DB::table('pesanan')
            ->where('tenggat_pengerjaan', '<', $now)
            ->where('status', 'pending')
            ->update(['status' => 'tidak selesai']);

        $this->info('Status permohonan yang melewati tenggat pengerjaan telah diupdate.');
    }
}
