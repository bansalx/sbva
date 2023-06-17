<?php
/* Attempt to connect to MySQL database */
include_once 'includes/config.php';

// Define variables and initialize with empty values
$name = $country = $review = "";
$name_err = $country_err = $review_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["name"]);

    // Validate country
    $input_country = trim($_POST["country"]);

    // Validate review
    $input_review = trim($_POST["review"]);

    // Prepare an insert statement
    $sql = "INSERT INTO reviews (name, review, country) VALUES ('" . $input_name . "', '" . $input_review . "', '" . $input_country . "')";
    mysqli_query($con, $sql);

    header("location: index.php");

    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Review | SBVA</title>
        <?php include_once('includes/scripts.php'); ?>
    </head>
    <body>
    <?php include_once('includes/navbar.php'); ?>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 body-content" >
                        <div class="page-header">
                            <h2><font color="#5cb85c">Create New</font></h2>
                        </div>
                        <p><font color="#5cb85c">Please fill this form and submit to add new record.</font></p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label><font color="#5cb85c">Name</font></label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            </div>
                            <div class="form-group <?php echo (!empty($review_err)) ? 'has-error' : ''; ?>">
                                <label><font color="#5cb85c">Review</font></label>
                                <textarea name="review" class="form-control"><?php echo $review; ?></textarea>
                            </div>
                            <div class="form-group <?php echo (!empty($country_err)) ? 'has-error' : ''; ?>">
                                <label><font color="#5cb85c">Country</font></label>
                                <select name="country" class="form-control">
                                    <option value="">Select Country</option>
                                    <option value="India">India</option>
                                    <option value="US">USA</option>
                                    <option value="UK">UK</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="index.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </body>
</html>