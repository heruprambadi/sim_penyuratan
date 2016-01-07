<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Surat_Tugas
 *
 * @author No-CMS Module Generator
 */
class Manage_Surat_Tugas extends CMS_Priv_Strict_Controller {

    protected $URL_MAP = array();

    public function index(){
        $this->load->helper('date');
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
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_texteditor('tujuan');

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

        $crud->set_language($this->cms_language());

        // table name
        $crud->set_table($this->cms_complete_table_name('surat_tugas'));

        // set subject
        $crud->set_subject('Surat Tugas');

        // displayed columns on list
        $crud->columns('nomor_surat','nama_pegawai','nik');
        $crud->order_by('id_surat_tugas', 'DESC');
        // displayed columns on edit operation
        $crud->edit_fields('nomor_surat','nama_pegawai','nik','pangkat_golongan','jabatan','tujuan','bulan','tahun');
        // displayed columns on add operation
        $crud->add_fields('nomor_surat','nama_pegawai','nik','pangkat_golongan','jabatan','tujuan','bulan','tahun');
        
        //Add Action
        //$crud->add_action('Download', '', base_url().'sim_penyuratan/manage_surat_tugas/generate/','ui-icon-arrowthickstop-1-s','');
        $crud->add_action('Download', base_url().'/assets/icon/word.png', base_url().'sim_penyuratan/manage_surat_tugas/generate/');

        // caption of each columns
        $crud->display_as('nomor_surat','Nomor Surat');
        $crud->display_as('nama_pegawai','Nama Pegawai');
        $crud->display_as('nik','NIDN / NIK');
        $crud->display_as('pangkat_golongan','Pangkat / Golongan');
        $crud->display_as('jabatan','Jabatan');
        $crud->display_as('tujuan','Tujuan');

        $crud->required_fields('nama_pegawai','nik','pangkat_golongan','jabatan','tujuan');

        $crud->field_type('bulan','hidden',date('m'));
        $crud->field_type('tahun','hidden',date('Y'));
        $crud->field_type('nomor_surat','invisible');

        $crud->callback_before_insert(array($this,'before_insert_update'));
        $crud->callback_before_update(array($this,'before_insert_update'));
        $crud->callback_before_delete(array($this,'before_delete'));
        $crud->callback_after_insert(array($this,'after_insert_update'));
        $crud->callback_after_update(array($this,'after_insert_update'));
        $crud->callback_after_delete(array($this,'after_delete'));

        $output = $crud->render();
        $this->view($this->cms_module_path().'/manage_aktif_kuliah_view', $output,
            $this->cms_complete_navigation_name('manage_surat_tugas'));

    }

    public function before_insert_update($post_array){
        $bulan = date('m');
        $tahun = date('Y');
        $data = $this->db->select('MAX(nomor_surat) max, MIN(nomor_surat) min, bulan, tahun')
                         ->where('bulan',$bulan)
                         ->where('tahun',$tahun)
                         ->get($this->cms_complete_table_name('surat_tugas'))->row();
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
        return TRUE;
    }

    public function after_insert_update($post_array, $primary_key){

        return TRUE;
    }

    public function generate($id=0){
        $this->load->library('PHPWord');
        $this->load->helper('util');
        $date = date('Y-m-d_H-i-s');
        //if ($id==0);
        $data = $this->db->where('id_surat_tugas',$id)
                         ->get($this->cms_complete_table_name('surat_tugas'))->result();
        $PHPWord = new PHPWord();

        //Generate Document
        foreach($data as $d):
        $document = $PHPWord->loadTemplate('assets/surat_keluar/surat_tugas/surat_tugas.docx');
        $document->setValue('nomor_surat', $d->nomor_surat);
        $document->setValue('nama_pegawai', $d->nama_pegawai);
        $document->setValue('nik', $d->nik);
        $document->setValue('pangkat_golongan', $d->pangkat_golongan);
        $document->setValue('jabatan', $d->jabatan);
        $document->setValue('tujuan', $d->tujuan);
        $document->setValue('tanggal', tanggal(date('d-m-Y')));
        $document->setValue('bulan', bulan_romawi(date('m')));
        $document->setValue('tahun', date('Y'));

        ////open file////
        $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $filename = $d->nik.'-Surat_Tugas.docx';
        $document->save($filename);

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
    }



}