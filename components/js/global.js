//- Mở và đóng dropdown
function dropdownOpenClose(){
    let activebtn = document.querySelector('.user');
    let dropdown = document.querySelector('.dropdown-menu')
    activebtn.onclick = function(){
        dropdown.classList.toggle('show');
    }
}

//-Mở và đóng sidebar ở phần main (Menu)
function siderOpenClose(){
    let btn_menu = document.querySelector('#btn-sidebar');
    let sidebar = document.querySelector(".main-nav");

    btn_menu.onclick = function(){ //Hàm hoạt động khi click chuột vào button
        sidebar.classList.toggle('active');//Thêm class .main-nav + active
    }
}


window.onload = function() {
    siderOpenClose();
    dropdownOpenClose();
}