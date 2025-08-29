// to fetch the achievement data from the server and display it on the page with api

async function fetchRewardData() {
  const response = await fetch("../api/achivment.php");
  const data = await response.json();
  return data;
}

fetchRewardData().then((data) => {
  document.getElementById("plasticSaver").textContent =
    data.achievements.bottles_100;
  document.getElementById("ecoHero").textContent =
    data.achievements.kg_co2_saved;
  document.getElementById("topRecycler").textContent =
    data.achievements.bottles_500;
  document.getElementById("weeklyChampion").textContent =
    data.achievements.kg_co2_saved;
  document.getElementById("streakMaster").textContent =
    data.achievements.streak_30_days;
});

function checkPoints() {
  if (document.getElementById("availablePoints").innerText <= 80) {
    document.getElementById("redeemBtn").classList.add("opacity-50");
    document.getElementById("redeemBtn").classList.add("cursor-not-allowed");
    document.getElementById("redeemBtn").disabled = true;
    document.getElementById("redeemText").innerText = "Not enough points";
  } else {
    document.getElementById("redeemBtn").classList.remove("opacity-50");
    document.getElementById("redeemBtn").classList.remove("cursor-not-allowed");
    document.getElementById("redeemBtn").disabled = false;
    document.getElementById("redeemText").innerText = "Ready to redeem";
  }
}
checkPoints();

// to redeem the points
document.getElementById("redeemBtn").addEventListener("click", () => {
  document.getElementById("btnLoaderR").classList.remove("hidden");
  if (document.getElementById("availablePoints").innerText <= 80) {
    document.getElementById("btnLoaderR").classList.add("hidden");
    alert("Not enough points");
    return;
  }
  redeemPoints();
});

function redeemPoints() {
  $.ajax({
    url: "../api/redeem.php",
    type: "POST",
    data: {
     
    },
    success: function (data) {
      if(data =="success"){
       alert("Points redeemed successfully");
        document.getElementById("btnLoaderR").classList.add("hidden");
        document.getElementById("redeemBtn").classList.add("opacity-50");
        document.getElementById("redeemBtn").classList.add("cursor-not-allowed");
        document.getElementById("redeemBtn").disabled = true;
        document.getElementById("redeemText").innerText = "Not enough points";
        document.getElementById("availablePoints").innerText = "0";
        document.getElementById("redeemedValue").innerText = "0";
        document.getElementById("bottleBeforeRedeemt").innerText = "0";
        fetchPointsdetails();
        checkPoints();
      }else{
        alert(data);
        fetchPointsdetails();
        document.getElementById("btnLoaderR").classList.add("hidden");
      }
    },
  });
}
function formatDate(dateString) {
    // Convert string to Date object
    const date = new Date(dateString);

    // Array of month names
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    // Extract day, month, and last two digits of year
    const day = date.getDate();
    const month = months[date.getMonth()];
    const year = date.getFullYear().toString().slice(2); // Get last 2 digits

    return `${day} ${month} ${year}`;
}


async function fetchPointsdetails() {
   
  const response = await fetch("../api/pointsdetail.php");
  const data = await response.json();
  data.data.forEach((element) => {
      let row = document.createElement("tr");
      row.className = "border-b border-gray-700/50 hover:bg-white/5 transition-colors";
    row.innerHTML = `
    <td class="py-3 px-4 text-gray-300">${formatDate(element.created_at)}</td>
    <td class="py-3 px-4 text-white">${element.recycler_name}</td>
    <td class="py-3 px-4 text-gray-300">${element.totalBottles}</td>
    <td class="py-3 px-4 text-red-400 ">${element.points}</td>
    <td class="py-3 px-4">
        <span class="${element.status} px-3 py-1 rounded-full text-sm">${element.status}</span>
    </td>
    `;
    document.getElementById("activityTable").appendChild(row);
});
}
fetchPointsdetails();


