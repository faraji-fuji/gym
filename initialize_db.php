<?php

include ("connect.php");

// call functions defined in connect.php
// to create initial connection to database
// create the database
// create tables
initial_db_connection();
create_contact_us_table();
create_class_table();
create_user_table();
create_fee_table();
create_testimonial_table();
create_page_table();

//add more classes
// store class titles in an array
$title = [
    'zumba', 
    'aerobics', 
    'pilates',
    'powerfit',
    'boxing',
    'crossfit',
    'spinning'
];

// store brief descriptions in an array
$class_description_brief = [
    'Zumba combines Latin dance, hip-hop, martial arts, and resistance training in an upbeat fitness choreography that...', 
    'It is one of the earliest forms of class fitness, doing pretty much what is says on the label; engaging your aerobic...', 
    'This low-impact, conditioning workout is filled with body-sculpting moves that only require a space the size of an...',
    'Designed for those who like to move, every class delivers a series of high intensity intervals combining...',
    'Boxing is a powerful alternative to cross-training workouts. This empowering exercise often includes...',
    'Designed to prepare you physically for what life throws your way, CrossFit develops skill, power, endurance and...',
    'Spinning is a form of indoor cycling that is offered in large gym chains and boutique fitness clubs across...'
];

// store full descriptions in an array
$class_description_full = [
    'Zumba combines Latin dance, hip-hop, martial arts, and resistance training in an upbeat fitness choreography that makes working out tons of fun. A typical, 60-minute class helps relieve stress, tone muscles, and burn calories. Appropriate for all ages and fitness levels, it is no wonder that this confidence-boosting, rhythmic workout is such a hit. This is how it is done; Put on your dancing shoes and get ready to shake it in front of your TV or computer! Zumba Fitness sells DVDs, video games, lightweight training tools, clothes, and accessories; plus, it hosts videos on its YouTube channel.',
    'It is one of the earliest forms of class fitness, doing pretty much what is says on the label; engaging your aerobic system. It involves the repetition of movements to music, getting the calories burnt and the heart pumping. Whether you prefer a more dance and choreography based class or just a simple workout, aerobics varies from class to class and is all about what you prefer and what intensity you desire.',
    'This low-impact, conditioning workout is filled with body-sculpting moves that only require a space the size of an exercise mat. Instructors help participants connect the mind and body through a series of small, breath-controlled movements that help build flexibility, muscle strength, and endurance in the legs, abs, arms, hips, and back. Most classes emphasize the importance of achieving proper pelvic and spinal alignment, resulting in improved posture.
    How it is done : Pilates is one of the best workouts to try at home because you can easily modify it to your fitness level, and it requires little space and equipment. Place a standard exercise mat near a TV or computer screen and follow along with your choice of Pilates workout DVDs or YouTube videos. eFit30 offers a free Pilates podcast on iTunes, as well.',
    'Designed for those who like to move, every class delivers a series of high intensity intervals combining power + endurance in a bootcamp format, all under the watchful eye of a coach who is committed to helping you achieve optimal movement and performance. Supercharge your capacity with powerFit.',
    'Boxing is a powerful alternative to cross-training workouts. This empowering exercise often includes free weights and plyometric moves — quick exercises that exert lots of force, such as hopping and jumping — to maximize calorie burn and increase lean muscle mass. Participants focus on improving speed, mental and physical strength, coordination, and endurance with this combat-based, total-body workout that only draws the line at full-contact sparring.
    How it is done: Purchase a pair of gloves and light dumbbells to perform most boxing moves at home. Follow a boxing workout DVD or videos on YouTube. Be sure to move any furniture or fragile items out of the way before throwing those punches and knock-out kicks!',
    'Designed to prepare you physically for what life throws your way, CrossFit develops skill, power, endurance and mental strength. Each class is led by a highly skilled trainer, incorporating body weight exercises, barbells, and everything in between.
    combines a series of cardiovascular exercise, bodyweight strength training, gymnastics, and weightlifting into fast-paced, total-body workouts. Workouts harness the power of metabolic conditioning circuit-training, requiring participants to complete each set of exercises as quickly as possible while still maintaining proper form. The varied movements and little rest make for a tough workout that lasts anywhere from 20 to 40 minutes.
    How to do it at home: CrossFit "WODs," or workouts of the day, are posted on the company website for home use. If you are new to this style of exercise and need to learn the proper form for various moves, check out CrossFit videos on YouTube and stick to exercises that require minimal equipment. A great at-home alternative to CrossFit is the P90X program.',
    'Spinning is a form of indoor cycling that is offered in large gym chains and boutique fitness clubs across the country. An enthusiastic instructor guides participants on specialized, stationary bikes through an intense, 40- to 60-minute cardio workout that focuses on strength, endurance, intervals, high intensity bursts, and active recovery. The group pedals along with motivating music timed to the instructor’s choreography.
    Celebs who are fans: Lady Gaga, Jessica Alba, Jennifer Aniston
    How to do it at home: Mad Dogg Athletics sells the original spinning bike for at-home use, as well as DVDs, cycling shoes, and downloadable music packages. YouTube also offers a variety of spin class videos.'
];

// store image path in an array
$image_path = [
    'anastase-maragos-FP7cfYPPUKM-unsplash.jpg', 
    'bruce-mars-gJtDg6WfMlQ-unsplash.jpg',
    'bruce-mars-y0SMHt74yqc-unsplash.jpg',
    'ryan-hoffman-Z0Z4rxXskc0-unsplash.jpg',
    'ryan-hoffman-87mSx1ZlIHY-unsplash.jpg',
    'leah-hetteberg-coMf4xWOBgM-unsplash.jpg',
    'anupam-mahapatra-Vz0RbclzG_w-unsplash.jpg'
];

$i = 0;
while ($i < 7)
{
    insert_into_class($title[$i], $class_description_brief[$i], $class_description_full[$i], $image_path[$i]);
    $i++;
}

// fill the fees table
// store values in arrays
$subscription = [
    'daily',
    'weekly',
    'monthly'
];

$price = [
    '15.00',
    '60.00',
    '200.00'
];

$benefits = [
    'One hour with a health coach',
    'I session with a personal trainer and 6 hours with a health coach',
    'Full time personal trainer and health coach'
];

$i = 0;
while ($i < 3)
{
    insert_into_fee($subscription[$i], $price[$i], $benefits[$i]);
    $i++;
}

echo '<script type="text/javascript">';
echo 'alert("Fee and Classes added to the database Successfuly")';
echo '</script>';

echo '<script type="text/javascript">';
echo 'alert("Database initialized successfuly")';
echo '</script>';
?>