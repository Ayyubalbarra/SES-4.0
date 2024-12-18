document.addEventListener("DOMContentLoaded", function () {
    const lampuImage = document.getElementById("lampuImage");
    const gambarBlank = document.getElementById("gambarBlank");
    const backgroundWrapper = document.getElementById("backgroundWrapper");
    const lampuText = document.getElementById("lampuText");
  
    // Pastikan elemen ditemukan sebelum menambahkan event listener
    if (lampuImage && gambarBlank && backgroundWrapper && lampuText) {
        lampuImage.addEventListener("click", changeImageAndHideLampu);
  
        function changeImageAndHideLampu() {
            lampuImage.classList.add("fade");
            lampuText.classList.add("fade");
            backgroundWrapper.style.backgroundColor = "#ffffff";
  
            setTimeout(function () {
                gambarBlank.src = "Image/Frame 14.svg";
                gambarBlank.classList.add("fade-in");
  
                setTimeout(() => {
                    gambarBlank.classList.add("visible");
                }, 50);
  
                lampuImage.classList.add("hidden");
  
                setTimeout(() => {
                    lampuText.classList.add("hidden");
                    lampuText.style.display = "none";
                }, 500);
            }, 500);
        }
    } else {
        console.error("One or more elements were not found in the DOM.");
    }
  });
  