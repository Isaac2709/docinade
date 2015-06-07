function showAlert(tab){
    var index = $("a.tab").index("a.tab");
    iconnotapie=$("#imgiconnotapie");
    var floater=$("#floater");
    var floater_inside=$("#floater_inside");

    floater_inside
        .empty()
        .append($("p.anotacion").eq(index).html());
    tab.after(floater);
    floater.stop(true, true).animate({opacity: "show"}, "slow");

    tab.bind("click",function(e){
        e.preventDefault();
    });

    tab.mouseleave(function(e) {
        var floater=$("#floater");
        floater.delay(100).animate({opacity: "hide"}, "fast", function(){
            $("#empty_div").append($("#floater"))
        });
    });
}

function setAlertToTabs(){
    $(".nav-pills a[data-toggle=disabled_tab]").click(function(e) {
      if ($(this).parent().hasClass("disabled")) {

        showAlert($(this));
        e.preventDefault();
        return false;
      }
    });
}

function setDisableTabs(input){
    $(input).parents('.panel-body').find('ul.nav li').not('.active').addClass('disabled');
    $(input).parents('.panel-body').find('ul.nav li').not('.active').find('a[data-toggle=tab]').attr('data-toggle', 'disabled_tab');
    $(input).parents('.form').find('.btn-success[type=submit]').prop('disabled', false);
    $(input).parents('.form').find('.btn-cancel[type=button]').prop('disabled', false);
    setAlertToTabs();
}

$(document).ready(function(){
    $('.form').find('.btn-success[type=submit]').prop('disabled', true);
    $('.form').find('.btn-cancel[type=button]').prop('disabled', true);

    $('.form').find('input').change(function(){
        setDisableTabs($(this));
    });

    $('.form').find('textarea').change(function(){
        setDisableTabs($(this));
    });

    $('.form').find('select').change(function(){
        setDisableTabs($(this));
    });

    $('.btn-cancel').click(function() {
        $(this).parents('.panel-body').find('ul.nav li').not('.active').removeClass('disabled');
        $(this).parents('.panel-body').find('ul.nav li').not('.active').find('a[data-toggle=disabled_tab]').attr('data-toggle', 'tab');
        $(this).parents('.form').find('.btn-success[type=submit]').prop('disabled', true);
        $(this).parents('.form').find('.btn-cancel[type=button]').prop('disabled', true);
    });

    jQuery("<div/>",
    {
        id: "empty_div", css:
        {
            display: "none"
        }
    }).appendTo("body");

    jQuery("<div/>",
    {
        id: "floater",
        mouseenter: function(){
            floater=$("#floater");
            floater.stop(true, true).animate({opacity: "show"});
            $("#floater").stop(true, true).animate({opacity: "show"});
        },
        mouseleave: function(){
            $("#floater").delay(100).animate({opacity: "hide"}, "fast", function(){
                $("#empty_div").append($("#floater"))
            });
        }
    }
    ).appendTo("#empty_div");

    jQuery("<img/>",
    {
        id: "imgiconnotapie",
        src: "iconnotaspie.gif",
        class: "iconnotapie"
    }
    ).appendTo("#floater");

    jQuery("<div/>",
    {
        id: "floater_inside"
    }
    ).appendTo("#floater");

});

$(document).ready(function(){
    $(".checkbox_edu" ).change(function(){
        if($(this).is(":checked")){
            $(".textarea_comment").show();
        }
        else{
            $(".textarea_comment").hide();
            $(".textarea_comment").find('textarea').val('');
        }
    });
});


// <!--Funciones para las tablas de Programas Computacionales -->
$(document).ready(function(){
      var i=$('#tab_logic_programas tr').length-2;
     $("#add_row_programas").click(function(){
      $('#addrProgramas'+i).html("<td>"+ (i+1) +"</td><td><input name='programa[]' type='text' placeholder='Programa' class='form-control input-md'  /> </td>");

      $('#tab_logic_programas').append('<tr id="addrProgramas'+(i+1)+'"></tr>');
      i++;
  });
     $("#delete_row_programas").click(function(){
         if(i>1){
             $("#addrProgramas"+(i-1)).html('');
             $("#tab_logic_programas tr:last").remove();
             i--;
         }
     });

});

// <!--Funciones para las tablas de Bibliotecas -->
$(document).ready(function(){
    var i= $('#tab_logic_biblioteca tr').length-2;
    $("#add_row_biblioteca").click(function(){
        $('#addrBiblioteca'+i).html("<td>"+ (i+1) +"</td><td><input name='biblioteca[]' type='text' placeholder='Biblioteca' class='form-control input-md'  /> </td>");

        $('#tab_logic_biblioteca').append('<tr id="addrBiblioteca'+(i+1)+'"></tr>');
        i++;
    });
    $("#delete_row_biblioteca").click(function(){
        if(i>1){
            $("#addrBiblioteca"+(i-1)).html('');
            $("#tab_logic_biblioteca tr:last").remove();
            i--;
        }
    });
});

// <!--Funciones para las tablas de Procesamiento de Datos -->
$(document).ready(function(){
    var i=$('#tab_logic_procesamientoDatos tr').length-2;
    $("#add_row_procesamientoDatos").click(function(){
        $('#addrProcesamientoDatos'+i).html("<td>"+ (i+1) +"</td><td><input name='procesamiento_datos[]' type='text' placeholder='Procesamiento de Datos' class='form-control input-md'  /> </td>");

        $('#tab_logic_procesamientoDatos').append('<tr id="addrProcesamientoDatos'+(i+1)+'"></tr>');
        i++;
    });
    $("#delete_row_procesamientoDatos").click(function(){
        if(i>1){
            $("#addrProcesamientoDatos"+(i-1)).html('');
            $("#tab_logic_procesamientoDatos tr:last").remove();
            i--;
        }
    });
});

!function(e){var t=function(t,n){this.$element=e(t),this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name,this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),this.$hidden.length===0&&(this.$hidden=e('<input type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",r),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",e.proxy(this.trigger,this)),this.listen()};t.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this)),e(this.$input[0].form).on("reset.fileupload",e.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(e,t){if(t==="clear")return;var n=e.target.files!==undefined?e.target.files[0]:e.target.value?{name:e.target.value.replace(/^.+\\/,"")}:null;if(!n){this.clear();return}this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match(/\.(gif|png|jpe?g)$/i))&&typeof FileReader!="undefined"){var r=new FileReader,i=this.$preview,s=this.$element;r.onload=function(e){i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />"),s.addClass("fileupload-exists").removeClass("fileupload-new")},r.readAsDataURL(n)}else this.$preview.text(n.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")},clear:function(e){this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name","");if(navigator.userAgent.match(/msie/i)){var t=this.$input.clone(!0);this.$input.after(t),this.$input.remove(),this.$input=t}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),e&&(this.$input.trigger("change",["clear"]),e.preventDefault())},reset:function(e){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(e){this.$input.trigger("click"),e.preventDefault()}},e.fn.fileupload=function(n){return this.each(function(){var r=e(this),i=r.data("fileupload");i||r.data("fileupload",i=new t(this,n)),typeof n=="string"&&i[n]()})},e.fn.fileupload.Constructor=t,e(document).on("click.fileupload.data-api",'[data-provides="fileupload"]',function(t){var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());var r=e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');r.length>0&&(r.trigger("click.fileupload"),t.preventDefault())})}(window.jQuery)

// Combobox
$(".combobox").change(function () {
    if($(this).val() == "0") $(this).addClass("empty");
    else $(this).removeClass("empty")
});
$(".combobox").change();

// http://eternicode.github.io/bootstrap-datepicker/?markup=input&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&todayBtn=false&clearBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox

$('.datepicker_control').datepicker({
    language: "es",
    autoclose: true,
    todayHighlight: true
});

// <!-- Input de años -->
$('.año').datepicker( {
    format: ' yyyy',
    viewMode: 'years',
    minViewMode: 'years',
    autoclose:true
});

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


// <!--FUNCION DE LOS BOTONES DE LA VISTA TRABAJOS_PUBLICADOS-->
$(function () {
    $('#btnAgregarTrabajosPublicados').click(function () {
        var num     = $('.blockTrabajosPublicados').length, // how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
            newElem = $('#formularioTrabajosPublicados' + num).clone().attr('id', 'formularioTrabajosPublicados' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

    //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
    // este no vaya con los atributos de los inputs anteriores

        //Titulo de la publicacion - text
        newElem.find('.labelTituloP').attr('for','ID'+newNum+'_tituloP');
        newElem.find('.inputTituloP').attr('id','ID'+newNum+'_tituloP').val('');

        //Titulo del medio de publicacion - text
        newElem.find('.labelTituloMP').attr('for','ID'+newNum+'_tituloMP');
        newElem.find('.inputTituloMP').attr('id','ID'+newNum+'_tituloMP').val('');

 		//Pais de publicacion - text
        newElem.find('.labelPais').attr('for','ID'+newNum+'_pais');
        newElem.find('.inputPais').attr('id','ID'+newNum+'_pais').val('');

        //Año - text
        newElem.find('.labelAño').attr('for','ID'+newNum+'_año');
        newElem.find('.inputAño').attr('id','ID'+newNum+'_año').val('');

        // Formateo los ID
        newElem.find('.id_pub').attr('value','');

        //Checkbox - remover
        newElem.find('.claseCheckboxTrabajosPublicados').attr('style','cursor:pointer').attr('id','checkboxTrabajosPublicados'+newNum).attr('checked',false);

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
        var paises = paisesGlobal;
        $('input.typeahead').typeahead({
            name: 'pais',
            local:  paises
        });
    });

    $('#btnRemoverTrabajosPublicados').click(function () {
        var num = $('.blockTrabajosPublicados').length;
        // cuantos inputs duplicados se tiene hasta el momento
        var eliminados=0;
        for (var i = 2 ; i<=num; i++) {
            if ($('#checkboxTrabajosPublicados'+i).is(':checked')) {
                if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
                    eliminados++;
                    $('#formularioTrabajosPublicados' + i).slideUp('slow', function () {$(this).remove();

                        if (num -1 === 1)
                            $('#btnRemoverTrabajosPublicados').attr('disabled', true);

                        $('#btnAgregarTrabajosPublicados').attr('disabled', false).prop('value', "add section");

                        var cont=2;
                        for (var i = 2; i <= 5; i++) {
                            var elemento=document.getElementById('formularioTrabajosPublicados'+i);
                            if (elemento!=null) {
                                nElem=$('#formularioTrabajosPublicados'+i).attr('id', 'formularioTrabajosPublicados' + cont);

                                //Titulo de la publicacion - text
                                nElem.find('.labelTituloP').attr('for','ID'+cont+'_tituloP');
                                nElem.find('.inputTituloP').attr('id','ID'+cont+'_tituloP');

                                //Titulo del medio de publicacion - text
                                nElem.find('.labelTituloMP').attr('for','ID'+cont+'_tituloMP');
                                nElem.find('.inputTituloMP').attr('id','ID'+cont+'_tituloMP');

                                //Pais de publicacion - text
                                nElem.find('.labelPais').attr('for','ID'+cont+'_pais');
                                nElem.find('.inputPais').attr('id','ID'+cont+'_pais');

                                //Año - text
                                nElem.find('.labelAño').attr('for','ID'+cont+'_año');
                                nElem.find('.inputAño').attr('id','ID'+cont+'_año');

                                //Checkbox - remover
                                nElem.find('.claseCheckboxTrabajosPublicados').attr('style','cursor:pointer').attr('id','checkboxTrabajosPublicados'+cont);

                                cont++;
                            };

                        };
                    });
                }
                if (num - eliminados === 1)
                    $('#btnRemoverTrabajosPublicados').attr('disabled', true);
            };
        };
        return false;
        $('#btnAgregarTrabajosPublicados').attr('disabled', false);
    });

    if($('.blockTrabajosPublicados').length < 2){
        $('#btnRemoverTrabajosPublicados').attr('disabled', true);
    }
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

        //Checkbox - remover
        newElem.find('.claseCheckboxExpInvestigacion').attr('style','cursor:pointer').attr('id','checkboxExpInvestigacion'+newNum).attr('checked',false);


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
        var num = $('.blockExpInvestigacion').length;
        // cuantos inputs duplicados se tiene hasta el momento
        var eliminados=0;
        for (var i = 2 ; i<=num; i++) {
            if ($('#checkboxExpInvestigacion'+i).is(':checked')) {
                //alert('chequeado');
                if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
                    eliminados++;
                    $('#formularioExpInv' + i).slideUp('slow', function () {$(this).remove();

                        $('#btnAgregarExpInvestigacion').attr('disabled', false).prop('value', "add section");

                        var cont=2;
                        for (var i = 2; i <= 5; i++) {
                            var elemento=document.getElementById('formularioExpInv'+i);
                            if (elemento!=null) {
                                nElem=$('#formularioExpInv'+i).attr('id', 'formularioExpInv' + cont);

                                //Nombre - text
                                nElem.find('.labelNombre').attr('for','ID'+cont+'_nombre');
                                nElem.find('.inputNombre').attr('id','ID'+cont+'_nombre');

                                //Institucion - text
                                nElem.find('.labelInstitucion').attr('for','ID'+cont+'_institucion');
                                nElem.find('.inputInstitucion').attr('id','ID'+cont+'_institucion');

                                //Lugar - text
                                nElem.find('.labelLugar').attr('for','ID'+cont+'_lugar');
                                nElem.find('.inputLugar').attr('id','ID'+cont+'_lugar');

                                //Año - text
                                nElem.find('.labelAño').attr('for','ID'+cont+'_año');
                                nElem.find('.inputAño').attr('id','ID'+cont+'_año');

                                //Checkbox - remover
                                nElem.find('.claseCheckboxExpInvestigacion').attr('style','cursor:pointer').attr('id','checkboxExpInvestigacion'+cont);

                                cont++;
                            };

                        };
                    });
                }
                if (num - eliminados === 1)
                    $('#btnRemoverExpInvestigacion').attr('disabled', true);
            };
        };
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
    $('.btn-change.title_array').click(function() {
        $(this).parent('div').parent('.form-group').html('<input type="file" name="title_file[]">');
    });
    // $('.btn-change').click(function() {
    //     $(this).parent('div').parent('.form-group').html('<input type="file" name="id_file" id="id_file">');
    // });
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

        //Pais  - text
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

        //Area de especialidad - text
        newElem.find('.labelAreaEspecialidad').attr('for','ID'+newNum+'_areaEspecialidad');
        newElem.find('.inputAreaEspecialidad').attr('id','ID'+newNum+'_areaEspecialidad').val('');

        //Titulo obtenido - file
        newElem.find('.labelAreaEspecialidad').attr('for','ID'+newNum+'_areaEspecialidad');
        newElem.find('.div_title_file').html('<input type="file" name="title_file[]" id="title_file">');

        // Formateo los ID
        newElem.find('.id_edu_sup').attr('value','');

        //Checkbox - remover
        newElem.find('.claseCheckboxEduSuperior').attr('style','cursor:pointer').attr('id','checkboxEduSuperior'+newNum).attr('checked',false);

        //Archivo - file
        newElem.find('.fileupload').attr('id','fileupload'+newNum);


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
        var areas_especialidad = areas_especialidadGlobal;
        $('input.typeahead_area_especialidad').typeahead({
            name: 'area_especialidad',
            local:  areas_especialidad
        });
        var paises = paisesGlobal;
        $('input.typeahead').typeahead({
            name: 'pais',
            local:  paises
        });
        var instituciones = institucionesGlobal;
        $('input.typeahead_institucion').typeahead({
            name: 'institucion',
            local:  instituciones
        });
        //funcion para hacer como placeholder la primera opcion de cada combobox
        $(".combobox").change(function () {
            if($(this).val() == "0") $(this).addClass("empty");
            else $(this).removeClass("empty")
        });
        $(".combobox").change();

        $('#fileupload'+newNum).fileupload('clear');
    });

    $('#btnRemoverEducacionSuperior').click(function () {
        var num = $('.blockEducacionSuperior').length;
        // cuantos inputs duplicados se tiene hasta el momento
        var eliminados=0;
        for (var i = 2; i <= num; i++) {
            if ($('#checkboxEduSuperior'+i).is(':checked')) {
                if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
                    eliminados++;
                    $('#formularioEducacionSuperior' + i).slideUp('slow', function () {$(this).remove();

                    $('#btnAgregarEducacionSuperior').attr('disabled', false).prop('value', "add section");

                    var cont=2;
                    for (var i = 2; i <= 5; i++) {
                        var elemento=document.getElementById('formularioEducacionSuperior'+i);
                        if (elemento!=null) {
                            nElem=$('#formularioEducacionSuperior'+i).attr('id', 'formularioEducacionSuperior' + cont);

                            //Institucion - text
                            nElem.find('.labelInstitucion').attr('for','ID'+cont+'_institucion');
                            nElem.find('.inputInstitucion').attr('id','ID'+cont+'_institucion');

                            //Pais - text
                            nElem.find('.labelPais').attr('for','ID'+cont+'_pais');
                            nElem.find('.inputPais').attr('id','ID'+cont+'_pais');

                            //Año de graduacion - text
                            nElem.find('.labelAñoG').attr('for','ID'+cont+'_añoG');
                            nElem.find('.inputAñoG').attr('id','ID'+cont+'_añoG');

                            //Titulo Obtenido - text
                            nElem.find('.labelTituloObtenido').attr('for','ID'+cont+'_titulo');
                            nElem.find('.inputTituloObtenido').attr('id','ID'+cont+'_titulo');

                            //Grado academico - text
                            nElem.find('.labelGradoA').attr('for','ID'+cont+'_gradoA');
                            nElem.find('.comboboxGradoAcademico').attr('id','ID'+cont+'_gradoA');

                            //Checkbox - remover
                            nElem.find('.claseCheckboxEduSuperior').attr('style','cursor:pointer').attr('id','checkboxEduSuperior'+cont);

                            //Archivo - file
                            nElem.find('.fileupload').attr('id','fileupload'+cont);

                            cont++;
                        };
                    };
                });
            };
            if (num - eliminados === 1)
                $('#btnRemoverEducacionSuperior').attr('disabled', true);
            };
        };
        return false;
        $('#btnAgregarEducacionSuperior').attr('disabled', false);
    });
    if($('.blockEducacionSuperior').length < 2){
        $('#btnRemoverEducacionSuperior').attr('disabled', true);
    }
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
        newElem.find('.inputEmpresa').attr('id','ID'+newNum+'_empresa').val('');

        //Ocupacion - text
        newElem.find('.labelOcupacion').attr('for','ID'+newNum+'_ocupacion');
        newElem.find('.inputOcupacion').attr('id','ID'+newNum+'_ocupacion').val('');

        //Años de experiencia - text
        newElem.find('.labelAñosExp').attr('for','ID'+newNum+'_añosExp');
        newElem.find('.año').attr('id','ID'+newNum+'_añosExp').val('');
        newElem.find('.annio_fin').html('<input type="text" class="form-control año" name="annio_fin[]">');

 		//Descripcion - text
        newElem.find('.labelDescripcion').attr('style','display:none');
        newElem.find('.textareaDescripcion').attr('style','display:none');

        // Formateo el ID
        newElem.find('.id_exp_prof').attr('value','');

        //Checkbox - remover
        newElem.find('.claseCheckboxExpProfesional').attr('style','cursor:pointer').attr('id','checkboxExpProfesional'+newNum).attr('checked',false);

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
        var ocupaciones = ocupacionesGlobal;
        $('input.typeahead_ocupacion').typeahead({
            name: 'ocupacion',
            local:  ocupaciones
        });

    });

    $('#btnRemoverExpProfesional').click(function () {
        var num = $('.blockExpProfesional').length;
        // cuantos inputs duplicados se tiene hasta el momento
        var eliminados=0;
        for (var i = 2 ; i<=num; i++) {
            if ($('#checkboxExpProfesional'+i).is(':checked')) {
                //alert('chequeado');
                if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
                    eliminados++;
                    $('#formularioExpProfesional' + i).slideUp('slow', function () {
                        $(this).remove();
                        $('#btnAgregarExpProfesional').attr('disabled', false).prop('value', "add section");
                        var cont=2;
                        for (var i = 2; i <= 5; i++) {
                            var elemento=document.getElementById('formularioExpProfesional'+i);
                            if (elemento!=null) {
                                nElem=$('#formularioExpProfesional'+i).attr('id', 'formularioExpProfesional' + cont);

                                //Empresa - text
                                nElem.find('.labelEmpresa').attr('for','ID'+cont+'_empresa');
                                nElem.find('.inputEmpresa').attr('id','ID'+cont+'_empresa');

                                //Ocupacion - text
                                nElem.find('.labelOcupacion').attr('for','ID'+cont+'_ocupacion');
                                nElem.find('.inputOcupacion').attr('id','ID'+cont+'_ocupacion');

                                //Años de experiencia - text
                                nElem.find('.labelAñosExp').attr('for','ID'+cont+'_añosExp');
                                nElem.find('.año').attr('id','ID'+cont+'_añosExp');

                                //Descripcion - text
                                nElem.find('.labelDescripcion').attr('for','ID'+cont+'_descripcion');
                                nElem.find('.textareaDescripcion').attr('id','ID'+cont+'_descripcion');

                                //Checkbox - remover
                                nElem.find('.claseCheckboxExpProfesional').attr('style','cursor:pointer').attr('id','checkboxExpProfesional'+cont);

                                cont++;
                            };
                        };
                    });
                }
                if (num - eliminados === 1)
                    $('#btnRemoverExpProfesional').attr('disabled', true);
            };
        };
        return false;
        $('#btnAgregarExpProfesional').attr('disabled', false);
    });
    if($('.blockExpProfesional').length < 2){
        $('#btnRemoverExpProfesional').attr('disabled', true);
    }
});


// <!--FUNCION DE LOS BOTONES DE LA VISTA CONOCIMIENTO DE IDIOMAS-->
$(function () {
    $('#btnAgregarConocimientoDeIdiomas').click(function () {
        var num     = $('.blockconocimientoDeIdiomas').length, // how many "duplicatable" input fields we currently have
        newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
        newElem = $('#formularioConocimientoDeIdiomas' + num).clone().attr('id', 'formularioConocimientoDeIdiomas' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

        //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
        // este no vaya con los atributos de los inputs anteriores

        //Nombre - text
        newElem.find('.labelNombre').attr('for','ID'+newNum+'_nombre');
        newElem.find('.inputNombre').attr('id','ID'+newNum+'_nombre').val('');

        //Nivel de escritura - combobox
        newElem.find('.labelNivelEscritura').attr('for','ID'+newNum+'_nivelEscritura');
        newElem.find('.comboboxNivelEscritura').attr('id','ID'+newNum+'_nivelEscritura').val('');

        //Nivel de lectura - text
        newElem.find('.labelNivelLectura').attr('for','ID'+newNum+'_nivelLectura');
        newElem.find('.comboboxNivelLectura').attr('id','ID'+newNum+'_nivelLectura').val('');

        //Nivel conversacional - text
        newElem.find('.labelNivelConversacional').attr('for','ID'+newNum+'_nivelConversacional');
        newElem.find('.comboboxNivelConversacional').attr('id','ID'+newNum+'_nivelConversacional').val('');

        //Checkbox - remover
        newElem.find('.claseCheckboxConocimientoDeIdiomas').attr('style','cursor:pointer').attr('id','checkboxConocimientoDeIdiomas'+newNum).attr('checked',false);

        //Archivo - file
        // newElem.find('.fileupload').attr('class','fileupload-new');
        // newElem.find('.input_archivo').val('');
        // newElem.find('.fileupload-preview').html('');
        newElem.find('.fileupload').attr('id','fileupload'+newNum);



        newElem.find('.id_con_idioma').attr('value','');

        // insert the new element after the last "duplicatable" input field
        //insertar nuevo elemento despues del ultimo input duplicado
        $('#formularioConocimientoDeIdiomas' + num).after(newElem);
        //$('#ID' + newNum + '_title').focus();



        // habilita el boton de remover
        $('#btnRemoverConocimientoDeIdiomas').attr('disabled', false);

        // condicion de cuantas duplicaciones estan permitidas hacer
        if (newNum == 5)
        $('#btnAgregarConocimientoDeIdiomas').attr('disabled', true);

        $('#fileupload'+newNum).fileupload('clear');

        //FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
        $('.año').datepicker( {
            format: ' yyyy',
            viewMode: 'years',
            minViewMode: 'years',
            autoclose:true
        });

        $(".combobox").change(function () {
            if($(this).val() == "0") $(this).addClass("empty");
            else $(this).removeClass("empty")
        });
        $(".combobox").change();


    });

    $('#btnRemoverConocimientoDeIdiomas').click(function () {
                var num = $('.blockconocimientoDeIdiomas').length;
                // cuantos inputs duplicados se tiene hasta el momento
                var eliminados=0;
                for (var i = 2 ; i<=num; i++) {
                    if ($('#checkboxConocimientoDeIdiomas'+i).is(':checked')) {
                        //alert('chequeado');
                        if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
                            eliminados++;
                            $('#formularioConocimientoDeIdiomas' + i).slideUp('slow', function () {$(this).remove();

                                $('#btnAgregarConocimientoDeIdiomas').attr('disabled', false);

                                var cont=2;
                                for (var i = 2; i <= 5; i++) {
                                    var elemento=document.getElementById('formularioConocimientoDeIdiomas'+i);
                                    if (elemento!=null) {
                                        nElem=$('#formularioConocimientoDeIdiomas'+i).attr('id', 'formularioConocimientoDeIdiomas' + cont);

                                        //Nombre - text
                                        nElem.find('.labelNombre').attr('for','ID'+cont+'_nombre');
                                        nElem.find('.inputNombre').attr('id','ID'+cont+'_nombre');

                                        //Nivel de escritura - combobox
                                        nElem.find('.labelNivelEscritura').attr('for','ID'+cont+'_nivelEscritura');
                                        nElem.find('.comboboxNivelEscritura').attr('id','ID'+cont+'_nivelEscritura');

                                        //Nivel de lectura - text
                                        nElem.find('.labelNivelLectura').attr('for','ID'+cont+'_nivelLectura');
                                        nElem.find('.comboboxNivelLectura').attr('id','ID'+cont+'_nivelLectura');

                                        //Nivel conversacional - text
                                        nElem.find('.labelNivelConversacional').attr('for','ID'+cont+'_nivelConversacional');
                                        nElem.find('.comboboxNivelConversacional').attr('id','ID'+cont+'_nivelConversacional');

                                        //Checkbox - remover
                                        nElem.find('.claseCheckboxConocimientoDeIdiomas').attr('style','cursor:pointer').attr('id','checkboxConocimientoDeIdiomas'+cont);

                                        //Archivo - file
                                        nElem.find('.fileupload').attr('id','fileupload'+cont);

                                        cont++;
                                    };

                                };
                            });
                        }
                        if (num - eliminados === 1)
                            $('#btnRemoverConocimientoDeIdiomas').attr('disabled', true);
                    };
                };
        return false;
        $('#btnAgregarConocimientoDeIdiomas').attr('disabled', false);
    });
    if($('.blockconocimientoDeIdiomas').length < 2){
        $('#btnRemoverConocimientoDeIdiomas').attr('disabled', true);
    }
});

// <!--FUNCION DE LOS BOTONES DE LA VISTA CURSOS Y SEMINARIOS MAS RELEVANTES-->
$(function () {
    $('#btnAgregarCursosMasRelevantes').click(function () {
        var num     = $('.blockCursosMasRelevantes').length, // how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // the numeric ID of the new input field being added
            newElem = $('#formularioCursosMasRelevantes' + num).clone().attr('id', 'formularioCursosMasRelevantes' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

        //Aqui se manipula los atributos name y id de los input dentro del elemento nuevo, esto para que a la hora de agregar otro clon
        // este no vaya con los atributos de los inputs anteriores

        //Nombre - text
        newElem.find('.labelNombre').attr('for','ID'+newNum+'_actividad');
        newElem.find('.inputNombre').attr('id','ID'+newNum+'_actividad').val('');

        //Institucion - text
        newElem.find('.labelInstitucion').attr('for','ID'+newNum+'_institucion');
        newElem.find('.inputInstitucion').attr('id','ID'+newNum+'_institucion').val('');

        //Lugar - text
        newElem.find('.labelLugar').attr('for','ID'+newNum+'_lugar');
        newElem.find('.inputLugar').attr('id','ID'+newNum+'_lugar').val('');

        //Año - text
        newElem.find('.labelAño').attr('for','ID'+newNum+'_año');
        newElem.find('.inputAño').attr('id','ID'+newNum+'_año').val('');

        //Checkbox - remover
        newElem.find('.claseCheckboxCursosMasRelevantes').attr('style','cursor:pointer').attr('id','checkboxCursosMasRelevantes'+newNum).attr('checked',false);

        // Formateo el ID
        newElem.find('.id_cur_sem').attr('value','');


    // insert the new element after the last "duplicatable" input field
    //insertar nuevo elemento despues del ultimo input duplicado
        $('#formularioCursosMasRelevantes' + num).after(newElem);
        //$('#ID' + newNum + '_title').focus();

    // habilita el boton de remover
        $('#btnRemoverCursosMasRelevantes').attr('disabled', false);

    // condicion de cuantas duplicaciones estan permitidas hacer
        if (newNum == 5)
        $('#btnAgregarCursosMasRelevantes').attr('disabled', true);

        //FUNCION QUE SE LLAMA DE NUEVO PARA QUE LOS CAMPOS DE AÑO SE PUEDAN EJECUTAR SIN PROBLEMA
        $('.año').datepicker( {
            format: ' yyyy',
            viewMode: 'years',
            minViewMode: 'years',
            autoclose:true
        });
    });

    $('#btnRemoverCursosMasRelevantes').click(function () {
        var num = $('.blockCursosMasRelevantes').length;
        // cuantos inputs duplicados se tiene hasta el momento
        var eliminados=0;
        for (var i = 2 ; i<=num; i++) {
            if ($('#checkboxCursosMasRelevantes'+i).is(':checked')) {
                //alert('chequeado');
                if (confirm("¿Esta seguro(a) que quiere remover esta sección?\nSeccion #"+i)){
                    eliminados++;
                    $('#formularioCursosMasRelevantes' + i).slideUp('slow', function () {$(this).remove();

                        $('#btnAgregarCursosMasRelevantes').attr('disabled', false);

                        var cont=2;
                        for (var i = 2; i <= 5; i++) {
                            var elemento=document.getElementById('formularioCursosMasRelevantes'+i);
                            if (elemento!=null) {
                                nElem=$('#formularioCursosMasRelevantes'+i).attr('id', 'formularioCursosMasRelevantes' + cont);

                                //Nombre - text
                                nElem.find('.labelNombre').attr('for','ID'+cont+'_actividad');
                                nElem.find('.inputNombre').attr('id','ID'+cont+'_actividad');

                                //Institucion - text
                                nElem.find('.labelInstitucion').attr('for','ID'+cont+'_institucion');
                                nElem.find('.inputInstitucion').attr('id','ID'+cont+'_institucion');

                                //Lugar - text
                                nElem.find('.labelLugar').attr('for','ID'+cont+'_lugar');
                                nElem.find('.inputLugar').attr('id','ID'+cont+'_lugar');

                                //Año - text
                                nElem.find('.labelAño').attr('for','ID'+cont+'_año');
                                nElem.find('.inputAño').attr('id','ID'+cont+'_año');

                                //Checkbox - remover
                                nElem.find('.claseCheckboxCursosMasRelevantes').attr('style','cursor:pointer').attr('id','checkboxCursosMasRelevantes'+cont);

                                cont++;
                            };

                        };
                    });
                }
                if (num - eliminados === 1)
                    $('#btnRemoverCursosMasRelevantes').attr('disabled', true);
            };
        };
        return false;
        $('#btnAgregarCursosMasRelevantes').attr('disabled', false);
    });
    if($('.blockCursosMasRelevantes').length < 2){
        $('#btnRemoverCursosMasRelevantes').attr('disabled', true);
    }
});