<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="../css/Register.css" rel="stylesheet">
</head>

<body>
  <div class="background"></div>
  <div class="container">
    <p class="text-center text-muted lead">It's Free and Takes a Minute</p>
    <form class="w-100 mx-auto py-5 shadow p-4" action="../action/registerUser_action.php" method="post" enctype="multipart/form-data">
      <h3>Sign Up</h3>
      <div class="mb-3">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
      </div>
      <div class="mb-3">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
      </div>
      <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <div id="emailError" class="error"></div> <!-- Display email error here -->
</div>

<div class="mb-3 "> 
    <label for="pass" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
  
        <p>Password must contains</p>
            <ul class="requirement-list">
                <li>
                    <i class="fa-solid fa-circle"></i>
                    <span>8 characters</span>
                </li>
                <li>
                    <i class="fa-solid fa-circle"></i>
                    <span>At least 1 number (0...9)</span>
                </li>
                <li>
                    <i class="fa-solid fa-circle"></i>
                    <span>At least 1 lowercase letter (a...z)</span>
                </li>
                <li>
                    <i class="fa-solid fa-circle"></i>
                    <span>At least 1 uppercase letter (A...Z)</span>
                </li>
                <li>
                    <i class="fa-solid fa-circle"></i>
                    <span>At least 1 special symbol (!...$)</span>
                </li>
            </ul>
        </div>
    
      <div class="mb-3">
    <label for="gender">Gender</label>
    <select class="form-select" id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>
      <div class="mb-3">
        <label for="pp">Profile Picture</label>
        <input type="file" class="form-control-file" id="pp" name="pp">
      </div class="mb-3 d-flex">
      <button type="submit" class="btn btn-primary" name="submitform">Submit</button>
      <div>
        <p class="form-label ms-auto mt-2"><a href="./Login.php">Already have an account?</a></p>
      </div>
    </form>
  </div>
  </div>
  </div>

   <!--  SweetAlert library -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- registration JavaScript file -->
  <script src="../JS/registration.js"></script>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>