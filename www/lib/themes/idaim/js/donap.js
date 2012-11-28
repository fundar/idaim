function chartp(data) {	
	$("#chart").html("");
	
	var stage  = new Kinetic.Stage("chart", 530, 580);
	var layer1  = new Kinetic.Layer();
	var layer2  = new Kinetic.Layer();
	var layer3  = new Kinetic.Layer();
	var layer4  = new Kinetic.Layer();
	var layer5  = new Kinetic.Layer();
	var arcs   = draw();
	
	function draw() {
		var x = 260;
		var y = 300;
		
		var startAngle = 0;
		var endAngle   = 0;
		
		for(i in data.indicadores) {
			startAngle = (s_indi[i]*Math.PI)/180;
			endAngle   = (e_indi[i]*Math.PI)/180;
			arc        = drawArc(x,y,254,startAngle,endAngle,data.indicadores[i].color);
			layer1.add(arc);
		}
		
		for(i in data.variablesi) {
			startAngle = (s_vari[i]*Math.PI)/180;
			endAngle   = (e_vari[i]*Math.PI)/180;
			arc        = drawArc(x,y,204,startAngle,endAngle,data.variablesi[i].color);
			layer2.add(arc);
		}
		
		for(i in data.variablesp) {
			startAngle = (s_varp[i]*Math.PI)/180;
			endAngle   = (e_varp[i]*Math.PI)/180;
			arc        = drawArc(x,y,150,startAngle,endAngle,data.variablesp[i].color);
			layer3.add(arc);
		}
		
		var simpleText = new Kinetic.Text({
			x: 225,
			y: 285,
			text: data.indice.value,
			fontSize: 35,
			fontFamily: 'Calibri',
			textFill: '#e3e6e4'
		});
      
		/* Indice */
		startAngle = (0*Math.PI)/180;
		endAngle   = (360*Math.PI)/180;
		var indice = drawArc(x,y,70,startAngle, endAngle, data.indice.color);
		
		layer4.add(indice);
		layer5.add(simpleText);
		//stage.add(layer);
		
		setTimeout( function(){ stage.add(layer1); } , 400)
		setTimeout( function(){  stage.add(layer2); } , 800)
		setTimeout( function(){  stage.add(layer3); } , 1200)
		setTimeout( function(){  stage.add(layer4); } , 1600)
		setTimeout( function(){  stage.add(layer5); } , 2000)
	}

	function drawArc(x, y, r, startAngle, endAngle, color) {
		var arc = new Kinetic.Shape({
			drawFunc: function(stroke){
				var context = this.getContext();
				context.save();
				context.beginPath();
				context.arc(x, y, r, startAngle, endAngle, false); 
				context.lineTo(x,y);
				context.lineWidth   = 2;
				context.strokeStyle = "#e3e6e4";
				context.stroke();
				
				if(stroke!=undefined) context.fillStyle = stroke;
				else context.fillStyle = color;
				
				context.fill();
				
				if(stroke!=undefined) var array = new Array(x, y, r, startAngle, endAngle, stroke);
				else var array = new Array(x, y, r, startAngle, endAngle, color);
				
				return array;
			},
			
			get_Fill : function() {
				return color;
			}
		});
		
		arc.on("mousedown", function(){ draggingShape = this; var mousePos = stage.getMousePosition(); draggingRectOffsetX = mousePos.x - arc._x; draggingRectOffsetY = mousePos.y - arc._y; });
		arc.on("mouseout", function(){ 
			document.body.style.cursor = "default";  
		});
		
		arc.on("mouseover", function(){ 
			/*
			console.log(arc.get_Fill());
			$("#color").val(arc.get_Fill());
			
			var array = arc.drawFunc("#ccc");
			var arc2   = drawArc(array[0],array[1],array[2],array[3],array[4],array[5]);
			
			layer.add(arc2);
			//arc2.setZIndex(30);
			stage.add(layer);
			*/
			
			document.body.style.cursor = "pointer"; 
		});
		
		return arc;
	}
}
