<script>
    function updateStatus(selectElem, billId) {
        var newStatus = selectElem.value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php?act=updatebill", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert('Cập nhật trạng thái thành công.');
                // Cập nhật trang nếu cần
                location.reload();
            }
        };
        xhr.send("idbill=" + encodeURIComponent(billId) + "&status=" + encodeURIComponent(newStatus));
    }
    
</script>