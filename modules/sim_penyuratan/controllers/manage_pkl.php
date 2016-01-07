<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Pkl
 *
 * @author No-CMS Module Generator
 */
class Manage_Pkl extends CMS_Priv_Strict_Controller {

    protected $URL_MAP = array();

    public function index(){
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // initialize groceryCRUD
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $crud = $this->new_crud();
        //$crud->set_theme('datatables');
        // this is just for code completion
        if (FALSE) $crud = new Extended_Grocery_CRUD();

        // check state & get primary_key
        $state = $crud->getState();
        $state = $crud->getState();
        $state_info = $crud->getStateInfo();
        $primary_key = isset($state_info->primary_key)? $state_info->primary_key : NULL;
        switch($state){
            case 'unknown': break;
            case 'list' : break;
            case 'add' : break;
            case 'edit' : break;
            case 'delete' : break;
            case 'insert' : break;
            case 'update' : break;
            case 'ajax_list' : break;
            case 'ajax_list_info': break;
            case 'insert_validation': break;
            case 'update_validation': break;
            case 'upload_file': break;
            case 'delete_file': break;
            case 'ajax_relation': break;
            case 'ajax_relation_n_n': break;
            case 'success': break;
            case 'export': break;
            case 'print': break;
        }
        
        // unset things 
        $crud->unset_jquery();
        $crud->unset_read();
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_list();
        // $crud->unset_back_to_list();
        $crud->unset_print();
        $crud->unset_export();

        // set model
        // $crud->set_model($this->cms_module_path().'/grocerycrud_pkl_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language($this->cms_language());

        // table name
        $crud->set_table($this->cms_complete_table_name('pkl'));

        // set subject
        $crud->set_subject('PKL/Magang');

        // displayed columns on list
        $crud->columns('nomor','kepada','di');
        $crud->order_by('id_pkl', 'DESC');
        // displayed columns on edit operation
        $crud->edit_fields('nomor','lampiran','kepada','di','dari_tanggal','sampai_tangal','nama_mahasiswa','bulan','tahun');
        // displayed columns on add operation
        $crud->add_fields('nomor','lampiran','kepada','di','dari_tanggal','sampai_tangal','nama_mahasiswa','bulan','tahun');
        
        //Add Action
        $crud->add_action('Download', base_url().'/assets/icon/word.png', base_url().'sim_penyuratan/Manage_Pkl/generate/');

        // caption of each columns
        $crud->display_as('nomor','Nomor');
        $crud->display_as('lampiran','Lampiran');
        $crud->display_as('dari_tanggal','Dari Tanggal');
        $crud->display_as('sampai_tangal','Sampai Tanggal');
        $crud->display_as('nama_mahasiswa','Nama Mahasiswa');

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put required field validation codes here
        // (documentation: http://www.grocerycrud.com/documentation/options_functions/required_fields)
        // eg:
        //      $crud->required_fields( $field1, $field2, $field3, ... );
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $crud->required_fields('dari_tanggal','kepada','di','dari_tanggal','sampai_tangal');

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put required field validation codes here
        // (documentation: http://www.grocerycrud.com/documentation/options_functions/unique_fields)
        // eg:
        //      $crud->unique_fields( $field1, $field2, $field3, ... );
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put field validation codes here
        // (documentation: http://www.grocerycrud.com/documentation/options_functions/set_rules)
        // eg:
        //      $crud->set_rules( $field_name , $caption, $filter );
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put set relation (lookup) codes here
        // (documentation: http://www.grocerycrud.com/documentation/options_functions/set_relation)
        // eg:
        //      $crud->set_relation( $field_name , $related_table, $related_title_field , $where , $order_by );
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//$crud->set_relation('id_jurusan', $this->cms_complete_table_name('mas_jurusan'), 'nama_jurusan');

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put set relation_n_n (detail many to many) codes here
        // (documentation: http://www.grocerycrud.com/documentation/options_functions/set_relation_n_n)
        // eg:
        //      $crud->set_relation_n_n( $field_name, $relation_table, $selection_table, $primary_key_alias_to_this_table,
        //          $primary_key_alias_to_selection_table , $title_field_selection_table, $priority_field_relation );
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put custom field type here
        // (documentation: http://www.grocerycrud.com/documentation/options_functions/field_type)
        // eg:
        //      $crud->field_type( $field_name , $field_type, $value  );
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $crud->field_type('bulan','hidden',date('m'));
        $crud->field_type('tahun','hidden',date('Y'));
        $crud->field_type('nomor','invisible');


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put callback here
        // (documentation: httm://www.grocerycrud.com/documentation/options_functions)
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $crud->callback_before_insert(array($this,'before_insert_update'));
        $crud->callback_before_update(array($this,'before_insert_update'));
        $crud->callback_before_delete(array($this,'before_delete'));
        $crud->callback_after_insert(array($this,'after_insert_update'));
        $crud->callback_after_update(array($this,'after_insert_update'));
        $crud->callback_after_delete(array($this,'after_delete'));
        $crud->callback_field('nama_mahasiswa',array($this, 'callback_field_nama_mahasiswa'));



        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put custom error message here
        // (documentation: httm://www.grocerycrud.com/documentation/set_lang_string)
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // $crud->set_lang_string('delete_error_message', 'Cannot delete the record');
        // $crud->set_lang_string('update_error',         'Cannot edit the record'  );
        // $crud->set_lang_string('insert_error',         'Cannot add the record'   );

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // render
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $output = $crud->render();
        $this->view($this->cms_module_path().'/manage_pkl_view', $output,
            $this->cms_complete_navigation_name('manage_pkl'));

    }

    public function before_insert_update($post_array){
        $bulan = date('m');
        $tahun = date('Y');
        $data = $this->db->select('MAX(nomor) max, MIN(nomor) min, bulan, tahun')
                         ->where('bulan',$bulan)
                         ->where('tahun',$tahun)
                         ->get($this->cms_complete_table_name('pkl'))->row();
        if($data->min != 1){
            $post_array['nomor'] = 1;
        }else{
            $post_array['nomor'] = $data->max+1;
        }
        return $post_array;
    }

    public function before_delete($primary_key){

        return TRUE;
    }

    public function after_delete($primary_key){
        $data = $this->db->where('fk_id_pkl',$primary_key)
                 ->delete($this->cms_complete_table_name('mhs_pkl'));
        return TRUE;
    }

    public function after_insert_update($post_array, $primary_key){

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //
        // SAVE CHANGES OF citizen
        //  * The citizen data in in json format.
        //  * It can be accessed via $_POST['md_real_field_citizen_col']
        //
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $data = json_decode($this->input->post('md_real_field_citizen_col'), TRUE);
        $insert_records = $data['insert'];
        $update_records = $data['update'];
        $delete_records = $data['delete'];
        $real_column_names = array('id_mhs_pkl', 'nama_mahasiswa', 'npm', 'id_jurusan');
        $set_column_names = array();
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  DELETED DATA
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        foreach($delete_records as $delete_record){
            $detail_primary_key = $delete_record['primary_key'];
            // delete many to many
            for($i=0; $i<count($many_to_many_column_names); $i++){
                $table_name = $this->cms_complete_table_name($many_to_many_relation_tables[$i]);
                $relation_column_name = $many_to_many_relation_table_columns[$i];
                $relation_selection_column_name = $many_to_many_relation_selection_columns[$i];
                $where = array(
                    $relation_column_name => $detail_primary_key
                );
                $this->db->delete($table_name, $where);
            }
            $this->db->delete('mhs_pkl',
                 array('id_mhs_pkl'=>$detail_primary_key));
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  UPDATED DATA
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        foreach($update_records as $update_record){
            $detail_primary_key = $update_record['primary_key'];
            $data = array();
            foreach($update_record['data'] as $key=>$value){
                if(in_array($key, $set_column_names)){
                    $data[$key] = implode(',', $value);
                }else if(in_array($key, $real_column_names)){
                    $data[$key] = $value;
                }
            }
            $data['fk_id_pkl'] = $primary_key;
            $this->db->update($this->cms_complete_table_name('id_mhs_pkl'),
                 $data, array('id_mhs_pkl'=>$detail_primary_key));
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // Adjust Many-to-Many Fields of Updated Data
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            for($i=0; $i<count($many_to_many_column_names); $i++){
                $key =  $many_to_many_column_names[$i];
                $new_values = $update_record['data'][$key];
                $table_name = $this->cms_complete_table_name($many_to_many_relation_tables[$i]);
                $relation_column_name = $many_to_many_relation_table_columns[$i];
                $relation_selection_column_name = $many_to_many_relation_selection_columns[$i];
                $query = $this->db->select($relation_column_name.','.$relation_selection_column_name)
                    ->from($table_name)
                    ->where($relation_column_name, $detail_primary_key)
                    ->get();
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                // delete everything which is not in new_values
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                $old_values = array();
                foreach($query->result_array() as $row){
                    $old_values = array();
                    if(!in_array($row[$relation_selection_column_name], $new_values)){
                        $where = array(
                            $relation_column_name => $detail_primary_key,
                            $relation_selection_column_name => $row[$relation_selection_column_name]
                        );
                        $this->db->delete($table_name, $where);
                    }else{
                        $old_values[] = $row[$relation_selection_column_name];
                    }
                }
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                // add everything which is not in old_values but in new_values
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                foreach($new_values as $new_value){
                    if(!in_array($new_value, $old_values)){
                        $data = array(
                            $relation_column_name => $detail_primary_key,
                            $relation_selection_column_name => $new_value
                        );
                        $this->db->insert($table_name, $data);
                    }
                }
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  INSERTED DATA
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        foreach($insert_records as $insert_record){
            $data = array();
            foreach($insert_record['data'] as $key=>$value){
                if(in_array($key, $set_column_names)){
                    $data[$key] = implode(',', $value);
                }else if(in_array($key, $real_column_names)){
                    $data[$key] = $value;
                }
            }
            $data['fk_id_pkl'] = $primary_key;
            $this->db->insert($this->cms_complete_table_name('mhs_pkl'), $data);
            $detail_primary_key = $this->db->insert_id();
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // Adjust Many-to-Many Fields of Inserted Data
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            for($i=0; $i<count($many_to_many_column_names); $i++){
                $key =  $many_to_many_column_names[$i];
                $new_values = $insert_record['data'][$key];
                $table_name = $this->cms_complete_table_name($many_to_many_relation_tables[$i]);
                $relation_column_name = $many_to_many_relation_table_columns[$i];
                $relation_selection_column_name = $many_to_many_relation_selection_columns[$i];
                $query = $this->db->select($relation_column_name.','.$relation_selection_column_name)
                    ->from($table_name)
                    ->where($relation_column_name, $detail_primary_key)
                    ->get();
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                // delete everything which is not in new_values
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                $old_values = array();
                foreach($query->result_array() as $row){
                    $old_values = array();
                    if(!in_array($row[$relation_selection_column_name], $new_values)){
                        $where = array(
                            $relation_column_name => $detail_primary_key,
                            $relation_selection_column_name => $row[$relation_selection_column_name]
                        );
                        $this->db->delete($table_name, $where);
                    }else{
                        $old_values[] = $row[$relation_selection_column_name];
                    }
                }
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                // add everything which is not in old_values but in new_values
                /////////////////////////////////////////////////////////////////////////////////////////////////////////
                foreach($new_values as $new_value){
                    if(!in_array($new_value, $old_values)){
                        $data = array(
                            $relation_column_name => $detail_primary_key,
                            $relation_selection_column_name => $new_value
                        );
                        $this->db->insert($table_name, $data);
                    }
                }
            }
        }

        return TRUE;
    }


    // returned on insert and edit
    public function callback_field_nama_mahasiswa($value, $primary_key){
        $module_path = $this->cms_module_path();
        $this->config->load('grocery_crud');

        if(!isset($primary_key)) $primary_key = -1;
        $query = $this->db->select('id_mhs_pkl, nama_mahasiswa, npm, id_jurusan')
            ->from($this->cms_complete_table_name('mhs_pkl'))
            ->where('fk_id_pkl', $primary_key)
            ->get();
        $result = $query->result_array();

        // get options
        $options = array();
        $options['id_jurusan'] = array();
        $query = $this->db->select('id_jurusan,nama_jurusan')
           ->from($this->cms_complete_table_name('mas_jurusan'))
           ->get();
        foreach($query->result() as $row){
            $options['id_jurusan'][] = array('value' => $row->id_jurusan, 'caption' => $row->nama_jurusan);
        }
        $data = array(
            'result' => $result,
            'options' => $options,
        );
        return $this->load->view($this->cms_module_path().'/field_pkl_mahasiswa',$data, TRUE);
    }

    public function generate($id=0){
        $this->load->library('PHPWord');
        $this->load->helper('util');
        $date = date('Y-m-d_H-i-s');
        $no=1;
        $no2=1;
        //if ($id==0);
        $conf = $this->db->get($this->cms_complete_table_name('konfigurasi'))->result();
        $cont = $this->db->get($this->cms_complete_table_name('master_cont_pkl'))->result();
        $mhs = $this->db->where('fk_id_pkl',$id)
                        ->join($this->cms_complete_table_name('mas_jurusan'),'mas_jurusan.id_jurusan=mhs_pkl.id_jurusan','left')
                        ->get($this->cms_complete_table_name('mhs_pkl'))->result();
        $data = $this->db->where('id_pkl',$id)
                         ->join($this->cms_complete_table_name('mhs_pkl'),'fk_id_pkl=fk_id_pkl','left')
                         ->join($this->cms_complete_table_name('mas_jurusan'),'mas_jurusan.id_jurusan=mhs_pkl.id_jurusan','left')
                         ->get($this->cms_complete_table_name('pkl'))->result();
        $PHPWord = new PHPWord();

        // New portrait section
        $section = $PHPWord->createSection(array('pageSizeH'=>20500));

        // Define the TOC font style

        // Add title styles
        $styleTable = array('cellMargin'=>20);
        $styleTable_mhs = array('cellMargin'=>20,'borderSize'=>6);

        $PHPWord->addFontStyle(1, array('size'=>16, 'color'=>'333333', 'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE));
        $PHPWord->addFontStyle(2, array('size'=>12, 'bold'=>true));
        $PHPWord->addFontStyle('underline', array('size'=>11.5, 'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE));
        $PHPWord->addFontStyle('bold', array('size'=>11.5, 'bold'=>true));

        $PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>10));
        $PHPWord->addParagraphStyle('pHead', array('spaceAfter'=>0));
        $PHPWord->addParagraphStyle('pTempat', array('spaceAfter'=>10,'marginLeft'=>3000));
        $PHPWord->addParagraphStyle('pStyle_footer', array(
          'tabs' => array(
            new PHPWord_Style_Tab('left', 5700)
          ),'align'=>'center', 'spaceAfter'=>10
        ));
        $PHPWord->addParagraphStyle('pStyle_tbs', array('size'=>11, 'align'=>'left', 'spaceAfter'=>10));

        $fontStyle = array('size'=>11.5);

        //Content
        foreach($data as $d):
            $section->addText('','pHead');
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(1250,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(20,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(9000,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addRow();
            $table->addCell(1250,$styleTable)->addText("Nomor",$fontStyle,'pHead');
            $table->addCell(20,$styleTable)->addText(": ",$fontStyle,'pHead');
            $table->addCell(9000,$styleTable)->addText("$d->nomor",$fontStyle,'pHead');
            $table->addRow();
            $table->addCell(1250,$styleTable)->addText("Lamp",$fontStyle,'pHead');
            $table->addCell(20,$styleTable)->addText(": ",$fontStyle,'pHead');
            $table->addCell(9000,$styleTable)->addText("$d->lampiran",$fontStyle,'pHead');
            $table->addRow();
            $table->addCell(1250,$styleTable)->addText("Hal",$fontStyle,'pHead');
            $table->addCell(20,$styleTable)->addText(": ",$fontStyle,'pHead');
            $table->addCell(9000,$styleTable)->addText("Permohonan PKL/Magang Mahasiswa",'underline','pHead');

            $section->addText('','pHead');
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');;
            $table->addCell(8200,$styleTable)->addText("Kepada Yth.",$fontStyle,'pHead');
            $table->addRow();
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(8200,$styleTable)->addText("$d->kepada",'bold','pHead');

            $section->addText('',$fontStyle,'pHead');
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(400,$styleTable)->addText("Di -",$fontStyle,'pHead');
            $table->addCell(8200,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addRow();
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(8200,$styleTable)->addText("$d->di",'underline','pHead');

            $section->addText('',$fontStyle,'pHead');
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(400)->addText("");
            $table->addCell(10000)->addText("Dengan Hormat,",$fontStyle,'pHead');
            $table->addRow();
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(10000,$styleTable)->addText("Pertama sekali kami do’akan agar Bapak/Ibu senantiasa dalam keadaan sehat dan sukses selalu dalam menjalankan aktifitas, Amin.",$fontStyle,'pHead');
            $table->addRow();
            $table->addCell(400)->addText("");
            $table->addCell(10000)->addText("Selanjutnya kami memperkenalkan diri bahwa kami adalah Perguruan Tinggi Ilmu Komputer (STMIK-AMIK Riau) yang berlokasi di Jalan Purwodadi Indah Km. 10 Panam Pekanbaru Riau.",$fontStyle);
            $table->addRow();
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(10000,$styleTable)->addText("Sesuai dengan kalender akademik, setiap mahasiswa Jenjang Strata I (S.1)  dan Diploma III (D.3) yang akan memasuki tahap akhir diwajibkan untuk melaksanakan Praktek Kerja Lapangan (PKL) / Magang dalam rangka mengasah kemampuan mereka untuk mengenal  dunia kerja yang sesungguhnya.",$fontStyle,'pHead');
            $table->addRow();
            $table->addCell(400)->addText("");
            $table->addCell(10000)->addText("Sebagai upaya pelaksanaan kegiatan magang tersebut, kami mohon kiranya Bapak/Ibu dapat berkenan memberikan kesempatan kepada para mahasiswa kami untuk dapat melaksanakan PKL/Magang dari tangal 01 Juli s/d 24 Agustus 2013.",$fontStyle);
            $table->addRow();
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(10000,$styleTable)->addText("Perhatian dan binaan dari Bapak/Ibu sangat kami harapkan nantinya selama kegiatan tersebut dilaksanakan. Untuk Konfirmasi Selanjutnya Bapak/Ibu dapat menghubungi STMIK-AMIK Riau. Melalui :",$fontStyle,'pHead');

            //Kontak Dosen
            $section->addText('',$fontStyle,'pHead');
            $table = $section->addTable();
            foreach($cont as $cnt):
                $table->addRow();
                $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
                $table->addCell(400,$styleTable)->addText("$no. ",$fontStyle,'pHead');
                $table->addCell(4300,$styleTable)->addText("$cnt->nama_dosen",$fontStyle,'pHead');
                $table->addCell(4300,$styleTable)->addText("Hp ($cnt->nomor_telp)",$fontStyle,'pHead');
                $no++;
            endforeach;

            
            $section->addText('',$fontStyle,'pHead');
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(9000,$styleTable)->addText("Adapun nama-nama mahasiswa kami tersebut adalah :",$fontStyle,'pHead');

            //Nama Mahasiswa
            $section->addText('',$fontStyle,'pHead');
            $table = $section->addTable();$table->addRow();
            $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
            $table->addCell(400,$styleTable_mhs)->addText("No. ",$fontStyle,'pHead');
            $table->addCell(2600,$styleTable_mhs)->addText("Nama",$fontStyle,'pHead');
            $table->addCell(2500,$styleTable_mhs)->addText("NPM",$fontStyle,'pHead');
            $table->addCell(2500,$styleTable_mhs)->addText("Jurusan",$fontStyle,'pHead');
            foreach($mhs as $m):
                $table->addRow();
                $table->addCell(400,$styleTable)->addText("",$fontStyle,'pHead');
                $table->addCell(400,$styleTable_mhs)->addText("$no2.",$fontStyle,'pHead');
                $table->addCell(2600,$styleTable_mhs)->addText("$m->nama_mahasiswa",$fontStyle,'pHead');
                $table->addCell(2500,$styleTable_mhs)->addText("$m->npm",$fontStyle,'pHead');
                $table->addCell(2500,$styleTable_mhs)->addText("$m->nama_jurusan",$fontStyle,'pHead');
                $no2++;
            endforeach;

            //Footer
            $section->addText('',$fontStyle);
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(400)->addText("",$fontStyle);
            $table->addCell(8600)->addText("Besar Harapan Kami kiranya Bapak/Ibu dapat menerima mahasiswa kami tersebut, selanjutnya kami  sangat mengharapkan informasi berapa orang mahasiswa kami yang dapat diterima untuk melaksanakan PKL di instansi/perusahaan yang Bapak/Ibu pimpin.",$fontStyle);
            $table->addRow();
            $table->addCell(400)->addText("",$fontStyle);
            $table->addCell(8600)->addText("Atas bantuan dan kerjasama yang baik dari Bapak/Ibu kami ucapkan terima kasih.",$fontStyle,'pHead');

            $section->addTitle('');
            $section->addText("\tPekanbaru, ".tanggal(date('d-m-Y')),$fontStyle,'pStyle_footer');
            $section->addText("\tAn. Ketua, ",$fontStyle,'pStyle_footer');
            $section->addTitle('');
            $section->addTitle('');
            $section->addText("\t$d->ketua_jurusan",2,'pStyle_footer');
            $section->addText("\tKetua Jurusan $d->nama_jurusan",$fontStyle,'pStyle_footer');
            $section->addText("Tembusan :",'underline','pStyle_tbs');
            $section->addText("1. Yth. Bapak Ketua STMIK-AMIK Riau",'pStyle_tbs');
            $section->addText("2. Yth. Ibu Pembantu Ketua I",'pStyle_tbs');
            $section->addText("3. Arsip",'pStyle_tbs');
        

        ////open file////
            $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
            $filename = date('d-m-Y-Hms').'-Permohonan_PKL.docx';
            $objWriter->save($filename);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename); // deletes the temporary file
        exit;
        endforeach;
        ////end of open file////

        ///save file////
        //$document->save('assets/docs/'.$d->nama_kar.'-'.$d->id_pegawai.'.docx');
        //redirect(base_url().'assets/docs/'.$d->nama_kar.'-'.$d->id_pegawai.'.docx', 'assets/manage_pegawai');
        ///end of save file////
    }
}