<?php
    include_once "../api/addForm.php";
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM user_data WHERE email='$email'";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_assoc($result);
$profileImg = $row['profileImg'];
$bio = $row['bio'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Preview and Upload PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" href="assets\logo.png" sizes="20">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-2 col-0"></div>
            <div class="col-12 col-sm-8 col-lg-4 form-div">
                <a style="text-decoration: none;" href="myprofile.php"><i class="fas fa-chevron-left"></i>Back</a>
                <form action="form.php" method="post" enctype="multipart/form-data">
                    <h2 class="text-center mb-3 mt-3">Update profile</h2>
                    <?php if (!empty($msg)): ?>
                    <div class="alert <?php echo $msg_class ?>" role="alert">
                        <?php echo $msg; ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group text-center" style="position: relative;">
                        <span class="img-div">
                            <div class="text-center img-placeholder" onClick="triggerClick()">
                                <h4>Update image</h4>
                            </div>
                            <img src="<?php echo $profileImg ?>" onClick="triggerClick()" id="profileDisplay">
                        </span>
                        <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage"
                            class="form-control" style="display: none;">
                        <label>Profile Image</label>
                    </div>
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea id="isibio" name="bio" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save User</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-sm-2 col-0"></div>
        </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    var bio = '<?php echo $bio ?>';

    $("isibio").val(bio);

});


function triggerClick(e) {
    document.querySelector('#profileImage').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>