

# more addAdmin.cmd | php artisan tinker
$user = new App\User;
$user->name = "Administrator";
$user->email = "surajsinghbisht054@gmail.com";
$user->password = Hash::make('johnwick');
$user->role = "A";
$user->save();
exit
