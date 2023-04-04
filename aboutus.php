<?php

if (isset($_SESSION)) {
    readfile('header.php');
}
else{
    readfile('headerLogout.php');
}

//readfile('headerLogout.php');

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css">
</head>
    <body>
    <!-- Main Content -->
    <div class="container my-4">
        <h1>About Us</h1>
        <p>As people travel round the world, one of the stories they tell is that of the beautiful restaurants they visit.
My application (called “Restorant”, i.e. rest-to-rant) enables tourist to share their stories of restaurant adventures in new places they visit.</p>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- First Card -->
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Our History</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi bibendum eget enim ut consequat. Etiam quis lectus vitae felis porttitor pretium. Quisque molestie ex id magna tincidunt, in pulvinar leo eleifend. Nam molestie luctus ex.</p>
                    </div>
                </div>
            </div>
            <!-- Second Card -->
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Our Mission</h5>
                        <p class="card-text">Nullam vulputate augue a libero hendrerit, vel interdum nulla suscipit. Duis ultrices justo nec sem suscipit, nec tristique elit tempor. Aenean sem ex, tincidunt eget gravida vel, euismod sit amet ex. Nam maximus, magna sed facilisis rhoncus, est felis maximus nisl, a pellentesque sapien tortor vitae quam.</p>
                    </div>
                </div>
            </div>
        </div>
        
    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/js/bootstrap.min.js"></script>
</body>
<?php
  readfile('footer.php');
?>
</html>
