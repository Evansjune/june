<?php
session_start();
session_regenerate_id();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['email']))
    {
        header('Location:login.php?result=login');

}
	$email = $_SESSION['email'];
    $uid = $_SESSION['user_id'];
    

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
        if ($_GET['result']==='deleted'){
	        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	              <strong>Record deleted successfully.</strong>
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>';
        }	
        if ($_GET['result']==='not_deleted'){
	        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	              <strong>Record not deleted.</strong>
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>';
        }	
        if ($_GET['result']==='updated'){
	        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	              <strong>Project updated successfully.</strong>
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>';
        }	
    }
?>
<!-- Button trigger modal -->
<div class="container">
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 20px; position: relative; top: 20px;">
  Add project
</button>
<p style="float: right;"><?php echo $email;?></p>
<a href="logout.php">
	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" style="position: relative; left: 1050px; margin-bottom: 30px; margin-top: 10px; top: 20px;">
	  Logout
	</button>
</a>
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
		        <div class="form-group">
		         	<label for="description">Description</label>
		         	<textarea type="text" name="description" placeholder ="Description" class="au-input au-input--full"></textarea>
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
				<th>Description</th>
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
				                    			$description = $row['Description'];
				                    			$date = $row['created_at'];
				                    			$id =  $row['id'];

        ?>
			<tr>
				<td><?php echo $project_name;?></td>
				<td><?php echo $description;?></td>
				<td><?php echo $date;?></td>
				<td>
					<a style="padding-left: 20px;" href="functions.php?id=<?php echo $id;?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                   		<i class="fas fa-remove fa-1x"></i>
                    </a>
                    <a style="padding-left: 40px;" href="update.php?update=<?php echo $id;?>" class="item" title="Edit">
                   		<i class="zmdi zmdi-edit"></i>
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
				


        	
					
							
						
					
			
            <!-- <form action="" method="post">
                    <div class="form-group">
			         	<label for="updateproject">Update project</label>
			         	<input type="text" name="projects" value="<?php  $pn;?>" class="au-input au-input--full form-control">
			        </div>						        
                    <input type="submit" name="proj" class="au-btn au-btn--green m-b-20" value="Update">
            </form> -->
            
        
    		
		
			
       


<?php include('footer.php');?>
