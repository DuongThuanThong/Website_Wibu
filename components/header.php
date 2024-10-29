<?php
    include ("../components/connect.php");
    session_start();
    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $select_user = $conn->prepare('SELECT user_name FROM `user` WHERE user_id = ?');
        $select_user->execute([$user_id]);

        $user_info = $select_user->fetch(PDO::FETCH_ASSOC);

        
        $user_name = $user_info['user_name'];
        

        $select_lv = $conn->prepare('SELECT lv_user FROM `user_exp` WHERE id_user =?');
        $select_lv->execute([$user_id]);   
        $lv = $select_lv->fetch(PDO::FETCH_ASSOC);
       
        $user_lv = $lv['lv_user'];
        
    }else{
        $user_lv = 0;
        $user_name = 'Đăng kí/ Đăng nhập';
    }
?>
  
  
  <!-- HEADER_WEBSITE -->
  <header>
        <!-- Logo of header -->     
        <div class='logo'>
            <img src="../Home/img/logo_1.png" alt="">
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
                <span id="exp-value">0</span>
                <span id="exp-value-max">/220</span>
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
                    <span id = "lv">Lv: <?php echo $user_lv?></span>
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
            
            <div class = "favorite-heart">
                <i class="fa-regular fa-heart"></i>
                <span>Sản phẩm yêu thích</span>
            </div>

            <div class = 'cart-shop'>
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Giỏ hàng</span>
            </div>
        </div>
    </header>
