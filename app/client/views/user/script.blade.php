<script>
    // Get the modal
    var modal = document.querySelector('.modal-overlay');

    // Get the <span> element that closes the modal
    var closeModal = document.querySelector('.close-modal');

    // When the user clicks on <span> (x), close the modal
    closeModal.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    // Get the button that opens the modal
    var openModalBtn = document.querySelector('.open-modal-btn');

    // When the user clicks the button, open the modal 
    openModalBtn.onclick = function() {
        modal.style.display = "flex";
    }
</script>
