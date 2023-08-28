<div class="container">
    <h2>Scan QR Code</h2>
    <div id="scanner-container" style="position: relative; width: 100%; height: 400px;">
        <video id="scanner" style="width: 100%; height: 100%;"></video>
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
    </div>
    <p id="result"></p>
</div>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    const scanner = new Instascan.Scanner({
        video: document.getElementById('scanner')
    });

    scanner.addListener('scan', function(content) {
        // Here you can handle the scanned QR code content
        document.getElementById('result').innerText = 'Scanned: ' + content;

        const scannedItemId = parseInt(content);

        if (scannedItemId === {{ $name->id }}) {
            window.location.href = "{{ route('names.scan', ['id' => $name->id]) }}";
        showSuccessMessage('Barang Telah Berhasil Di Scan');
        } else {
            toastr.error('Mohon Maaf Qr code salah.');
        }

    });

    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });

    function showSuccessMessage(message) {
        toastr.success(message);
    }
</script>

{{-- <script>
    const scanner = new Instascan.Scanner({
        video: document.getElementById('scanner')
    });

    scanner.addListener('scan', function(content) {
        // Here you can handle the scanned QR code content
        document.getElementById('result').innerText = 'Scanned: ' + content;

        // Redirect to the route that handles the status update
        window.location.href = "{{ route('names.scan', ['id' => $name->id]) }}";
    });

    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });

</script> --}}