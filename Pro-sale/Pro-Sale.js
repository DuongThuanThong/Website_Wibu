function changeImage(element) {
    const mainImage = document.getElementById("main-image");
    mainImage.src = element.src;
}

const images = [
    "/Pro-sale/img/Mai-1.webp",
    "/Pro-sale/img/Mai-2.webp",
    "/Pro-sale/img/Mai-3.jpg",
    "/Pro-sale/img/Mai-4.webp",
    "/Pro-sale/img/Mai-5.webp"
];
let currentIndex = 0;
let thumbIndex = 0;
const visibleThumbs = 3;

function updateMainImage() {
    const mainImage = document.getElementById("main-image");
    mainImage.src = images[currentIndex];

    // Kiểm tra vị trí ảnh để hiện mũi tên
    if (currentIndex === 0) {
        document.querySelector(".prev").style.display = "none"; // Ẩn mũi tên trái
        document.querySelector(".next").style.display = "block"; // Hiện mũi tên phải
    } else if (currentIndex === images.length - 1) {
        document.querySelector(".prev").style.display = "block"; // Hiện mũi tên trái
        document.querySelector(".next").style.display = "none"; // Ẩn mũi tên phải
    } else {
        document.querySelector(".prev").style.display = "block"; // Hiện cả hai mũi tên
        document.querySelector(".next").style.display = "block";
    }
}

function updateThumbnails() {
    const thumbnailContainer = document.getElementById("thumbnail-container");
    thumbnailContainer.innerHTML = "";

    for (let i = thumbIndex; i < thumbIndex + visibleThumbs && i < images.length; i++) {
        const img = document.createElement("img");
        img.src = images[i];
        img.onclick = () => changeImage(i);
        if (i === currentIndex) img.classList.add("active");
        thumbnailContainer.appendChild(img);
    }
}

function nextImage() {
    if (currentIndex < images.length - 1) {
        currentIndex++;
    }
    updateMainImage();
}

function prevImage() {
    if (currentIndex > 0) {
        currentIndex--;
    }
    updateMainImage();
}
function changeImage(index) {
    currentIndex = index;  // Cập nhật chỉ số ảnh hiện tại
    updateMainImage();     // Cập nhật ảnh chính
}

function openModal(src) {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");

    modal.style.display = "block";
    modalImg.src = src;
}

function closeModal() {
    document.getElementById("imageModal").style.display = "none";
}

// Timer 
const countdownDate = new Date().getTime() + 24 * 60 * 60 * 1000;

function updateCountdown() {
    const now = new Date().getTime();
    const distance = countdownDate - now;

    if (distance < 0) {
        clearInterval(countdownInterval);
        document.querySelector(".time").innerHTML = "Giảm giá đã kết thúc";
        return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").textContent = days < 10 ? '0' + days : days;
    document.getElementById("hours").textContent = hours < 10 ? '0' + hours : hours;
    document.getElementById("minutes").textContent = minutes < 10 ? '0' + minutes : minutes;
    document.getElementById("seconds").textContent = seconds < 10 ? '0' + seconds : seconds;
}

// Khởi tạo đồng hồ đếm ngược và gọi hàm cập nhật mỗi giây
const countdownInterval = setInterval(updateCountdown, 1000);
updateCountdown(); // Gọi ngay khi tải trang để hiển thị thời gian ban đầu


function updateTitle() {
    document.getElementById("title-text").innerText = "Thanh toán toàn bộ";
}

let counterValue = 1;

function increase() {
    counterValue++;
    document.getElementById("counterValue").innerText = counterValue;
}

function decrease() {
    if (counterValue > 1) {
        counterValue--;
    }
    document.getElementById("counterValue").innerText = counterValue;
}

function toggleDescription() {
    const description = document.getElementById('product-des');
    const button = document.getElementById('toggle-btn');
    
    if (description.classList.contains('short')) {
        description.classList.remove('short');
        button.textContent = '- Thu gọn';
    } else {
        description.classList.add('short');
        button.textContent = '+ Xem thêm';
    }
}

    let expanded = false; // Biến cờ để theo dõi trạng thái mở rộng

    function toggleInfo() {
        const extraInfoRows = document.querySelectorAll(".extra-inform");
        const button = document.getElementById("toggleBtn");

        if (!expanded) {
            // Mở rộng
            extraInfoRows.forEach(row => {
                row.style.display = "table-row";
            });
            button.textContent = "- Thu gọn";
        } else {
            // Thu gọn
            extraInfoRows.forEach(row => {
                row.style.display = "none";
            });
            button.textContent = "+ Xem thêm";
        }

        expanded = !expanded; // Đảo trạng thái của biến cờ
    }




// Initial load
updateMainImage();
updateThumbnails();



