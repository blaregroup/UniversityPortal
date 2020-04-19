

# more addAdmin.cmd | php artisan tinker

# ==================================================================
# Creating Dummy login accounts
# ==================================================================

# admin
$user = new App\User;
$user->name = "Administrator";
$user->email = "admin@nothing.com";
$user->password = Hash::make('admin@123');
$user->role = "A";
$user->active = "Y";
$user->save();

# dummy student
$user = new App\User;
$user->name = "Student";
$user->email = "student@nothing.com";
$user->password = Hash::make('admin@123');
$user->role = "S";
$user->save();

# dummy teacher
$user = new App\User;
$user->name = "Teacher";
$user->email = "teacher@nothing.com";
$user->password = Hash::make('admin@123');
$user->role = "T";
$user->save();


# creating dummy profile accounts

$user = new App\Profile;
$user->fname = "I am Admin";
$user->description = "This is Administration Panel";
$user->dob = "2018-01-05";
$user->gender = "male";
$user->mother_name = "No Need";
$user->father_name = "No Need";
$user->phone = "1234567897";
$user->save();

$user = new App\Profile;
$user->fname = "I am Student";
$user->description = "This is Student Panel";
$user->dob = "2018-01-05";
$user->gender = "male";
$user->mother_name = "No Need";
$user->father_name = "No Need";
$user->phone = "1234567897";
$user->save();

$user = new App\Profile;
$user->fname = "I am Teacher";
$user->description = "This is Teacher Panel";
$user->dob = "2018-01-05";
$user->gender = "female";
$user->mother_name = "No Need";
$user->father_name = "No Need";
$user->phone = "1234567897";
$user->save();


#exit
