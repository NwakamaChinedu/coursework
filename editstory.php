<?php
readfile('headerLogout.php');
include_once 'assets/sql/connectMysqli.php';
 

$sid = "";
$rname = "";
$category = "";
$location = "";
$description = "";
//$image = "";

$errorMessage = "";
$successMessage = "";



if($_SERVER['REQUEST_METHOD'] == 'GET') {

    if(!isset($_GET['sid'])){
        header("location: loggedIn.php");
        exit;
    }
    
    $sid = $_GET['sid'];

    //read data from database

    $sql = "SELECT * FROM allstories where sid = $sid";
    $statement = $conn->query($sql);
    $row = $statement->fetch_assoc();

    if(!$row){
        header("location: index.php");
        exit;
    }
    $rname = $row['rname'];
    $category = $row['category'];
    $location = $row['location'];
    $description = $row['description'];
    //$target_file = $row['images'];
    
}
else{

    $sid = $_POST['sid'];
    $rname = $_POST['rname'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    //$target_file = $_POST['images'];
 
    do{
        if(empty($sid) || empty($rname) || empty($category) || empty($location) || empty($description)){
            $errorMessage = "All fields are required";
            break;
        }
       
            $insertform = "UPDATE stories_tb SET rname='$rname', category='$category', location='$location', description='$description', images='$target_file' WHERE sid= $sid";

            // Prepare statement
            $stmt = $conn->query($insertform);

        if(!$stmt){
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }
        $successMessage = "client updated correctly"
        break;
        
    }
    while(false);
}
        

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
    <form method="post" action="" enctype="multipart/form-data">
            <section class="vh-100 gradient-custom">
                <div class="container-lg py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-info text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Edit your Story</h2>

                            <input type="hidden" name="sid" value='<?php echo $sid; ?>'/>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="rname">Name of Restuarant</label>
                                <input type="text" id="typeEmailX" class="form-control form-control-lg" name="rname" value='<?php echo $rname; ?>'/>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="typePasswordX">Category</label>
                                <input type="text" id="typePasswordX" class="form-control form-control-lg" name="category" value='<?php echo $category; ?>'/>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="typePasswordX">Location</label>
                                <input type="text" id="typePasswordX" class="form-control form-control-lg" name="location" value='<?php echo $location; ?>'/>
                            </div>

                            <div>
                                <label for="story">My Story</label><br>
                                <textarea class="form-control" rows="15" id="comment" name="description"><?php echo $description; ?></textarea><br>
                            </div>
                            <div>
                            <!-- <div>
                            <label for="story">Images</label><br>
                                <input type="file" id="image" name="image" ><br><br>
                            </div> -->

                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="cancelBTN">Cancel</button>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="updateBTN">UPDATE</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </form>
    </body>
</html>