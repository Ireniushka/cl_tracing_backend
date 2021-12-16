<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create(['dni'=>'11111111-Q','username'=> 'counselor','password'=>bcrypt('123456'), 'type'=>'counselor']);
    
        factory(\App\User::class, 20)->create(['type'=>'legal_tutor']);
        

        factory(\App\Pupil::class, 30)->create();

        
        factory(\App\Relation::class, 50)->create();

        factory(\App\Activity::class, 15)->create();

        factory(\App\Tracking_activity::class, 50)->create();

        factory(\App\Tracking_test::class, 50)->create();

                                            
        
        // $this->call(UsersTableSeeder::class);
    }
}
