<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();

 if (login_check($mysqli) == false) {
        header('Location: login.php');
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
			$('#memberEmailTable tbody').on( 'click', 'tr', function () {
				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
									
				}
				else {
					mTable.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
						var email = $(this).find('td:nth-child(2)').text()
					alert(email);
					window.location.href = "./addInsertDelete.php?email=" + encodeURI(email);
					/*$.ajax({
						type: "POST",
						url: "addInsertDelete.php",
						data: {email: email},					
						success: function (){
								alert("Record was delated");
						}
					});*/
				}

			});
			
			$('#deleteEmail').click( function () {
				mTable.row('.selected').remove().draw( false );
			} );
			
			
		})
		
		
						
		
			
			
	</script>
	
	
  </head>
  
  
  
  
  <body>
    <nav class="navbar navbar-inverse sidebar" role="navigation">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Homepage<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
						<li ><a href="UserSubmit.html">User Submission<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="AdminToolsPage.php">Administration Tools<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="CutPage.html">Cut Results<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="EditAccount.html">Edit Account<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
						<li ><a href="LicensePage.html">License Page<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
						<li ><a href="demographics.html">Demographics<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li ><a href="includes/logout.php">Log Out<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
					</ul>
				</div>
			</div>
		</nav>
    <div class="container">
	
		    <button type="button">Promote user</button>
            <button type="button">Demote user</button>
            <button type="button" id="deleteEmail">Delete account</button>
			
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
															echo '<tr class= "'.$username.'"><td>'.$username.'</td><td class="email">'.$email.'</td><td>'.$admin.'</td></tr>';
															}
													$sql->close();
												}
										?>
									</tbody>
							</table>
							
						</div>
			</div>
	
	
     <!--<div id="maintabs">
        <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
          <li class="active"> <a href="#addDeletePhage" data-="" toggle= "tab">Add/Delete Phage</a> </li>
          <li> <a href="#reviewUserSubmission" data-toggle="tab">Review User Submission</a></li>
          <li> <a href="#acctManage" data-toggle="tab">Account Management</a></li>
        </ul>
        <div id="mytabs" class="tab-content">
         <div id="addDeletePhage" class="tab-pane active">
            <h3>
              Description
            </h3>
            <p>
              This tab adds for the direct adding or deleting of enzymes and
              phages to/from the database.
            </p>
            <h3>
              Add Phages and Enzymes
            </h3>
			
            <div class="form-inline">
              <label for="phageselection">Phage:</label>
              <input type="text" class="form-control" placeholder="Enter Phage"/> 
			  <label for="clusterselection">Cluster:</label> 
			  <input type="text" class="form-control" placeholder="Enter Cluster"/> 
			  <label for="subclustselection">SubCluster:</label> 
			  <input type="text" class="form-control" placeholder="Enter SubCluster"/>
            </div>
			
            <div class="form-inline">
              <label for="enzymeEntry">Enzyme:</label> 
			  <input type="text" class="form-control" placeholder="Enter Enzyme"/>
            </div>
			
            <div>
              <p>
			  <button type="button">Add Phage/Enzyme!</button>
			  <button type="button">Import file!</button>
              </p>
            </div>
            
			<h2>
              Line Divide Here
            </h2>
            
			<h3>
              Delete Phage or Enzyme
            </h3>
			
				<button type="button">Delete!</button>
            <form class="form-horizontal inline-block">
              <div class="form-group pull-left">
                <label for="phageSelection" name="phage">Phage</label> 
				<input type="text" class="form-control" placeholder="Select Phage"/> 
                <textarea class="form- control" id="phageSelection" rows="10"></textarea>
              </div>
			  
              <div class="form-group pull- right">
                <label for="enzselection">Enzyme</label>
                <input type="text" class="form-control" placeholder="Select Enzyme" /> 
                <textarea class="form- control" id="enzselection" rows="10"></textarea>
              </div>
            </form>
			
          </div>
		  
          <div id="reviewUserSubmission" class="tab-pane">
            <h3>
              Review User Submission
            </h3>
            <p>
              This tab allows for admins to monitor user submitted
              phages.
            </p>
			<button type="button">Accept submission</button>
            <button type="button">Decline submission</button>
            <div class="userSubTable">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      Phage
                    </th>
                    <th>
                      Cluster
                    </th>
                    <th>
                      Subcluster
                    </th>
                    <th>
                      Cut Range and Enzyme
                    </th>
                  </tr>
                </thead>
             </table>
            </div>
          </div>
          
		  <div id="acctManage" class="tab-pane">
            <h3>
              Account Management
            </h3>
            <p>
              This tab allows for the management of user accounts.
            </p>
			<button type="button">Promote user</button>
            <button type="button">Demote user</button>
            <button type="button" id="deleteEmail">Delete account</button>
           <div class="row">
						<div class="col-md-12">
							<table class="table-responsive">
								<table class="table table-bordered" id="memberEmailTable">
									<thead>
										<th>Username</th>
										<th>Email</th>
										<th>Admin</th>
									</thead>
									<tbody>
									
									</tbody>
								</table>
							</table>
						</div>
			</div>
          </div>
        </div>
      </div>-->
    </div>
  </body>
</html>