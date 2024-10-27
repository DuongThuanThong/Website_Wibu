<?php 
include '../components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

if(isset($_POST['submit'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone =$_POST['phone'];

    $select_user = $conn->prepare("SELECT * FROM `user` WHERE user_email = ? OR user_phone = ?");
    $select_user->execute([$email, $phone]);
    
    if($select_user ->rowCount() > 0){
        $message[]="Tài khoản đã tồn tại! ";
        if(!empty($message)){
            foreach($message as $msg){
                echo '<div class="alert">' . $msg . '</div>';
            }
        }
    }else{
        $add_user = $conn->prepare("INSERT INTO`user` (user_name,user_email,user_password,user_phone) VALUES(?,?,?,?)");
        $add_user->execute([$username,$email, $password, $phone]);
        
        $select_user = $conn->prepare("SELECT * FROM `user` WHERE user_email = ? AND user_password = ?");
        $select_user->execute([$email,$password]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);
        if ($select_user->rowCount() >0){
            $_SESSION ["user_id"] = $row["user_id"];
            header("Location: ../Home/index.php");
            exit();
        }
    }
}
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
    <link rel="stylesheet" href="css/login&registration.css">
    <title>Đăng kí</title>
</head>
<body>
    <div class ="main-login">
        <div class="wrapper">
            <div class="login-box">
                <form action="" method="post">
                    <h2>Đăng kí</h2>
                    <div class="input-box">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="name"
                        placeholder="Username" required> 
                        <!-- required có mục đích để kiểm tra người dùng có nhập thông tin đúng kiểu input không -->
                    </div>
                    
                    <div class="input-box">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email"
                        placeholder="Email" required> 
                        <!-- required có mục đích để kiểm tra người dùng có nhập thông tin đúng kiểu input không -->
                    </div>
                    
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password"
                        placeholder="Password" required>
                    </div>

                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="tel" name="phone"
                        placeholder="Phone" required>
                    </div>

                    <div class ="button">
                        <button type="submit" name="submit">Đăng nhập</button>
                    </div>
    
                    <div class="sign-link">
                        <span>Đã có tài khoản?</span>
                        <a href="login.php">Đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>