<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employees')->insert([
            'photo' => 'photos\wp6UaPqyX909.jpg',
            'code' => 'HR0001',
            'time_in' => '09:00:00',
            'status' => '1',
            'name' => 'HR Manager',
            'gender' => '1',
            'date_of_birth' => '',
            'date_of_joining' => '',
            'number' => '9999999999',
            'qualification' => '',
            'emergency_number' => '',
            'pan_number' => '',
            'father_name' => '',
            'current_address' => '',
            'permanent_address' => '',
            'formalities' => '',
            'offer_acceptance' => '',
            'probation_period' => '',
            'date_of_confirmation' => '',
            'department' => '',
            'salary' => '5000',
            'account_number' => '',
            'bank_name' => '',
            'ifsc_code' => '',
            'pf_account_number' => '',
            'pf_status' => '',
            'date_of_resignation' => '',
            'notice_period' => '',
            'last_working_day' => '',
            'full_final' => '',
            'user_id' => '1'
        ]);
    

        \DB::table('employees')->insert([
        'photo' => 'photos\wp6UaPqyX909.jpg',
        'code' => 'SD0001',
        'time_in' => '09:00:00',
        'status' => '1',
        'name' => 'Developer',
        'gender' => '1',
        'date_of_birth' => '',
        'date_of_joining' => '',
        'number' => '9999999999',
        'qualification' => '',
        'emergency_number' => '',
        'pan_number' => '',
        'father_name' => '',
        'current_address' => '',
        'permanent_address' => '',
        'formalities' => '',
        'offer_acceptance' => '',
        'probation_period' => '',
        'date_of_confirmation' => '',
        'department' => '',
        'salary' => '10000',
        'account_number' => '',
        'bank_name' => '',
        'ifsc_code' => '',
        'pf_account_number' => '',
        'pf_status' => '',
        'date_of_resignation' => '',
        'notice_period' => '',
        'last_working_day' => '',
        'full_final' => '',
        'user_id' => '2'
    ]);

        \DB::table('employees')->insert([
        'photo' => 'photos\wp6UaPqyX909.jpg',
        'code' => 'SD0001',
        'time_in' => '09:00:00',
        'status' => '1',
        'name' => 'Account',
        'gender' => '1',
        'date_of_birth' => '',
        'date_of_joining' => '',
        'number' => '9999999999',
        'qualification' => '',
        'emergency_number' => '',
        'pan_number' => '',
        'father_name' => '',
        'current_address' => '',
        'permanent_address' => '',
        'formalities' => '',
        'offer_acceptance' => '',
        'probation_period' => '',
        'date_of_confirmation' => '',
        'department' => '',
        'salary' => '10000',
        'account_number' => '',
        'bank_name' => '',
        'ifsc_code' => '',
        'pf_account_number' => '',
        'pf_status' => '',
        'date_of_resignation' => '',
        'notice_period' => '',
        'last_working_day' => '',
        'full_final' => '',
        'user_id' => '3'
    ]);
    }
}
