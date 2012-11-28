$(document).ready( function() {
	$(".loading").hide();
	$("#pro-chart").hide();	
	$("#npro-chart").hide();
	
	$("#button-base").click( function() {
		$("#button-base").removeClass($("#button-base").attr("class"));
		$("#button-pro").removeClass($("#button-pro").attr("class"));
		
		$("#button-base").addClass("button-active");
		$("#button-pro").addClass("button-inactive");
		
		$("#base-chart").show();
		$("#pro-chart").hide();	
	});
	
	$("#button-pro").click( function() {
		$("#button-pro").removeClass($("#button-pro").attr("class"));
		$("#button-base").removeClass($("#button-base").attr("class"));
		
		$("#button-pro").addClass("button-active");
		$("#button-base").addClass("button-inactive");
		
		$("#pro-chart").show();	
		$("#base-chart").hide();
	});
	
	$("#ntab-1").click( function() {
		$("#nbase-chart").show();
		$("#npro-chart").hide();	
	});
	
	$("#ntab-2").click( function() {
		$("#npro-chart").show();	
		$("#nbase-chart").hide();
	});
	
	
	// Nacional
	$("#indice-nacional .more").click( function() {
		$("#results-estatal").slideUp("slow");
		$("#results-nacional").slideDown("slow");
		 
		$("#indice-estatal .more").show();
		$("#indice-estatal .close").hide();
		$("#indice-nacional .more").hide();
		$("#indice-nacional .close").show();
	});
	
	$("#indice-nacional .close").click( function() {
		$("#results-nacional").slideUp("slow");
		$("#indice-nacional .more").show();
		$("#indice-nacional .close").hide();
	});
	
	
	// Estatal
	$("#indice-estatal .more").click( function() {
		$("#results-nacional").slideUp("slow");
		$("#results-estatal").slideDown("slow");
		
		$("#indice-nacional .more").show();
		$("#indice-nacional .close").hide();
		$("#indice-estatal .more").hide();
		$("#indice-estatal .close").show();
	});
	
	$("#indice-estatal .close").click( function() {
		$("#results-estatal").slideUp("slow");
		$("#indice-estatal .more").show();
		$("#indice-estatal .close").hide();	
	});
	

			  
	$(".button-seek").click( function() {
		$.ajax({
			beforeSend: function(){
				$(".loading").show();
		    },
			url: "get/" + $("#estados").val()
		}).done(function(response) {
			//$("#chart").slideUp("slow");
			//$("#chart2").slideUp("slow");
			
			data = JSON.parse(response);
			
			var stateObj = { foo: $("#estados option:selected").text() };
			history.pushState(stateObj, $("#estados option:selected").text(), webURL + "/estado/" + $("#estados").val());
			
			if(data.key=="Estado") {
				$("#mapa").html("");
			} else {
				$("#button-download").show();
				$("#mapa").html('<img src="'+themePath+'/css/images/estados/'+data.key+'.png" title="'+$("#estados option:selected").text()+'" />');
			}
		
			$("#name-estado").html($("#estados option:selected").text());
			$("#iprogresivo").html(data.indice.progresivo);
			$("#ibase").html(data.indice.base);
			
			$("#indice-base .circle").css("background-color",  data.data.base.indice.color);
			$("#indice-pro .circle").css("background-color",  data.data.progresivo.indice.color);
			
			chartp(data.data.progresivo);
			chartb(data.data.base);
			
			$(".loading").hide();
		});
		
		return false;
	});
	
	$("#estados").change( function () { $(".button-seek").click(); });
	
	if($("#showes").val() == "0") {
		$("#results-estatal").hide();
		$("#results-estatal .tabs").hide();
		$("#button-download").hide();
		$("#results-nacional").hide();
		$("#indice-nacional .close").hide();
		$("#indice-estatal .close").hide();
	} else {
		$("#results-nacional").hide();
		$(".button-seek").click();
		$("#indice-nacional .close").hide();
		$("#indice-estatal .more").hide();
	}
});
