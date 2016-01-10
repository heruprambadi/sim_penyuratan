<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2014-03-10 00:08:33 --> 404 Page Not Found: main/view
ERROR - 2014-03-10 00:15:52 --> 404 Page Not Found: cgs/data_pembelian
ERROR - 2014-03-10 00:16:55 --> Severity: Error --> Call to undefined method Manage_Barang::new_crud() C:\xampp\htdocs\sim_penyuratan\modules\cgs\controllers\manage_barang.php 16
ERROR - 2014-03-10 00:17:55 --> 404 Page Not Found: 
ERROR - 2014-03-10 00:18:05 --> You did not select a file to upload.
ERROR - 2014-03-10 00:18:34 --> 404 Page Not Found: 
ERROR - 2014-03-10 00:19:51 --> Severity: Error --> Uncaught exception 'Exception' with message 'The table name does not exist. Please check you database and try again.' in C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php:4708
Stack trace:
#0 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4216): Grocery_CRUD->get_table()
#1 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4232): Grocery_CRUD->pre_render()
#2 C:\xampp\htdocs\sim_penyuratan\application\libraries\Extended_Grocery_CRUD.php(740): Grocery_CRUD->render()
#3 C:\xampp\htdocs\sim_penyuratan\modules\cgs\controllers\manage_barang.php(158): Extended_Grocery_CRUD->render()
#4 [internal function]: Manage_Barang->index()
#5 C:\xampp\htdocs\sim_penyuratan\application\core\MY_CodeIgniter.php(389): call_user_func_array(Array, Array)
#6 C:\xampp\htdocs\sim_penyuratan\index.php(324): require_once('C:\xampp\htdocs...')
#7 {main}
  thrown C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php 4708
ERROR - 2014-03-10 00:19:57 --> Severity: Error --> Uncaught exception 'Exception' with message 'The table name does not exist. Please check you database and try again.' in C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php:4708
Stack trace:
#0 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4216): Grocery_CRUD->get_table()
#1 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4232): Grocery_CRUD->pre_render()
#2 C:\xampp\htdocs\sim_penyuratan\application\libraries\Extended_Grocery_CRUD.php(740): Grocery_CRUD->render()
#3 C:\xampp\htdocs\sim_penyuratan\modules\cgs\controllers\manage_penjualan.php(157): Extended_Grocery_CRUD->render()
#4 [internal function]: Manage_Penjualan->index()
#5 C:\xampp\htdocs\sim_penyuratan\application\core\MY_CodeIgniter.php(389): call_user_func_array(Array, Array)
#6 C:\xampp\htdocs\sim_penyuratan\index.php(324): require_once('C:\xampp\htdocs...')
#7 {main}
  thrown C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php 4708
