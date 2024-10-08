

//-Mở và đóng sidebar ở phần main (Menu)
function siderOpenClose(){
    let btn_menu = document.querySelector('#btn-sidebar');
    let sidebar = document.querySelector(".main-nav");

    btn_menu.onclick = function(){ //Hàm hoạt động khi click chuột vào button
        sidebar.classList.toggle('active');//Thêm class .main-nav + active
    }
}


//-Cho các ảnh đầu trang chủ trượt đi trượt lại
function slideOpenClose(){
    const imagesWrapper = document.querySelector('.images-wrapper');
    const images = document.querySelectorAll('.images-wrapper img');
    
    let cur  = 0;
    const listImgLen = images.length;
    const imageWid = images[0].clientWidth; // Lấy chiều rộng của một ảnh
    //Có gửi video sự khác nhau của clienWidth và offsetWidth

    // Tạo hàm để chuyển ảnh
    function showNextImage(num) {
        cur+=num;
        if (cur >= listImgLen) {
            cur = 0; // Quay lại ảnh đầu tiên khi đã hết
        }
        else if(cur < 0){
            cur = listImgLen - 1;
        }

        // Cộng trừ khoảng cách để di chuyển ảnh
        imagesWrapper.style.transform = `translateX(-${cur * imageWid}px)`;
    }

    //Chuyển ảnh mỗi 15 giây
    setInterval(showNextImage(1), 15000);
// Nút btn-L and btn-R nhấn vào sẽ di chuyển ảnh
    const btnL =document.querySelector(".fa-chevron-left");
    const btnR =document.querySelector(".fa-chevron-right");

    btnR.addEventListener('click' , () =>{
        showNextImage(1);
    })
    btnL.addEventListener('click',()=>{
        showNextImage(-1);
    })
}





window.onload = function() {
    siderOpenClose();
    slideOpenClose();
};