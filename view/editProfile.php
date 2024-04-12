<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/userProfile.css">
</head>

<body>
  <?php
  session_start();

  if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    include "../settings/connection.php";
    include "../action/user.php";

    $user = getUserById($_SESSION['id'], $conn);

  ?>

    <div class="d-flex justify-content-center align-items-center vh-100">

    <!-- Form for updating profile -->
    <form class="shadow w-450 p-3" id="editProfileForm" action="../action/edit_profile.php" method="post" enctype="multipart/form-data">

    <h4 class="display-4 fs-1">Edit Profile</h4><br>
    <!-- error -->
    <?php if (isset($_POST['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_POST['error']; ?>
        </div>
    <?php } ?>

    <!-- success -->
    <?php if (isset($_POST['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_POST['success']; ?>
        </div>
    <?php } ?>

    <!-- First Name -->
    <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" name="fname" value="<?php echo $user['fname'] ?>">
    </div>

    <!-- Last Name -->
    <div class="mb-3">
        <label class="form-label">Last name</label>
        <input type="text" class="form-control" name="lname" value="<?php echo $user['lname'] ?>">
    </div>

    <!-- Profile Picture -->
    <div class="mb-3">
        <label class="form-label">Profile Picture</label>
        <input type="file" class="form-control" name="pp" id='pp'>
        <img src="../images/upload/<?= $user['pp'] ?>" class="rounded-circle" style="width: 70px">
        <input type="text" hidden="hidden" name="old_pp" value="<?= $user['pp'] ?>">
    </div>

    <!-- Update and delete buttons -->
    <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
    <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
    <a href="./index.php" class="btn btn-success">Back</a>
</form>

<!-- JavaScript for delete confirmation -->
<!-- JavaScript for delete confirmation and file validation -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    document.getElementById('updateButton').addEventListener('click', function() {
        // Check if a file is chosen
        var fileInput = document.getElementById('pp');
        if (fileInput.files.length === 0) {
            alert('Please choose a file');
            header("Location: ./editProfile.php");
            return; // Prevent form submission
        }

        // Confirm update
        swal("Success", "Profile Updated Successfully", "success")
            .then((value) => {
                document.getElementById('editProfileForm').submit(); // Submit the form
            });
    });

    document.getElementById('deleteButton').addEventListener('click', function() {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover your profile!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your profile has been deleted!", {
                    icon: "success",
                });
                // Here you can add the logic to delete the profile
            } else {
                swal("Your profile is safe!");
            }
        });
      });
  </script>

  <?php
  } else {
    header("Location: ./Login.php");
    exit;
  }
  ?>
</body>

</html>
