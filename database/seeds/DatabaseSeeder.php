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
		            'name' => 'Ngọc',
		            'username' => 'ngoc',
		            'password' => bcrypt('ngoc'),
		            'image' => null,
			            'team_id' => 1
		        ],
		        [
		            'name' => 'Thiện',
		            'username' => 'thien',
		            'password' => bcrypt('thien'),
		            'image' => null,
		            'team_id' => 2
		        ],
		        [
		            'name' => 'Sơn',
		            'username' => 'son',
		            'password' => bcrypt('son'),
		            'image' => null,
		            'team_id' => 1
		        ]
        	]
    );
    }
}

