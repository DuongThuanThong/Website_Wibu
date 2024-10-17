

//-Mở và đóng sidebar ở phần main (Menu)
function siderOpenClose() {
    let btn_menu = document.querySelector('#btn-sidebar');
    let sidebar = document.querySelector(".main-nav");

    btn_menu.onclick = function () { //Hàm hoạt động khi click chuột vào button
        sidebar.classList.toggle('active');//Thêm class .main-nav + active
    }
}


//-Cho các ảnh đầu trang chủ trượt đi trượt lại
function slideOpenClose() {
    const imagesWrapper = document.querySelector('.images-wrapper');
    const images = document.querySelectorAll('.images-wrapper img');

    let cur = 0;
    const listImgLen = images.length;
    const imageWid = images[0].clientWidth; // Lấy chiều rộng của một ảnh
    //Có gửi video sự khác nhau của clienWidth và offsetWidth

    // Tạo hàm để chuyển ảnh
    function showNextImage(num) {
        cur += num;
        if (cur >= listImgLen) {
            cur = 0; // Quay lại ảnh đầu tiên khi đã hết
        }
        else if (cur < 0) {
            cur = listImgLen - 1;
        }

        // Cộng trừ khoảng cách để di chuyển ảnh
        imagesWrapper.style.transform = `translateX(-${cur * imageWid}px)`;
    }

    //Chuyển ảnh mỗi 15 giây
    setInterval(showNextImage(1), 15000);
    // Nút btn-L and btn-R nhấn vào sẽ di chuyển ảnh
    const btnL = document.querySelector(".fa-chevron-left");
    const btnR = document.querySelector(".fa-chevron-right");

    btnR.addEventListener('click', () => {
        clearInterval()
        showNextImage(1);
    })
    btnL.addEventListener('click', () => {
        showNextImage(-1);
    })
}





window.onload = function () {
    siderOpenClose();
    slideOpenClose();
};


//----------------------------------------------------------------------------------------------------Gio_Hang----------------------------------------------------------------------------------------------
const products = [
    { id: 1, name: "Sản phẩm 1", price: 100000, img: "img/product1.jpg" },
    { id: 2, name: "Sản phẩm 2", price: 150000, img: "img/product2.jpg" },
    { id: 3, name: "Sản phẩm 2", price: 150000, img: "img/product2.jpg" },
    { id: 4, name: "Sản phẩm 2", price: 150000, img: "img/product2.jpg" },
];

let cartItems = [];

function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    const existingItem = cartItems.find(item => item.id === productId);

    if (existingItem) {
        existingItem.quantity += 1; // Tăng số lượng nếu sản phẩm đã có
    } else {
        cartItems.push({ ...product, quantity: 1 }); // Thêm sản phẩm mới vào giỏ hàng
    }
    updateCartDisplay();
}

function updateCartDisplay() {
    const cartContainer = document.querySelector('.cart-items');
    cartContainer.innerHTML = ''; // Xóa nội dung cũ

    cartItems.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <img src="${item.img}" alt="${item.name}">
            <div class="item-details">
                <h2>${item.name}</h2>
                <p>Giá: ${item.price.toLocaleString()} VNĐ</p>
                <input type="number" value="${item.quantity}" min="1" class="item-quantity" onchange="updateQuantity(${item.id}, this.value)">
                <button class="remove-btn" onclick="removeFromCart(${item.id})">Xóa</button>
            </div>
        `;
        cartContainer.appendChild(cartItem);
    });

    const totalPriceElement = document.getElementById('total-price');
    totalPriceElement.textContent = `${calculateTotal().toLocaleString()} VNĐ`;
}

function calculateTotal() {
    return cartItems.reduce((total, item) => total + (item.price * item.quantity), 0);
}

function removeFromCart(productId) {
    cartItems = cartItems.filter(item => item.id !== productId); // Xóa sản phẩm
    updateCartDisplay();
}

function updateQuantity(productId, quantity) {
    const item = cartItems.find(item => item.id === productId);
    if (item) {
        item.quantity = parseInt(quantity);
    }
    updateCartDisplay();
}

function checkout() {
    if (cartItems.length === 0) {
        alert("Giỏ hàng rỗng. Vui lòng thêm sản phẩm trước khi thanh toán.");
        return;
    }
    alert("Cảm ơn bạn đã thanh toán! Tổng tiền: " + calculateTotal().toLocaleString() + " VNĐ.");
    cartItems = []; // Xóa giỏ hàng sau khi thanh toán
    updateCartDisplay(); // Cập nhật hiển thị giỏ hàng
}

// Mở/Đóng popup giỏ hàng
function toggleCartPopup() {
    const cartPopup = document.getElementById('cart-popup');
    cartPopup.style.display = cartPopup.style.display === 'block' ? 'none' : 'block';
    updateCartDisplay(); // Cập nhật hiển thị giỏ hàng
}
// Giỏ hàng - Kết thúc
