<?php
	include("header.php");
?>
	<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo" style="background-color: #000">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="Joadah" width="50%">
                            </a>
                        </div>
                        <div class="login-form">
                            <!-- <?php
                                include('message.php');
                            ?> -->
                        <?php
                        if(isset($_GET['result'])){
                            if ($_GET['result']==='success'){
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <strong>successfully registered.continue to login.</strong>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>';
                            }
                            if ($_GET['result']==='failure'){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <strong>Not loged in. please try again.</strong>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>';
                            }
                            if ($_GET['result']==='login'){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <strong>please login.</strong>
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>';
                            }
                        }
                        ?>

                            <form action="functions.php" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <input  name="login_me" class="au-btn au-btn--block au-btn--green m-b-20" type="submit" Value='sign in'/>
                                
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't have an account?
                                    <a href="register.php">Sign Up Here</a>
                                </p>
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
