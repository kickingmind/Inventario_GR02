
 function carga_ajax(id,div,url) 
        {
          // alert(ruta );
           $.get
            (
                url,
                {id:id},
                function(resp)
               {
                    $("#"+div+"").html(resp);
               }
            );
        }




function Reset()
{


  $.ajaxSetup({
          headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
  });
/* AJAX FORMULARIO DE PERFIL*/
$.ajaxSetup({
      headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
});


//BOTON ELIMINAR****************
$(".perfil-delete").not('.instalado').addClass("instalado").on("click",function()
{


  if (!confirm("Estas Seguro de Eliminar este registro?")) {

  return false;
  }
  else {
    $($(this).data("class")).hide(600);
    $.ajax ({url:$(this).data("url"),type:'DELETE'});

  return true;

  }

/*$($(this).data("class")).hide(600);
$.ajax ({url:$(this).data("url"),type:'DELETE'});*/
});
//END BOTON ELIMINAR***********


$("#editar_perfil_save").not('.instalado').addClass("instalado").on("click",function()
{

var dato = $("#editar_perfil").val();
var dataSting = "nombre="+dato;
$.ajax ({

   url:$(this).data("url"),
   type:'PUT',
   datatype:'json',
   data:dataSting,
   success:function(perfil)
   {
    $(".perfil-nombre"+perfil.id).text(perfil.nombre);/*de nuevo XD */
    $("#myModalEditar").modal('toggle');
  },error:function(data)
    {
    data=data.responseJSON;

                  $("#NombreControl_editar").text(data.error).show();
                  setTimeout(function()
                  {
                     $("#NombreControl_editar").hide(600);
                  },3000);

                 }
 });

});

$(".editar-perfil").not('.instalado').addClass("instalado").on("click",function()
{


          $("#editar_perfil_save").data("url",$(this).data("url2"))
          $.ajax ({
             url:$(this).data("url"),
             type:'get',
             success:function(perfil)
             {
            $("#editar_perfil").val(perfil.nombre);/*jajajajaja eso  cvubre del ingles jajaj*/
            },

             error:function(data)
             {


          }

        });

});
      $("#guardar").click(function() {

/* antes de hacer un envio puedes validar los input desde aqui, pero claro un hacker puede editar esto
asi que podemos hacer o validar ambas partes o! solo en el servidor.*/

         var dato = $("#nombre").val();
         var route =RutaPerfiles;
         var dataSting = "nombre="+dato;


          $.ajax ({

             url: route,
             type:'POST',
             datatype:'json',
             data:dataSting,
             success:function(perfil)
             {
              $("#myModal").modal('toggle');
              var html="";
              html+=ServerUrl;


html+='<tr class="perfil'+perfil.id+' even" role="row">';
html+='<td class="text-center">'+perfil.id+'</td>';
html+='<td class="perfil-nombre'+perfil.id+'">'+perfil.nombre+'</td>';
html+='<td class="td-actions text-right">';
html+='<a style="cursor: pointer;" data-id="'+perfil.id+'" class="editar-perfil" data-url2="'+ServerUrl+'/perfiles/'+perfil.id+'" data-url="'+ServerUrl+'/perfiles/'+perfil.id+'" data-toggle="modal" data-target="#myModalEditar">';
html+='<i style="color:#60B96B; " class="material-icons">mode_edit</i></a>';
html+='<a style="cursor: pointer;" class="perfil-delete" data-class=".perfil'+perfil.id+'" data-url="'+ServerUrl+'/perfiles/'+perfil.id+'">';
html+='<i style="color:#F12828;" class="material-icons">delete_forever</i></a></td></tr>';

              $("#example").append(datos);
              Reset();

              },

             error:function(data)
             {

               data=data.responseJSON;

              $("#NombreControl").text(data.error).show();
              setTimeout(function()
              {
                 $("#NombreControl").hide(600);
              },8000);

             }


          })

      });



}

$(document).ready(function() {

/*este paginador de donde lo sacaste ? de aca ya te muestro*/

    $('#example').DataTable({
    	"language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
	            "first":    "Primero",
	            "last":    "Último",
	            "next":    "Siguiente",
	            "previous": "Anterior"
	        },
        }
    });


    $('#example').on('page.dt', function () {

    setTimeout(function()
    {
    Reset();
    },1000);

    } );


$("#example_wrapper input[type='search']").on("keyup",function()
{

  setTimeout(function()
  {
  Reset();
  },1000);

 });
Reset();



} );
