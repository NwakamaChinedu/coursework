<?php
readfile('headerLogout.php');
include_once 'assets/sql/connect.php';
include_once 'assets/sessions.php';

if(isset($_POST['readBTN'])){
    header("location: admin.php");
}



$query = "SELECT * FROM allstories";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

if(isset($_POST['updateeBTN'])){
    header("location: createAdmin.php");
}

// calculating the total number of stories in the database
// Prepare the SQL query
$stmt = $conn->prepare('SELECT COUNT(*) FROM allstories');
// Execute the query
$stmt->execute();
// Fetch the result
$total_stories = $stmt->fetchColumn();


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div>
            <a href="createAdmin.php" class="btn btn-warning"  role="button" name="updateeBTN">Create An Admin User</a>
        </div>
        <div class="container mt-3">
                <div class="col-md-12">
                    <h3 
                        class="text-center text-uppercase">Welcome <?php 
                        if(isset($_SESSION['username'])) echo $_SESSION['username'];
                        
                        ?>
                    </h3>
                    <img src="assets/images/xl2.jpeg" class="rounded-circle img-thumbnail" width="400" height="345" alt="Cinque Terre">
                </div>
                <h2 class="text-center text-uppercase"> A Spool of all stories</h2>
                <div style="margin:auto;max-width:300px">
                <div class="container my-5">
                <form method="post">
                    <input type="text" id="search" placeholder="Search by location or category">
                </form>
                </div>
                </div>
                <div class="col-md-12">
                    <h3 class="text-center"></h3>
                </div>
                <div class="table-responsive">
                
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Restuarant Name</th>
                                <th>Category</th> 
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="admin-table-body">
                            
                        </tbody>
                    </table>
                    <div>
                    <h2>Total number of stories: <?php echo $total_stories; ?></h2>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="assets/adminscript.js"></script>
    </body>
    <?php
  //readfile('footer.php');
?>
</html>