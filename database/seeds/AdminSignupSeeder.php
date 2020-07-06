<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSignupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $picked = User::where('user_type', 'admin')->first();
        if($picked) {
        	$picked->delete();
        }
        User::create(
        	[
        		'name'      => 'Sachin Kumar Rajvanshi',
        		'user_type' => 'admin',
        		'email'     => 'admintest@gmail.com',
        		'password'  => \Hash::make(1234567)
        	]
        );
        dd('Admin Created Successfully');
    }
}
