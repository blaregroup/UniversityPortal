

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

# create role record
$role1 = $user1->createRole($role="admin", $access="high", $active="1");
$role2 = $user2->createRole($role="student", $access="low", $active="1");
$role3 = $user3->createRole($role="teacher", $access="median", $active="1");


# create profiles for users
$user1->createProfile();
$user2->createProfile();
$user3->createProfile();

$user1->createNotification("TitleOne", "industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
$user1->createNotification("TitleTwo", "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc");
$user2->createNotification("TitleThree", "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc");
$user3->createNotification("TitleFour", "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc");



# create subjects
$course1 = Course::create(['name'=>'MCA', 'Description'=>'MCA']);
$course2 = Course::create(['name'=>'BCA', 'Description'=>'BCA']);
$course3 = Course::create(['name'=>'MSC', 'Description'=>'MSC']);
$course4 = Course::create(['name'=>'BSC', 'Description'=>'BSC']);


# add subject
$course1->create_subject('MCA1', 'MCA_SUB1', 'MCA_SUB_DESCRIPTION');
$course1->create_subject('MCA2', 'MCA_SUB2', 'MCA_SUB_DESCRIPTION');
$course1->create_subject('MCA3', 'MCA_SUB3', 'MCA_SUB_DESCRIPTION');

# add subject
$course2->create_subject('BCA1', 'BCA_SUB1', 'BCA_SUB_DESCRIPTION');
$course2->create_subject('BCA2', 'BCA_SUB2', 'BCA_SUB_DESCRIPTION');
$course2->create_subject('BCA3', 'BCA_SUB3', 'BCA_SUB_DESCRIPTION');


# add subject
$course3->create_subject('MSC1', 'MSC_SUB1', 'MSC_SUB_DESCRIPTION');
$course3->create_subject('MSC2', 'MSC_SUB2', 'MSC_SUB_DESCRIPTION');
$course3->create_subject('MSC3', 'MSC_SUB3', 'MSC_SUB_DESCRIPTION');


# add subject
$course4->create_subject('BSC1', 'BSC_SUB1', 'BSC_SUB_DESCRIPTION');
$course4->create_subject('BSC2', 'BSC_SUB2', 'BSC_SUB_DESCRIPTION');
$course4->create_subject('BSC3', 'BSC_SUB3', 'BSC_SUB_DESCRIPTION');

# assign course_id to students and Teachers
$role2->course_id='1';

$role2->save();
$role3->save();


# Teacher 
$user3->Role()->first()->join_subject('1');
$user3->Role()->first()->join_subject('2');
$user3->Role()->first()->join_subject('3');
$user3->Role()->first()->join_subject('4');
$user3->Role()->first()->join_subject('5');


