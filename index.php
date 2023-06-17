<?php
/* Attempt to connect to MySQL database */
include_once 'includes/config.php';

// Delete Function
if (isset($_GET["d_id"])) {
    $sql = "DELETE FROM reviews ";
    if ($_GET["d_id"] > "0") {
        $sql .= " WHERE id = '" . $_GET['d_id'] . "'";
    }
    mysqli_query($con, $sql);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Our Reviews | SBVA</title>
        <?php include_once 'includes/scripts.php'; ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $('#example').DataTable();
            });
        </script>
        
    </head>
    <body>
    <?php include_once('includes/navbar.php'); ?>
        <div class="wrapper" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 body-content" >
                        <div class="page-header clearfix">

                            <h2 class="pull-left"><b><font color="red">Thanks For Using SBVA</font></b></h2>
                            <a href="create.php" class="btn btn-success pull-right">Rate Us</a>
                        </div>
                        <?php
                        // Attempt select query execution
                        $sql = "SELECT * FROM reviews";
                        if (isset($_GET["r_id"]) && !empty($_GET["r_id"])) {
                            $sql .= " where id=" . $_GET['r_id'];
                        }

                        if ($result = mysqli_query($con, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo '<table id="example" class="table table-striped table-bordered" style="width:100%">';
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Action</th>";
                                echo "<th>Name</th>";
                                echo "<th>Review</th>";
                                echo "<th>Country</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr class=''>";
                                    echo "<td><a href='index.php?r_id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'>" . $row['id'] . "</a></td>";
                                    echo "<td>";
                                    echo "<a href='index.php?d_id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'> Delete</a>";
                                    echo "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['review'] . "</td>";
                                    echo "<td>" . $row['country'] . "</td>";

                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else {
                                echo "<p style='color:white;font-size:21px'>No records were found.</p>";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                        }

                        // Close connection
                        mysqli_close($con);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </body>
</html>
