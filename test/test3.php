<script>
function checkForMessage() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "test4.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Request finished. Check if a message is returned
            var message = xhr.responseText.trim();
            if (message !== "") {
                // Do something with the message (e.g., display it)
                alert("New message from PHP: " + message);
            }
        }
    };
    xhr.send();
}

// Check for message every 5 seconds
setInterval(checkForMessage, 5000);
</script>
