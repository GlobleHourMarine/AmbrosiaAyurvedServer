<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>We're Upgrading!</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #667eea, #764ba2);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      color: #fff;
      text-align: center;
      padding: 20px;
    }

    .maintenance-container {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 40px;
      max-width: 500px;
      width: 100%;
      backdrop-filter: blur(20px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .maintenance-icon {
      font-size: 60px;
      margin-bottom: 20px;
      animation: rotate 2s infinite linear;
      color: #ffeb3b;
    }

    @keyframes rotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      background: linear-gradient(45deg, #fff700, #ffe9a3);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    p {
      font-size: 1.1rem;
      margin-bottom: 20px;
      color: rgba(255, 255, 255, 0.8);
    }

    .countdown {
      margin-top: 10px;
      font-size: 1.3rem;
      font-weight: bold;
      background: linear-gradient(45deg, #ffecd2, #fcb69f);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 2rem;
      }

      .maintenance-icon {
        font-size: 45px;
      }

      .maintenance-container {
        padding: 25px;
      }
    }
  </style>
</head>
<body>
  <div class="maintenance-container">
    <div class="maintenance-icon">
      <i class="fas fa-wrench"></i>
    </div>
    <h1>We're Upgrading</h1>
    <p>Our site is getting better for you. Hang tight, we'll be back soon!</p>
    <p>Thank you for your patience 💙</p>
  </div>

  
</body>
</html>
