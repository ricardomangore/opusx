(function($){


$(document).ready(function() {
    //var opxtable = $('#example').DataTable();
    var opxtable = new OpxDataTable('#example');
    
    //Region
    var $opxaction = $('[name = opxaction]');
    if($opxaction.val() == '')
    	$opxaction.attr('value','add');
    else{
    	if($opxaction.val() == 'edit'){
	    	$('#opx_btn_menu_add').removeClass('btn-success');
	    	$('#opx_btn_menu_add').addClass('btn-default');
	    	$('#opx_btn_menu_edit').removeAttr('disabled');
	    	$('#opx_btn_menu_edit').removeClass('btn-default');
	    	$('#opx_btn_menu_edit').addClass('btn-success');
    	}
    }
    $('#opx_region').on('clickEdit',function(event){
    	var row = opxtable.getRow();
    	$('#opx_btn_menu_add').removeClass('btn-success');
    	$('#opx_btn_menu_add').addClass('btn-default');
    	$('#opx_btn_menu_edit').removeAttr('disabled');
    	$('#opx_btn_menu_edit').removeClass('btn-default');
    	$('#opx_btn_menu_edit').addClass('btn-success');
    	$('[name=opxaction]').attr('value','edit');
    	$('[name=idregion]').attr('value',row[0]);
    	$('[name=region]').attr('value',row[1]);
    });
    
    $('#opx_btn_menu_add').click(function(event){
    	$('#opx_btn_menu_edit').removeClass('btn-success');
    	$('#opx_btn_menu_edit').addClass('btn-default');
    	$('#opx_btn_menu_edit').attr('disabled','disabled');
    	$('#opx_btn_menu_add').addClass('btn-success');
    	$('[name=idregion]').attr('value','');
    	$('[name=region]').attr('value','');
    	$('[name=opxaction]').attr('value','add');
    });
    
    //Puerto
    $('#opx_puerto').on('clickEdit',function(event){
    	var row = opxtable.getRow();
    	$('#opx_btn_menu_add').removeClass('btn-success');
    	$('#opx_btn_menu_add').addClass('btn-default');
    	$('#opx_btn_menu_edit').removeAttr('disabled');
    	$('#opx_btn_menu_edit').removeClass('btn-default');
    	$('#opx_btn_menu_edit').addClass('btn-success');
    	$('[name=opxaction]').attr('value','edit');
    	$('[name=idpuerto]').attr('value',row[0]);
    	$('[name=locode]').attr('value',row[1]);
    	$('[name=puerto]').attr('value',row[2]);
    });
    
    
    $('#opx_btn_menu_add').click(function(event){
    	$('#opx_btn_menu_edit').removeClass('btn-success');
    	$('#opx_btn_menu_edit').addClass('btn-default');
    	$('#opx_btn_menu_edit').attr('disabled','disabled');
    	$('#opx_btn_menu_add').addClass('btn-success');
    	$('[name=opxaction]').attr('value','add');
    	$('[name=idpuerto]').attr('value','');
    	$('[name=locode]').attr('value','');
    	$('[name=puerto]').attr('value','');
    });
    
    
    //Recargo
    $('#opx_recargo').on('clickEdit',function(event){
    	var row = opxtable.getRow();
    	$('#opx_btn_menu_add').removeClass('btn-success');
    	$('#opx_btn_menu_add').addClass('btn-default');
    	$('#opx_btn_menu_edit').removeAttr('disabled');
    	$('#opx_btn_menu_edit').removeClass('btn-default');
    	$('#opx_btn_menu_edit').addClass('btn-success');
    	$('[name=opxaction]').attr('value','edit');
    	$('[name=idrecargo]').attr('value',row[0]);
    	$('[name=clave]').attr('value',row[1]);
    	$('[name=costo]').attr('value',row[2]);
    	$('[name=descripcion]').attr('value',row[3]);
    });
    
    
    $('#opx_btn_menu_add').click(function(event){
    	$('#opx_btn_menu_edit').removeClass('btn-success');
    	$('#opx_btn_menu_edit').addClass('btn-default');
    	$('#opx_btn_menu_edit').attr('disabled','disabled');
    	$('#opx_btn_menu_add').addClass('btn-success');
    	$('[name=opxaction]').attr('value','add');
    	$('[name=idrecargo]').attr('value','');
    	$('[name=clave]').attr('value','');
    	$('[name=costo]').attr('value','');
    	$('[name=descripcion]').attr('value','');
    });   
    
    //Navieras
    $('#opx_naviera').on('clickEdit',function(event){
    	var row = opxtable.getRow();
    	$('#opx_btn_menu_add').removeClass('btn-success');
    	$('#opx_btn_menu_add').addClass('btn-default');
    	$('#opx_btn_menu_edit').removeAttr('disabled');
    	$('#opx_btn_menu_edit').removeClass('btn-default');
    	$('#opx_btn_menu_edit').addClass('btn-success');
    	$('[name=opxaction]').attr('value','edit');
    	$('[name=idnaviera]').attr('value',row[0]);
    	$('[name=naviera]').attr('value',row[1]);
    });
    
    
    $('#opx_btn_menu_add').click(function(event){
    	$('#opx_btn_menu_edit').removeClass('btn-success');
    	$('#opx_btn_menu_edit').addClass('btn-default');
    	$('#opx_btn_menu_edit').attr('disabled','disabled');
    	$('#opx_btn_menu_add').addClass('btn-success');
    	$('[name=opxaction]').attr('value','add');
    	$('[name=idnaviera]').attr('value','');
    	$('[name=naviera]').attr('value','');
    }); 

    //Aeropuerto
    $('#opx_aeropuerto').on('clickEdit',function(event){
    	var row = opxtable.getRow();
    	$('#opx_btn_menu_add').removeClass('btn-success');
    	$('#opx_btn_menu_add').addClass('btn-default');
    	$('#opx_btn_menu_edit').removeAttr('disabled');
    	$('#opx_btn_menu_edit').removeClass('btn-default');
    	$('#opx_btn_menu_edit').addClass('btn-success');
    	$('[name=opxaction]').attr('value','edit');
    	$('[name=idaeropuerto]').attr('value',row[0]);
    	$('[name=code]').attr('value',row[1]);
    	$('[name=aeropuerto]').attr('value',row[2]);
    	$('[name=ciudad]').attr('value',row[3]);
    	$('[name=pais]').attr('value',row[4]);
    });
    
    
    $('#opx_btn_menu_add').click(function(event){
    	$('#opx_btn_menu_edit').removeClass('btn-success');
    	$('#opx_btn_menu_edit').addClass('btn-default');
    	$('#opx_btn_menu_edit').attr('disabled','disabled');
    	$('#opx_btn_menu_add').addClass('btn-success');
    	$('[name=opxaction]').attr('value','add');
    	$('[name=idaeropuerto]').attr('value','');
    	$('[name=code]').attr('value','');
    	$('[name=aeropuerto]').attr('value','');
    	$('[name=ciudad]').attr('value','');
    	$('[name=pais]').attr('value','');
    }); 
    
    //Aerolineas
    $('#opx_aerolinea').on('clickEdit',function(event){
    	var row = opxtable.getRow();
    	$('#opx_btn_menu_add').removeClass('btn-success');
    	$('#opx_btn_menu_add').addClass('btn-default');
    	$('#opx_btn_menu_edit').removeAttr('disabled');
    	$('#opx_btn_menu_edit').removeClass('btn-default');
    	$('#opx_btn_menu_edit').addClass('btn-success');
    	$('[name=opxaction]').attr('value','edit');
    	$('[name=idaerolinea]').attr('value',row[0]);
    	$('[name=aerolinea]').attr('value',row[1]);
    });
    
    
    $('#opx_btn_menu_add').click(function(event){
    	$('#opx_btn_menu_edit').removeClass('btn-success');
    	$('#opx_btn_menu_edit').addClass('btn-default');
    	$('#opx_btn_menu_edit').attr('disabled','disabled');
    	$('#opx_btn_menu_add').addClass('btn-success');
    	$('[name=opxaction]').attr('value','add');
    	$('[name=idaerolinea]').attr('value','');
    	$('[name=aerolinea]').attr('value','');
    });       
    
    
    $('#opx_region').on('clickDelete',function(event){
    	var row = opxtable.getRow();
    	var delete_confirm = confirm("Desea eliminar el registro: " + row[1]);
    	if(delete_confirm)
    		alert("El registro fue eliminado");
    });   	
    
    
    /**
     *Inicializa los componentes genericos del formulario 
     */
    $('#opx_aol').selectpicker();
    $('#opx_aod').selectpicker();
    $('#opx_aerolineas').selectpicker();
    $('#opx_regiones').selectpicker();
    $('#opx_carga_aerea').selectpicker();
    $('#opx_via').multiselect({
    enableFiltering: true,
            buttonWidth: '400px',
            dropRight: true
        });
    $('#opx_recargos').multiselect({
    enableFiltering: true,
            buttonWidth: '400px',
            dropRight: true
    });
    
    /**************************/
} );



})(jQuery);