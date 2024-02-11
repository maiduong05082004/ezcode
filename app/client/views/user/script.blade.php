<script>
    var modal = document.querySelector('.modal-overlay');
    var closeModal = document.querySelector('.close-modal');
    var navbar = document.querySelector('.navbar'); // Tham chiếu đến navbar

    closeModal.onclick = function() {
        modal.style.display = "none";
        navbar.style.display = "flex"; // Hiển thị lại navbar
        window.location.href = '/'; // Chuyển hướng về trang chủ
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            navbar.style.display = "flex"; // Hiển thị lại navbar
        }
    }

    var openModalBtn = document.querySelector('.open-modal-btn');
    if (openModalBtn) { // Kiểm tra nếu nút mở modal tồn tại
        openModalBtn.onclick = function() {
            modal.style.display = "flex";
            navbar.style.display = "none"; // Ẩn navbar
        }
    }
</script>
