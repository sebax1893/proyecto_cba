
$(function () {

	var subregionInput = $('#subregion');
	var subregionDiv = $('#subregionDiv')
	subregionDiv.css('display', 'none');
    
    $('#id_municipios').change(function () {

        var municipioDropDownValue = $('#id_municipios').val();
        
        var token = $("#token").val();

        $.ajax({
        	headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            url: "http://localhost/proyecto_cba/public/institucion/obtenerSubregion",
            data: {id_municipio: municipioDropDownValue},
            dataType: 'json',
            success: function(data){

            	var subregion = data[0].nombre;

            	subregionDiv.show();
           		subregionInput.val(subregion);           
            }
        })
    });
});
