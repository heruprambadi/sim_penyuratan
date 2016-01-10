<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Ket_Lulusan
 *
 * @author No-CMS Module Generator
 */
class Manage_Ket_Lulusan extends CMS_Priv_Strict_Controller {

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
        //$crud->unset_texteditor('keterangan','full_text');
        // $crud->unset_add();
        // $crud->unset_edit();
        // $crud->unset_list();
        // $crud->unset_back_to_list();
        $crud->unset_print();
        $crud->unset_export();

        $username = $this->cms_user_name();
        $group = $this->db->select('group_name')
                          ->join('main_group_user', 'main_group.group_id = main_group_user.group_id')
                          ->where('user_id',$this->cms_user_id())
                          ->get('main_group')->result();
        foreach ($group as $q){
            $gn = $q->group_name;
        }
        if(isset($gn) && $gn=='Mahasiswa'){
            $crud->where('npm',$username);
        }

        // set model
        // $crud->set_model($this->cms_module_path().'/grocerycrud_ket_lulusan_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language($this->cms_language());

        // table name
        $crud->set_table($this->cms_complete_table_name('ket_lulusan'));

        // set subject
        $crud->set_subject('Keterangan Lulusan');

        // displayed columns on list
        $crud->columns('nomor_surat','nama_mahasiswa','npm');
        $crud->order_by('id_ket_lulusan', 'DESC');
        // displayed columns on edit operation
        $crud->edit_fields('nomor_surat','nama_mahasiswa','npm','tempat_lahir','tanggal_lahir','keterangan','bulan','tahun');
        // displayed columns on add operation
        $crud->add_fields('nomor_surat','nama_mahasiswa','npm','tempat_lahir','tanggal_lahir','keterangan','bulan','tahun');
        
        //Add Action
        $crud->add_action('Download', base_url().'/assets/icon/word.png', base_url().'sim_penyuratan/manage_ket_lulusan/generate/');

        // caption of each columns
        $crud->display_as('nama_mahasiswa','Nama Mahasiswa');
        $crud->display_as('npm','NPM');
        $crud->display_as('tempat_lahir','Tempat Lahir');
        $crud->display_as('tanggal_lahir','Tanggal Lahir');
        $crud->display_as('keterangan','Keterangan');

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put required field validation codes here
        // (documentation: http://www.grocerycrud.com/documentation/options_functions/required_fields)
        // eg:
        $crud->required_fields('nama_mahasiswa','tempat_lahir','tanggal_lahir');
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        

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
        $crud->set_rules('npm', 'NPM', array('required', 'numeric'));


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put set relation (lookup) codes here
        // (documentation: http://www.grocerycrud.com/documentation/options_functions/set_relation)
        // eg:

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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
        $crud->field_type('bulan','hidden',date('m'));
        $crud->field_type('tahun','hidden',date('Y'));
        $crud->field_type('nomor_surat','invisible');
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////




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
        $crud->callback_field('keterangan',array($this, 'callback_field_keterangan'));



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
        $this->view($this->cms_module_path().'/manage_ket_lulusan_view', $output,
            $this->cms_complete_navigation_name('manage_ket_lulusan'));

    }

    public function before_insert_update($post_array){
        $bulan = date('m');
        $tahun = date('Y');
        $data = $this->db->select('MAX(nomor_surat) max, MIN(nomor_surat) min, bulan, tahun')
                         ->where('bulan',$bulan)
                         ->where('tahun',$tahun)
                         ->get($this->cms_complete_table_name('ket_lulusan'))->row();
        if($data->min != 1){
            $post_array['nomor_surat'] = 1;
        }else{
            $post_array['nomor_surat'] = $data->max+1;
        }
        return $post_array;
    }

    public function before_delete($primary_key){

        return TRUE;
    }

    public function after_delete($primary_key){
        $data = $this->db->where('fk_id_ket_lulusan',$primary_key)
                 ->delete($this->cms_complete_table_name('keterangan_lulusan'));
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
        $real_column_names = array('id_keterangan_lulusan', 'keterangan');
        $set_column_names = array();
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  DELETED DATA
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        foreach($delete_records as $delete_record){
            $detail_primary_key = $delete_record['primary_key'];
            $this->db->delete($this->cms_complete_table_name('keterangan_lulusan'),
                 array('id_keterangan_lulusan'=>$detail_primary_key));
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
            $data['fk_id_ket_lulusan'] = $primary_key;
            $this->db->update($this->cms_complete_table_name('keterangan_lulusan'),
                 $data, array('id_keterangan_lulusan'=>$detail_primary_key));
         
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
            $data['fk_id_ket_lulusan'] = $primary_key;
            $this->db->insert($this->cms_complete_table_name('keterangan_lulusan'), $data);
            $detail_primary_key = $this->db->insert_id();
         
         
        }

        return TRUE;
    }

    public function generate($id=0){
        $this->load->library('PHPWord');
        $this->load->helper('util');
        $date = date('Y-m-d_H-i-s');
        //if ($id==0);
        $conf = $this->db->get($this->cms_complete_table_name('konfigurasi'))->result();
        $data = $this->db->where('id_ket_lulusan',$id)
                         ->get($this->cms_complete_table_name('ket_lulusan'))->result();
        $ket = $this->db->where('fk_id_ket_lulusan',$id)
                        ->get($this->cms_complete_table_name('keterangan_lulusan'))->result();
        $PHPWord = new PHPWord();

        // New portrait section
        $section = $PHPWord->createSection(array('pageSizeH'=>20500));

        // Define the TOC font style

        // Add title styles
        $PHPWord->addFontStyle(1, array('size'=>16, 'color'=>'000', 'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE));
        $PHPWord->addFontStyle(2, array('size'=>12, 'color'=>'000', 'bold'=>true));

        $PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>10));
        $PHPWord->addParagraphStyle('pStyle_footer', array(
          'tabs' => array(
            new PHPWord_Style_Tab('left', 6000)
          ),'align'=>'center', 'spaceAfter'=>10
        ));
        $PHPWord->addParagraphStyle('pStyle_tbs', array('size'=>11, 'align'=>'left', 'spaceAfter'=>10));

        $fontStyle = array('spaceAfter'=>60, 'size'=>12);

        //Generate Document
        foreach($data as $d):

            $section->addTitle('');
            $section->addTitle('');
            $section->addTitle('');
            $section->addText('SURAT KETERANGAN LULUSAN', 1, 'pStyle');
            $section->addText('No.'.$d->nomor_surat.'/B-01/STMIK-AMIK/'.$d->bulan.'/'.$d->tahun,$fontStyle,'pStyle');
            $section->addTitle('');
            $section->addTitle('');
            $section->addText('Yang bertanda tangan dibawah ini :',$fontStyle);

            //Table
            foreach($conf as $c):
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(500)->addText("");
            $table->addCell(1750)->addText("Nama",$fontStyle);
            $table->addCell(3750)->addText(": ".$c->nama_puket,$fontStyle);
            $table->addRow();
            $table->addCell(500)->addText("");
            $table->addCell(1750)->addText("Pangkat/Gol",$fontStyle);
            $table->addCell(3750)->addText(": ".$c->pangkat_puket,$fontStyle);
            $table->addRow();
            $table->addCell(500)->addText("");
            $table->addCell(1750)->addText("Jabatan",$fontStyle);
            $table->addCell(3750)->addText(": Pembantu Ketua I. Bid. Akademis",$fontStyle);
            endforeach;
            //End OfTable

            $section->addText('Menerangkan bahwa :',$fontStyle);

            //Table
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(500)->addText("");
            $table->addCell(1750)->addText("Nama",$fontStyle);
            $table->addCell(3750)->addText(": ".$d->nama_mahasiswa,$fontStyle);
            $table->addRow();
            $table->addCell(500)->addText("");
            $table->addCell(1750)->addText("NPM",$fontStyle);
            $table->addCell(3750)->addText(": ".$d->npm,$fontStyle);
            $table->addRow();
            $table->addCell(500)->addText("");
            $table->addCell(1750)->addText("Tempat/Tgl Lahir",$fontStyle);
            $table->addCell(3750)->addText(": ".$d->tempat_lahir.", ".tanggal(date($d->tanggal_lahir)),$fontStyle);
            //End OfTable

            $section->addText('Adalah   benar   mahasiswa   Sekolah Tinggi  Manajemen   Informatika   &   Komputer   AMIK Riau (STMIK-AMIK) Riau yang telah :',$fontStyle);

            $section->addText("");
            foreach($ket as $k):
            $section->addListItem($k->keterangan, 0, $fontStyle);
            endforeach;
            //End OfTable

            foreach($conf as $c):
            $section->addText('Demikian surat keterangan kelulusan ini dikeluarkan untuk dapat dipergunakan sebagaimana mestinya.',$fontStyle);
            $section->addTitle('');
            $section->addText("\tPekanbaru, ".tanggal(date('d-m-Y')),$fontStyle,'pStyle_footer');
            $section->addTitle('');
            $section->addTitle('');
            $section->addTitle('');
            $section->addText("\t$c->nama_puket",2,'pStyle_footer');
            $section->addText("\tPuket I Bid. Akademis",$fontStyle,'pStyle_footer');
            $section->addTitle('');
            $section->addTitle('');
            $section->addText("Tembusan disampaikan kepada Yth :",'pStyle_tbs');
            $section->addText("1. Ketua STMIK-AMIK Riau",'pStyle_tbs');
            $section->addText("2. Arsip ……",'pStyle_tbs');
            endforeach;

        ////open file////
        $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $filename = $d->npm.'-Ket_Lulusan.docx';
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

    // returned on insert and edit
    public function callback_field_keterangan($value, $primary_key){
        $module_path = $this->cms_module_path();
        
        if(!isset($primary_key)) $primary_key = -1;
        $query = $this->db->select('id_keterangan_lulusan, keterangan')
            ->from($this->cms_complete_table_name('keterangan_lulusan'))
            ->where('fk_id_ket_lulusan', $primary_key)
            ->get();
        $result = $query->result_array();

        
        $data = array(
            'result' => $result
        );
        return $this->load->view($this->cms_module_path().'/ket_lulusan_view',$data, TRUE);
    }



}