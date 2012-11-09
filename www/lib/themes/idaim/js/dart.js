function init() {
	var stage = new Kinetic.Stage("container-r", 440, 370);
	var layer = new Kinetic.Layer();
	var draggingShape = undefined;
	var draggingRectOffsetX = 0;
	var draggingRectOffsetY = 0;
	var html = "";

	/* Circle */
	var circle = new Kinetic.Shape({
		drawFunc: function(stroke){
			var context = this.getContext();
			context.beginPath();
			context.arc(0,0,330,0, 0.610865238, false); 
			context.lineTo(0,0);
			context.closePath();
			context.fillStyle="#e36914";
			context.fill();
		}
	});
	
	circle.rotateDeg(180);
	circle.setCenterOffset(191,101);
	
	circle.on("mousedown", function(){ draggingShape = this; var mousePos = stage.getMousePosition(); draggingRectOffsetX = mousePos.x - circle._x; draggingRectOffsetY = mousePos.y - circle._y; });
	circle.on("mouseout", function(){ document.body.style.cursor = "default"; $("#rank-estados").html(""); $("#interval-rank").html(""); $("#rank-estados").css("background-color", "#fdfeff"); });
	circle.on("mouseover", function(){
		document.body.style.cursor = "pointer";
		$("#rank-estados").css("background-color", "#e36914");
		$("#interval-rank").html("<span>4.00 a 5.99</span>")
		$("#rank-estados").html("<ul><li>Quintana Roo</li><li>Guanajuato</li><li>Queretaro</li></ul>");
	});

	
	/* Circle 2 */
	var circle2 = new Kinetic.Shape({
		drawFunc: function(){
			var context = this.getContext();
			context.beginPath();
			context.arc(0,0,230,0, 0.610865238, false); 
			context.lineTo(0,0);
			context.closePath();
			context.fillStyle="#e5a649";
			context.fill();
		}
	});
	
	circle2.rotateDeg(145);
	circle2.setCenterOffset(158,160);
	
	circle2.on("mousedown", function(){ draggingShape = this; var mousePos = stage.getMousePosition(); draggingRectOffsetX = mousePos.x - circle._x; draggingRectOffsetY = mousePos.y - circle._y; });
	circle2.on("mouseout", function(){ document.body.style.cursor = "default"; $("#rank-estados").html(""); $("#interval-rank").html(""); $("#rank-estados").css("background-color", "#fdfeff"); });
	circle2.on("mouseover", function(){
		document.body.style.cursor = "pointer";
		html = "<li>Colima</li>";
		html += "<li>Aguascalientes</li>";
		html += "<li>Chiapas</li>";
		html += "<li>Oaxaca</li>";
		html += "<li>Sinaloa</li>";
		html += "<li>M&eacute;xico</li>";
		html += "<li>Baja California Sur</li>";
		html += "<li>Michoacan</li>";
		html += "<li>Veracruz</li>";
		html += "<li>Jalisco</li>";
		html += "<li>Zacatecas</li>";
		html += "<li>Hidalgo</li>";
		html += "<li>Tabasco</li>";
		html += "<li>Sonora</li>";
		html += "<li>Coahuila</li>";
		html += "<li>Tamaulipas</li>";
		html += "<li>Yucatan</li>";
		$("#interval-rank").html("<span>6.00 a 6.99</span>");
		$("#rank-estados").css("background-color", "#e5a649");
		$("#rank-estados").html("<ul>" + html + "</ul>");
	});
	

	/* Circle 3 */
	var circle3 = new Kinetic.Shape({
		drawFunc: function(){
			var context = this.getContext();
			
			context.beginPath();
			context.arc(0,0,165,0, 0.610865238, false); 
			context.lineTo(0,0);
			context.closePath();
			context.fillStyle="#b5dfef";
			context.fill();
		}
	});
	
	circle3.rotateDeg(110);
	circle3.setCenterOffset(120,233);
	
	circle3.on("mousedown", function(){ draggingShape = this; var mousePos = stage.getMousePosition(); draggingRectOffsetX = mousePos.x - circle._x; draggingRectOffsetY = mousePos.y - circle._y; });
	circle3.on("mouseout", function(){ document.body.style.cursor = "default"; $("#rank-estados").html(""); $("#interval-rank").html(""); $("#rank-estados").css("background-color", "#fdfeff"); });
	circle3.on("mouseover", function(){
		document.body.style.cursor = "pointer";
		html = "<li>Puebla</li>";
		html += "<li>Nuevo Leon</li>";
		html += "<li>Campeche</li>";
		$("#interval-rank").html("<span>7.00 a 7.49</span>");
		$("#rank-estados").css("background-color", "#b5dfef");
		$("#rank-estados").html("<ul>" + html + "</ul>");
	});
	
	
	/* Circle 4 */
	var circle4 = new Kinetic.Shape({
		drawFunc: function(){
			var context = this.getContext();
			context.beginPath();
			context.arc(0,0,99,0, 0.610865238, false); 
			context.lineTo(0,0);
			context.closePath();
			context.fillStyle="#78cce6";
			context.fill();
		}
	});
	
	circle4.rotateDeg(75);
	circle4.setCenterOffset(60,346);
	
	circle4.on("mousedown", function(){ draggingShape = this; var mousePos = stage.getMousePosition(); draggingRectOffsetX = mousePos.x - circle._x; draggingRectOffsetY = mousePos.y - circle._y; });
	circle4.on("mouseout", function(){ document.body.style.cursor = "default"; $("#rank-estados").html(""); $("#interval-rank").html(""); $("#rank-estados").css("background-color", "#fdfeff"); });
	circle4.on("mouseover", function(){
		document.body.style.cursor = "pointer";
		html = "<li>Morelos</li>";
		html += "<li>Baja California</li>";
		html += "<li>Guerrero</li>";
		html += "<li>Tlaxcala</li>";
		html += "<li>Durango</li>";
		html += "<li>San Luis Potosi</li>";
		html += "<li>Nayarit</li>";
		$("#interval-rank").html("<span>7.50 a 7.99</span>");
		$("#rank-estados").css("background-color", "#78cce6");
		$("#rank-estados").html("<ul>" + html + "</ul>");
	});
	

	/* Circle 5 */
	var circle5 = new Kinetic.Shape({
		drawFunc: function(){
			var context = this.getContext();
			context.beginPath();
			context.arc(0,0,33,0, 0.610865238, false); 
			context.lineTo(0,0);
			context.closePath();
			context.fillStyle="#01a8dc";
			context.fill();
		}
	});
	
	circle5.rotateDeg(40);
	circle5.setCenterOffset(-84,620);
	
	circle5.on("mousedown", function(){ draggingShape = this; var mousePos = stage.getMousePosition(); draggingRectOffsetX = mousePos.x - circle._x; draggingRectOffsetY = mousePos.y - circle._y; });
	circle5.on("mouseout", function(){ document.body.style.cursor = "default"; $("#rank-estados").html(""); $("#interval-rank").html(""); $("#rank-estados").css("background-color", "#fdfeff"); });
	circle5.on("mouseover", function(){
		document.body.style.cursor = "pointer";
		html = "<li>Chihuahua</li>";
		$("#interval-rank").html("<span>8.00 a 8.59</span>");
		$("#rank-estados").css("background-color", "#01a8dc");
		$("#rank-estados").html("<ul>" + html + "</ul>");
	});


	/* Circle 6 */
	var circle6 = new Kinetic.Shape({
		drawFunc: function(){
			var context = this.getContext();
			context.beginPath();
			context.arc(0,0,17,0, 0.610865238, false); 
			context.lineTo(0,0);
			context.closePath();
			context.fillStyle="#234189";
			context.fill();
		}
	});
	
	circle6.rotateDeg(5);
	circle6.setCenterOffset(-2090,4440);
	
	circle6.on("mousedown", function(){ draggingShape = this; var mousePos = stage.getMousePosition(); draggingRectOffsetX = mousePos.x - circle._x; draggingRectOffsetY = mousePos.y - circle._y; });
	circle6.on("mouseout", function(){ document.body.style.cursor = "default"; $("#rank-estados").html(""); $("#interval-rank").html(""); $("#rank-estados").css("background-color", "#fdfeff"); });
	circle6.on("mouseover", function(){
		document.body.style.cursor = "pointer";
		html = "<li>Distrito Federal</li>";
		$("#interval-rank").html("<span>8.60 a 9.30</span>");
		$("#rank-estados").css("background-color", "#234189");
		$("#rank-estados").html("<ul>" + html + "</ul>");
	});
	
	
	/* Add Circle on Layer*/
	layer.add(circle);
	layer.add(circle2);
	layer.add(circle3);
	layer.add(circle4);
	layer.add(circle5);
	layer.add(circle6);
	
	stage.add(layer);
}
