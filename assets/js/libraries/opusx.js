(function($){


$(document).ready(function() {
    
    $('.select_aerolinea').selectpicker();
    $('.select_recargos').selectpicker();
    $('.select_origen').selectpicker();
    $('.select_destino').selectpicker();
    $('.select_region').selectpicker();
    $('.select_via').selectpicker();
    
    $('[name=chkbox_via]').change(function(event){
    	var value = $(this).val();
    	if(value == 'directo'){
    		$('.select_via').prop('disabled',true);
    		$('.select_via').selectpicker('refresh');
    	}
    	if(value == 'escalas'){
    		//$('.select_via').removeAttr('disabled');
			$('.select_via').prop('disabled',false);
			$('.select_via').selectpicker('refresh');
    	}
    	
    });
    
    var opxtable = $('#opxtable').DataTable();
    
} );

})(jQuery);