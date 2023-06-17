<?php
/* Attempt to connect to MySQL database */
include_once 'includes/config.php';

$res = false;
if (isset($_POST) && !empty($_POST)) {
    // Get Image Dimension
    
    $allowed_image_extension = array(
        "image/png",
        "image/jpg",
        "image/jpeg"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    
    $file_content_type =  $_FILES["file"]["type"];
	// Validate file input to check if is with valid extension
     if (!in_array($file_content_type, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            "message" => "Only Image Files Allowed."
        );
        //var_dump($response);
    }    // Validate image file size
    
    else {
        $target = "upload/" . $_FILES["file"]["name"];
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)) {
            $response = array(
                "type" => "success",
                "message" => "Form Submitted Successfully."
            );
            $res = true;
        } else {
            $response = array(
                "type" => "error",
                "message" => "Something Went Wrong!"
            );
        }
    }
    //print_r($response);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Contact Us | SBVA</title>
        <?php include_once('includes/scripts.php'); ?>
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
                            <h2 class="pull-left"><font color="#5cb85c">Contact US</font></h2>
                        </div>
                         <?php if (isset($response) && !empty($response)) {
    
    if($res){
        echo "<h4 style='background-color: green; color:#fff;'>".$response['message']."</h4>";
    }else{
        echo "<h4 style='background-color: red; color:#fff;'>".$response['message']."</h4>";
    }
                                                                           
                                                    
                        } ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label><font color="#5cb85c">Name</font></label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label><font color="#5cb85c">Email</font></label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group ">
                                <label><font color="#5cb85c">Message</font></label>
                                <textarea type="text" name="message" class="form-control"></textarea>
                            </div>
                            <div class="form-group ">
                                <label><font color="#5cb85c">Image Attachment</font></label>
                                <br>
                                <div class="upload-btn-wrapper">
                                  <button class="btn1">Upload a file</button>
                                  <input  name="file" type="file" class="form-control" required/>
                                </div>
                                
                            
                            </div>
                            
                            

                            <input type="submit" class="btn btn-primary" value="Save">
                            <a href="index.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </body>
</html>
