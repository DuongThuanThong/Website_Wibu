  
  
  
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
                <span id="exp-value-max">/160</span>
            </span>
            <div class="progress">
                <div id="exp-progress"></div>
            </div>
        </div>
        <!-- Avatar, Tên, Lv, Giỏ hàng, Yêu thích -->
        <div class = 'user-bar' >
            <div class="user" onclick = 'window.location.href="../login&registration/login.php"'>
                <div class = 'img-user'>
                    <i class="fa-solid fa-circle-user fa-flip-horizontal"></i>
                </div>
    
                <div class ="user-info">
                    <span id = "user-name">Đăng nhập/ Đăng kí</span>
                    <span id = "lv">Lv: 0</span>
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
