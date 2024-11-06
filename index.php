<html>

<head>
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div class="container">
        <div class="two-columns">

            <?php
            // Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối cho phù hợp)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "user_data";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
            function getProducts($conn, $category)
            {
                $sql = "SELECT * FROM product WHERE category = '$category'";
                $result = $conn->query($sql);
                $products = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $products[] = $row;
                    }
                }
                return $products;
            }

            $categories = [
                "HOT PRODUCTS" => "hot",
                "CHARACTER GOODS" => "character",
                "IN STOCK" => "stock"
            ];

            foreach ($categories as $categoryName => $category) {
                $products = getProducts($conn, $category);

                echo '<div class="section">
                        <h2>
                            ' . $categoryName . '
                            <a href="#">Xem tất cả »</a>
                        </h2>
                        <div class="product-list">';

                // Kiểm tra xem có sản phẩm nào trong danh mục này không
                if (count($products) > 0) {
                    foreach ($products as $product) {
                        echo '<div class="product">';
                        echo '<img src="' . $product['img'] . '" alt="' . $product['name_prodcut'] . '">';
                        if ($product['discount'] > 0) {
                            echo '<div class="discount">-' . $product['discount'] . '%</div>';
                        }
                        if ($product['sold_out'] == 1) {
                            echo '<div class="sold-out">Hết hàng</div>';
                        }
                        if ($product['new'] == 1) {
                            echo '<div class="new">Pre-order</div>';
                        }
                        echo '<div class="name">' . $product['name_prodcut'] . '</div>';
                        echo '<div class="price">' . $product['cost'] . '₫</div>';
                        if ($product['old_price'] > 0) {
                            echo '<div class="old-price">' . $product['old_price'] . '₫</div>';
                        }
                        echo '</div>';
                    }
                } else {
                    // Hiển thị thông báo nếu không có sản phẩm nào trong danh mục này
                    echo '<p>Không có sản phẩm nào trong danh mục này.</p>';
                }

                echo '</div>
                    </div>';
            }

            $conn->close();
            ?>

        </div>
    </div>
</body>

</html>