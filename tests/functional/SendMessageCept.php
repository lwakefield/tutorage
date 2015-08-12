<?php
$faker = Faker\Factory::create();

$tutor_name = $faker->name;
$tutor_email = $faker->email;

$student_name = $faker->name;
$student_email = $faker->email;
$student_password = $faker->password;

$subject_name = $faker->sentence($nbWords = 4);
$subject_code = $faker->regexify('[A-Z]{4}[0-9]{4}');

$message = $faker->sentence;

$I = new FunctionalTester($scenario);
$I->wantTo('Send a message');

// Setup the subject
$subject_id = $I->haveRecord('subjects', [ 'code' => $subject_code, 'name' => $subject_name, ]);

// Setup the student
$student_id = $I->haveRecord('users', [ 'email' => $student_email,
    'name' => $student_name,
    'password' => bcrypt($student_password)
]);
$student_role = $I->grabRecord('roles', [ 'name' => 'student' ]);
$I->haveRecord('user_roles', [ 'user_id' => $student_id, 'role_id' => $student_role->id ]);

// Setup the tutor
$tutor_id = $I->haveRecord('users', [ 'email' => $tutor_email, 'name' => $tutor_name ]);
$tutor_role = $I->grabRecord('roles', [ 'name' => 'tutor' ]);
$I->haveRecord('user_roles', [ 'user_id' => $tutor_id, 'role_id' => $tutor_role->id ]);
$I->haveRecord('tutor_subjects', [ 'user_id' => $tutor_id, 'subject_id' => $subject_id ]);

//Test away!
$I->amLoggedAs(['email' => $student_email, 'password' => $student_password]);
$I->amOnPage('/');

$I->selectOption('.find-tutors-form select', $subject_id);
$I->click('.find-tutors-form button');

$I->seeCurrentUrlEquals('');
$I->see($tutor_name);

$I->fillField(".send-message-to-$tutor_id textarea", $message);
$I->click(".send-message-to-$tutor_id button");

$I->seeCurrentUrlEquals('');
$I->seeRecord('messages', ['from_id' => $student_id, 'to_id' => $tutor_id, 'content' => $message]);
