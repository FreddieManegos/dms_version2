<?php

use App\Document_types;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Document_types::create([
            'type' => 'Memorandum'
        ]);
        Document_types::create([
            'type' => 'Special Order'
        ]);
        Document_types::create([
            'type' => 'Announcement'
        ]);
    }
}
