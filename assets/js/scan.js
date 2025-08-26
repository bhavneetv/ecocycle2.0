// * set prices for different materials
let baseFactor = 10;
let pricePlastic = 1;
let priceCan = 1.2;
let priceGlass = 1.5;
let pointExchangeRate = 0.25;

function onScanSuccess(decodedText, decodedResult) {
 // console.log(`Barcode Scanned: ${decodedText}`);
  //console.log("Scan result:", decodedResult);

//   call api to get product details and filter data
  filterData(decodedText);
}

function onScanError(error) {
  console.warn(`Scan Error: ${error}`);
}

// Initialize scanner
let html5QrcodeScanner = new Html5QrcodeScanner("scanner-container", {
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
});
html5QrcodeScanner.render(onScanSuccess, onScanError);

function filterData(barcode) {
  fetch(`../api/products.php?barcode=${barcode}`)
    .then((res) => res.json())
    .then((data) => {
      if (data.status === "error") {
        console.log("Error:", data.error);
        alert("Product not found");
        window.location.reload();
        return;
      } else {
       // console.log("Clean Data:", data);
       // console.log(data.data.quantity);
        document.getElementById("scan-result").classList.remove("hidden");
        document.getElementById("bottle-name").textContent =
          data.data.name + " " + data.data.quantity;
        document.getElementById("bottle-barcode").textContent =
          data.data.barcode;

        let rewardPoints;
        let co2Saved;
        if (data.data.material === "plastic") {
          rewardPoints = Math.round(
            baseFactor * data.data.quantitySum * pricePlastic );
            co2Saved = Math.round(
              82.8 * data.data.quantitySum * pricePlastic );

          
        } else if (data.data.material === "can") {
          rewardPoints = Math.round(
            baseFactor * data.data.quantitySum * priceCan
          );
          co2Saved = Math.round(
            300 * data.data.quantitySum * priceCan
          );
        } else if (data.data.material === "glass") {
          rewardPoints = Math.round(
            baseFactor * data.data.quantitySum * priceGlass
          );
          co2Saved = Math.round(
            60 * data.data.quantitySum * priceGlass
          );
        } else {
          rewardPoints = Math.round(
            baseFactor * data.data.quantity * pricePlastic
          );
          co2Saved = Math.round(
            82.8 * data.data.quantity * pricePlastic
          );
        }
        
            
        document.getElementById("cash-value").textContent ="₹" + Math.round(rewardPoints*pointExchangeRate);
        document.getElementById("reward-points").textContent = rewardPoints;
        document.getElementById("co2-saved").textContent = co2Saved;
      }

    })
    .catch((err) => console.error("Request Failed", err));
}

// function loadHtml5Qrcode() {
//     const scriptPath = "https://unpkg.com/html5-qrcode";
         
//                       const script = document.createElement("script");
//                       script.src = scriptPath;
//                       script.defer = true;
//                       document.body.appendChild(script);
//                       loadedScripts.add(scriptPath);
                  

// }

// document.addEventListener("DOMContentLoaded", () => {
//     loadHtml5Qrcode()
// });