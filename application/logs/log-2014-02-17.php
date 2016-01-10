<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2014-02-17 09:30:43 --> 404 Page Not Found: main/setting
ERROR - 2014-02-17 09:30:51 --> 404 Page Not Found: main/configuration
ERROR - 2014-02-17 09:31:58 --> 404 Page Not Found: main/configu
ERROR - 2014-02-17 09:36:32 --> Query error: Table 'db_sim_penyuratan.main_module' doesn't exist - Invalid query: SELECT `module_path`
FROM `main_module`
WHERE `module_path` = 'sim_penyuratan'
ERROR - 2014-02-17 09:37:41 --> Query error: Table 'db_sim_penyuratan.main_navigation' doesn't exist - Invalid query: SELECT navigation_name
        	FROM main_navigation
        	WHERE 'sim_penyuratan/manage_surat_masuk' LIKE CONCAT(url, '%')
        		OR '/sim_penyuratan/manage_surat_masuk/' LIKE CONCAT(url, '%')
        		OR '/sim_penyuratan/manage_surat_masuk' LIKE CONCAT(url, '%')
        		OR 'sim_penyuratan/manage_surat_masuk/' LIKE CONCAT(url, '%')
        	ORDER BY LENGTH(url) DESC
ERROR - 2014-02-17 09:38:44 --> Query error: Table 'db_sim_penyuratan.cms_ci_sessions' doesn't exist - Invalid query: SELECT *
FROM `cms_ci_sessions`
WHERE `session_id` = 'a2bf5f6b38c8a4c707a41331f5190f95'
AND `user_agent` = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36'
 LIMIT 1
