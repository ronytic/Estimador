$(document).on("ready",function(){
	
});
$(document).on('submit','form.formulario', function(e) {
		e.preventDefault(); // prevent native submit
		var percent=$("#respuestaformulario")
    	$(this).ajaxSubmit({
        	target: '#respuestaformulario',
			beforeSend: function() {
				//status.empty();
				var percentVal = '0%';
				//bar.width(percentVal)
				percent.html(percentVal+'<div class="progress"><div class="bar" style="width: '+percentVal+';"></div></div>');
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				//bar.width(percentVal)
				percent.html(percentVal+'<div class="progress"><div class="bar" style="width: '+percentVal+';"></div></div>');
			},
			complete: function(xhr) {
			//bar.width("100%");
			//percent.html("100%");
			$("#respuestaformulario").html(xhr.responseText);
			
			}
    	})
});
$(document).on("ready",function(){var linea=0;
var lineag=0;
    $(document).on("click",".aumentar",function(e){
		e.preventDefault();linea++;
		var posi=$(this).parent().parent();
		$.post("aumentar.php",{'l':linea},function(data){
			posi.before(data);
		});
	}) 
    $(".aumentar").click();
    $(document).on("click",".aumentargasto",function(e){
		e.preventDefault();lineag++;
		var posi=$(this).parent().parent();
		$.post("aumentargasto.php",{'l':lineag},function(data){
			posi.before(data);
		});
	}) 
    $(".aumentargasto").click();
    var ottotal=0;
    var otlibras=0;
    $(document).on("change",".ocantidad,.opreciounitario,.opesolibras",function(){
        var lin=$(this).attr("rel");
        var cantidad=parseFloat($(".ocantidad[rel="+lin+"]").val());
        var preciounitario=parseFloat($(".opreciounitario[rel="+lin+"]").val());
        var preciolibras=parseFloat($(".opreciolibras[rel="+lin+"]").val());
        var total=(cantidad*preciounitario).toFixed(2);
        
        $(".ototal[rel="+lin+"]").val(total);
        
        otlibras=0.00;
        $(".opesolibras").each(function(index, element) {
            var v=parseFloat($(element).val());
            otlibras+=v*3;
        });
        otlibras=otlibras.toFixed(2);
        $(".superlibras").val(otlibras)
        
        
        ottotal=0.00;
        $(".ototal").each(function(index, element) {
            var v=parseFloat($(element).val());
            ottotal+=v;
        });
        ottotal=ottotal.toFixed(2);
        $(".supertotal").val(ottotal)
        sumar();
    });
    var gttotal=0;
    $(document).on("keyup",".gtotal",function(){
        gttotal=0;
        //alert("asd");
        $(".gtotal").each(function(index, element) {
            var v=parseFloat($(element).val());
            //$(element).val(v)
            gttotal+=v;
        });
        gttotal=gttotal.toFixed(2);
        $(".SuperTotalG").val(gttotal)
        sumar();
    });
    
});
function sumar(){
    var superlibras=parseFloat($(".superlibras").val());
    var ottotal=parseFloat($(".supertotal").val());
    var gttotal=parseFloat($(".SuperTotalG").val());
    var TodoTotal=superlibras+ottotal+(ottotal*0.32)+gttotal;
    TodoTotal=TodoTotal.toFixed(2);
    $(".TodoTotal").val(TodoTotal)
}