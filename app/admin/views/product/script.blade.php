<script>
    function previewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image").files[0]); 
    
        oFReader.onload = function (oFREvent) {
            document.getElementById('update-image').src = oFREvent.target.result;
        };
    }

    </script>
    