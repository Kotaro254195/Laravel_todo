<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'=>"Laravel Todos App",
            'contact_number'=>"91 9654 563 546",
            'contact_email'=>'info@laravel_todo.com',
            'address'=>'Bangalore, India'
        ]);
    }
}