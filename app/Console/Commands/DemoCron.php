<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\UserSparring;

class DemoCron extends Command
{
    protected $signature = 'demo:cron';
    protected $description = 'Command description';

    public function handle()
    {
        $sparrings = UserSparring::all();
        
        foreach ($sparrings as $sparring) {              
            $tanggalPertandingan = Carbon::parse($sparring->tanggal_pertandingan);
            $DeleteDate = $tanggalPertandingan->addDays(2);
            $DateNow = date('Y-m-d');  
            if ($DateNow >= $DeleteDate) {
                $sparring->delete();
            }
        }
    }
}
