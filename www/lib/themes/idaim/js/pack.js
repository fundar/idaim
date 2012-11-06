var obj3  = '{"name": "","children": [{"name": "Disposiciones Normativas","children": [{"name": "Positivación del DAI","children": [{"name": "1.-", "size": 10000},{"name": "2.-", "size": 9000},{"name": "3.-", "size": 8000},{"name": "4.-", "size": 7000},{"name": "5.-", "size": 6000}]},{"name": "Información restringida","children": [{"name": "6.-", "size": 10000},{"name": "7.-", "size": 9000},{"name": "8.-", "size": 8000}]},{"name": "Sanciones al incumplimiento de la ley","children": [{"name": "9.-", "size": 10000},{"name": "10.-", "size": 10000}]}]},{"name": "Diseño institucional","children": [{"name": "Instituciones internas de acceso a la información","children": [{"name": "11.-", "size": 10000},{"name": "12.-", "size": 9000},{"name": "13.-", "size": 8000},{"name": "14.-", "size": 7000}]},{"name": "Promoción del DAI","children": [{"name": "15.-", "size": 10000},{"name": "16.-", "size": 9000},{"name": "17.-", "size": 8000}]},{"name": "Órganos garantes","children": [{"name": "18.-", "size": 10000},{"name": "19.-", "size": 9000},{"name": "20.-", "size": 8000}]}]},{"name": "Procedimientos","children": [{"name": "Procedimientos de acceso a la información","children": [{"name": "21.-", "size": 10000},{"name": "22.-", "size": 9000},{"name": "23.-", "size": 8000},{"name": "24.-", "size": 7000}]},{"name": "Procedimientos de revisión","children": [{"name": "25.-", "size": 10000},{"name": "26.-", "size": 9000},{"name": "27.-", "size": 8000}]},{"name": "Difusión proactiva de información pública","children": [{"name": "28.-", "size": 10000},{"name": "29.-", "size": 9000},{"name": "30.-", "size": 8000}]}]}]}';
var json3 = JSON.parse(obj3);

var w3 = 450,
    h3 = 450,
    r3 = 450,
    x3 = d3.scale.linear().range([0, r3]),
    y3 = d3.scale.linear().range([0, r3]),
    node3,
    root3;

var pack3 = d3.layout.pack()
    .size([r, r])
    .value(function(d) { return d.size; })

var vis3 = d3.select("#nchart").insert("svg:svg", "h2")
    .attr("width", w3)
    .attr("height", h3)
  .append("svg:g")
    .attr("transform", "translate(" + (w3 - r3) / 2 + "," + (h3 - r3) / 2 + ")");

  
  node3 = root3 = json3;

  var nodes3 = pack3.nodes(root3);
  
  vis3.selectAll("circle")
      .data(nodes3)
    .enter().append("svg:circle")
      .attr("class", function(d) { return d.children ? "parent" : "child"; })
      .attr("cx", function(d) { return d.x; })
      .attr("cy", function(d) { return d.y; })
      .attr("r", function(d) { return d.r; })
      .on("click", function(d) { return zoom3(node3 == d ? root3 : d); });

  vis3.selectAll("text")
      .data(nodes3)
    .enter().append("svg:text")
      .attr("class", function(d) { return d.children ? "parent" : "child"; })
      .attr("x", function(d) { return d.x; })
      .attr("y", function(d) { return d.y; })
      .attr("dy", ".35em")
      .attr("text-anchor", "middle")
      .style("opacity", function(d) { return d.r > 60 ? 1 : 0; })
      .text(function(d) { return d.name; });

  d3.select(window).on("click", function() { zoom3(root3); });


function zoom3(d, i) {
  var k = r / d.r / 2;
  x3.domain([d.x - d.r, d.x + d.r]);
  y3.domain([d.y - d.r, d.y + d.r]);

  var t = vis3.transition()
      .duration(d3.event.altKey ? 7500 : 750);

  t.selectAll("circle")
      .attr("cx", function(d) { return x3(d.x); })
      .attr("cy", function(d) { return y3(d.y); })
      .attr("r", function(d) { return k * d.r; });

  t.selectAll("text")
      .attr("x", function(d) { return x3(d.x); })
      .attr("y", function(d) { return y3(d.y); })
      .style("opacity", function(d) { return k * d.r > 60 ? 1 : 0; });

  node3 = d;
  d3.event.stopPropagation();
}
