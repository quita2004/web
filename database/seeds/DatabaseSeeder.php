<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *php artisan db:seed 
     * @return void
     */
    public function run()
    {
        $this->call(EmployeesTableSeeder::class);
    }

}

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(
        	[
        		[
		            'name' => 'Tùng',
		            'username' => 'tung',
		            'password' => bcrypt('tung'),
                    'email' => 'mail06@gmail.com',
		            'image' => null,
			            'team_id' => 1
		        ],
		        [
		            'name' => 'Dũng',
		            'username' => 'dung',
		            'password' => bcrypt('dung'),
                    'email' => 'mail07@gmail.com',
		            'image' => null,
		            'team_id' => 2
		        ],
		        [
		            'name' => 'Thắng',
		            'username' => 'thang',
		            'password' => bcrypt('thang'),
                    'email' => 'mail08@gmail.com',
		            'image' => null,
		            'team_id' => 1
		        ]
        	]
    );
    }
}

