$(document).ready( function() {
	$(".loading").hide();
	$("#pro-chart").hide();	
	$("#npro-chart").hide();
	
	$("#tab-1").click( function() {
		$("#base-chart").show();
		$("#pro-chart").hide();	
	});
	
	$("#tab-2").click( function() {
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
			$("#chart").slideUp("slow");
			$("#chart2").slideUp("slow");
			
			data = JSON.parse(response);
			
			var stateObj = { foo: $("#estados option:selected").text() };
			history.pushState(stateObj, $("#estados option:selected").text(), "/idaim/estado/" + $("#estados").val());

			if(data.key=="Estado") {
				$("#mapa .Estado").css("fill","#fff");
			} else {
				$("#mapa .Estado").css("fill","#00b1b0");
				$("#mapa #" + data.key).css("fill","#fff");
			}
		
			$("#name-estado").html($("#estados option:selected").text());
			$("#iprogresivo").html(data.indice.progresivo);
			$("#ibase").html(data.indice.base);
			
			chart(data.progresivo);
			chart2(data.base);
			
			$(".loading").hide();
		});
		
		return false;
	});
	
	$("#estados").change( function () { $(".button-seek").click(); });
	
	if($("#showes").val() == "0") {
		$("#results-estatal").hide();
		$("#indice-nacional .more").hide();
		$("#indice-estatal .close").hide();
	} else {
		$("#results-nacional").hide();
		$(".button-seek").click();
		$("#indice-nacional .close").hide();
		$("#indice-estatal .more").hide();
	}
});

var w = 650,
    h = 500,
    r = 500,
    x = d3.scale.linear().range([0, r]),
    y = d3.scale.linear().range([0, r]),
    node,
    root,
    json,
    vis,
    pack,
    nodes;
    
function chart(obj) {
	$("#chart").html("");
	
	json = JSON.parse(obj);
	pack = d3.layout.pack()
    .size([r, r])
    .value(function(d) { return d.size; })

	vis = d3.select("#chart").insert("svg:svg", "h2")
    .attr("width", w)
    .attr("height", h)
  .append("svg:g")
    .attr("transform", "translate(" + (w - r) / 2 + "," + (h - r) / 2 + ")");

  node  = root = json;
  nodes = pack.nodes(root);
  
  vis.selectAll("circle")
      .data(nodes)
    .enter().append("svg:circle")
      .attr("class", function(d) { return d.children ? "parent" : "child"; })
      .attr("cx", function(d) { return d.x; })
      .attr("cy", function(d) { return d.y; })
      .attr("r", function(d) { return d.r; })
      .on("click", function(d) { return zoom(node == d ? root : d); });

  vis.selectAll("text")
      .data(nodes)
    .enter().append("svg:text")
      .attr("class", function(d) { return d.children ? "parent" : "child"; })
      .attr("x", function(d) { return d.x; })
      .attr("y", function(d) { return d.y; })
      .attr("dy", ".25em")
      .attr("text-anchor", "middle")
      .attr("font-size", 10)
      .on("mouseover", function(d) { if(d.desc != undefined) { $(this).text(d.desc); } })
      .on("mouseout", function(d) { if(d.desc != undefined) { $(this).text(d.name); } })
      .style("opacity", function(d) { return d.r > 60 ? 1 : 0; })
      .text(function(d) { return d.name; });

  d3.select(window).on("click", function() { zoom(root); });
  $("#chart").slideDown("slow");
}

function zoom(d, i) {
  var k = r / d.r / 2;
  x.domain([d.x - d.r, d.x + d.r]);
  y.domain([d.y - d.r, d.y + d.r]);

  var t = vis.transition()
      .duration(d3.event.altKey ? 7500 : 750);

  t.selectAll("circle")
      .attr("cx", function(d) { return x(d.x); })
      .attr("cy", function(d) { return y(d.y); })
      .attr("r", function(d) { return k * d.r; });

  t.selectAll("text")
      .attr("x", function(d) { return x(d.x); })
      .attr("y", function(d) { return y(d.y); })
      .style("opacity", function(d) { return k * d.r > 20 ? 1 : 0; });

  node = d;
  d3.event.stopPropagation();
}


var w2 = 650,
    h2 = 500,
    r2 = 500,
    x2 = d3.scale.linear().range([0, r2]),
    y2 = d3.scale.linear().range([0, r2]),
    node2,
    root2,
    pack2,
    vis2,
    nodes2,
    json2;
    
function chart2(obj) {
	$("#chart2").html("");
	json2 = JSON.parse(obj);
	pack2 = d3.layout.pack()
    .size([r2, r2])
    .value(function(d2) { return d2.size; })

	vis2 = d3.select("#chart2").insert("svg:svg", "h2")
    .attr("width", w2)
    .attr("height", h2)
  .append("svg:g")
    .attr("transform", "translate(" + (w2 - r2) / 2 + "," + (h2 - r2) / 2 + ")");

  node2 = root2 = json2;

  nodes2 = pack2.nodes(root2);
  
  vis2.selectAll("circle")
      .data(nodes2)
    .enter().append("svg:circle")
      .attr("class", function(d2) { if(d2.clas != undefined) { return d2.children ? "parent " + d2.clas : "child " + d2.clas;   } else { return d2.children ? "parent" : "child"; } })
      .attr("cx", function(d2) { return d2.x; })
      .attr("cy", function(d2) { return d2.y; })
      .attr("r", function(d2) { return d2.r; })
      .on("click", function(d2) { return zoom2(node2 == d2 ? root2 : d2); });

  vis2.selectAll("text")
      .data(nodes2)
    .enter().append("svg:text")
      .attr("class", function(d2) { return d2.children ? "parent" : "child"; })
      .attr("x", function(d2) { return d2.x; })
      .attr("y", function(d2) { return d2.y; })
      .attr("dy", ".10em")
      .attr("text-anchor", "middle")
      .attr("font-size", 12)
      .on("mouseover", function(d2) { 
			if(d2.desc != undefined) { 
				$(this).text(d2.desc);
			} 
	   })
      .on("mouseout", function(d2) { 
			if(d2.desc != undefined) { 
				$(this).text(d2.name);
			} 
	  })
      .style("opacity", function(d2) { return d2.r > 60 ? 1 : 0; })
      .text(function(d2) { return d2.name; });
		
  d3.select(window).on("click", function() { zoom2(root2); });
  $("#chart2").slideDown("slow");
}

function zoom2(d, i) {
  var k = r2 / d.r / 2;
  x2.domain([d.x - d.r, d.x + d.r]);
  y2.domain([d.y - d.r, d.y + d.r]);
 
 
  var t = vis2.transition()
      .duration(d3.event.altKey ? 7500 : 750);

  t.selectAll("circle")
      .attr("cx", function(d) { return x2(d.x); })
      .attr("cy", function(d) { return y2(d.y); })
      .attr("r", function(d) { return k * d.r; });

	
  t.selectAll("text")
      .attr("x", function(d) { return x2(d.x); })
      .attr("y", function(d) { return y2(d.y); })
      .style("opacity", function(d) { 
			if(k * d.r > 60) {
				return 1;
			} else {
				if(k * d.r > 32) {
					if(d.desc == undefined) {
						return 0;
					} else {
						if(d.size > 6000) {
							return 0;
						}
						console.log(d);
						return 1;
					}
				} else {
					return 0;
				}
			}
	  });
	
  node2 = d;
  d3.event.stopPropagation();
}
