
<?php
	include("header.php");
?>
	<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo" style="background-color: #000;">
                            <a href="#">
                                <img src="images/icon/logo.png" width="50%" alt="Joadah">
                            </a>
                        </div>
                        <?php
                            if(isset($_GET['result'])){
                                if ($_GET['result']==='failure'){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <strong>User doesnot exist, Try again or <a href="register.php">Signup</a></strong>
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>';
                                }
                                if ($_GET['result']==='password_match'){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <strong>Passwords do not match.</strong> 
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>';
                                }
    
                            }
                        ?>
                        <div class="login-form">
                            <form action="functions.php" method="post">
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username" pattern=".{6,}" title=" Name too short" required>
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Emailaddress" pattern=".{6,}" title=" email too short" required>
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input class="au-input au-input--full" type="password" name="password2" placeholder="Confirm Password" required>
                                </div>

                                <input type="submit" name="register" class="au-btn au-btn--block au-btn--green m-b-20" value="Register">
                                
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have an account?
                                    <a href="login.php">Sign In</a>
                                </p>

                            </div>
                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>


<?php
	include("footer.php");
?>