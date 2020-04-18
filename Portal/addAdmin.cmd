

# more addAdmin.cmd | php artisan tinker
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


$user = new App\Profile;
$user->fname = "Full Name of Administrator";
$user->description = "This is Administration Panel";
$user->gender = "male";
$user->mother_name = "No Need";
$user->father_name = "No Need";
$user->phone = "1234567897";
$user->save();

#exit
