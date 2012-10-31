$(document).ready( function() {
	
	$(".button-seek").click( function() {
		
		$.ajax({
			url: "get/" + $("#estados").val()
		}).done(function(response) {
			console.log(response);
			chart(response);
		});
		
		return false;
	});
	
	$("#results-estatal").hide();
	$("#indice-nacional .more").hide();
	$("#indice-estatal .close").hide();
	
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
});

var w = 550,
    h = 450,
    r = 450,
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
	console.log(json);


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
      .attr("dy", ".35em")
      .attr("text-anchor", "middle")
      .style("opacity", function(d) { return d.r > 60 ? 1 : 0; })
      .text(function(d) { return d.name; });

  d3.select(window).on("click", function() { zoom(root); });
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
      .style("opacity", function(d) { return k * d.r > 60 ? 1 : 0; });

  node = d;
  d3.event.stopPropagation();
}
