//funcion para cambiar texto del boton de email
function cambiarTextoDeBoton(button_id)
{

	   var el = document.getElementById(button_id);
	   if (el.firstChild.data == "+")
	   {
	       el.firstChild.data = "-";
	       $(el).removeClass("btn-primary").addClass("btn-danger");
	       $("#email2").fadeToggle("slow");
			$("#email2").val(null);
	   }
	   else
	   {
	   		if (confirm("¿Esta seguro(a) que quiere remover esta sección?")) {
			    el.firstChild.data = "+";
			    $(el).removeClass("btn-danger").addClass("btn-primary");
			    $("#email2").fadeToggle("slow");
				$("#email2").val(null);
		    };
	   }
}


// <!--FUNCION DE LOS BOTONES DE LA VISTA EXPERIENCIA_EN_INVESTIGACION-->
$(function () {
    $('#btnAgregarTrabajosPublicados').click(function () {
        var num     = $('.blockTrabajosPublicados').length, // how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
            newElem = $('#formularioTrabajosPublicados' + num).clone().attr('id', 'formularioTrabajosPublicados' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
    // este no vaya con los atributos de los inputs anteriores

        //Titulo de la publicacion - text
        newElem.find('.labelTituloP').attr('for','ID'+newNum+'_tituloP');
        newElem.find('.inputTituloP').attr('id','ID'+newNum+'_tituloP').attr('name','ID'+newNum+'_tituloP').val('');

        //Titulo del medio de publicacion - text
        newElem.find('.labelTituloMP').attr('for','ID'+newNum+'_tituloMP');
        newElem.find('.inputTituloMP').attr('id','ID'+newNum+'_tituloMP').attr('name','ID'+newNum+'_tituloMP').val('');

 		//Pais de publicacion - text
        newElem.find('.labelPais').attr('for','ID'+newNum+'_pais');
        newElem.find('.inputPais').attr('id','ID'+newNum+'_pais').attr('name','ID'+newNum+'_pais').val('');

        //Año - text
        newElem.find('.labelAño').attr('for','ID'+newNum+'_año');
        newElem.find('.inputAño').attr('id','ID'+newNum+'_año').attr('name','ID'+newNum+'_año').val('');


    // insert the new element after the last "duplicatable" input field
    //insertar nuevo elemento despues del ultimo input duplicado
        $('#formularioTrabajosPublicados' + num).after(newElem);
        //$('#ID' + newNum + '_title').focus();

    // habilita el boton de remover
        $('#btnRemoverTrabajosPublicados').attr('disabled', false);

    // condicion de cuantas duplicaciones estan permitidas hacer
        if (newNum == 5)
        $('#btnAgregarTrabajosPublicados').attr('disabled', true).prop('value', "No se puede agregar mas formularios");

    	//FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
	    $('.año').datepicker( {
		    format: ' yyyy',
		    viewMode: 'years',
		    minViewMode: 'years',
		    autoclose:true
	  	});
    });

    $('#btnRemoverTrabajosPublicados').click(function () {
        if (confirm("¿Esta seguro(a) que quiere remover esta sección?"))
            {
                var num = $('.blockTrabajosPublicados').length;
                // cuantos inputs duplicados se tiene hasta el momento
                $('#formularioTrabajosPublicados' + num).slideUp('slow', function () {$(this).remove();

                    if (num -1 === 1)
                		$('#btnRemoverTrabajosPublicados').attr('disabled', true);

	                $('#btnAgregarTrabajosPublicados').attr('disabled', false).prop('value', "add section");});
            }
        return false;

        $('#btnAgregarTrabajosPublicados').attr('disabled', false);
    });

    $('#btnRemoverTrabajosPublicados').attr('disabled', true);
});


// <!--FUNCION DE LOS BOTONES DE LA VISTA EXPERIENCIA_EN_INVESTIGACION-->
$(function () {
    $('#btnAgregarExpInvestigacion').click(function () {
        var num     = $('.blockExpInvestigacion').length, // how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
            newElem = $('#formularioExpInv' + num).clone().attr('id', 'formularioExpInv' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
    // este no vaya con los atributos de los inputs anteriores

        //Nombre - text
        newElem.find('.labelNombre').attr('for','ID'+newNum+'_nombre');
        newElem.find('.inputNombre').attr('id','ID'+newNum+'_nombre').val('');

        //Institucion - text
        newElem.find('.labelInstitucion').attr('for','ID'+newNum+'_institucion');
        newElem.find('.inputInstitucion').attr('id','ID'+newNum+'_institucion').val('');

 		//Lugar - text
        newElem.find('.labelLugar').attr('for','ID'+newNum+'_lugar');
        newElem.find('.inputLugar').attr('id','ID'+newNum+'_lugar').val('');

        //Año - text
        newElem.find('.labelAño').attr('for','ID'+newNum+'_año');
        newElem.find('.inputAño').attr('id','ID'+newNum+'_año').val('');

        newElem.find('.id_institucion').attr('value','');
        newElem.find('.id_exp_inv').attr('value','');


    //insertar nuevo elemento despues del ultimo input duplicado
        $('#formularioExpInv' + num).after(newElem);
        //$('#ID' + newNum + '_title').focus();

    // habilita el boton de remover
        $('#btnRemoverExpInvestigacion').attr('disabled', false);

    // condicion de cuantas duplicaciones estan permitidas hacer
        if (newNum == 10)
        $('#btnAgregarExpInvestigacion').attr('disabled', true).prop('value', "No se puede agregar mas formularios");

    	//FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
	    $('.inputAño').datepicker( {
		    format: ' yyyy',
		    viewMode: 'years',
		    minViewMode: 'years',
		    autoclose:true
		  });
		var instituciones = institucionesGlobal;
	    $('input.typeahead_institucion').typeahead({
			name: 'institucion',
			local:  instituciones
		});
    });

    $('#btnRemoverExpInvestigacion').click(function () {
        if (confirm("¿Esta seguro(a) que quiere remover esta sección?"))
            {
                var num = $('.blockExpInvestigacion').length;
                // cuantos inputs duplicados se tiene hasta el momento
                $('#formularioExpInv' + num).slideUp('slow', function () {$(this).remove();

                    if (num -1 === 1)
                		$('#btnRemoverExpInvestigacion').attr('disabled', true);

	                $('#btnAgregarExpInvestigacion').attr('disabled', false).prop('value', "add section");});
            }
        return false;

        $('#btnAgregarExpInvestigacion').attr('disabled', false);
    });
    if($('.blockExpInvestigacion').length < 2){
    	$('#btnRemoverExpInvestigacion').attr('disabled', true);
	}
 //    if($('.blockExpInvestigacion').length > 1){
	// 	// habilita el boton de remover
	//     $('#btnRemoverExpInvestigacion').attr('disabled', false);
	// }
});


// <!--FUNCION DE LOS BOTONES DE LA VISTA EDUCACION_SUPERIOR-->
$('.btn-change').hide();
$(function () {
	$('.show-change-button').hover(function() {
	    $(this).parent('.form-group').find('.btn-change').show();
	  });
	$('.show-change-button').parent('.form-group').mouseleave(function() {
	    $(this).find('.btn-change').hide();
	  });
	$('#photo_file').parent('.form-group').find('.btn-change').click(function() {
		$('#photo_file').parent('.form-group').html('<input type="file" name="photo_file" id="photo_file">');
	});
    $('#id_file').parent('.form-group').find('.btn-change').click(function() {
        $('#id_file').parent('.form-group').html('<input type="file" name="id_file" id="id_file">');
    });
});


// <!--FUNCION DE LOS BOTONES DE LA VISTA EDUCACION_SUPERIOR-->
$(function () {
    $('#btnAgregarEducacionSuperior').click(function () {
        var num     = $('.blockEducacionSuperior').length, // how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
            newElem = $('#formularioEducacionSuperior' + num).clone().attr('id', 'formularioEducacionSuperior' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
    // este no vaya con los atributos de los inputs anteriores

        //Institucion - text
        newElem.find('.labelInstitucion').attr('for','ID'+newNum+'_institucion');
        newElem.find('.inputInstitucion').attr('id','ID'+newNum+'_institucion').val('');

        //Pais - text
        newElem.find('.labelPais').attr('for','ID'+newNum+'_pais');
        newElem.find('.inputPais').attr('id','ID'+newNum+'_pais').val('');

        //Año de graduacion - text
        newElem.find('.labelAñoG').attr('for','ID'+newNum+'_añoG');
        newElem.find('.inputAñoG').attr('id','ID'+newNum+'_añoG').val('');

 		//Titulo Obtenido - text
        newElem.find('.labelTituloObtenido').attr('for','ID'+newNum+'_titulo');
        newElem.find('.inputTituloObtenido').attr('id','ID'+newNum+'_titulo').val('');

		//Grado academico - text
        newElem.find('.labelGradoA').attr('for','ID'+newNum+'_gradoA');
        newElem.find('.comboboxGradoAcademico').attr('id','ID'+newNum+'_gradoA').val('');

    // insert the new element after the last "duplicatable" input field
    //insertar nuevo elemento despues del ultimo input duplicado
        $('#formularioEducacionSuperior' + num).after(newElem);
        //$('#ID' + newNum + '_title').focus();

    // habilita el boton de remover
        $('#btnRemoverEducacionSuperior').attr('disabled', false);

    // condicion de cuantas duplicaciones estan permitidas hacer
        if (newNum == 5)
        $('#btnAgregarEducacionSuperior').attr('disabled', true).prop('value', "No se puede agregar mas formularios");

    	//FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
	    $('.año').datepicker( {
		    format: ' yyyy',
		    viewMode: 'years',
		    minViewMode: 'years',
		    autoclose:true
	  	});
    });

    $('#btnRemoverEducacionSuperior').click(function () {
        if (confirm("¿Esta seguro(a) que quiere remover esta sección?"))
            {
                var num = $('.blockEducacionSuperior').length;
                // cuantos inputs duplicados se tiene hasta el momento
                $('#formularioEducacionSuperior' + num).slideUp('slow', function () {$(this).remove();

                    if (num -1 === 1)
                		$('#btnRemoverEducacionSuperior').attr('disabled', true);

	                $('#btnAgregarEducacionSuperior').attr('disabled', false).prop('value', "add section");});
            }
        return false;

        $('#btnAgregarEducacionSuperior').attr('disabled', false);
    });

    $('#btnRemoverEducacionSuperior').attr('disabled', true);
});


// <!--FUNCION DE LOS BOTONES DE LA VISTA EXPERIENCIA_PROFESIONAL-->
$(function () {
    $('#btnAgregarExpProfesional').click(function () {
        var num     = $('.blockExpProfesional').length, // how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
            newElem = $('#formularioExpProfesional' + num).clone().attr('id', 'formularioExpProfesional' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
    // este no vaya con los atributos de los inputs anteriores

        //Empresa - text
        newElem.find('.labelEmpresa').attr('for','ID'+newNum+'_empresa');
        newElem.find('.inputEmpresa').attr('id','ID'+newNum+'_empresa').attr('name','ID'+newNum+'_empresa').val('');

        //Ocupacion - text
        newElem.find('.labelOcupacion').attr('for','ID'+newNum+'_ocupacion');
        newElem.find('.inputOcupacion').attr('id','ID'+newNum+'_ocupacion').attr('name','ID'+newNum+'_ocupacion').val('');

        //Años de experiencia - text
        newElem.find('.labelAñosExp').attr('for','ID'+newNum+'_añosExp');
        newElem.find('.año').attr('id','ID'+newNum+'_añosExp').attr('name','ID'+newNum+'_añosExp').val('');

 		//Descripcion - text
        newElem.find('.labelDescripcion').attr('for','ID'+newNum+'_descripcion');
        newElem.find('.textareaDescripcion').attr('id','ID'+newNum+'_descripcion').attr('name','ID'+newNum+'_descripcion').val('');




    // insert the new element after the last "duplicatable" input field
    //insertar nuevo elemento despues del ultimo input duplicado
        $('#formularioExpProfesional' + num).after(newElem);
        //$('#ID' + newNum + '_title').focus();

    // habilita el boton de remover
        $('#btnRemoverExpProfesional').attr('disabled', false);

    // condicion de cuantas duplicaciones estan permitidas hacer
        if (newNum == 5)
        $('#btnAgregarExpProfesional').attr('disabled', true).prop('value', "No se puede agregar mas formularios");

    	//FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
	    $('.año').datepicker( {
		    format: ' yyyy',
		    viewMode: 'years',
		    minViewMode: 'years',
		    autoclose:true
	  	});
    });

    $('#btnRemoverExpProfesional').click(function () {
        if (confirm("¿Esta seguro(a) que quiere remover esta sección?"))
            {
                var num = $('.blockExpProfesional').length;
                // cuantos inputs duplicados se tiene hasta el momento
                $('#formularioExpProfesional' + num).slideUp('slow', function () {$(this).remove();

                    if (num -1 === 1)
                		$('#btnRemoverExpProfesional').attr('disabled', true);

	                $('#btnAgregarExpProfesional').attr('disabled', false).prop('value', "add section");});
            }
        return false;

        $('#btnAgregarExpProfesional').attr('disabled', false);
    });

    $('#btnRemoverExpProfesional').attr('disabled', true);
});
