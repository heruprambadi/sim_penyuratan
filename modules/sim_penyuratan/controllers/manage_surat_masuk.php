<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Permohonan_Peng_Data
 *
 * @author No-CMS Module Generator
 */
class Manage_Surat_Masuk extends CMS_Priv_Strict_Controller {

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
        // $crud->set_model($this->cms_module_path().'/grocerycrud_permohonan_peng_data_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language($this->cms_language());

        // table name
        $crud->set_table($this->cms_complete_table_name('surat_masuk'));

        // set subject
        $crud->set_subject('Surat Masuk');

        // displayed columns on list
        $crud->columns('nama_surat','dari','untuk','sifat','tanggal','file');
        $crud->order_by('id_surat_masuk', 'DESC');
        // displayed columns on edit operation
        $crud->edit_fields('nama_surat','dari','untuk','sifat','tanggal','file');
        // displayed columns on add operation
        $crud->add_fields('nama_surat','dari','untuk','sifat','tanggal','file');
        
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // HINT: Put required field validation codes here
        // (documentation: http://www.grocerycrud.com/documentation/options_functions/required_fields)
        // eg:
        //      $crud->required_fields( $field1, $field2, $field3, ... );
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $crud->required_fields('nama_surat','dari','untuk','sifat','tanggal','file');

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
        $crud->field_type('sifat','dropdown',array('Sangat Rahasia'=>'Sangat Rahasia','Rahasia'=>'Rahasia','Sangat Segera'=>'Sangat Segera','Segera'=>'Segera','Edaran'=>'Edaran','Pengumuman'=>'Pengumuman','Biasa'=>'Biasa'));
        $crud->set_field_upload('file','assets/surat_masuk/');

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
        $crud->callback_column('file',array($this,'cc_file'));



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
        $this->view($this->cms_module_path().'/manage_surat_masuk_view', $output,
            $this->cms_complete_navigation_name('surat_masuk'));

    }

    public function cc_file($value,$row){
        return "<a href='".site_url('assets/surat_masuk/'.$row->sifat.'/'.$value)."'>$value</a>";
    }

    public function before_insert_update($post_array){
        $sifat = $post_array['sifat'];
        $ori = $post_array['file'];
        copy('assets/surat_masuk/'.$ori, 'assets/surat_masuk/'.$sifat.'/'.$ori);
        unlink('assets/surat_masuk/'.$ori);
        return TRUE;
    }

    public function before_delete($primary_key){
        $data = $this->db->where('id_surat_masuk',$primary_key)
                         ->get($this->cms_complete_table_name('surat_masuk'))->row();
        $file = $data->file;
        $sifat = $data->sifat;
        $delete = unlink('assets/surat_masuk/'.$sifat.'/'.$file);
        return TRUE;
    }

    public function after_delete($primary_key){
        return TRUE;
    }

    public function after_insert_update($post_array, $primary_key){
        return TRUE;
    }
}