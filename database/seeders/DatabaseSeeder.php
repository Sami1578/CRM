<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@crm.com',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'member',
        //     'email' => 'member@crm.com',
        // ]);


        // \App\Models\Team::factory(10)->create();
        // \App\Models\Member::factory(10)->create();

        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'member']);
        // $admin = User::where('email', 'admin@crm.com')->first();
        // $user = User::where('email', 'member@crm.com')->first();
        // $admin->assignRole('admin');
        // $user->assignRole('member');

        // \App\Models\Service::factory(10)->create();
        
        // \App\Models\LeadStage::factory(10)->create();
        // \App\Models\LeadStatus::factory(3)->create();
        // \App\Models\Lead::factory(10)->create();
        // \App\Models\Message::factory(10)->create();

    }
}
