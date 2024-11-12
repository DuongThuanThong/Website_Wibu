<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONT -->
        <!-- Kiểu chữ Noto San, Paytone -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Paytone+One&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/eff669a9ab.js" crossorigin="anonymous"></script>
    <!-- Css -->
    <link rel="stylesheet" href="../components/css/global.css">
    <link rel="stylesheet" href="../components/css/header_sidebar_footer.css">
    <link rel="stylesheet" href="../Home/css/home.css">

    <title>Wibu Dreamland</title>
</head>
    <body>
        <!-- Include Header -->
        <?php include '../components/header.php'; ?>

        <!-- MAIN_WEBSITE -->
        <main>
            <!-- Include Sidebar -->
            <?php include '../components/sidebar.php'; ?>

            <!-- HOME-CONTENT -->
            <div class="home-content">
                <div class="content">
                    
                    <div class="container">
                        <?php
                            $product = "SELECT * FROM `mohinh`";
                                $result = $conn->query($product);
                                if ($result->num_rows > 0) {
                                    echo '<div class="section">
                                        <h2>
                                            Mô hình
                                        </h2>
                                        <div class="product-list">';
                        
                                    while ($row = $result->fetch_assoc()) {
                                        for ($i = 0; $i < 10; $i++) {
                                        echo '<div class="product">';
                                        echo '<img src="' . $row['Img1'] . '">';
                                        
                                        echo '<div class="name">' . $row['Name'] . '</div>';
                                        if ($row['SoLuongDaBan'] == $row['SoLuongTonKho']) {
                                            echo '<div class="sold-out" style ="background: orange">Hết hàng</div>';
                                            
                                        } else {
                                            if ($row['Sale'] > 0) {
                                                echo '<div class="discount">-' . $row['Sale'] . '%</div>';
                                                
                                                //Tính giá giảm không sợ lỗ
                                                $Giacu = number_format(($row['Gia'] / (1-$row['Sale'] / 100)));
                                            }
                                            
                                            echo '<div class="price">' . number_format($row['Gia']) . '₫</div>';
                                            if (isset($Giacu)) {
                                                echo '<div class="old-price">' . $Giacu . '₫</div>';
                                            }
                                            echo '<div class="heart-icon"><i class="fa-regular fa-heart" style="color: #f70202;"></i></div>'; 
                                        }
                                        echo '</div>';
                                        }
                                    }
                                    
                                    echo '</div> </div><br><br><br>';
                                }
                        ?>
                    </div>
                </div> 
            </div>
        </main>
        
        <?php include "../components/footer.php"?>
        <!-- Javascript -->
        <script src="../components/js/global.js" defer></script>
    </bod>
</html> 