<?php
    include ("/Z.Xampp-PHP/xampp/htdocs/_DoAnWeb/components/connect.php");
    
    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $select_user = mysqli_query($conn,"SELECT * FROM users WHERE IdUser = '$user_id'");
        $user_info = mysqli_fetch_array($select_user);
        $user_name = $user_info['NameUser'];
        

        $select_lv = mysqli_query($conn,"SELECT * FROM expuser WHERE IdUser = '$user_id'");
        $user_lv = mysqli_fetch_array($select_lv);
        $lv = $user_lv['lv_user'];
        $exp = $user_lv['exp'];
        $max_exp = $user_lv['max_exp'];
    }else{
        $lv = 0;
        $user_name = 'Đăng kí/ Đăng nhập';
        $exp = 0;
        $max_exp = 0;
        
    }


?>
  
  
  <!-- HEADER_WEBSITE -->
  <header>
        <!-- Logo of header -->         
        <div class='logo'>
            <img src="/Home/img/logo_1.png" alt=""  onclick = 'window.location.href="/Home/index.php"'>
        </div>
        <!-- Thanh tìm kiếm -->
        <form action="" class="search-bar">
            <input type="text" placeholder="Bạn đang tìm gì...?">
            <i class="fa-solid fa-magnifying-glass"></i>
        </form>
        <!-- Thanh exp -->
        <div class="exp-bar">
            <span class ="exp">  
                EXP:
                <span id="exp-value"><?php echo $exp?></span>
                <span id="exp-value-max"><?php echo "/".$max_exp?></span>
            </span>
            <div class="progress">
                <div id="exp-progress"></div>
            </div>
        </div>
        <!-- Avatar, Tên, Lv, Giỏ hàng, Yêu thích -->
        <!-- onclick = 'window.location.href="../login&registration/login.php"   -->
        <!-- onclick='toggleDropdown() -->
        <div class = 'user-bar'>
            <div class="user">
                <div class = 'img-user'>
                    <i class="fa-solid fa-circle-user fa-flip-horizontal"></i>
                </div>
    
                <div class ="user-info">
                    <span id = "user-name"><?php echo $user_name?></span>
                    <span id = "lv">Lv: <?php echo $lv ?></span>
                </div>

                <!-- Dropdown Menu -->
                <div class="dropdown-menu">
                    <?php
                        if (isset($_SESSION['user_id'])){
                            echo ' <a href="#">Thông tin tài khoản</a>';
                            echo ' <a href="#">Đơn hàng</a>';
                            echo ' <a href="#">Kho vocher</a>';
                            echo '<a href="../login&registration/logout.php">Đăng xuất</a>';
                        }else{
                            echo '<a href="../login&registration/login.php">Đăng nhập</a>';
                            echo  ' <a href="../login&registration/registration.php">Đăng kí</a>';
                        }
                    ?>
                </div>

            </div>
            
            <a href="../YeuThich/YeuThich.html" class = "favorite-heart">
                <i class="fa-regular fa-heart"></i>
                <span>Sản phẩm yêu thích</span>
            </a>

            <div class = 'cart-shop'>
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Giỏ hàng</span>
            </div>
        </div>
    </header>

    
