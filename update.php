<?php include('header.php');?>
<div class="container" style="padding-top: 20px;">
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#example">
	  Update project
	</button>
</div>

<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<?php
include('dbcon.php');
	if(isset($_GET['update'])){
		$id = $_GET['update'];
		$select = "select * from project where id='$id'";
		$result = $conn->query($select);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$pn = $row['project_name'];
			$pid = $row['id'];
?>
	<form action="" method="post">
        <div class="form-group">
         	<label for="updateproject">Update project</label>
         	<input type="text" name="projects" value="<?php echo $pn;?>" class="au-input au-input--full form-control">
        </div>						        
        <input type="submit" name="proj" class="au-btn au-btn--green m-b-20" value="Update">
    </form>
    <?php
				if(isset($_POST['proj'])){
					$project = strip_tags($_POST['projects']);
					$update = "update project set project_name='$project' where id='$pid'";
					$result = $conn->query($update);
					if(mysqli_affected_rows($conn) > 0){
						header('Location:index.php?result=updated');
					}
				}
		}
	}
	?>
	 </div>
      </div>
    </div>
  </div>
</div>
	<?php
		$conn->close();
	?>

<?php include('footer.php');?>