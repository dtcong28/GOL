<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attachment;

class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attachment::factory()->count(10)->create();
    }
}
