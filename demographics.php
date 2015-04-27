<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) {
        header('Location: login.php');
        die();
}
demoToCSV($mysqli);
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>User Demographics</title>


		<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/crossfilter/1.3.11/crossfilter.js" charset="utf-8"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/dc/1.7.3/dc.js" charset= "utf-8"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" charset= "utf-8"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dc/1.7.3/dc.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

		</head>
		<body>
			
		<nav class="navbar navbar-inverse sidebar" role="navigation">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Homepage<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
						<!--<li ><a href="UserSubmit.html">User Submission<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>-->
						<?php
							 if (admin_check($mysqli) == true) {
								echo '<li ><a href="AdminToolsPage.php">Administration Tools<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>';
							}
						?>
						<li ><a href="EditAccount.php">Edit Account<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
						<li ><a href="LicensePage.php">License Page<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
							<li ><a href="demographics.php">Demographics<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li ><a href="includes/logout.php">Log Out<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
					</ul>
				</div>
			</nav>
	<script>
	d3.csv("data/Demo.csv", function (demo) {
	var pieChart = dc.pieChart("#dc-pie-graph");
	var univChart = dc.pieChart("#dc-Univ-graph");
	var dataTable = dc.dataTable("#dc-table-graph");
	var cfx = crossfilter(demo);
		var startValue = cfx.dimension(function (d) {
			return d.State});
		var startValueGroup = startValue.group();
		var startValueU = cfx.dimension(function (d) {
			return d.University});
		var startValueGroupU = startValueU.group();

		var tDimension = cfx.dimension(function (d) { return d} );
	   pieChart.width(400)
			.height(400)
			.transitionDuration(1500)
			.dimension(startValue)
			.group(startValueGroup)
			.radius(150)
			.label(function(d) { return d.data.key; })
			.legend(dc.legend().x(400).y(10).itemHeight(13).gap(5))
	   univChart.width(400)
			.height(400)
			.transitionDuration(1500)
			.dimension(startValueU)
			.group(startValueGroupU)
			.radius(150)
			.label(function(d) { return d.data.key; })
			.legend(dc.legend().x(400).y(10).itemHeight(13).gap(5))
		dataTable.width(800)
		.height(800)
		.dimension(tDimension)
		.group(function(d) { return d;})
		.size(150)
		.columns([
			function(d) { return d.ID; },
			function(d) { return d.University; },
			function(d) { return d.State; }
		]);

		
		dc.renderAll();})
			</script>
	<body>
	<p> Instructions: Click sections of either graph to sort the data in more detail or to narrow down the returned data. If labels are not displaying or you wish to see the total users per state/university, hover the mouse over the color until a popup appears with the data along with a total appears.(EX: MN:6) The data table provides more detailed information for individual members of the selected groups.
	<div class="container-fluid">
	  <div class='row-fluid'>
								<div class='pie-graph span4' id='dc-pie-graph'>
									<h4>Division by State(Pie)</h4>
								</div>
							   <div class='row-fluid'>
										<div class='pie-graph span4 col-md-5' id='dc-Univ-graph'>
										<h4>Division by University(Pie)</h4>
										</div>
									</div>
									   <div class='row-fluid'>
									<div class='span12 table-graph col-md-5'>
										<h4>Data Table for User info (Sorted by ID)</h4>
										<table class='table table-hover dc-data-table' id='dc-table-graph'>
											<thead>
												<tr class='header'>
													<th>User ID </th>
													<th>University</th>
													<th> State </th>
												</tr>
											</thead>
										</table>
									</div>
							</div>
			</div>
		</div>
	</div>
</body>
</html>