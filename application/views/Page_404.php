<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Fade In */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-40px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.8s ease-out forwards;
    }

    /* Bobbing character */
    @keyframes bob {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-6px); }
    }
    .bob {
      animation: bob 2.2s ease-in-out infinite;
    }

    /* Eye blink */
    @keyframes blink {
      0%, 90%, 100% { transform: scaleY(1); }
      95% { transform: scaleY(0.1); }
    }
    .blink {
      animation: blink 2.4s infinite;
      transform-origin: center;
    }


    .hand {
  animation: wave 2s infinite ease-in-out;
  transform-origin: top center; /* shoulder ke paas pivot */
  overflow: visible; /* cut na ho */
}

@keyframes wave {
  0% { transform: rotate(0deg); }
  50% { transform: rotate(20deg); }
  100% { transform: rotate(0deg); }
}

    /* Tug hand */
    @keyframes tug {
      0%, 100% { transform: rotate(0deg); }
      50% { transform: rotate(-15deg); }
    }
    .tug {
      transform-origin: top left;
      animation: tug 1.4s ease-in-out infinite;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-100 via-white to-blue-50 px-4">

  <div class="bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden 
              p-8 md:p-10 flex flex-col md:flex-row items-center justify-between max-w-5xl w-full animate-fadeIn">

    <!-- Left Side -->
    <div class="text-center md:text-left md:w-1/2">
      <div class="text-[70px] md:text-[100px] leading-none font-black tracking-tight text-blue-600 drop-shadow">
        404
      </div>
      <p class="mt-3 text-xl md:text-3xl font-semibold text-slate-800">
        Oops! Page Not Found
      </p>
      <p class="mt-2 text-slate-500 max-w-md text-base">
        Looks like you're lost. The page you are looking for is not available!
      </p>

      <a href="/" class="mt-6 inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-3 text-white font-semibold shadow-lg hover:shadow-xl transition transform hover:scale-105 active:scale-95">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m-4-4h8" />
        </svg>
        Go to Home
      </a>
    </div>

    <!-- Right Side Animation -->
    <div class="mt-10 md:mt-0 md:w-1/2 flex justify-center">
      <svg viewBox="0 0 600 250" class="w-full max-w-[400px] md:max-w-[500px]" aria-hidden="true">
        <rect x="0" y="190" width="600" height="60" fill="#f1f5f9" />

        <!-- Background shapes -->
        <g fill="#cbd5e1">
          <ellipse cx="520" cy="165" rx="26" ry="48"></ellipse>
          <ellipse cx="90" cy="160" rx="12" ry="24"></ellipse>
          <ellipse cx="110" cy="170" rx="8" ry="16"></ellipse>
        </g>
        <g fill="#34d399">
          <ellipse cx="70" cy="180" rx="16" ry="8"></ellipse>
          <ellipse cx="130" cy="180" rx="18" ry="9"></ellipse>
          <ellipse cx="500" cy="182" rx="20" ry="10"></ellipse>
        </g>

        <!-- Character -->
        <g class="bob">
          <circle cx="300" cy="90" r="32" fill="#fda085"></circle>
          <path d="M270 90 q30-34 60 0 v18 h-60z" fill="#3b2f2f"></path>
          <path d="M282 108 q18 18 36 0 v18 q-18 10-36 0z" fill="#6b4f4f"></path>

          <!-- Eyes -->
          <rect class="blink" x="288" y="85" width="6" height="6" rx="2" fill="#0f172a"></rect>
          <rect class="blink" x="310" y="85" width="6" height="6" rx="2" fill="#0f172a"></rect>

          <!-- Body -->
          <path d="M272 120 q28-18 56 0 l8 48 h-72z" fill="#f59e0b"></path>
          <path d="M270 128 q-20 24 -8 44" stroke="#fda085" stroke-width="10" fill="none" stroke-linecap="round"></path>

          <!-- Tugging hand -->
          <g class="tug">
            <path d="M330 128 q20 18 16 40" stroke="#fda085" stroke-width="10" fill="none" stroke-linecap="round"></path>
            <circle cx="350" cy="170" r="8" fill="#fda085" stroke="#0f172a" stroke-width="2"></circle>
          </g>

          <!-- Legs -->
          <path d="M292 168 v24" stroke="#fda085" stroke-width="10" stroke-linecap="round"></path>
          <path d="M316 168 v24" stroke="#fda085" stroke-width="10" stroke-linecap="round"></path>
        </g>
      </svg>
    </div>
  </div>
</body>
</html>
