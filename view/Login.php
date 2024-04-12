<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/Login.css" rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <form class="w-100 mx-auto py-5 shadow p-4" action="../action/loginUser_action.php" method="post">
            <h3>Login</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 d-flex">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div>
                <p class="form-label ms-auto mt-2"><a href="./Register.php">Create New Account?</a></p>
            </div>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../JS/login.js"></script>
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission
            var email = $("#exampleInputEmail1").val();
            var password = $("#exampleInputPassword1").val();
            if (email == '' || password == '') {
                swal({
                    title: "Oops!",
                    text: "Please fill all the fields",
                    icon: "warning",
                    button: "OK"
                });
            } else {
                // If fields are filled, submit the form
                this.submit();
                // Add SweetAlert for successful login
                swal({
                    title: "Success!",
                    text: "You have successfully logged in.",
                    icon: "success",
                    button: "OK"
                }).then(() => {
                    console.log("Redirecting to index.php"); // Add console log here
                    window.location.href = '../view/index.php'; // Redirect to index page
                });
            }
        });
    });
</script>

             
</body>

</html>
