<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .carousel-item {
            height: calc(100vh - 80px);
        }

        .carousel-caption {
            bottom: 50%;
            transform: translateY(50%);
        }

        .carousel-caption h1,
        .carousel-caption h2 {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php
            $slides = [
                [
                    "id" => 1,
                    "title" => "Summer Sale Collections",
                    "description" => "Sale! Up to 50% off!",
                    "img" => "https://images.pexels.com/photos/1926769/pexels-photo-1926769.jpeg?auto=compress&cs=tinysrgb&w=800",
                    "url" => "/",
                    "bg" => "bg-gradient-to-r from-yellow-50 to-pink-50",
                ],
                [
                    "id" => 2,
                    "title" => "Winter Sale Collections",
                    "description" => "Sale! Up to 50% off!",
                    "img" => "https://images.pexels.com/photos/1021693/pexels-photo-1021693.jpeg?auto=compress&cs=tinysrgb&w=800",
                    "url" => "/",
                    "bg" => "bg-gradient-to-r from-pink-50 to-blue-50",
                ],
                [
                    "id" => 3,
                    "title" => "Spring Sale Collections",
                    "description" => "Sale! Up to 50% off!",
                    "img" => "https://images.pexels.com/photos/1183266/pexels-photo-1183266.jpeg?auto=compress&cs=tinysrgb&w=800",
                    "url" => "/",
                    "bg" => "bg-gradient-to-r from-blue-50 to-yellow-50",
                ],
            ];

            foreach ($slides as $index => $slide) {
                $activeClass = $index === 0 ? "active" : "";
                echo "
                <div class='carousel-item $activeClass'>
                    <img src='{$slide['img']}' class='d-block w-100' alt='...'>
                    <div class='carousel-caption d-none d-md-block'>
                        <h2>{$slide['description']}</h2>
                        <h1>{$slide['title']}</h1>
                        <a href='{$slide['url']}' class='btn btn-dark'>SHOP NOW</a>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzM6OiycfZ/l8b5OO2K1HBHgY2SRt7f0D7KYL0dXK6BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-wEmeIV1mKuiNp12Sg6G6M3t8gxF9c5paca8s6x3YlQORNJ5VxVzT70bFfRJv5VxK" crossorigin="anonymous"></script>
</body>

</html>