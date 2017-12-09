<?php

use Illuminate\Database\Seeder;

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
		            'position' => 1,
			            'team_id' => 1
		        ],
		        [
		            'name' => 'Thiện',
		            'username' => 'thien',
		            'password' => bcrypt('thien'),
		            'image' => null,
		            'position' => 2,
		            'team_id' => 2
		        ],
		        [
		            'name' => 'Sơn',
		            'username' => 'son',
		            'password' => bcrypt('son'),
		            'image' => null,
		            'position' => 1,
		            'team_id' => 1
		        ]
        	]
    );
    }
}
