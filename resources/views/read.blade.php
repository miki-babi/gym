<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Code Reader</title>
  <script src="https://unpkg.com/jsqr/dist/jsQR.js"></script>
</head>
<body>
  <h1>Upload QR Code</h1>
  <input type="file" id="qr-input" accept="image/*">
  <p>Result: <span id="qr-result">No result</span></p>

  <script>
    document.getElementById("qr-input").addEventListener("change", async (event) => {
      const file = event.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = async (e) => {
        const img = new Image();
        img.onload = () => {
          const canvas = document.createElement("canvas");
          const ctx = canvas.getContext("2d");
          canvas.width = img.width;
          canvas.height = img.height;
          ctx.drawImage(img, 0, 0);

          const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
          const code = jsQR(imageData.data, imageData.width, imageData.height);

          if (code) {
            document.getElementById("qr-result").textContent = code.data;
          } else {
            document.getElementById("qr-result").textContent = "Error: Unable to decode QR code.";
          }
        };
        img.src = e.target.result;
      };
      reader.readAsDataURL(file);
    });
  </script>
</body>
</html>
