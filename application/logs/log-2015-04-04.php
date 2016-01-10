<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2015-04-04 11:46:20 --> Query error: Unknown column 'cms_mas_jurusan.id_jurusan' in 'on clause' - Invalid query: SELECT *
FROM `mhs_pkl`
LEFT JOIN `mas_jurusan` ON `cms_mas_jurusan`.`id_jurusan`=`cms_mhs_pkl`.`id_jurusan`
WHERE `fk_id_pkl` = '4'
