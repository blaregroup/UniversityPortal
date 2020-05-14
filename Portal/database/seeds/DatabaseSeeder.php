<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Course;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $no_of_teachers = 20;
        $no_of_students = 150;
        $no_of_notifications = 15;
        $no_of_course = 6;

        $no_of_subjects = 5;

        # Users List
		$students = array();
		

		# Teachers List
		$teachers = array();

		# course
		$courses = array();


    	#=====================================================================
    	#            Section One, Create Users
    	#=====================================================================
        ## Only One Admin
		$admin  = User::create([
		        'name'=>'Administrator',
        		'email'=>'admin@nothing.com',
                'password'=>Hash::make('admin@123')
                ]);





		# creating numbers of teachers
		for($x=0; $x<$no_of_teachers ; $x++){
		        $obj = User::create(['name'=>'TeacherName '.$x,
		              'email'=>'teacher'.$x.'@nothing.com',
		              'password'=>Hash::make('admin@123')
		        ]);
		        # insert into array
		        array_push($teachers, $obj);
		}

		
		# creating numbers of students
		for($x=0; $x<$no_of_students; $x++){
		        $obj = User::create(['name'=>'StudentName '.$x,
		              'email'=>'student'.$x.'@nothing.com',
		              'password'=>Hash::make('admin@123')
		        ]);
		        # insert into array
		        array_push($students, $obj);
		}



		#=====================================================================
    	#            Section Two, Generate Their Roles
    	#=====================================================================

		$admin->createRole($role="admin", $access="high", $active="1");


		foreach($teachers as $teacher){
		        $teacher->createRole($role="teacher",
		                $access="median",
		                $active="".rand(0,1));
		}



		foreach($students as $student){
		        $student->createRole($role="student", 
		        	$access="low", 
		        	$active="".rand(0,1));
		}


		#=====================================================================
    	#            Section Three, Generate Their Profiles
    	#=====================================================================

			//Admin profile
			$admin->createProfile(
				$fname=$admin->name,
		        $description=Str::random(50),
		        $gender="male",
    			$dob="01/01/1999", 
		        $mother_name=Str::random(8),
		        $father_name=Str::random(8),
		        $phone="".rand(1000000000,9999999999),
		        $mphone="".rand(1000000000,9999999999),
		        $fphone="".rand(1000000000,9999999999),
		        $alphone="".rand(1000000000,9999999999)
			);


			foreach($teachers as $teacher){
			        $teacher->createProfile(
			        $fname=$teacher->name,
			        $description=Str::random(50),
			        $gender="male",
        			$dob="01/01/1999", 
			        $mother_name=Str::random(8),
			        $father_name=Str::random(8),
			        $phone="".rand(1000000000,9999999999),
			        $mphone="".rand(1000000000,9999999999),
			        $fphone="".rand(1000000000,9999999999),
			        $alphone="".rand(1000000000,9999999999)
			        );
			}



			foreach($students as $student){
			        $student->createProfile(
					$fname=$student->name,
			        $description=Str::random(50),
			        $gender="male",
        			$dob="01/01/1999", 
			        $mother_name=Str::random(8),
			        $father_name=Str::random(8),
			        $phone="".rand(1000000000,9999999999),
			        $mphone="".rand(1000000000,9999999999),
			        $fphone="".rand(1000000000,9999999999),
			        $alphone="".rand(1000000000,9999999999)
			        );
			}


		#=====================================================================
    	#            Section Four, Generate Notifications By Admin
    	#=====================================================================


		for ($i=0; $i <$no_of_notifications ; $i++) { 
			# code...
			$admin->createNotification(
			Str::random(15),
			Str::random(150)
		);
		}

		#=====================================================================
    	#            Section Five, Generate Courses
    	#=====================================================================


		for ($i=0; $i < $no_of_course ; $i++) { 
			# code...
			$obj = Course::create(['name'=>Str::random(5), 
				'Description'=>Str::random(50)]);

			array_push($courses, $obj);
		}

		#=====================================================================
    	#            Section Generate Subjects
    	#=====================================================================


		foreach ($courses as $course) {
			
			for ($i=0; $i < $no_of_subjects; $i++) { 
				$course->create_subject(
					Str::random(3), 
					Str::random(6), 
					Str::random(48)
				);	
			}
		}

		#=====================================================================
    	#            Section Student Joining Subjects
    	#=====================================================================


		foreach($students as $student){
			$student->Role()->first()->join_course(rand(1, $no_of_course));
		}


		#=====================================================================
    	#            Section Teachers
    	#=====================================================================
		foreach($teachers as $teacher){
			$teacher->Role()->first()->join_subject(rand(1,$no_of_subjects));
			$teacher->Role()->first()->join_subject(rand(1,$no_of_subjects));
		}
	}

}
