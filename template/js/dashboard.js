

const container = document.querySelector('.hom_product_hot');
const hotItems = document.querySelectorAll('.product__item');
console.log(container)
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');


// Lấy kích thước phần tử đầu tiên (tất cả phần tử đều có cùng kích thước)
let itemWidth = hotItems[0].getBoundingClientRect().width;

// Sự kiện khi nhấn nút "next"
next.addEventListener('click', () => {
    container.scrollLeft += itemWidth * 2; 
});

// Sự kiện khi nhấn nút "prev"
prev.addEventListener('click', () => {
    container.scrollLeft -= itemWidth * 2; 
});
