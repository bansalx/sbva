<?php
/* Attempt to connect to MySQL database */
include_once 'includes/config.php';
if (isset($_POST) && !empty($_POST)) {
    echo $sql = "select * from login  where username = '" . $_POST['username'] . "' and password = '" . $_POST['password'] . "'";
    $res = mysqli_query($con, $sql);
    $cnt = mysqli_num_rows($res);
    if ($cnt > 0) {
        $_SESSION['login'] = 'true';
        header("location: index.php");
    } else {
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login | SBVA</title>
        <?php include_once 'includes/scripts.php'; ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
    <?php include_once('includes/navbar.php'); ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 body-content" >
                        <div class="page-header clearfix">
                            <h2 class="pull-left"><font color="red"><b>Login Area</b></font></h2>
                        </div>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label><font color="white"><b>Username</b></font></label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label><font color="white"><b>Password</b></font></label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Login">
                            <a href="index.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </body>
</html>
