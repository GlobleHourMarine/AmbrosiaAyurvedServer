  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Full Screen Video</title>
    <style>
      html,
      body {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden;
        background: black;
      }

      #thankyouVideoContainer {
        position: relative;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        background: black;
      }

      #thankyou-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
    </style>
  </head>

  <body>

    <div id="thankyouVideoContainer">
      <video id="thankyou-video" autoplay muted playsinline>
        <source id="video-source" src="<?= base_url('assets/videos/order_con.mp4') ?>" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div>

    <script>
      const video = document.getElementById("thankyou-video");
      const source = document.getElementById("video-source");

      // Check for mobile screen and swap video source accordingly
      if (window.matchMedia("(max-width: 767px)").matches) {
        source.src = "<?= base_url('assets/videos/thanku_mobile.mp4') ?>"; // Mobile video path
        video.load();
      }

      // Play video and handle possible autoplay errors
      video.play().catch(err => {
        console.log("Autoplay prevented or failed:", err);
      });

      // Redirect user after video ends, with 1 seconds delay
      video.addEventListener("ended", () => {
        setTimeout(() => {
          window.location.href = "<?= base_url('bill') ?>";
        }, 1000);
      });
    </script>


  </body>

  </html>