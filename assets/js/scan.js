// * set prices for different materials
let baseFactor = 10;
let pricePlastic = 1;
let priceCan = 1.2;
let priceGlass = 1.5;
let pointExchangeRate = 0.25;

function onScanSuccess(decodedText, decodedResult) {
  // console.log("Scan result:", decodedResult);
  document.getElementById("blackScreen").style.display = "flex";

  //   call api to get product details and filter data
  filterData(decodedText);
}

function onScanError(error) {
  console.warn(`Scan Error: ${error}`);
}

// Initialize scanner

let html5QrcodeScanner;
function initQrScanner() {
  html5QrcodeScanner = new Html5QrcodeScanner("scanner-container", {
    fps: 20,
    qrbox: 250,
    supportedFormats: [
      Html5QrcodeSupportedFormats.EAN_13,
      Html5QrcodeSupportedFormats.EAN_8,
      Html5QrcodeSupportedFormats.UPC_A,
      Html5QrcodeSupportedFormats.UPC_E,
      Html5QrcodeSupportedFormats.CODE_39,
      Html5QrcodeSupportedFormats.CODE_128,
    ],
    videoConstraints: {
      facingMode: { ideal: "environment" }, // Prefer rear, fallback to front
    },
  });

  html5QrcodeScanner.render(onScanSuccessStop, onScanError);
}

function onScanSuccessStop(decodedText, decodedResult) {
  onScanSuccess(decodedText, decodedResult);

  // Stop scanner automatically after successful scan
  if (html5QrcodeScanner) {
    html5QrcodeScanner
      .clear()
      .then(() => {})
      .catch((err) => {
        console.error("Error stopping scanner:", err);
      });
  }
}

// * handle scan another button
document.getElementById("scan-another-btn").addEventListener("click", () => {
  document.getElementById("scan-result").classList.add("hidden");
  initQrScanner();
});

// * filter data from api
function filterData(barcode) {
  fetch(`../api/products.php?barcode=${barcode}`)
    .then((res) => res.json())
    .then((data) => {
      if (data.status === "error") {
        console.log("Error:", data.error);
        document.getElementById("blackScreen").style.display = "none";
        alert("Product not found");
        window.location.reload();
        return;
      } else if (data.status === "success") {
        // console.log("Clean Data:", data);
        // console.log(data.data.quantity);
        document.getElementById("blackScreen").style.display = "none";
        document.getElementById("scan-result").classList.remove("hidden");
        document.getElementById("bottle-name").textContent =
          data.data.name + " " + data.data.quantity;
        document.getElementById("bottle-barcode").textContent =
          data.data.barcode;

        // * calculate reward points
        let rewardPoints;
        let co2Saved;
        if (data.data.material === "plastic") {
          rewardPoints = Math.round(
            baseFactor * data.data.quantitySum * pricePlastic
          );
          co2Saved = Math.round(82.8 * data.data.quantitySum * pricePlastic);
        } else if (data.data.material === "can") {
          rewardPoints = Math.round(
            baseFactor * data.data.quantitySum * priceCan
          );
          co2Saved = Math.round(300 * data.data.quantitySum * priceCan);
        } else if (data.data.material === "glass") {
          rewardPoints = Math.round(
            baseFactor * data.data.quantitySum * priceGlass
          );
          co2Saved = Math.round(60 * data.data.quantitySum * priceGlass);
        } else {
          rewardPoints = Math.round(
            baseFactor * data.data.quantity * pricePlastic
          );
          co2Saved = Math.round(82.8 * data.data.quantity * pricePlastic);
        }

        document.getElementById("cash-value").textContent =
          "₹" + Math.round(rewardPoints * pointExchangeRate);
        document.getElementById("reward-points").textContent = rewardPoints;
        document.getElementById("co2-saved").textContent = co2Saved + " g";
      } else {
        console.log("Invalid data");
        document.getElementById("blackScreen").style.display = "none";
        alert("Product not found");
        window.location.reload();
        return;
      }
    })
    .catch((err) => console.error("Request Failed", err));
}
