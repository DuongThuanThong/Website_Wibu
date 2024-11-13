<?php
$link = @mysqli_connect("127.0.0.1", "root", "", "website_wibu") or die("Mất kết nối");

?>

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
    <link rel="stylesheet" href="/admin/admin.css">
    <title>Wibu Dreamland</title>
</head>

<body>
    <!-- HEADER_WEBSITE -->
    <header>
        <!-- Logo of header -->
        <div class='logo'>
            <img src="img\logo_1.png" alt="">
        </div>

        <!-- Thanh tìm kiếm -->
        <form action="" class="search-bar">
            <input type="text" placeholder="Bạn đang tìm gì...?">
            <i class="fa-solid fa-magnifying-glass"></i>
        </form>
        <!-- Thanh exp -->
        <div class="exp-bar">
            <span class="exp">  
                EXP:
                <span id="exp-value">0</span>
            <span id="exp-value-max">/160</span>
            </span>
            <div class="progress">
                <div id="exp-progress"></div>
            </div>
        </div>
        <!-- Avatar, Tên, Lv, Giỏ hàng, Yêu thích -->
        <div class='user-bar'>
            <div class="user" onclick='window.location.href="login.html"'>
                <div class='img-user'>
                    <i class="fa-solid fa-circle-user fa-flip-horizontal"></i>
                </div>

                <div class="user-info">
                    <span id="user-name">Đăng nhập/ Đăng kí</span>
                    <span id="lv">Lv: 0</span>
                </div>
            </div>

            <div class="favorite-heart">
                <i class="fa-regular fa-heart"></i>
                <span>Sản phẩm yêu thích</span>
            </div>

            <div class='cart-shop'>
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Giỏ hàng</span>
            </div>
        </div>
    </header>

    <!-- MAIN_WEBSITE -->
    <main>

        <!-- MENU-NAV -->
        <div class="main-nav">
            <nav class="navbar">
                <!-- Trang chủ -->
                <div class="menu-btn"><i class="fa-solid fa-bars" id="btn-sidebar"></i></div>
                <ul class="nav-list">
                    <li class="nav-list-item">
                        <a href="index.html" class="nav-link">
                            <img src="https://img.icons8.com/fluency-systems-filled/50/home.png" alt="home" />
                            <span class="link-text">Trang chủ</span>
                        </a>
                        <span class="tooltip">Trang chủ</span>
                    </li>

                    <!-- Anime -->
                    <li class="nav-list-item">
                        <a href="#" class="nav-link">
                            <img src="https://img.icons8.com/ios-filled/50/doraemon.png" alt="doraemon" />
                            <span>Bảng xếp hạng Anime</span>
                        </a>
                        <span class="tooltip">Bảng xếp hạng Anime</span>
                    </li>
                    <!-- Managa -->
                    <li class="nav-list-item">
                        <a href="#" class="nav-link">
                            <img src="https://img.icons8.com/ios-glyphs/30/book.png" alt="book" />
                            <span>Manga</span>
                        </a>
                        <span class="tooltip">Manga</span>
                    </li>
                    <!-- Mô hình -->
                    <li class="nav-list-item">
                        <a href="#" class="nav-link">
                            <img src="https://img.icons8.com/ios-filled/50/mobile-suit-gundam.png" alt="mobile-suit-gundam" />
                            <span>Mô hình</span>
                        </a>
                        <span class="tooltip">Mô hình</span>
                    </li>
                    <!-- Trang phục Cosplay -->
                    <li class="nav-list-item">
                        <a href="#" class="nav-link">
                            <img src="https://img.icons8.com/external-smashingstocks-glyph-smashing-stocks/66/external-Cosplay-geek-smashingstocks-glyph-smashing-stocks.png" alt="external-Cosplay-geek-smashingstocks-glyph-smashing-stocks" />
                            <span>Trang phục Cosplay</span>
                        </a>
                        <span class="tooltip">Trang phục Cosplay</span>
                    </li>
                </ul>
            </nav>
        </div>   
    </main>


    <div class="main-container">
        <div class="sidebar">
            <button onclick="showSection('formSection')">Nhập</button>
            <button onclick="showSection('viewSection')">Xem Thông Tin</button>
        </div>

        <div class="content" id="formSection">
            <h2>Nhập thông tin sản phẩm</h2>
            <div class="form-section">
            <form id="productForm" onsubmit="addProduct(); return false;">
                <input type="text" id="nameInput" name="name" placeholder="Tên sản phẩm" required>
                <input type="number" id="priceInput" name="price" placeholder="Giá" required>
                <input type="number" id="quantityInput" name="quantity" placeholder="Số lượng" required>
                <div>
                    <label>Thể loại:</label><br>
                    <input type="radio" id="categoryModel" name="category" value="Mô hình" required>
                    <label for="categoryModel">Mô hình</label>
                    <input type="radio" id="categoryComic" name="category" value="Truyện">
                    <label for="categoryComic">Truyện</label>
                    <input type="radio" id="categoryCosplay" name="category" value="Cosplay">
                    <label for="categoryCosplay">Cosplay</label>
                </div>
                <input type="file" id="photoInput" name="photo" accept="image/*" required>
                <button type="submit" id="btn-submit">Thêm mới</button>
            </form>
        </div>

        </div>
    
        <div class="content" id="viewSection">
            <h2>Danh sách sản phẩm</h2>
    
            <!-- Thanh tìm kiếm -->
            <div class="search-bar">
                <input type="text" id="searchInput" onkeyup="searchProduct()" placeholder="Tìm kiếm...">
            </div>
    
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thể loại</th>
                        <th>Ảnh</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Modal để hiển thị ảnh phóng to -->
    <div class="modal" id="imageModal" onclick="closeModal()">
        <img id="modalImage" src="" alt="Ảnh sản phẩm phóng to">
    </div>


    <!-- Javascript -->
    <script src="/admin/admin.js" defer></script>
</body>

</html>