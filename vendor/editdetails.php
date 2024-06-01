<?php
include "authguard.php";
$id = $_SESSION['userid'];
$productid = $_GET['pid'];

include "../shared/connection.php";
$sql_result = mysqli_query($conn, "select * from products where id='$productid'");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    $name = $dbrow['name'];
    $price = $dbrow['price'];
    $detail = $dbrow['detail'];
    $imgpath = $dbrow['imgpath'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Commerce Website - Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .vh-100 {
            height: 100vh;
        }

        .update-section {
            background-color: #f8f9fa;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .img-thumbnail {
            max-width: 100px;
            margin-top: 10px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="update-section">
            <form action="update.php?pid=<?php echo $productid; ?>" method="post" enctype="multipart/form-data" class="w-100">
                <h4 class="text-center mb-4">Update Product</h4>
                <div class="mb-3 text-center">
                    <label for="currentImage" class="form-label">Current Image:</label>
                    <div>
                        <img id="currentImage" src="<?php echo htmlspecialchars($imgpath); ?>" alt="Product Image" class="img-thumbnail">
                    </div>
                </div>
                <div class="mb-3">
                    <input class="form-control" required type="text" placeholder="Product name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                </div>
                <div class="mb-3">
                    <input class="form-control" required type="number" min="0" placeholder="Product price" name="price" value="<?php echo htmlspecialchars($price); ?>">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Product detail" name="detail"><?php echo htmlspecialchars($detail); ?></textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include "../shared/footer.php"; ?>
</body>

</html>