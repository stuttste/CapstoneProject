<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) {
        header('Location: login.php');
        die();
} elseif (admin_check($mysqli) == false) {
		header('Location: index.php');
        die();
}
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
	
	<!--<link rel="stylesheet" type="text/css" 

href="bootstrap-3.3.2-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" 

href="css/global.css">
        <script rel = "Code" type="javascript" 

href="bootstrap-3.3.2-

dist/js/bootstrap.min.js"></script>
        <script rel = "Code" type="javascript" 

href="jQuery/jquery-1.11.2.min.js"></script>
        -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.5/css/jquery.dataTables.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
	
	<script type="text/javascript" class="init">
		$(document).ready(function() {
			var mTable = $('#memberEmailTable').DataTable({
			"scrollX": true
			})
			
			var showTable = $('#manualTable').DataTable({
				"scrollX": true
			})
			
				
			$('#memberEmailTable tbody').on( 'click', 'tr', function () {
				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
									
				}
				else {
					mTable.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
					var email = $(this).find('td:nth-child(2)').text()
								
					$.ajax({
						type: "POST",
						url: "deleteUsers.php",
						datatype: 'json',
						data: {email: email},					
						success: function (){
								alert("Record was deleted");
						}
					});
					
				$('#deleteEmail').click( function () {
				mTable.row('.selected').remove().draw( false );
				});
				}

			});
			
			
			
		})
		
		
						
		
			
			
	</script>
	
	
  </head>
  
  
  
  
  <body>
    <nav class="navbar navbar-inverse sidebar" role="navigation">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Homepage<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
						<li ><a href="AdminToolsPage.php">Administration Tools<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="EditAccount.php">Edit Account<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
						<li ><a href="LicensePage.php">License Page<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="demographics.php">Demographics<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li ><a href="includes/logout.php">Log Out<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
   
    <div class="container">
	
		   
		
	
		<div id="maintabs">
			<ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
				<li class="active"> <a href="#addDeletePhage" data-toggle= "tab">Add/Delete Phage</a> </li>
				<li> <a href="#acctManage" data-toggle="tab">Account Management</a></li>
			</ul>
		
        <div id="mytabs" class="tab-content">
		
			<div id="addDeletePhage" class="tab-pane active">
				<h3>
					Description
				</h3>
				<p>
					This tab is for the manual adding or deleting of enzymes to/from the database.
				</p>
				<h3>
					Add Phages and Enzymes
				</h3>
			
		 
		<form action="insert.php" method="post">	
            <div class="form-inline">
              <label for="phageselection">Phage:</label>
              <input type="text" class="form-control" name="pChoice" id="pChoice" placeholder="Enter Phage"/> 
			
			  <label for="clusterselection">Cluster:</label> 
			  <input type="text" class="form-control" name="cChoice" id="cChoice" placeholder="Enter Cluster"/> 
			
			  <label for="subclustselection">SubCluster:</label> 
			  <input type="text" class="form-control" name="sChoice" id="sChoice" placeholder="Enter SubCluster"/>
           
			  <label for="enzymeEntry">Enzyme:</label> 
			  <input type="text" class="form-control" name="eChoice" id="eChoice" placeholder="Enter Enzyme"/>
          			
           	  <input type="submit" id="submitData" name="submitData" value="Submit"/>
			</div>
        </form>
		
		
		
			
            
			<h3>
              Delete Enzyme
            </h3>
			
			
				<div class="row">
					<form  name="deleteEnzyme" action = "deleteEnzyme.php" method="post">
							<div class="col-md-3">
								<div class="form-group">
										<label for="enzselection">Enzyme:</label>
										<input type="submit" id="enzymeDelete" name="enzymeDelete" value="Delete Enzyme"/>
										<select multiple class="form-control" id="enzselection" name="enzselection" rows="10">
											<?php
												if ($sql = $mysqli->prepare("SELECT `Enzyme` FROM `Admin_Phage`")) {
													$sql->execute();
													$sql->bind_result($enzyme);
													while($sql->fetch()){
															echo "<option>".$enzyme."</option>";
													}
													$sql->close();
												}
											?>
										</select>
											 									
								</div>
							</div>
						</form>
				</div>
				 <div class="row">
						<div class="col-md-12">
							<table class="table table-bordered table-responsive" id="manualTable">
									<thead>
										<th>Phage</th>
										<th>Cluster</th>
										<th>SubCluster</th>
										<th>Enzyme</th>
									</thead>
									<tbody>
										<?php
											if($sql = $mysqli->prepare("SELECT `Phage`, `Cluster`, `SubCluster`, `Enzyme` FROM `Admin_Phage`")){													
												$sql->execute();
													$sql->bind_result($phage, $cluster, $subcluster, $enzyme);
													while($sql->fetch()){
															echo '<tr class= "'.$phage.'"><td>'.$phage.'</td><td class="email">'.$cluster.'</td><td>'.$subcluster.'</td><td>'.$enzyme.'</td></tr>';
															
													}															
												}
													$sql->close();
												
										?>
									</tbody>
							</table>
							
						</div>
			</div>
			</div>
			
      	<div id="acctManage" class="tab-pane">
		  
            <h3>
              Account Management
            </h3>
			
			<div>
            <button type="button" id="deleteEmail">Delete account</button>
			</div>
			
            <div class="row">
						<div class="col-md-12">
							<table class="table table-bordered table-responsive" id="memberEmailTable">
									<thead>
										<th>Username</th>
										<th>Email</th>
										<th>Admin</th>
									</thead>
									<tbody>
										<?php
											if($sql = $mysqli->prepare("SELECT `Username`, `Email`, `Admin` FROM `MEMBERS`")){													
												$sql->execute();
													$sql->bind_result($username, $email, $admin);
													while($sql->fetch()){
															echo '<tr class= "'.$username.'"><td>'.$username.'</td><td class="email">'.$email.'</td><td>'.($admin == 0 ? "No" : "Yes").'</td></tr>';
															
													}															
												}
													$sql->close();
												
										?>
									</tbody>
							</table>
							
						</div>
			</div>
	
        </div>
		
        </div>
    </div>
    </div>
  </body>
</html>