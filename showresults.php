<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include('config.php');
include('session.php');
 
 $selectedOption = $_POST['choice'];
 $selectedPoll = $_POST['pollname'];
 $idNum = $_POST['id'];
 
$sql = 'UPDATE polloptions SET total = total + 1 WHERE optionname = "' . $selectedOption . '" AND pollname = "' . $selectedPoll . '"';
mysqli_query($conn, $sql) or die('Error, insert query failed. This is it:' . $sql);  

	
	mysqli_close($conn);

?>
<html>
<head>
<title><?php echo $selectedPoll ?> Poll Results</title>
<?php include('cssfiles.php'); ?>
<?php include('jsfiles.php');?>
</head>
<body>
<?php include('nav.php');?>
<div class="container-fluid">
<div class="page-title"><h1>Your Results for <?php echo $selectedPoll ?></h1></div>
<div class="poll-results"></div>
<script>
// set the dimensions of the canvas
var margin = {top: 20, right: 20, bottom: 70, left: 40},
    width = 600 - margin.left - margin.right,
    height = 300 - margin.top - margin.bottom;


// set the ranges
var x = d3.scale.ordinal().rangeRoundBands([0, width], .05);

var y = d3.scale.linear().range([height, 0]);

// define the axis
var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom")


var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .ticks(10);

var tip = d3.tip()
  .attr('class', 'd3-tip')
  .offset([-10, 0])
  .html(function(d) {
    return "Total:<br>" + d.TotalNum + "";
  })

// add the SVG element
var svg = d3.select(".poll-results").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", 
          "translate(" + margin.left + "," + margin.top + ")");
svg.call(tip);
// load the data
d3.json(<?php echo '"api.php?id='.$idNum.'"'?>, function(error, data) {

    data.forEach(function(d) {
        d.Option = d.optionname;
        d.TotalNum = +d.total;
    });
	
  // scale the range of the data
  x.domain(data.map(function(d) { return d.Option; }));
  y.domain([0, d3.max(data, function(d) { return d.TotalNum; })]);

  // add axis
  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
    .selectAll("text")
      .style("text-anchor", "middle")
      .attr("dx", "0em")
      .attr("dy", "1em")
      .attr("transform", "rotate(0)" );

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 5)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("Total");


  // Add bar chart
  svg.selectAll("bar")
      .data(data)
    .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return x(d.Option); })
      .attr("width", x.rangeBand())
      .attr("y", function(d) { return y(d.TotalNum); })
      .attr("height", function(d) { return height - y(d.TotalNum); })
	  .on('mouseover', tip.show)
      .on('mouseout', tip.hide);
	  

});
</script>
</body>
</html>