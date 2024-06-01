<?php
include "authguard.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Commerce Website - Upload Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .vh-100 {
            height: 100vh;
        }

        .upload-section {
            background-color: #f8f9fa;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-light">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="upload-section">
            <form action="upload.php" method="post" class="w-100" enctype="multipart/form-data">
                <h4 class="text-center mb-4">Upload Product</h4>
                <div class="mb-3">
                    <input class="form-control" required type="text" placeholder="Product name" name="name">
                </div>
                <div class="mb-3">
                    <input class="form-control" required type="number" min="0" placeholder="Product price" name="price">
                </div>
                <div class="mb-3">
                    <input class="form-control" required type="number" min="0" placeholder="Product stock" name="stock">
                </div>
                <div class="mb-3">
                    <select class="form-control" name="category" id="category">
                        <option>Appliances</option>
                        <option>Mobiles</option>
                        <option>Fashion</option>
                        <option>Furniture</option>
                    </select>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Product detail" name="detail"></textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" name="pdtimg">
                </div>
                <div class="text-center">
                    <button class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include "..shared/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>