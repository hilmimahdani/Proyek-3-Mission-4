<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');

$routes->get('/home', 'Home::index');


$routes->get('login', 'Auth::login');
$routes->post('login/do', 'Auth::doLogin');
$routes->get('logout', 'Auth::logout');

$routes->get('register', 'Auth::register');
$routes->post('register/do', 'Auth::doRegister');

$routes->get('courses', 'CourseController::index');
$routes->get('courses/detail/(:num)', 'CourseController::detail');
$routes->post('courses/enroll/(:num)', 'CourseController::enroll/$1');
$routes->post('courses/enroll', 'CourseController::enroll'); // Tambah rute untuk enroll multiple

//CRUD Student
$routes->get('students', 'StudentController::index');
$routes->get('students/create', 'StudentController::create');
$routes->post('students/store', 'StudentController::store');
$routes->get('students/edit/(:num)', 'StudentController::edit/');
$routes->post('students/update/(:num)', 'StudentController::update');
$routes->get('students/delete/(:num)', 'StudentController::delete');


$routes->get('mycourses', 'CourseController::myCourses');

// CRUD Courses (Admin Only)
$routes->get('courses/create', 'CourseController::create');
$routes->post('courses/store', 'CourseController::store');
$routes->get('courses/edit/(:num)', 'CourseController::edit');
$routes->post('courses/update/(:num)', 'CourseController::update');
$routes->get('courses/delete/(:num)', 'CourseController::delete');
