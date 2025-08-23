<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Success</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
  <style>
    @keyframes drawTick {
      0% {
        stroke-dashoffset: 100;
      }
      100% {
        stroke-dashoffset: 0;
      }
    }

    .tick-animation {
      stroke-dasharray: 100;
      stroke-dashoffset: 100;
      animation: drawTick 2s ease forwards;
    }
  </style>
</head>
<body class="bg-white flex items-center justify-center h-screen w-full relative overflow-hidden">

  <!-- Modal -->
  <div class="bg-white shadow-lg rounded-lg p-10 text-center w-[90%] max-w-md mx-auto z-10">
    <div class="flex justify-center items-center mb-6">
      <div class="w-24 h-24 rounded-full bg-green-500 flex items-center justify-center">
        <svg class="w-14 h-14 text-white" viewBox="0 0 52 52">
          <circle cx="26" cy="26" r="25" fill="none" stroke="white" stroke-width="2" />
          <path fill="none" stroke="white" stroke-width="4" d="M14 27 l8 8 l16 -16" class="tick-animation"/>
        </svg>
      </div>
    </div>
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Payment Successful</h2>
    <p class="text-gray-600 mb-6">Thank you for your payment.</p>
    <button id="okBtn" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 transition duration-300">OK</button>
  </div>
  

  <!-- Audio -->
  <audio id="successSound" autoplay muted src="<?php echo base_url('assets/videos/payment_sound.mp3')?>"  preload="auto"></audio>

  <script>
    const audio = document.getElementById('successSound');
    const okBtn = document.getElementById('okBtn');

    // Play sound
    window.onload = () => {
       audio.muted = false; 
      audio.play();
      runConfettiLoop();
    };


    function runConfettiLoop() {
      let duration = 1000; 
      let end = Date.now() + duration;

      (function frame() {
        confetti({
          particleCount: 10,
          spread: 70,
          origin: { x: 0.5, y: 0.5 }
        });

        if (Date.now() < end) {
          requestAnimationFrame(frame);
        }
      })();
    }

    okBtn.addEventListener('click', () => {
      window.location.href = "<?php  echo base_url('bill')?>"; // replace with your URL
    });
  </script>
</body>
</html>
