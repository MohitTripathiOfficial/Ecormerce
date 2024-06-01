<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Image Slider</title>
    <style>
        /* Ensure the body and html have no overflow issues */
        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Container for the entire slider */
        .slider-container {
            position: relative;
            width: 100vw;
            height: calc(100vh - 63px);
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }


        .slide {
            min-width: 100vw;
            height: 100%;
            display: flex;
            flex-direction: column;
            gap: 16px;
            overflow: hidden;
        }

        @media (min-width: 1280px) {
            .slide {
                flex-direction: row;
            }
        }

        /* Text container within a slide */
        .text-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 16px;
            text-align: center;
        }

        .text-container h1 {
            font-size: 3rem;
        }

        .text-container h2 {
            font-size: 1.5rem;
        }

        .text-container a {
            padding: 0.75rem 1.5rem;
            background-color: black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .image-container {
            flex: 1;
            position: relative;
            height: 100%;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 5px;
        }

        .indicator {
            width: 10px;
            height: 10px;
            background-color: gray;
            border-radius: 50%;
            cursor: pointer;
        }

        .indicator.active {
            background-color: white;
        }
    </style>
</head>

<body>

    <div class='slider-container'>
        <div class='slides'>
            <?php
            $slides = [
                [
                    "id" => 1,
                    "title" => "Summer Sale Collections",
                    "description" => "Sale! Up to 50% off!",
                    "img" => "https://images.pexels.com/photos/1926769/pexels-photo-1926769.jpeg?auto=compress&cs=tinysrgb&w=800",
                    "url" => "/"
                ],
                [
                    "id" => 2,
                    "title" => "Winter Sale Collections",
                    "description" => "Sale! Up to 50% off!",
                    "img" => "https://images.pexels.com/photos/1021693/pexels-photo-1021693.jpeg?auto=compress&cs=tinysrgb&w=800",
                    "url" => "/"
                ],
                [
                    "id" => 3,
                    "title" => "Spring Sale Collections",
                    "description" => "Sale! Up to 50% off!",
                    "img" => "https://images.pexels.com/photos/1183266/pexels-photo-1183266.jpeg?auto=compress&cs=tinysrgb&w=800",
                    "url" => "/"
                ],
            ];

            foreach ($slides as $index => $slide) {
                $activeClass = $index === 0 ? "active" : "";
                echo "
                        <div class='slide bg-gradient-to-r from-yellow-50 to-pink-50'>
                             <div class='text-container'>
                                    <h2>{$slide['description']}</h2>
                                    <h1>{$slide['title']}</h1>
                                    <a href='{$slide['url']}'>SHOP NOW</a>
                             </div>
                            <div class='image-container'>
                                 <img src='{$slide['img']}' alt='Slide Image'>
                            </div>
                        </div>
                    ";
            }
            ?>
        </div>
        <div class="indicators">
            <?php
            foreach ($slides as $index => $slide) {
                $activeClass = $index === 0 ? "active" : "";
                echo "<div class='indicator $activeClass' onclick='moveToSlide($index)'></div>";
            }
            ?>
        </div>
    </div>


    <script>
        let currentIndex = 0;
        const slides = document.querySelector('.slides');
        const indicators = document.querySelectorAll('.indicator');

        function moveToSlide(index) {
            slides.style.transform = `translateX(-${index * 100}%)`;
            indicators[currentIndex].classList.remove('active');
            indicators[index].classList.add('active');
            currentIndex = index;
        }

        setInterval(() => {
            const nextIndex = (currentIndex + 1) % indicators.length;
            moveToSlide(nextIndex);
        }, 3000);
    </script>

</body>

</html>