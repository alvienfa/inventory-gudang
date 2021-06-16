const qrcodes = window.qrcode;
const video = document.createElement("video");
const canvasElement = document.getElementById("qr-canvas");
const canvas = canvasElement.getContext("2d");
const qrResult = document.getElementById("qr-result");
const outputData = document.getElementById("outputData");
const btnScanQR = document.getElementById("btn-scan-qr");
let scanning = false;
window.onload = function () {
    document.getElementById("btn-scan-qr").click();
};
// Scan
qrcodes.callback = res => {
    // If result is true, ...
    if (res) {
        outputData.value = res;
        res.replace("X", "-");
        document.getElementById("qr-content").style.display = 'none';
        window.location.href = baseUrl + "barang/"+ res;
        scanning = false;
        // Stop video
        video.srcObject.getTracks().forEach(track => {
            track.stop();
        })
        qrResult.hidden = false; // Show result
        canvasElement.hidden = true; // Hide canvas
        btnScanQR.hidden = false; // Show scan button again
    }
};

// When scan button on click, ...
btnScanQR.onclick = () => {
    navigator.mediaDevices
        .getUserMedia({
            video: {
                facingMode: "environment"
            }
        })
        .then(function (stream) {
            scanning = true;
            qrResult.hidden = true;
            btnScanQR.hidden = true;
            canvasElement.hidden = false;
            video.setAttribute("playsinline", true);
            video.srcObject = stream;
            video.play(); // Show video
            tick(); // Set canvas
            scan(); // Scan QRCode
        });
};

function tick() {
    canvasElement.height = video.videoHeight;
    canvasElement.width = video.videoWidth;
    canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
    scanning && requestAnimationFrame(tick);
}

function scan() {
    try {
        qrcode.decode();
    } catch (e) {
        setTimeout(scan, 300);
    }
}