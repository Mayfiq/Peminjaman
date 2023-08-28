import { Html5Qrcode, Html5QrcodeSupportedFormats } from 'html5-qrcode';

const qrCodeScanner = new Html5Qrcode('scanner');

qrCodeScanner.start({ facingMode: 'environment' }, {
    qrbox: 250,
}, (qrCodeMessage) => {
    // Extract the id parameter from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const itemId = urlParams.get('id');

    // Perform an AJAX request to update the status
    fetch(`/update-status/${itemId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ qrCodeMessage }),
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response and show a message to the user
        if (data.success) {
            document.getElementById('result').innerText = 'Item status updated successfully.';
        } else {
            document.getElementById('result').innerText = 'Failed to update item status.';
        }
    })
    .catch(error => {
        console.error(error);
        document.getElementById('result').innerText = 'An error occurred.';
    });
}, (errorMessage) => {
    console.error(errorMessage);
});

// Stop the QR code scanner when navigating away from the page
window.onbeforeunload = () => {
    qrCodeScanner.stop();
};
