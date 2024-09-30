

//-Mở và đóng sidebar ở phần main (Menu)
document.addEventListener('DOMContentLoaded', function () {
    let btn_menu = document.querySelector('#btn-sidebar');
    let sidebar = document.querySelector(".main-nav");

    btn_menu.onclick = function(){
        sidebar.classList.toggle('active');
    }
});

