<?php

namespace App\Console;

use App\Models\Stock;
use App\Models\Capitale;
use App\Models\Commande;
use App\Models\Medicine;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $pendingCommands = Commande::where('dateArrive', '<=', now())->where('accepted', true)->where('addedToStock', false)->get();

            foreach ($pendingCommands as $commande) {
                $commande->addedToStock = true;
                $commande->save();

                $medicine = Medicine::find($commande->medicament_id);
                $prixTotal = $medicine->price * $commande->number;
    
                $stock = Stock::create([
                    'medicament_id' => $commande->medicament_id,
                    'pharmacie_id' => $commande->pharmacie_id,
                    'initialNumber' => $commande->number,
                    'number' => $commande->number,
                    'price' => $prixTotal,
                ]);

                if ($stock) {
                    $editedCapital = Capitale::where('pharmacie_id', $commande->pharmacie_id)->first();

                    if ($editedCapital) 
                    {
                        $editedCapital->number = $editedCapital->number - $prixTotal;
                        $editedCapital->save();
                    }
                }
        
    
            }})->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
