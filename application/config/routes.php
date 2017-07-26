<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ADMIN
$route['arkmin'] = 'admin/login';
$route['logout'] = 'admin/login/logout';
$route['force_login'] = 'admin/login/proceed';
$route['apps'] = 'admin/dashboard';
$route['validasi/(:any)'] = 'preferences/validate/$1';

$route['course'] = 'admin/course';
$route['course/tambah'] = 'admin/course/tambah';
$route['course/view/(:any)'] = 'admin/course/view/$1';
$route['course/edit/(:any)'] = 'admin/course/edit/$1';
$route['admin/material'] = 'admin/material';
$route['course/material/tambah'] = 'admin/course/materials/tambah';

$route['tag'] = 'admin/tag';
$route['tag/tambah'] = 'admin/tag/tambah';
$route['tag/edit/(:any)'] = 'admin/tag/edit/$1';
	//$route['sekolah'] = 'admin/school/';
$route['sekolah/tambah'] = 'admin/school/tambah';
$route['sekolah/edit/(:any)'] = 'admin/school/edit/$1';
$route['sekolah/view/(:any)'] = 'admin/school/view/$1';
$route['user'] = 'admin/user';
$route['user/tambah'] = 'admin/user/tambah';
$route['user/edit/(:any)'] = 'admin/user/edit/$1';
$route['user/view/(:any)'] = 'admin/user/view/$1';
$route['course'] = 'admin/course';

$route['subscribe'] = 'admin/subscribe';
$route['subscribe/tambah'] = 'admin/subscribe/tambah';
$route['subscribe/edit/(:any)'] = 'admin/subscribe/edit/$1';
$route['subscribe/view/(:any)'] = 'admin/subscribe/view/$1';
	//$route['coba'] = 'tests/FunctionTest/coba';


// FRONT
$route['home'] = 'front/home';
$route['login'] = 'front/login';
$route['logout'] = 'front/login/logout';
$route['submit'] = 'front/home/submit';
$route['verify/(:any)'] = 'front/home/verifikasi/$1';
$route['forgot'] = 'front/login/forgot';

$route['catalog'] = 'front/course';
$route['kit'] = 'front/kit';
$route['learn/(:any)'] = 'front/course/read/$1';
$route['learn/enroll/(:any)/(:any)'] = 'front/course/enroll/$1/$2';
$route['learn/start/(:any)/(:any)'] = 'front/course/start/$1/$2';

//USER
$route['u/dashboard'] = 'user/dashboard';
$route['download/(:any)/(:any)'] = 'front/course/download/$1/$2';
$route['tutorial/(:any)'] = 'front/silabus/view/$1';

$route['u/profil'] = 'user/akun';
$route['u/setting'] = 'user/akun/setting';
$route['u/mycourse'] = 'user/akun/course';
$route['u/myinbox'] = 'user/akun/inbox';

// SCHOOL
$route['sch'] = 'school/login';
$route['school/logout'] = 'school/login/logout';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// TEACHER
$route['g/dashboard'] = 'guru/course';
$route['g/student'] = 'guru/user';
$route['g/akun'] = 'guru/akun/setting';
$route['g/inbox'] = 'guru/akun/inbox';
$route['g/device'] = 'guru/device';

// DEVICE MANGEMENT-V2 API DOCS FOR TEACHER
$route['g/device/test_connect'] = 'guru/device/test_connect';
$route['g/device/api/docs'] = 'guru/device/index_api';
$route['g/device/save'] = 'guru/device/save_device';
$route['g/device/delete'] = 'guru/device/delete';
$route['g/device/docs'] = 'guru/device/docs';
$route['g/device/new_reg'] = 'guru/device/new_reg';
$route['g/device/dev_man'] = 'guru/device/dev_man';
$route['g/device/misc'] = 'guru/device/misc';
$route['g/device/gpio'] = 'guru/device/gpio';
$route['g/device/adc'] = 'guru/device/adc';
$route['g/device/spi'] = 'guru/device/spi';
$route['g/device/uart'] = 'guru/device/uart';
$route['g/device/i2c'] = 'guru/device/i2c';
$route['g/device/pwm'] = 'guru/device/pwm';
$route['g/device/dht'] = 'guru/device/dht';

// DEVICE MANAGEMENT

$route['u/device/save'] = 'user/device/save_device';
$route['u/device/delete/(:any)'] = 'user/device/delete_device/$1';
$route['u/device'] = 'user/device';

// DEVICE MANGEMENT-V2 API DOCS
$route['u/device/test_connect'] = 'user/device/test_connect';
$route['u/device/api/docs'] = 'user/device/index_api';
$route['u/device/docs'] = 'user/device/docs';
$route['u/device/new_reg'] = 'user/device/new_reg';
$route['u/device/dev_man'] = 'user/device/dev_man';
$route['u/device/misc'] = 'user/device/misc';
$route['u/device/gpio'] = 'user/device/gpio';
$route['u/device/adc'] = 'user/device/adc';
$route['u/device/spi'] = 'user/device/spi';
$route['u/device/uart'] = 'user/device/uart';
$route['u/device/i2c'] = 'user/device/i2c';
$route['u/device/pwm'] = 'user/device/pwm';
$route['u/device/dht'] = 'user/device/dht';

// PAGE
//$route['pengumuman/(:any)'] = 'front/page/open/$1';
$route['(:any)'] = 'front/page/cms/$1';
$route['read/(:any)/(:any)'] = 'front/page/subcms/$1/$2';


//MIGRATE
$route['migrate_/(:any)']='migrate/version/$1';