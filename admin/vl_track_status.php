<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">
					<div class = "col-md-3">
						<h1>Vacation Leave</h1>
					</div>
				</div>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php
						//this codes is that all the approve will go to the approve submenu
						$sql = "SELECT * FROM employee, vacation_log, department, approve_hr, program_head, vp_oper, executive
									WHERE employee.emp_id = vacation_log.emp_id AND employee.id_dept = department.id_dept 
									AND approve_hr.hr_approve = vacation_log.hr_approve
									AND program_head.prog_head = vacation_log.prog_head 
									AND vp_oper.vp_operation = vacation_log.vp_operation
									AND executive.exe_vp = vacation_log.exe_vp 
									AND executive.exe_vp = '1' AND employee.stat='1' 
									AND vacation_log.v_id = '$_GET[id]'";
						$qry=mysql_query($sql);
					?>
						<table class='table table-hover'>
									<thead>
										<tr>
											<th>ID</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>HR Status</th>
											<th>Head Status</th>
											<th>Operation Status</th>
											<th>Executive Status</th>
										</tr>
									</thead>
					<?php
						while($rec=mysql_fetch_array($qry))
						{
					?>
					<tbody>
						<tr>
								<td>
									<?php echo $rec['id_emp']; ?>
								</td>
								<td>
									<?php echo $rec['emp_fname']; ?>
								</td>
								<td>
									<?php echo $rec['emp_lname']; ?>
								</td>
								
								<td>
									<?php echo $rec['name_stat']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_prog']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_oper']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_exe']; ?>
								</td>
							</tr>
					</tbody>
				<?php
					}
					echo"</table>";
				?>
				</div>
			</div>
		</div>
	</div>
</div>
			<div class="col-md-4">
					<a href="vl_leave_track.php"><input type = "button" value="Back" class="btn btn-default"/></a>
			</div>
	</div>
	<?php include('footer.php');?>
	