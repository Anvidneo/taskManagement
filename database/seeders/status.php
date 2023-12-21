<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatus;

class status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['Pendiente', 'En curso', 'Finalizado'];
        foreach ($status as  $value) {
            $dummyStatus = new TaskStatus;
            $dummyStatus->description = $value;
            $dummyStatus->save();
        }
    }
}
