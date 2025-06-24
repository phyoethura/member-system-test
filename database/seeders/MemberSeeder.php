<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use Carbon\Carbon;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $members = [
            ['title' => 'Mr.', 'name' => 'John', 'surname' => 'Smith', 'date_of_birth' => '1990-05-15'],
            ['title' => 'Mrs.', 'name' => 'Sarah', 'surname' => 'Johnson', 'date_of_birth' => '1985-03-22'],
            ['title' => 'Miss', 'name' => 'Emma', 'surname' => 'Williams', 'date_of_birth' => '1995-07-08'],
            ['title' => 'Mr.', 'name' => 'Michael', 'surname' => 'Brown', 'date_of_birth' => '1978-11-12'],
            ['title' => 'Mrs.', 'name' => 'Lisa', 'surname' => 'Davis', 'date_of_birth' => '1982-09-30'],
            ['title' => 'Mr.', 'name' => 'David', 'surname' => 'Wilson', 'date_of_birth' => '1975-01-18'],
            ['title' => 'Miss', 'name' => 'Jessica', 'surname' => 'Taylor', 'date_of_birth' => '1998-04-25'],
            ['title' => 'Mr.', 'name' => 'James', 'surname' => 'Anderson', 'date_of_birth' => '1988-12-03'],
            ['title' => 'Mrs.', 'name' => 'Michelle', 'surname' => 'Thomas', 'date_of_birth' => '1979-06-14'],
            ['title' => 'Mr.', 'name' => 'Robert', 'surname' => 'Jackson', 'date_of_birth' => '1970-08-27'],
            ['title' => 'Miss', 'name' => 'Ashley', 'surname' => 'White', 'date_of_birth' => '2000-02-10'],
            ['title' => 'Mr.', 'name' => 'Christopher', 'surname' => 'Harris', 'date_of_birth' => '1983-10-19'],
            ['title' => 'Mrs.', 'name' => 'Amanda', 'surname' => 'Martin', 'date_of_birth' => '1977-05-06'],
            ['title' => 'Mr.', 'name' => 'Matthew', 'surname' => 'Thompson', 'date_of_birth' => '1992-03-13'],
            ['title' => 'Miss', 'name' => 'Stephanie', 'surname' => 'Garcia', 'date_of_birth' => '1996-09-21'],
            ['title' => 'Mr.', 'name' => 'Daniel', 'surname' => 'Martinez', 'date_of_birth' => '1986-07-04'],
            ['title' => 'Mrs.', 'name' => 'Jennifer', 'surname' => 'Robinson', 'date_of_birth' => '1981-11-28'],
            ['title' => 'Mr.', 'name' => 'Kevin', 'surname' => 'Clark', 'date_of_birth' => '1974-04-16'],
            ['title' => 'Miss', 'name' => 'Samantha', 'surname' => 'Rodriguez', 'date_of_birth' => '1999-12-05'],
            ['title' => 'Mr.', 'name' => 'Brian', 'surname' => 'Lewis', 'date_of_birth' => '1987-08-11'],
            ['title' => 'Mrs.', 'name' => 'Nicole', 'surname' => 'Lee', 'date_of_birth' => '1980-01-29'],
            ['title' => 'Mr.', 'name' => 'Anthony', 'surname' => 'Walker', 'date_of_birth' => '1973-06-22'],
            ['title' => 'Miss', 'name' => 'Rachel', 'surname' => 'Hall', 'date_of_birth' => '2001-03-17'],
            ['title' => 'Mr.', 'name' => 'Steven', 'surname' => 'Allen', 'date_of_birth' => '1976-09-08']
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}