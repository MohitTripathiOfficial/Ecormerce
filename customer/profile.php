<?php
include "authguard.php";
$id = $_SESSION['userid'];

include "../shared/connection.php";
$sql_result = mysqli_query($conn, "select * from users where id='$id'");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    $uname = $dbrow['username'];
    $name = $dbrow['name'];
    $PhNo = $dbrow['PhoneNo'];
    $email = $dbrow['email'];
    $address = $dbrow['address'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .vh-100 {
            height: 100vh;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <h4 class="card-title text-center mt-3">Profile</h4>
                        <form action="updateuser.php" method="post" class="mt-4">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input required type="text" name="username" class="form-control" id="username" value="<?php echo htmlspecialchars($uname); ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input required type="text" name="name" class="form-control" id="name" value="<?php echo htmlspecialchars($name); ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="phoneno" class="form-label">Phone</label>
                                <input required type="number" name="phoneno" class="form-control" id="phoneno" value="<?php echo htmlspecialchars($PhNo); ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input required type="email" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars($email); ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea required type="text" name="address" class="form-control" id="address" value=""><?php echo htmlspecialchars($address); ?></textarea>

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>