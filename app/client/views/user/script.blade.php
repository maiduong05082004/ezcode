<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = document.querySelector('.modal-overlay');
        var closeModal = document.querySelector('.close-modal');
        var navbar = document.querySelector('.navbar');

        closeModal.addEventListener('click', function() {
            modal.style.display = "none";
            navbar.style.display = "flex";
            window.history.back();
        });

        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                navbar.style.display = "flex";
            }
        });

        var openModalBtn = document.querySelector('.open-modal-btn');
        if (openModalBtn) {
            openModalBtn.addEventListener('click', function() {
                modal.style.display = "flex";
                navbar.style.display = "none";
            });
        }
    });
</script>
