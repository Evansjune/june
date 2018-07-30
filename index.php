<?php
session_start();
session_regenerate_id();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['email']))
    {
        header('Location:login.php?result=login');
}
 include('header.php');
 include('dbcon.php');
 ?>
<div class="container">
<?php

	if (isset($_GET['result'])){
	    if ($_GET['result']==='success'){
	        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	              <strong>Welcome to add your project.</strong>
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>';
        }	
    }
?>
<!-- Button trigger modal -->
<div class="container">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Add project
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="project-form">
            <form action="functions.php" method="post">
                <div class="form-group">
		         	<label for="department">Project Name</label>
		         	<input type="text" name="project" placeholder ="Project Name" class="au-input au-input--full">
		        </div>						        
                <input type="submit" name="submit" class="au-btn au-btn--green m-b-20" value="Add project">
            </form>

        </div>
      </div>
    </div>
  </div>
</div>
    
	<table class="table table-striped table-sm table-bordered">
		<thead>
			<tr>
				<th>Project Name</th>
				<th>Date Created</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

		<?php
                                    
				                    	$select = "select * from project order by id DESC";
				                    	$project = $conn->query($select);
				                    	if ($project->num_rows > 0) {
				                    		while($row=$project->fetch_assoc()){
				                    			$project_name = $row['project_name'];
				                    			$date = $row['created_at'];
				                    			$id =  $row['id'];

        ?>
			<tr>
				<td><?php echo $project_name;?></td>
				<td><?php echo $date;?></td>
				<td>
					<a href="operations.php?userid=<?php echo $userid;?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                   		<i class="fas fa-remove fa-1x"></i>
                    </a>
                    <a href="operations.php?userid=<?php echo $userid;?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                   		<i class="fas fa-remove fa-1x"></i>
                    </a>
				</td>
			</tr>
									<?php
											}
										}
										$conn->close();
									?>
		</tbody>
	</table>
</div>


<?php include('footer.php');?>
