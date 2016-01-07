<?php
    $record_index = 0;
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/grocery_crud/css/ui/simple/'.grocery_CRUD::JQUERY_UI_CSS); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/grocery_crud/css/jquery_plugins/chosen/chosen.css'); ?>" />
<style type="text/css">
    #md_table_citizen input[type="text"]{
        width:200px;
    }
    #md_table_citizen th:last-child, #md_table_citizen td:last-child{
        width: 60px;
    }
</style>

<div id="md_table_citizen_container">
    <table id="md_table_citizen" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NPM</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- the data presentation be here -->
        </tbody>
    </table>
    <div class="fbutton">
        <span id="md_field_citizen_add" class="add">Tambah</span>
    </div>
    <br />
    <!-- This is the real input. If you want to catch the data, please json_decode this input's value -->
    <input id="md_real_field_citizen_col" name="md_real_field_citizen_col" type="hidden" />
</div>

<script type="text/javascript" src="<?php echo base_url('assets/grocery_crud/js/jquery_plugins/ui/'.grocery_CRUD::JQUERY_UI_JS); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/grocery_crud/js/jquery_plugins/jquery.chosen.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js'); ?>"></script>
<script type="text/javascript">

    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    // DATA INITIALIZATION
    //
    // * Prepare some global variables
    //
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    var OPTIONS_citizen = <?php echo json_encode($options); ?>;
    var RECORD_INDEX_citizen = <?php echo $record_index; ?>;
    var DATA_citizen = {update:new Array(), insert:new Array(), delete:new Array()};
    var old_data = <?php echo json_encode($result); ?>;
    for(var i=0; i<old_data.length; i++){
        var row = old_data[i];
        var record_index = i;
        var primary_key = row['id_mhs_pkl'];
        var data = row;
        delete data['id_mhs_pkl'];
        DATA_citizen.update.push({
            'record_index' : record_index,
            'primary_key' : primary_key,
            'data' : data,
        });
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    // ADD ROW FUNCTION
    //
    // * When "Add Citizen" clicked, this function is called without parameter.
    // * When page loaded for the first time, this function is called with value parameter
    //
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    function add_table_row_citizen(value){

        var component = '<tr id="md_field_citizen_tr_'+RECORD_INDEX_citizen+'" class="md_field_citizen_tr">';
        
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        //    FIELD "Nama Mahasiswa"
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        var field_value = '';
        if(typeof(value) != 'undefined' && value.hasOwnProperty('nama_mahasiswa')){
          field_value = value.nama_mahasiswa;
        }
        component += '<td>';
        component += '<input id="md_field_citizen_col_name_'+RECORD_INDEX_citizen+'" record_index="'+RECORD_INDEX_citizen+'" class="md_field_citizen_col" column_name="nama_mahasiswa" type="text" value="'+field_value+'"/>';
        component += '</td>';


        /////////////////////////////////////////////////////////////////////////////////////////////////////
        //    FIELD "NPM"
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        var field_value = '';
        if(typeof(value) != 'undefined' && value.hasOwnProperty('npm')){
          field_value = value.npm;
        }
        component += '<td>';
        component += '<input id="md_field_citizen_col_name_'+RECORD_INDEX_citizen+'" record_index="'+RECORD_INDEX_citizen+'" class="md_field_citizen_col" column_name="npm" type="text" value="'+field_value+'"/>';
        component += '</td>';


        /////////////////////////////////////////////////////////////////////////////////////////////////////
        //    FIELD "Jurusan"
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        var field_value = '';
        if(typeof(value) != 'undefined' && value.hasOwnProperty('id_jurusan')){
          field_value = value.id_jurusan;
        }
        component += '<td>';
        component += '<select id="md_field_citizen_col_job_id_'+RECORD_INDEX_citizen+'" record_index="'+RECORD_INDEX_citizen+'" class="md_field_citizen_col numeric chzn-select" column_name="id_jurusan" >';
        var options = OPTIONS_citizen.id_jurusan;
        component += '<option value></option>';
        for(var i=0; i<options.length; i++){
          var option = options[i];
          var selected = '';
          if(option['value'] == field_value){
              selected = 'selected="selected"';
          }
          component += '<option value="'+option['value']+'" '+selected+'>'+option['caption']+'</option>';
        }
        component += '</select>';
        component += '</td>';


        /////////////////////////////////////////////////////////////////////////////////////////////////////
        // Delete Button
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        component += '<td><span class="delete-icon md_field_citizen_delete" record_index="'+RECORD_INDEX_citizen+'"></span></td>';
        component += '</tr>';

        /////////////////////////////////////////////////////////////////////////////////////////////////////
        // Add component to table
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        $('#md_table_citizen tbody').append(component);
        mutate_input_citizen();

    } // end of ADD ROW FUNCTION



    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Main event handling program
    //
    // * Initialization
    // * md_field_citizen_add.click (Add row)
    // * md_field_citizen_delete.click (Delete row)
    // * md_field_citizen_col.change (Edit cell)
    //
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $(document).ready(function(){

        /////////////////////////////////////////////////////////////////////////////////////////////////////
        // INITIALIZATION
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        synchronize_citizen_table_width();
        synchronize_citizen();
        for(var i=0; i<DATA_citizen.update.length; i++){
            add_table_row_citizen(DATA_citizen.update[i].data);
            RECORD_INDEX_citizen++;
        }

        // on resize, adjust the table width
        $(window).resize(function() {
            synchronize_citizen_table_width();
        });


        /////////////////////////////////////////////////////////////////////////////////////////////////////
        // md_field_citizen_add.click (Add row)
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        $('#md_field_citizen_add').click(function(){
            // new data
            var data = new Object();
            
          data.nama_mahasiswa = '';
          data.npm = '';
          data.fk_id_jurusan = '';
            // insert data to the DATA_citizen
            DATA_citizen.insert.push({
                'record_index' : RECORD_INDEX_citizen,
                'primary_key' : '',
                'data' : data,
            });

            // add table's row
            add_table_row_citizen(data);
            // add  by 1
            RECORD_INDEX_citizen++;

            // synchronize to the md_real_field_citizen_col
            synchronize_citizen();
        });


        /////////////////////////////////////////////////////////////////////////////////////////////////////
        // md_field_citizen_delete.click (Delete row)
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        $('.md_field_citizen_delete').live('click', function(){
            var record_index = $(this).attr('record_index');
            // remove the component
            $('#md_field_citizen_tr_'+record_index).remove();

            var record_index_found = false;
            for(var i=0; i<DATA_citizen.insert.length; i++){
                if(DATA_citizen.insert[i].record_index == record_index){
                    record_index_found = true;
                    // delete element from insert
                    DATA_citizen.insert.splice(i,1);
                    break;
                }
            }
            if(!record_index_found){
                for(var i=0; i<DATA_citizen.update.length; i++){
                    if(DATA_citizen.update[i].record_index == record_index){
                        record_index_found = true;
                        var primary_key = DATA_citizen.update[i].primary_key;
                        // delete element from update
                        DATA_citizen.update.splice(i,1);
                        // add it to delete
                        DATA_citizen.delete.push({
                            'record_index':record_index,
                            'primary_key':primary_key
                        });
                        break;
                    }
                }
            }
            synchronize_citizen();
        });


        /////////////////////////////////////////////////////////////////////////////////////////////////////
        // md_field_citizen_col.change (Edit cell)
        /////////////////////////////////////////////////////////////////////////////////////////////////////
        $('.md_field_citizen_col').live('change', function(){
            var value = $(this).val();
            var column_name = $(this).attr('column_name');
            var record_index = $(this).attr('record_index');
            var record_index_found = false;
            if(typeof(value)=='undefined'){
                value = '';
            }
            for(var i=0; i<DATA_citizen.insert.length; i++){
                if(DATA_citizen.insert[i].record_index == record_index){
                    record_index_found = true;
                    // insert value
                    eval('DATA_citizen.insert['+i+'].data.'+column_name+' = '+JSON.stringify(value)+';');
                    break;
                }
            }
            if(!record_index_found){
                for(var i=0; i<DATA_citizen.update.length; i++){
                    if(DATA_citizen.update[i].record_index == record_index){
                        record_index_found = true;
                        // edit value
                        eval('DATA_citizen.update['+i+'].data.'+column_name+' = '+JSON.stringify(value)+';');
                        break;
                    }
                }
            }
            synchronize_citizen();
        });


    });

    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    // reset field on save
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    $(document).ajaxSuccess(function(event, xhr, settings) {        
        if (settings.url == "{{ module_site_url }}manage_pkl/index/insert") {
            response = $.parseJSON(xhr.responseText);
            if(response.success == true){
                DATA_citizen = {update:new Array(), insert:new Array(), delete:new Array()};
                $('#md_table_citizen tr').not(':first').remove();
                synchronize_citizen();
            }
        }
    });

    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    // synchronize data to md_real_field_citizen_col.
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    function synchronize_citizen(){
        $('#md_real_field_citizen_col').val(JSON.stringify(DATA_citizen));
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    // synchronize table width (called on resize).
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    function synchronize_citizen_table_width(){
        var parent_width = $("#md_table_citizen_container").parent().parent().width();
        $("#md_table_citizen_container").width(parent_width);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    // function to mutate input
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    function mutate_input_citizen(){
        // chzn-select
        $("#md_table_citizen .chzn-select").chosen({allow_single_deselect: true});
        // numeric
        $('#md_table_citizen .numeric').numeric();
        $('#md_table_citizen .numeric').keydown(function(e){
            if(e.keyCode == 38)
            {
                if(IsNumeric($(this).val()))
                {
                    var new_number = parseInt($(this).val()) + 1;
                    $(this).val(new_number);
                }else if($(this).val().length == 0)
                {
                    var new_number = 1;
                    $(this).val(new_number);
                }
            }
            else if(e.keyCode == 40)
            {
                if(IsNumeric($(this).val()))
                {
                    var new_number = parseInt($(this).val()) - 1;
                    $(this).val(new_number);
                }else if($(this).val().length == 0)
                {
                    var new_number = -1;
                    $(this).val(new_number);
                }
            }
            $(this).trigger('change');
        });

    }

</script>