<!DOCTYPE html>
<html lang="en">

<head>
    <title>E_Commerce_Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .product-category {
            font-size: large;
            font-weight: bold;
            margin-left: 10px;
            margin-top: 20px;
        }

        .product-list-container {
            overflow-x: auto;
            padding-bottom: 10px;
            margin-top: 10px;
            white-space: nowrap;
        }

        .product-list-container::-webkit-scrollbar {
            display: none;
        }

        .product-list {
            display: inline-flex;
            gap: 30px;
            margin: 20px;
        }

        .product-card {
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 220px;
            flex: 0 0 auto;
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 15px;
            margin: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .product-image {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.5s ease;
        }

        .product-info {
            display: flex;
            justify-content: space-between;
            margin-left: 10px;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 16px;
            color: #555;
             margin-left: 10px;
        }

        .product-description {
            font-size: 14px;
             margin-left: 10px;
            color: #777;
            margin-bottom: 15px;
            height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .edit-delete {
            display: flex;
            justify-content: space-around;
        }

        .product-edit,
        .product-delete {
            background-color: #f35c7a;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 16px;
            cursor: pointer;
            text-align: center;
        }

        .product-delete {
            background-color: red;
        }

        .product-edit:hover {
            background-color: #d44b67;
        }

        .product-delete:hover {
            background-color: darkred;
        }


        .search-results {
            position: absolute;
            top: calc(12% + 10px);
            left: 0;
            width: 20%;
            max-height: 200px;
            overflow-y: auto;
            background-color: white;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            margin-left: 610px;

        }

        .search-results a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
            border-bottom: 1px solid #ced4da;
        }

        .search-results a:hover {
            background-color: #e2e6ea;
        }
    </style>

</head>

<body>

    <?php
    include "authguard.php";
    include "../shared/connection.php";
    ?>
    <div class="search-form d-flex justify-content-center">
        <input type="search" id="search-input" placeholder="Search" aria-label="Search">
        <button type="submit">Search</button>
        <div class="search-results" id="search-results"></div>
    </div>
    <?php
    function displayCategory($conn, $category)
    {
        $sql_result = mysqli_query($conn, "SELECT * FROM products WHERE category='$category' and owner='$_SESSION[userid]'");
        if (mysqli_num_rows($sql_result) > 0) {
            echo "<div class='product-category'>$category</div>";
            echo "<div class='product-list-container'>";
            echo "<div class='product-list'>";
            while ($dbrow = mysqli_fetch_assoc($sql_result)) {
                $imgpath = $dbrow['imgpath'];
                $name = $dbrow['name'];
                $price = $dbrow['price'];
                $detail = $dbrow['detail'];
    ?>
                <div class='product-card'>
                    <div class='product-image'>
                        <a href='singlepage.php?pid=<?php echo $dbrow['id']; ?>'>
                            <img src='<?php echo $imgpath; ?>' alt=''>
                        </a>
                    </div>
                    <div class='product-info'>
                        <span class='product-name'><?php echo $name; ?></span>
                        <span class='product-price'>Rs <?php echo $price; ?></span>
                    </div>
                    <div class='product-description'><?php echo $detail; ?></div>
                    <div class='edit-delete'>
                        <a href='editdetails.php?pid=<?php echo $dbrow['id']; ?>'>
                            <button class='product-edit'>Edit</button>
                        </a>
                        <a href='deleteproduct.php?pid=<?php echo $dbrow['id']; ?>'>
                            <button class='product-delete'>Delete</button>
                        </a>
                    </div>
                </div>
                <hr>
        <?php
            }
            echo "</div>";
            echo "</div>";
        }
        ?>
        <hr>
    <?php
    }

    displayCategory($conn, 'Appliances');
    displayCategory($conn, 'Mobiles');
    displayCategory($conn, 'Fashion');
    displayCategory($conn, 'Furniture');

    include "../shared/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlJ91h6/6YtQCTaKpGJ3a4yw26WIxB0x8rIXZZLgH/XW4H+8fPWWBi7mBl4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0ey8bLJ6ppwZoq6kGkM1C0p6bFRH5F1RX0S9qLp+0vIT2I/6nrX56vs6" crossorigin="anonymous"></script>
    <script>
        document.getElementById('search-input').addEventListener('input', function() {
            const query = this.value;
            if (query.length > 1) {
                fetch(`search.php?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        const searchResults = document.getElementById('search-results');
                        searchResults.innerHTML = '';
                        data.forEach(product => {
                            const productLink = document.createElement('a');
                            productLink.href = `singlepage.php?pid=${product.id}`;
                            productLink.textContent = product.name;
                            searchResults.appendChild(productLink);
                        });
                    });
            } else {
                document.getElementById('search-results').innerHTML = '';
            }
        });
    </script>
</body>

</html>
