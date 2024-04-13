<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/logout.css" rel="stylesheet">

    <title>Log Out</title>
</head>
  
<body>
    <div class="container">
        <form class="w-100 mx-auto py-5 shadow p-4">
            <h3>Log Out</h3>
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
                <button type="button" onclick="popUp()" id="pop" class="btn btn-primary">Submit</button>
            </div>
            <div>
                <p class="form-label ms-auto mt-2"><a href="./Login.php">Login again</a></p>
            </div>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script>
        function popUp() {
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
                swal({
                    title: "Success!",
                    text: "You logged out!",
                    icon: "success",
                }).then(() => {
                    window.location.href = './Login.php'; // Redirect to register page
                });
            }
        }
    </script>
</body>
</html>
