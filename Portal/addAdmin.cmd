

# more addAdmin.cmd | php artisan tinker

# ==================================================================
# Creating Dummy login accounts
# ==================================================================

# Admin
$user1 = new App\User;
$user1->name = "Administrator";
$user1->email = "admin@nothing.com";
$user1->password = Hash::make('admin@123');
$user1->save();

# Student
$user2 = new App\User;
$user2->name = "Student";
$user2->email = "student@nothing.com";
$user2->password = Hash::make('admin@123');
$user2->save();

# Teacher
$user3 = new App\User;
$user3->name = "Teacher";
$user3->email = "teacher@nothing.com";
$user3->password = Hash::make('admin@123');
$user3->save();

# activate admin account
$user1->createRole($role="admin", $access="high", $active="1");
$user2->createRole($role="student", $access="low", $active="0");
$user3->createRole($role="teacher", $access="median", $active="0");

# creating dummy profile accounts

#$user = new App\Profile;
#$user->fname = "I am Admin";
#$user->description = "This is Administration Panel";
#$user->dob = "2018-01-05";
#$user->gender = "male";
#$user->mother_name = "No Need";
#$user->father_name = "No Need";
#$user->phone = "1234567897";
#$user->save();

#$user = new App\Profile;
#$user->fname = "I am Student";
#$user->description = "This is Student Panel";
#$user->dob = "2018-01-05";
#$user->gender = "male";
#$user->mother_name = "No Need";
#$user->father_name = "No Need";
#$user->phone = "1234567897";
#$user->save();

#$user = new App\Profile;
#$user->fname = "I am Teacher";
#$user->description = "This is Teacher Panel";
#$user->dob = "2018-01-05";
#$user->gender = "female";
#$user->mother_name = "No Need";
#$user->father_name = "No Need";
#$user->phone = "1234567897";
#$user->save();


#exit
