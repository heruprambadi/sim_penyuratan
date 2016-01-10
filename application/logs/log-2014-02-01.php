<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2014-02-01 00:01:23 --> Severity: Warning --> call_user_func() expects parameter 1 to be a valid callback, class 'Manage_Ket_Tdk_Terima_Beasiswa' does not have a method 'after_insert_update' C:\xampp\htdocs\sim_penyuratan\application\libraries\Extended_Grocery_CRUD.php 610
ERROR - 2014-02-01 00:01:27 --> Severity: Notice --> Undefined property: stdClass::$nomor_surat C:\xampp\htdocs\sim_penyuratan\modules\sim_penyuratan\controllers\manage_ket_tdk_terima_beasiswa.php 216
ERROR - 2014-02-01 00:03:10 --> Severity: Warning --> call_user_func() expects parameter 1 to be a valid callback, class 'Manage_Ket_Tdk_Terima_Beasiswa' does not have a method 'after_insert_update' C:\xampp\htdocs\sim_penyuratan\application\libraries\Extended_Grocery_CRUD.php 610
ERROR - 2014-02-01 00:03:15 --> Severity: Notice --> Undefined property: stdClass::$nomor_surat C:\xampp\htdocs\sim_penyuratan\modules\sim_penyuratan\controllers\manage_ket_tdk_terima_beasiswa.php 216
ERROR - 2014-02-01 10:13:40 --> Query error: Unknown column 'id_kelakuan_baik' in 'where clause' - Invalid query: SELECT *
FROM `cms_permohonan_riset`
JOIN `cms_mas_jurusan` ON `id_jurusan`=`fk_id_jurusan`
WHERE `id_kelakuan_baik` = '3'
ERROR - 2014-02-01 10:14:16 --> Query error: Unknown column 'fk_id_jurusan' in 'on clause' - Invalid query: SELECT *
FROM `cms_permohonan_riset`
JOIN `cms_mas_jurusan` ON `id_jurusan`=`fk_id_jurusan`
WHERE `id_permohonan_riset` = '3'
ERROR - 2014-02-01 10:14:53 --> Severity: Notice --> Undefined property: stdClass::$tahun_akademis C:\xampp\htdocs\sim_penyuratan\modules\sim_penyuratan\controllers\manage_permohonan_riset.php 221
ERROR - 2014-02-01 14:37:50 --> Query error: Unknown column 'id_permohonan_riset' in 'where clause' - Invalid query: SELECT *
FROM `cms_permohonan_peng_data`
JOIN `cms_mas_jurusan` ON `id_jurusan`=`fk_id_jurusan`
WHERE `id_permohonan_riset` = '1'
ERROR - 2014-02-01 14:38:20 --> Query error: Unknown column 'fk_id_jurusan' in 'on clause' - Invalid query: SELECT *
FROM `cms_permohonan_peng_data`
JOIN `cms_mas_jurusan` ON `id_jurusan`=`fk_id_jurusan`
WHERE `id_permohonan_peng_data` = '1'
ERROR - 2014-02-01 14:38:52 --> Severity: Notice --> Undefined property: stdClass::$judul_penelitian C:\xampp\htdocs\sim_penyuratan\modules\sim_penyuratan\controllers\manage_permohonan_peng_data.php 218
ERROR - 2014-02-01 14:47:41 --> Severity: Error --> Uncaught exception 'Exception' with message 'The table name does not exist. Please check you database and try again.' in C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php:4708
Stack trace:
#0 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4216): Grocery_CRUD->get_table()
#1 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4232): Grocery_CRUD->pre_render()
#2 C:\xampp\htdocs\sim_penyuratan\application\libraries\Extended_Grocery_CRUD.php(740): Grocery_CRUD->render()
#3 C:\xampp\htdocs\sim_penyuratan\modules\sim_penyuratan\controllers\manage_master_cont_pkl.php(155): Extended_Grocery_CRUD->render()
#4 [internal function]: Manage_Master_Cont_Pkl->index()
#5 C:\xampp\htdocs\sim_penyuratan\application\core\MY_CodeIgniter.php(389): call_user_func_array(Array, Array)
#6 C:\xampp\htdocs\sim_penyuratan\index.php(324): require_once('C:\xampp\htdocs...')
#7 {main}
  thrown C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php 4708
ERROR - 2014-02-01 14:48:09 --> Severity: Error --> Uncaught exception 'Exception' with message 'The table name does not exist. Please check you database and try again.' in C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php:4708
Stack trace:
#0 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4216): Grocery_CRUD->get_table()
#1 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4232): Grocery_CRUD->pre_render()
#2 C:\xampp\htdocs\sim_penyuratan\application\libraries\Extended_Grocery_CRUD.php(740): Grocery_CRUD->render()
#3 C:\xampp\htdocs\sim_penyuratan\modules\sim_penyuratan\controllers\manage_master_cont_pkl.php(155): Extended_Grocery_CRUD->render()
#4 [internal function]: Manage_Master_Cont_Pkl->index()
#5 C:\xampp\htdocs\sim_penyuratan\application\core\MY_CodeIgniter.php(389): call_user_func_array(Array, Array)
#6 C:\xampp\htdocs\sim_penyuratan\index.php(324): require_once('C:\xampp\htdocs...')
#7 {main}
  thrown C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php 4708
ERROR - 2014-02-01 14:48:53 --> Severity: Error --> Uncaught exception 'Exception' with message 'The table name does not exist. Please check you database and try again.' in C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php:4708
Stack trace:
#0 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4216): Grocery_CRUD->get_table()
#1 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4232): Grocery_CRUD->pre_render()
#2 C:\xampp\htdocs\sim_penyuratan\application\libraries\Extended_Grocery_CRUD.php(740): Grocery_CRUD->render()
#3 C:\xampp\htdocs\sim_penyuratan\modules\sim_penyuratan\controllers\manage_master_cont_pkl.php(156): Extended_Grocery_CRUD->render()
#4 [internal function]: Manage_Master_Cont_Pkl->index()
#5 C:\xampp\htdocs\sim_penyuratan\application\core\MY_CodeIgniter.php(389): call_user_func_array(Array, Array)
#6 C:\xampp\htdocs\sim_penyuratan\index.php(324): require_once('C:\xampp\htdocs...')
#7 {main}
  thrown C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php 4708
ERROR - 2014-02-01 14:50:24 --> Severity: Error --> Uncaught exception 'Exception' with message 'The table name does not exist. Please check you database and try again.' in C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php:4708
Stack trace:
#0 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4216): Grocery_CRUD->get_table()
#1 C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php(4232): Grocery_CRUD->pre_render()
#2 C:\xampp\htdocs\sim_penyuratan\application\libraries\Extended_Grocery_CRUD.php(740): Grocery_CRUD->render()
#3 C:\xampp\htdocs\sim_penyuratan\modules\sim_penyuratan\controllers\manage_master_cont_pkl.php(156): Extended_Grocery_CRUD->render()
#4 [internal function]: Manage_Master_Cont_Pkl->index()
#5 C:\xampp\htdocs\sim_penyuratan\application\core\MY_CodeIgniter.php(389): call_user_func_array(Array, Array)
#6 C:\xampp\htdocs\sim_penyuratan\index.php(324): require_once('C:\xampp\htdocs...')
#7 {main}
  thrown C:\xampp\htdocs\sim_penyuratan\application\libraries\Grocery_CRUD.php 4708
