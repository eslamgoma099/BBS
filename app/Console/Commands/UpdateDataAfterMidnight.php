<?php 

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Certificate;
use App\Models\UserCertificate; // Make sure to use the model you want to update

class UpdateDataAfterMidnight extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:data-after-midnight';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update data after midnight';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Example: Update data in your model (replace with your own logic)
        $certificates = UserCertificate::where('status','1')->with(['user'])->get();
        $currentDate = Carbon::now();
        foreach($certificates as $certificate){
            $certificate->total = $certificate->profit/23;
            $certificate->save();
        }
        $this->info('Data updated successfully after midnight.');
    }
}
