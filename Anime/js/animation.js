let currentIndex = 0;
let countdownTime = 5; // thời gian đếm ngược cho mỗi ảnh
let slides = document.querySelectorAll(".slider-slide");
let countdownElement = document.getElementById("countdown-timer");
let interval;

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.style.display = "none"; // Ẩn tất cả các slide
    if (i === index) {
      slide.style.display = "block"; // Hiển thị slide tương ứng
    }
  });
}

function startCountdown() {
  countdownElement.textContent = countdownTime;
  clearInterval(interval);

  interval = setInterval(() => {
    countdownTime--;
    countdownElement.textContent = countdownTime;
    if (countdownTime <= 0) {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex); // Chuyển sang slide tiếp theo
      countdownTime = 5; // Đặt lại thời gian đếm ngược cho slide tiếp theo
    }
  }, 1000);
}

document.querySelector(".prev").addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex);
  startCountdown();
});

document.querySelector(".next").addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
  startCountdown();
});

// Khi trang tải lên, slide đầu tiên sẽ được hiển thị và bắt đầu đếm ngược
window.onload = () => {
  showSlide(currentIndex);
  startCountdown();
};
