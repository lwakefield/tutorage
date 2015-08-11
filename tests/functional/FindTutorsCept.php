<?php
$faker = Faker\Factory::create();

$tutor_name = $faker->name;
$tutor_email = $faker->email;

$student_name = $faker->name;
$student_email = $faker->email;
$student_password = $faker->password;

$subject_name = $faker->sentence($nbWords = 4);
$subject_code = $faker->regexify('[A-Z]{4}[0-9]{4}');

$I = new FunctionalTester($scenario);
$I->wantTo('Find a tutor');

// Setup the subject
$subject_id = $I->haveRecord('subjects', array(
    'code' => $subject_code, 
    'name' => $subject_name, 
));

// Setup the student
$student_id = $I->haveRecord('users', array(
    'email' => $student_email,
    'name' => $student_name,
    'password' => bcrypt($student_password)
));
$student_role = $I->grabRecord('roles', array('name' => 'student'));
$I->haveRecord('user_roles', array('user_id' => $student_id, 'role_id' => $student_role->id));

// Setup the tutor
$tutor_id = $I->haveRecord('users', array('email' => $tutor_email, 'name' => $tutor_name));
$tutor_role = $I->grabRecord('roles', array('name' => 'tutor'));
$I->haveRecord('user_roles', array('user_id' => $tutor_id, 'role_id' => $tutor_role->id));
$I->haveRecord('tutor_subjects', array('user_id' => $tutor_id, 'subject_id' => $subject_id));

//Test away!
$I->amLoggedAs(['email' => $student_email, 'password' => $student_password]);
$I->amOnPage('/');
$I->selectOption('.find-tutors-form select[name="subject_id"]', $subject_id);
$I->click('.find-tutors-form button[type="submit"]');

$I->seeCurrentUrlEquals('');
$I->see($tutor_name);
