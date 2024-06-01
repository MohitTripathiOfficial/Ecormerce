<?php

$productId = $_GET['pid'] ?? null;
$productId = 15;

if (!$productId) {
    echo "Product ID is required.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Product Reviews</title>
    <style>
        .review-image {
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">User Reviews</h1>
        <div class="card mb-4">
            <div class="card-body">
                <!-- USER -->
                <div class="d-flex align-items-center mb-3">
                    <img src="<?php echo htmlspecialchars($review); ?>" alt="User Avatar" width="32" height="32" class="review-image me-2">
                    <span class="fw-bold"><?php echo htmlspecialchars($review); ?></span>
                </div>
                <!-- STARS -->
                <div class="mb-3">
                    <?php for ($i = 0; $i < $review['rating']; $i++) : ?>
                        <img src="/path/to/star.png" alt="Star" width="16" height="16">
                    <?php endfor; ?>
                </div>
                <!-- DESC -->
                <?php if ($review['heading']) : ?>
                    <h5><?php echo htmlspecialchars($review['heading']); ?></h5>
                <?php endif; ?>
                <?php if ($review['body']) : ?>
                    <p><?php echo htmlspecialchars($review['body']); ?></p>
                <?php endif; ?>
                <!-- MEDIA -->
                <div class="d-flex flex-wrap">
                    <?php foreach ($review['media'] as $media) : ?>
                        <img src="<?php echo htmlspecialchars($media['url']); ?>" alt="Review Media" width="100" height="50" class="me-2 mb-2">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzM6OiycfZ/l8b5OO2K1HBHgY2SRt7f0D7KYL0dXK6BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-wEmeIV1mKuiNp12Sg6G6M3t8gxF9c5paca8s6x3YlQORNJ5VxVzT70bFfRJv5VxK" crossorigin="anonymous"></script>
</body>

</html>