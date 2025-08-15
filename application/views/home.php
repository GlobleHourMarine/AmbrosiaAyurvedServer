<!-- <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Ambrosia Ayurved | Trusted Source for Pure Ayurvedic Products</title>
    <meta name="description" content="Discover authentic & pure Ayurvedic products for holistic well-being at Ambrosia Ayurved. Your trusted source for traditional remedies and natural health solutions." />
</head> -->
<style>
    body {
        overflow-x: hidden;
        font-family: "Open Sans", sans-serif;
        font-size: 15px;
    }
    @media (max-width: 768px) {
    .product-container1 {
      padding: 15px !important;
    }

    .target-pharagraph, .targets {
      font-size: 14px !important;
    }

  }

    @media (max-width: 768px) {

        html,
        body {
            overflow-x: hidden !important;
            position: relative;
            max-width: 100vw;
        }
    }

    .about-area {
        height: auto;
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 0;
        margin-top: 30px;
        margin-bottom: 30px;
        margin: 50px auto;
    }

    .child-1 {
        object-fit: cover;
        height: 250px;
        margin-top: 10px !important;
    }

    .child1 {
        width: 100%;
        height: 100%;
    }

    .child-2 {
        width: 55%;
    }

    @media (max-width: 768px) {
        .carousel-item img {
            height: 300px;
        }

        .carousel-caption {
            font-size: 14px;
            padding: 10px;
        }
    }

    .read-about-us {
        margin-left: 310px !important;
    }

    @media (max-width: 576px) {
        .carousel-item img {
            height: 250px !important;
        }

        .carousel-caption h5 {
            font-size: 16px;
        }

        .carousel-caption p {
            font-size: 12px;
        }

        .carousel {
            height: 300px;
        }

        .unique-heading {
            font-size: 17px !important;
        }

        .texttt {
            border: 3px solid red;
            width: 90% !important;
            margin: auto;
        }
    }

    .underline {
        border: 2px solid #0d6efd;
        width: 20%;
        margin-bottom: 10px !important;
    }

    .phara {
        font-size: 15px;
        margin: 10px 10px;
        text-align: justify;
    }

    .choose_us {
        width: 100%;
        position: relative;
        height: 680px;
        padding: 0;
    }

    .image {
        width: 100%;
        height: 680px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .about-area {
            flex-direction: column;
            align-items: center;
            margin-top: 100px;

            .child-1,
            .child-2 {
                width: 100%;
            }

            .child-1 {
                object-fit: cover;
                height: 250px;
                margin-top: 10px !important;
            }
        }
    }

    @media (max-width: 576px) {

        .choose_us,
        .text,
        .image,
        .cover {
            width: 100%;
            height: 40%;
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .child-1 {
            margin-top: -250px !important;
        }

        .read-about-us {
            /* margin-left:310px !important; */
            /* margin:auto !important; */
            margin-left: 120px !important;
        }
    }

    .cover {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 1;
    }

    .text {
        position: absolute;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        font-weight: 700er;
        z-index: 2;
    }

    .images-container {
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        font-weight: 700er;
        z-index: 2;
        height: auto;
        width: 80%;
        padding: 30px;
        display: flex;
        justify-content: space-between;

        .img {
            height: auto;
            width: 45%;
            padding: 5px;
            margin-top: 40px;
            border-radius: 5%;
        }
    }

    .im {
        width: 95%;
        height: 230px;
        border-radius: 5%;
    }

    .txt {
        height: auto;
        padding: 20px;
        width: 100%;
        margin: auto;
        text-align: justify;
    }

    .our-products {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
        background-color: #fff0f5;
        padding: 30px 10px;
        padding: 30px 10px;
        background-image: url("<?= base_url("assets/images/back9.jpg"); ?>");
        background-repeat: no-repeat;
        object-fit: cover;
        background-size: cover;
        background-position: center;
    }

    .products {
        width: 90%;
        margin: auto;
        height: auto;
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .product-discription {
        width: 69%;
        height: auto;
    }

    .only-product {
        width: 30%;
        height: auto;
    }

    .product-dis {
        width: 95%;
        height: 220px;
        display: flex;
        margin-top: 30px;
        margin-bottom: 35px;
        justify-content: space-between;
    }

    .product-img {
        width: 19%;
    }

    .immm {
        height: 200px;
        width: 200px;
        object-fit: cover;
    }

    .product-img img {
        width: 100%;
    }

    .product-imgs img {
        width: 100%;
    }

    .product-imgs {
        width: 25%;
    }

    img {
        object-fit: cover;
    }

    .product-content {
        width: 72%;
    }

    .only-product {
        position: relative;
        text-align: center;
    }

    .order-now-btn {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        background-color: #007bff;
        color: white;
        border: 0;
        padding: 14px 28px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        border-radius: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 0 10px #007bff, 0 0 20px #0af, 0 0 40px #00e1ff;
        transition: all 0.3s ease-in-out;
        animation: glow 1.5s infinite alternate;
        bottom: 10%;
        border-radius: 5%;
        border: 3px solid green;
    }

    @keyframes blink {
        0 {
            opacity: 5;
        }

        100% {
            opacity: 0.6;
        }
    }

    .order-now-btn:hover {
        background-color: #a30505;
    }

    @media (max-width: 768px) {
        .products {
            flex-direction: column;
            align-items: center;
        }

        .product-discription {
            width: 100%;
        }

        .only-product {
            width: 100%;
            margin-top: 20px;
        }

        .product-dis {
            flex-direction: column;
            align-items: center;
            height: auto;
        }

        .product-img,
        .product-imgs {
            width: 80%;
            margin-bottom: 10px;
        }

        .product-content {
            width: 100%;
            text-align: center;
        }

        .underline {
            margin: auto;
        }
    }

    @media (max-width: 576px) {

        .product-img,
        .product-imgs {
            width: 100%;
        }

        .product-content {
            font-size: 14px;
        }
    }

    @media (max-width: 768px) {
        .choose_us img {
            flex-direction: column;
            align-items: center;
            height: auto;
        }

        .text {
            width: 100% !important;
            text-align: center !important;
        }

        .left-side-image {
            border: 1px solid red;
            display: flex;
            justify-content: center;
            width: 100% !important;
            align-items: center !important;
        }

        .im {
            width: 100%;
            align-items: center;
        }

        .txt {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .choose_us .cover {
            width: 100% !important;
            height: 1200px !important;
        }

        .choose_us .image {
            width: 100% !important;
            height: 1200px !important;
        }

        .choose_us .text {
            width: 100% !important;
            padding: 50px 20px;
        }

        .text {
            width: 100% !important;
        }

        .images-container {
            flex-direction: column !important;
            display: flex !important;
            width: 100% !important;
            height: 700px !important;
        }

        .img {
            width: 80% !important;
            margin: -200px 30px !important;
        }

        .img-2 {
            width: 80% !important;
            margin: -50px 30px !important;
        }

        .img img {
            width: 100% !important;
        }
    }

    .order-now-btn:hover {
        background-color: #a30505;
    }

    .only-product a {
        text-decoration: none;
    }

    .floating-order-btn {
        position: fixed;
        bottom: 20px;
        right: 120px;
        z-index: 1000;
    }

    .floating-order-btn {
        background-color: #d32700;
        color: white;
        border: 0;
        padding: 10px 30px;
        font-size: 16px;
        border-radius: 25px;
        cursor: pointer;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        margin-right: 30px;
    }

    .floating-order-btn button:hover {
        background-color: #d91b1b;
    }

    @media (max-width: 768px) {
        .floating-order-btn {
            right: 30px;
            bottom: 10px;
        }
    }

    .floating-order-btnnn {
        position: fixed;
        bottom: 20px;
        right: 0;
        z-index: 1000;
        animation: bounce 2s infinite alternate;
        width: 100%;
        margin-left: auto;
    }

    .floating-order-btn button {
        background-color: #d91b1b;
        color: white;
        border: 0;
        padding: 12px 40px;
        font-size: 18px;
        font-weight: 700;
        border-radius: 50px;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(255, 87, 51, 0.5);
        transition: all 0.3s ease-in-out;
        display: flex;
        align-items: center;
        gap: 8px;
        width: auto;
    }

    .floating-order-btn button:hover {
        background: linear-gradient(45deg, #f00, #f00);
        box-shadow: 0 6px 15px rgba(255, 38, 0, 0.7);
    }

    .floating-order-btn button i {
        font-size: 22px;
    }

    @keyframes bounce {
        0 {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-5px);
        }
    }

    @media (max-width: 768px) {
        .floating-order-btn {
            right: 10px;
            bottom: 15px;
        }

        .floating-order-btn button {
            padding: 12px 25px;
            font-size: 16px;
        }
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1001;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        width: 70%;
        height: auto;
        max-width: 600px;
        padding: 20px;
        padding-left: 0;
        padding-right: 0;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(238, 235, 235, 0.3);
        text-align: center;
        position: relative;
        overflow-x: hidden;
        overflow-y: hidden;
        border: 0;
        background-color: transparent;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        cursor: pointer;
        color: red;
    }

    @media (max-width: 768px) {
        .modal-content {
            width: 90%;
        }

        iframe {
            height: 350px;
        }
    }

    .main-container-register {
        background: linear-gradient(rgba(8, 28, 52, 0.6), rgba(8, 28, 52, 0.6)), url(<? phpechobase_url("/assets/images/b5.jpg") ?>);
        width: 80%;
        height: 420px !important;
        background-size: cover;
        background-position: center;
        position: relative;
        margin: auto;
        padding-bottom: 20px !important;
        border-radius: 5%;
    }

    .form-container-page {
        position: absolute;
        height: auto;
        width: 95%;
        top: 130px;
        padding: 20px;
        border-radius: 8px;
        margin: auto;
        left: 15px;
    }

    .form-buttons {
        position: absolute;
        width: 40%;
        top: 20px;
        left: 150px;
        padding: 20px;
    }

    .form-buttons button {
        width: 50%;
        padding: 6px;
        margin: 8px 0;
        border: 0;
        background-color: #f5f5dc;
        border-radius: 15px;
        text-align: center;
        cursor: default;
        color: black !important;
    }

    .form-buttons button:hover {
        background-color: #5c03aa;
    }

    .form-buttons button a {
        text-decoration: none;
        color: white;
        font-size: 18px;
        font-weight: 700;
    }

    .form_div {
        width: 80%;
        margin: auto;
    }

    .form_div input {
        border-radius: 15px;
        background-color: transparent;
        border: 1px solid #ccc;
        color: #fff;
    }

    .form_div input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .form_div input:focus {
        background-color: transparent;
        outline: 0;
        color: #fff;
    }

    .login-btnnn {
        background-color: #fff;
        color: white;
        font-size: 18px;
        width: 40%;
        border: 0;
        padding: 5px;
        border-radius: 15px;
        margin: 0 60px;
        align-items: center;
        margin-bottom: 10px;
        color: black;
        font-weight: 700er;
        margin-left: 75px !important;
    }

    .login-btnnn:hover {
        background-color: #5f1c99;
        color: #fff;
    }

    h2 {
        text-align: center;
        color: white;
    }

    .form_div label {
        font-size: 18px;
        font-weight: 700;
        color: white;
    }

    .remember {
        color: white;
    }

    @media (max-width: 576px) {
        .main-container-register {
            width: 100% !important;
            height: 900px;
            flex-direction: column !important;
        }

        .form-buttons {
            margin: 400px 0 !important;
            width: 100% !important;
        }

        .form-container-page {
            width: 100% !important;
            margin-right: -50px !important;
        }
    }

    .form-logo {
        width: 80%;
        height: 120px;
        margin-left: 12px;
        margin-top: -20px !important;

        img {
            width: 100%;
            height: 100%;
        }
    }

    .form-label {
        margin-bottom: 15px;
        color: yellow;
    }

    .product-container1 {
        width: 100%;
        height: auto;
        display: flex;
        background-color: #f2f8f4;
        justify-content: space-between;
        padding-left: 30px !important;
        margin-top: 0 !important;
        margin-bottom: 10px;
    }

    .product-container2 {
        width: 100%;
        height: auto;
        display: flex;
        background-color: #f1f3fc;
        margin-top: 0;
        justify-content: space-between;
        padding: 10px 30px;
    }

    .card-content {
        margin-top: 12px !important;
        text-align: center;
    }

    .imagesess {
        width: 73%;
        height: auto;
        object-fit: cover;

        img {
            width: 100%;
            height: 100%;
            padding-right: 30px;
            padding-bottom: 30px;
        }
    }

    .textt {
        border: 2px solid blue;
        width: 50%;
        height: auto;
        text-align: left;
        margin: auto;
        left: 20%;
    }

    .underlinee {
        margin: auto;
        border: 2px solid rgba(61, 69, 176, 0.8);
        width: 25%;
        margin-bottom: 10px;
    }

    .under-line {
        margin: auto;
        border: 2px solid #028a0f;
        width: 70%;
    }

    .underlinee {
        margin: auto;
        border: 2px solid rgba(107, 176, 61, 0.8);
        width: 40%;
        margin-bottom: 10px;
    }

    .product-container2 {
        width: 100%;
        height: auto;
        display: flex;
        background-color: #f1f3fc;
        margin-top: 0;
        justify-content: space-between;
        padding: 20px 30px;
    }

    .imag {
        width: 35%;
        height: 280px;

        img {
            width: 100%;
            height: 280px;
        }
    }

    .circle-containers-div {
        width: 63%;
        height: auto;
    }

    .circle-container {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        margin-top: 15px;

        background-color: rgba(144, 238, 144, 0.2);

        box-shadow: none !important;
        border: none !important;
    }

    .circle-container:hover {
        box-shadow: 0 0 10px 8px rgba(164, 233, 164, 0.6), 0 0 10px 4px rgba(205, 224, 215, 0.4) !important;

        transition: all 0.3s ease-in-out;
        border: none !important;
    }

    .cards:hover {
        transform: scale(1.05);
        box-shadow: 0 0 2px 1px rgba(105, 115, 255, 0.8);
        box-shadow: 0 0 2px 2px rgba(181, 181, 184, 0.8);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .cards-holder {
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin-top: 7px;
        height: 320px;
        position: relative;
    }

    .cards {
        border: 1px solid #333;
        border-radius: 5%;
        height: 300px;
        width: 30%;
        margin: 0 10px;
        padding-bottom: 30px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .cards:hover {
        transform: scale(1.05);

        box-shadow: 0 0 2px 1px rgba(105, 115, 255, 0.8);
        box-shadow: 0 0 2px 2px rgba(181, 181, 184, 0.8);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .text2 {
        position: absolute;
        top: 30%;
        left: 38%;
        text-align: center;
        color: white;
        font-weight: 700er;
        z-index: 2;
        height: auto;
        width: 35%;
    }

    .phara {
        padding: 15px;
        text-align: center;
    }

    @media (max-width: 576px) {
        .product-container1 {
            flex-direction: column;
            height: auto;
            width: 100%;
        }

        .imagesesss,
        .textt {
            width: 100% !important;

            p {
                width: 90% !important;
            }
        }

        .product-container2 {
            flex-direction: column;
            height: auto;
            width: 100%;
        }

        .imag,
        .circle-containers-div {
            width: 100% !important;
            height: auto;
        }

        .cards-holder {
            flex-direction: column !important;
            height: auto !important;
            width: 100%;
        }

        .cards {
            width: 100% !important;

            p {
                width: 60%;
                margin: auto;
            }
        }

        .under-line {
            width: 40%;
        }

        .under-line {
            width: 40%;
        }

        .product-container2 {
            flex-direction: column;
            height: auto;
            width: 100%;
        }

        .imag,
        .circle-containers-div {
            width: 100% !important;
            height: auto;
        }

        .cards-holder {
            flex-direction: column !important;
            height: auto !important;
            width: 100%;
        }

        .cards {
            width: 100% !important;

            p {
                width: 60%;
                margin: auto;
            }
        }

        .choose_us .text2 {
            margin: 170px 0 !important;
            width: 100%;
            margin-left: -40px !important;
            text-align: center !important;
        }
    }

    .ingreddients-specification {
        color: darkred;
        font-size: 35px;
        font-weight: 700er;
        text-align: center;
        margin: 20px 0;
    }

    .about-area {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        height: auto;
    }

    .child-1,
    .child-2 {
        opacity: 0;
        transition: all s ease-in-out;
    }

    .child-1 {
        transform: translateX(-100%);
    }

    .child-2 {
        transform: translateX(100%);
    }

    .about-area.active .child-1 {
        opacity: 1;
        transform: translateX(0);
    }

    .about-area.active .child-2 {
        opacity: 1;
        transform: translateX(0);
    }

    .product-container1 {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        overflow: hidden;
        background-color: #f5f5f5 !important;
    }

    .imagesess,
    .textt {
        opacity: 0;
    }

    .product-container1.active .imagesess {
        opacity: 1;
        transform: translateX(0);
    }

    .product-container1.active .texttt {
        opacity: 1;
        transform: translateX(0);
    }

    .product-container2 {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        overflow: hidden;

        background-color: rgba(191, 247, 191, 0.2) !important;
    }

    .imag {
        opacity: 0;
        transform: translateY(-100%);
        transition: all 1s ease-in-out;
    }

    .cards-holder {
        opacity: 0;
        transform: translateY(100%);
        transition: all 1s ease-in-out;
    }

    .product-container2.active .imag {
        opacity: 1;
        transform: translateY(0);
    }

    .product-container2.active .cards-holder {
        opacity: 1;
        transform: translateY(0);
    }

    .cards {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .product-container2.active .cards:nth-child(1) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.2s;
    }

    .product-container2.active .cards:nth-child(2) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.4s;
    }

    .product-container2.active .cards:nth-child(3) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.6s;
    }

    .cards:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    .about-area {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        opacity: 0;
        transform: translateY(50px);
        animation: fadeSlide 1s ease-out forwards;
    }

    @keyframes fadeSlide {
        0 {
            opacity: 0;
            transform: translateY(50px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .child-1 img {
        transition: transform 0.5s ease-in-out;
    }

    .child-1 img:hover {
        transform: scale(1.05);
    }

    .child-2 h1 {
        opacity: 0;
        transform: translateX(-30px);
        animation: fadeLeft 1s ease-out 0.5s forwards;
    }

    @keyframes fadeLeft {
        0 {
            opacity: 0;
            transform: translateX(-30px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .order-now-btn {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        background-color: #028a0f;
        color: white;
        border: 1px solid #1a6926;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        border-radius: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 0 8px #04c120, 0 0 15px #028a0f;
        transition: all 0.3s ease-in-out;
        animation: soft-glow 1.5s infinite alternate;
        bottom: 10%;
    }

    @keyframes soft-glow {
        0 {
            box-shadow: 0 0 10px #04c120, 0 0 20px #028a0f;
        }

        100% {
            box-shadow: 0 0 15px #04c120, 0 0 25px #028a0f;
        }
    }

    .order-now-btn:hover {
        background-color: #026f0c;
        border-color: #02a311;
        box-shadow: 0 0 20px #04c120, 0 0 30px #028a0f;
        transform: translateX(-50%) scale(1.02);
        color: white !important;
    }

    .choose_us {
        opacity: 0;
        transform: translateY(100px);
        transition: all 1s ease-in-out;
    }

    .choose_us.show {
        opacity: 1;
        transform: translateY(0);
    }

    .image {
        transition: transform 1s ease-in-out, filter 0.5s ease-in-out;
        filter: brightness(0.8);
    }

    .image:hover {
        transform: scale(1.05);
        filter: brightness(1);
    }

    .im {
        transition: transform 0.5s ease-in-out;
    }

    .im:hover {
        transform: scale(1.1);
    }

    .read-more {
        text-decoration: none !important;
        font-weight: 700;
    }

    .cards {
        transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
    }

    @keyframes autoHover {

        0,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    .cards:nth-child(1) {
        animation: autoHover 3s infinite 0;
    }

    .cards:nth-child(2) {
        animation: autoHover 3s infinite 1s;
    }

    .cards:nth-child(3) {
        animation: autoHover 3s infinite 2s;
    }

    .cards:hover {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .product-container2 {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        padding: 20px;
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease, transform 1s ease;
    }

    .imag {
        opacity: 0;
        transform: translateY(-50px);
        transition: opacity 1.2s ease, transform 1.2s ease;
    }

    .cards-holder {
        display: flex;
        gap: 20px;
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1.2s ease, transform 1.2s ease;
    }

    .cards {
        background-color: #f9f9f9;
        border-radius: 12px;
        padding: 20px;
        width: 250px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(30px);
        opacity: 0;
        transition: transform 0.6s ease, opacity 0.6s ease, box-shadow 0.5s ease;
    }

    .cards:hover {
        transform: translateY(0);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .txt h5 {
        margin-top: 10px;
        color: darkgreen;
    }

    .txt p {
        font-size: 14px;
        color: #555;
        line-height: 1.5;
    }

    .underline {
        width: 65px;
        height: 2px;
        border-bottom: 1px solid darkgreen;
        margin: 5px 0;
        transform: scaleX(0);
        transition: transform 0.5s ease;
        margin: auto;
    }

    .cards:hover .underline {
        transform: scaleX(1);
        margin: auto;
    }

    .show {
        opacity: 1;
        transform: translateY(0);
    }

    .show .imag {
        opacity: 1;
        transform: translateY(0);
    }

    .show .cards-holder {
        opacity: 1;
        transform: translateY(0);
    }

    .show .cards:nth-child(1) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.2s;
    }

    .show .cards:nth-child(2) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.4s;
    }

    .show .cards:nth-child(3) {
        opacity: 1;
        transform: translateY(0);
        transition-delay: 0.6s;
    }

    .carousel {
        margin-bottom: 0 !important;
    }

    .about-area {
        margin-top: 0;
        margin-bottom: 3px;
    }

    .choose-item {
        text-align: center;
        padding: 15px;
    }

    .choose-item img {
        width: 80px;
        height: 80px;
        margin-bottom: 10px;
    }

    .choose-item p {
        font-size: 16px;
        font-weight: 700;
    }

    .choice {
        color: darkgreen;
        font-size: 16px;
    }

    .unique-heading {
        text-align: center;
        /* color: rgb(118, 150, 123); */
        font-weight: 900;
        /* font-family: "Cinzel", serif; */
        /* text-shadow: 2px 2px 10px rgba(124, 187, 124, 0.8), 0 0 15px rgba(34, 139, 34, 0.6), 0 0 20px rgba(0, 255, 127, 0.5); */
        letter-spacing: 3px;
        font-size: 22px;
        text-transform: uppercase;
        padding-top: 20px;
        padding-bottom: 15px;

        font-size: 20px;
        background-color: white !important;
        color: black;
        /* border:2px solid red; */
        margin-bottom: 0px !important;
        color: black !important;
        text-shadow: none;
    }

    .floating-order-btnnn a {
        color: white;
        font-weight: 700;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .product-container1 {
            flex-direction: column;
            text-align: center;
        }

        .texttt,
        .imagesess {
            width: 100%;
        }

        .texttt p {
            font-size: 14px;
            width: 90%;
            margin: auto;
        }

        .imagesess img {
            max-width: 500px;
        }
    }

    @media (max-width: 480px) {
        .texttt h3 {
            font-size: 18px;
        }

        .texttt p {
            font-size: 12px;
        }

        .imagesess img {
            max-width: 250px;
        }

        .order-now-btn {
            padding: 7px 20px;
            font-size: 13px;
        }
    }

    .carousel-item img {
        width: 100%;
        height: 100px;
        object-fit: contain;
        display: block;
    }

    @media (max-width: 768px) {
        .carousel-inner {
            width: 100%;
            height: 250px;
        }

        .carousel-item {
            align-items: flex-start;
        }

        .carousel-item img {
            object-fit: contain;
            height: auto;
            object-position: top;
            margin-bottom: 0;
        }

        .imagesess {
            margin: auto;
        }

        .order-product-now {
            /* border:3px solid yellow; */
            padding: 5px 8px !important;
            font-size: 13px !important;
            border: none !important;
            border-color: green !important;
        }

        .order-product-now:hover {
            background-color: darkgreen !important;
            /* border:8px solid yellow !important; */
            box-shadow: none !important;
        }
    }

    .read-more-button {
        display: inline-block;
        padding: 6px 20px;
        background-color: #007bff;
        color: white;
        font-size: 16px;
        font-weight: 500;
        text-decoration: none !important;
        border: 0;
        border-radius: 6px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        margin-left: 40px !important;
    }

    .read-more-button:hover {
        transform: translateY(-2px);
        color: white;
    }

    button {
        border: 0;
    }

    .carousel-item {
        width: 100%;
        height: auto;
        margin-top: 0;
        position: relative;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    @media (max-width: 576px) {
        .carousel {
            height: 280px;
            width: 100%;
        }

        .carousel-inner {
            height: 280px !important;
        }

        .carousel-item {
            width: 100%;
            height: 280px !important;
            position: relative;
            object-fit: cover;
        }

        .carousel-item img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }
    }

    .carousel-item img {
        display: block;
    }

    .carousel-item img.phone {
        display: none;
    }

    @media (max-width: 576px) {
        .carousel-item img {
            display: none;
        }

        .carousel-item img.phone {
            display: block;
        }

        .carousel {
            height: 280px;
        }

        .carousel-inner {
            height: 280px !important;
        }

        .carousel-item {
            height: 280px !important;
            object-fit: cover;
        }

        .carousel-item img,
        .carousel-item img.phone {
            width: 100% !important;
            height: 100% !important;
            object-fit: contain !important;
        }
    }

    @media (max-width: 576px) {
        .imagesess {
            width: 100%;
            height: 300px !important;
            padding: 0 !important;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .cards-holder {
            padding: 10px 0px;
            height: auto;
            /* border:3px solid red; */
        }

        .cards {
            padding-left: 0 !important;
            padding-right: 0 !important;
            width: 70% !important;
            margin: auto;
            margin-bottom: 20px;
            padding-bottom: 20px !important;
            /* border:1px solid yellow;; */
        }

        .hold {
            padding: 0 !important;
            width: 100% !important;
            width: 110% !important;
            margin: 0 !important;
            margin-left: -18px !important;
        }

        .card-content {
            padding: 0 !important;
            width: 100% !important;
            margin: auto;
            /* border:1px solid gray; */
            padding: 0px;

            p {
                width: 90% !important;
                /* border:2px solid red; */
                margin: auto;
            }

        }

        .unique-heading {
            color: black;
            padding: 17px 24px;
            font-size: 16px;
        }

        .try-now {
            margin-right: auto !important;
            background-color: none !important;
            padding: 0 !important;
            margin-left: -40px !important;
        }

        .imagesess .image-a5 {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain !important;
            margin: 0 !important;
        }

        .texttt {
            width: 100% !important;
            margin: 0;
            margin-left: -20px;
            padding: 0 !important;
            border: 0;
        }

        .target-pharagraph {
            font-size: 14px !important;
            text-align: center !important;
            width: 100% !important;
            padding: 0;
            margin-bottom: 10px !important;
        }

        .targets {
            padding: 0 !important;
            text-align: left;
            width: 100% !important;
            margin-left: 20px !important;
        }

        .order-product-now {
            /* border:3px solid yellow; */
            padding: 5px 7px !important;
            font-size: 14px !important;
        }

        .order-product-now:hover {
            background-color: darkgreen !important;
            /* border:8px solid yellow !important; */
            box-shadow: none !important;



        }



        .circle-containers-div {
            border: 1px solid black;
            border-radius: 15px;
            padding: 20px 0px !important;

        }
    }

    body {
        overflow-x: hidden;
        font-family: "Open Sans", sans-serif;
        font-size: 15px;
    }

    .targets {
        font-size: 15px;
        margin-left: 60px;
    }

    .target-pharagraph {
        text-align: center;
        width: 90%;
        font-size: 15px;
        margin: auto;
        margin-top: 0;
    }

    .try-now {
        text-align: center;
        margin: 0 10px;
    }

    .ingre {
        margin-top: 15px;
        padding: 0;
        margin: 0;
        background-color: #f1f3fc !important;
        margin-top: 0;
        padding: 15px;
    }

    .blog-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        width: 300px;
        margin: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        background: #fff;
    }

    .blog-card.show {
        opacity: 1;
        transform: translateX(0);
    }

    .blog-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        cursor: pointer;
    }

    .blog-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .blog-card-content {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 15px;
    }

    .blog-card-content p {
        flex-grow: 1;
        margin-bottom: -26px;
    }


    .blog-card h3 {
        font-size: 1.2em;
        margin-bottom: 10px;
    }

    .blog-card a {
        text-decoration: none;
        color: #2c3e50;
    }

    .blog-card p {
        color: black;
    }

    .blog-card small {
        color: black;
    }

    .read-more-btn {
        align-self: flex-start;
        background-color: green;
        padding: 8px 12px;
        border-radius: 6px;
        color: white;
        text-decoration: none;
        font-weight: bold;
        margin-top: auto;
    }

    .read-more-btn:hover {
        background-color: blue !important;
    }

    .read-more-btnnn:hover {
        background-color: blue !important;
    }

    .carousel-slide {
        display: none;
        text-align: center;
    }

    .carousel-slide.active {
        display: block;
    }

    .carousel-slide img {
        width: 100%;
        height: 200px;
        object-fit: contain;
        border-radius: 8px;
    }

    .cta-button {
        display: inline-block;
        margin-top: 12px;
        padding: 8px 16px;
        font-size: 14px;
        background-color: #007bff;
        color: #fff;
        border: 0;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .cta-button:hover {
        background-color: #0056b3;
    }

    .close-btn {
        position: absolute;
        top: 8px;
        right: 12px;
        font-size: 22px;
        font-weight: 700;
        color: black;
        cursor: pointer;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1000;
    }

    @media (max-width: 480px) {


        .carousel-slide img {
            height: 150px;
        }

        .cta-button {
            font-size: 13px;
            padding: 6px 14px;
        }

        .order-product-now {
            /* border:3px solid yellow; */
            padding: 9px 13px !important;
            font-size: 14px !important;
        }

        .order-product-now:hover {
            background-color: darkgreen !important;
            /* border:8px solid yellow !important; */
            box-shadow: none !important;
        }
    }

    .product-container1,
    .product-container2 {
        animation: none !important;
        transition: none !important;
        opacity: 1 !important;
        transform: none !important;
    }

    .product-container1 {
        width: 100%;
        height: auto;
        display: flex;
        background-color: #f2f8f4 !important;
        justify-content: space-between;
        padding-left: 30px !important;
        margin-top: 0 !important;

        background-color: white !important;
        /* border:2px solid  red !important; */
        padding-bottom: 0px !important;
        margin-bottom: 0px !important;
    }

    .product-container2 {
        width: 100%;
        height: auto;
        display: flex;
        background-color: #f1f3fc;
        margin-top: 0;
        justify-content: space-between;
        padding: 20px 30px !important;
    }

    .cards:hover {
        transform: none !important;
        box-shadow: none !important;
    }

    @keyframes autoHover {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1);
        }
    }

    .cards {
        transform: scale(1) !important;
        animation: none !important;
    }

    .imag img {
        width: 100%;
        height: auto;
        max-height: 280px;
    }

    .child-1,
    .child-2,
    .imagesess,
    .textt,
    .imag,
    .cards-holder,
    .cards {
        transition: none !important;
        opacity: 1 !important;
        transform: none !important;
    }

    .about-area.active .child-1,
    .about-area.active .child-2,
    .product-container1.active .imagesess,
    .product-container1.active .texttt,
    .product-container2.active .imag,
    .product-container2.active .cards-holder,
    .product-container2.active .cards {
        opacity: 1 !important;
        transform: none !important;
    }

    .circle-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .read-more-btnnn:hover {
        background-color: blue !important;
    }

    a:hover {
        color: blue;
        /* Color on hover */
    }

    .promo-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.6);
        /* z-index: 9999; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .promo-content {
        position: relative;
        background: #fff;
        border-radius: 18px;
        padding: 0;
        max-width: 600px;
        width: 90%;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        animation: popupFadeIn 0.4s ease-in-out;
    }

    .promo-content img {
        width: 100%;
        display: block;
        border-radius: 18px;
    }

    .promo-close {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #000;
        color: #fff;
        border: none;
        font-size: 20px;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        cursor: pointer;
        z-index: 10;
    }

    #promo-popup {
        z-index: 1000 !important;
    }

    @keyframes popupFadeIn {
        from {
            opacity: 0;
            transform: scale(0.85);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .order-product-now {
        /* border:3px solid yellow; */
        padding: 9px 15px !important;
        font-size: 16px !important;
    }

    .order-product-now:hover {
        background-color: darkgreen !important;
        /* border:8px solid yellow !important; */
        box-shadow: none !important;
    }

    .try_now {
        background-color: green !important;
        margin-left: 65px;
        padding: 8px 14px;
        color: white;
        text-dedcocration: none;
        text-decoration: none;
        border-radius: 5px;
    }

    .try_now:hover {
        background-color: darkgreen !important;
        color: white;

    }

    .read-more-btn {
        background-color: green !important;
    }

    .read-more-btn:hover {
        background-color: darkgreen !important;

    }

    .blog-card h3 :hover {
        text-decoration: none;
        color: #1c684eff;
    }

    .h5,
    h5 {
        font-size: 1.2rem;
    }

    .card-content {
        margin-top: 7px !important;
    }

    .blog-card-link {
    display: block; /* Ensures the whole area is clickable */
    text-decoration: none;
}

.blog-card {
    cursor: pointer; /* Makes it clear that it's clickable */
}

.blog-card img {
    width: 100%;
    height: auto;
}

.blog-card-content {
    padding: 10px;
    background: #fff;
}

.read-more-btn {
    color: #007bff;
    cursor: pointer;
    text-decoration: underline;
}

.carousel-indicators [data-bs-target] {
  background-color: #000; /* black dots */
  width: 10px;
  height: 10px;
  border-radius: 100%;
}
.carousel-indicators .active {
  background-color: #28a745; /* green dot for active */
}

</style>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
<!-- <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll(".carousel-slide");

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle("active", i === index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    setInterval(nextSlide, 3000); // Change slide every 3 seconds
</script> -->
<?php
$user_id = $this->session->userdata('user_id');
if (empty($user_id)) {
    $user_id = $this->input->cookie('guest_user_id', TRUE);
} ?>
<!-- Attractive Popup Modal -->
<?php if (!empty($banner)): ?>
    <div id="promo-popup" class="promo-popup" style="display: none;">
        <div class="promo-content">
            <button class="promo-close" onclick="closePromo()">×</button>
            <img src="<?= base_url('uploads/banners/' . $banner[0]->image) ?>" alt="Promo" />
        </div>
    </div>
<?php endif; ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="margin-top:30px;">
  
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>

  <!-- Slides -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('/assets/images/S01.webp') ?>" class="d-none d-md-block w-100" alt="carousel-image" />
      <img src="<?php echo base_url('/assets/images/phone01.webp') ?>" class="d-block d-md-none w-100" alt="carousel-image" />
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('/assets/images/S-2.webp') ?>" class="d-none d-md-block w-100" alt="carousel-image" />
      <img src="<?php echo base_url('/assets/images/phone02.webp') ?>" class="d-block d-md-none w-100" alt="carousel-image" />
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('/assets/images/S003.webp') ?>" class="d-none d-md-block w-100" alt="carousel-image" />
      <img src="<?php echo base_url('/assets/images/phone03.webp') ?>" class="d-block d-md-none w-100" alt="carousel-image" />
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('/assets/images/sli1.webp') ?>" class="d-none d-md-block w-100" alt="carousel-image" />
      <img src="<?php echo base_url('/assets/images/phone04.webp') ?>" class="d-block d-md-none w-100" alt="carousel-image" />
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('/assets/images/S05.webp') ?>" class="d-none d-md-block w-100" alt="carousel-image" />
      <img src="<?php echo base_url('/assets/images/phone5.webp') ?>" class="d-block d-md-none w-100" alt="carousel-image" />
    </div>
  </div>

   <!-- Optional Button for Slider  -->
  <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span style="background-color: black; padding: 0.5rem; border-radius: 9999px;" class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span style="background-color: black; padding: 0.5rem; border-radius: 9999px;" class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
 
</div>

<div class="floating-order-btnnn">
    <a style="background-color:green;" href="<?php echo base_url('our_products'); ?>" class="order-now-btn   order-product-now"> <i class="fas fa-shopping-cart"></i> Order Now </a>
</div>

<!-- <div style="width: 100%; height: auto; background-color: rgb(242, 248, 244); margin-bottom: 0px; border: 2px solid rgb(242, 248, 244); margin-top: 10px;"> -->
<h1 class="unique-heading" style="font-size:23px;padding-bottom:0px !important;">Goodbye Diabetes with A5 Herbal Supplement </h1>
<!-- <div class="underlinee" style="margin-bottom: 0px;background-color:transparent !important;"></div> -->
<!-- </div>  -->

<div class="product-container1" style="background-color: #f5f5f5; margin-top: 0px; padding: 20px;">
  <div class="texttt" style="margin-bottom: 25px;">
    <p class="target-pharagraph" style="text-align: left; font-size: 16px; line-height: 1.6; margin-bottom: 10px;">
      A5 Herbal Supplement isn’t just another Ayurvedic product — it’s a thoughtfully formulated wellness blend powered by
      <b>25+ rare herbs from India and Malaysia.</b> Unlike conventional approaches that often manage only sugar levels, A5 supports your body’s natural ability to maintain balance and vitality — without chemicals or artificial additives.
    </p>

    <p class="targets" style="font-size: 15px; line-height: 1.6; margin-bottom: 15px;">
      ✅ Supports holistic sugar balance, energy, and metabolism.<br />
      ✅ 100% Ayurvedic formulation — no added chemicals or preservatives.<br />
      ✅ Crafted with 25+ time-tested herbs backed by traditional wisdom.<br />
      ✅ Encourages natural wellness without dependency.
    </p>
        <button class="  " style="background:none !important;padding:0px; color:white;!important;"><a class=" try_now" href="<?php echo base_url('our_products'); ?> ">Try Now...</a></button>
  </div>

  <div class="imagesess" style="margin-top: 10px;">
    <img src="<?php echo base_url('/assets/images/H02.webp') ?>" loading="lazy" alt="product-image"
      style="width: 100%; height: auto; display: block; max-width: 100%;" />
  </div>
</div>

<h3 class=" unique-heading " style="font-size:22px;margin-top:0px !important;padding-top:0px !important;margin-bottom:15px !important;">Key Ingredients of A5 Herbal Supplement</h3>
<div class="product-container2" style="margin-bottom: 10px; padding: 5px 0px;">
    <div class="imag" style="margin-top: 0px;">
        <img src="<?php echo base_url('/assets/images/left.webp') ?>" loading="lazy" class="d-block w-80" alt="Ingredients" />
    </div>
    <div class="circle-containers-div">
        <div class="cards-holder">
            <div class="cards">
                <div class="circle-container">
                    <img src="<?php echo base_url('/assets/images/Gudmar.webp') ?>" loading="lazy" class="card-img-top" alt="Ingredients" />
                </div>
                <div class="tx-t card-content">
                    <h6>Gymnema</h6>
                    <div class="under-line"></div>
                    <p>Regulates sugar levels and improves insulin sensitivity.</p>
                </div>
            </div>
            <div class="cards">
                <div class="circle-container">
                    <img src="<?php echo base_url('/assets/images/Jamun.webp') ?>" loading="lazy" class="card-img-top" alt="Ingredients" />
                </div>
                <div class="tx-t card-content">
                    <h6>Java Plum</h6>
                    <div class="under-line"></div>
                    <p>Controls blood sugar and provides antioxidants.</p>
                </div>
            </div>
            <div class="cards">
                <div class="circle-container">
                    <img src="<?php echo base_url('/assets/images/Bitter Gourd.webp') ?>" loading="lazy" class="card-img-top" alt="Ingredients" />
                </div>
                <div class="tx-t card-content">
                    <h6>Bitter Gourd</h6>
                    <div class="under-line"></div>
                    <p>Boosts metabolism and naturally lowers blood sugar levels.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-container2" style="margin-bottom: 30px;">
    <div class="imag" style="margin-top: 20px;">
        <img src="<?php echo base_url('/assets/images/left 1.webp') ?>" loading="lazy" class="d-block w-90" alt="Ingredients" />
    </div>
    <div class="circle-containers-div">
        <div class="cards-holder hold">
            <div class="cards">
                <div class="circle-container">
                    <img src="<?php echo base_url('/assets/images/Neemm.webp') ?>" loading="lazy" class="card-img-top" alt="Ingredients" />
                </div>
                <div class="tx-t card-content">
                    <h6>Azadirachta</h6>
                    <div class="under-line"></div>
                    <p>Balances blood sugar and strengthens immunity.</p>
                </div>
            </div>
            <div class="cards">
                <div class="circle-container">
                    <img src="<?php echo base_url('/assets/images/s5.webp') ?>" loading="lazy" class="card-img-top" alt="Ingredients" />
                </div>
                <div class="tx-t card-content">
                    <h6>Indian Gooseberry</h6>
                    <div class="under-line"></div>
                    <p>Rich in antioxidants, controls sugar absorption.</p>
                </div>
            </div>
            <div class="cards">
                <div class="circle-container">
                    <img src="<?php echo base_url('/assets/images/Holy Basil.webp') ?>" loading="lazy" class="card-img-top" alt="Ingredients" />
                </div>
                <div class="tx-t card-content">
                    <h6>King’s Salad</h6>
                    <div class="under-line"></div>
                    <p>Regulates blood sugar and aids in diabetes management.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-area" style="padding: 0px !important;padding-bottom:30px !important;">
    <div class="child-1">
        <img class="child1" src="<?php echo base_url('/assets/images/our-services15.webp') ?>" loading="lazy" class="d-block w-100" alt="Ingredients" />
    </div>
    <div class="child-2">
        <h2 class="unique-heading" style="text-align: center;padding-bottom:0px !important;">About Us</h2>
        <!-- <div class="underline" style="margin:auto;margin-bottom:0px;!important"></div> -->
        <p class="phara" style="margin-top:0px !important;">
            Every health struggle tells a story — a journey through pain, frustration, <br />
            hope, and the desire to feel truly well again.<br />
            <b>At Ambrosia Ayurved, our story began with a heartfelt question:</b><br />
            Why do so many people continue to suffer, even after doing everything they’re told?
        </p>
        <!-- <button style="text-align: center; font-weight: bolder; text-decoration: none;"><a class="text-align:center;margin:auto;text-decoration:none;" class=" try_now" href="about_us">Read More...</a></button> -->
        <button class="  " style="background:none !important;padding:0px; color:white;!important; "><a class=" try_now   read-about-us" href="<?php echo base_url('about_us'); ?> ">Read More</a></button>

    </div>
</div>
<div class="container-fluid text-center" style="background-color: #f5f5f5; width: 100% !important; margin: auto;">
    <h4 class="unique-heading" style="background-color: #f5f5f5 !important;padding-bottom:5px !important;padding-top:30px !important;">Why Choose Us?</h4>
    <p class="choice">Experience the best with our unique offerings</p>
    <div class="row justify-content-center">
        <div class="col-md-2 col-6">
            <div class="choose-item">
                <img src="<?php echo base_url('/assets/images/our-services1212.webp') ?>" loading="lazy" alt="Fast Delivery" />
                <p>Fast Delivery</p>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="choose-item">
                <img src="<?php echo base_url('/assets/images/malaysia.webp') ?>" loading="lazy" alt="Imported from Malaysia" />
                <p>Imported from Malaysia</p>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="choose-item">
                <img src="<?php echo base_url('/assets/images/gurantee.webp') ?>" loading="lazy" alt="100% Sugar Killer" />
                <p>100% Sugar Killer</p>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="choose-item">
                <img src="<?php echo base_url('/assets/images/our-services1010.webp') ?>" loading="lazy" alt="Affordable Price" />
                <p>Affordable Price</p>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="choose-item">
                <img src="<?php echo base_url('/assets/images/yoga1.webp') ?>" loading="lazy" alt="Health & Wellness Focus" />
                <p>Health & Wellness Focus</p>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="choose-item">
                <img src="<?php echo base_url('/assets/images/time.webp') ?>" loading="lazy" alt="Saves Time" />
                <p>Saves Time</p>
            </div>
        </div>
    </div>
</div>

<section id="latest-blogs" style="padding: 40px; background: #f9f9f9;">
    <div style="max-width: 1100px; margin: auto;">
        <h2 style="text-align: center; font-size: 2em;  font-weight: bold;background-color:none;" class="unique-heading">Latest Blogs</h2>
        <div style="width: 15%; height: 2px; background-color: green; margin: auto; margin-bottom: 30px;"></div>
        <div id="blog-posts" style="display: grid; gap: 20px; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
            <!-- Blog cards will be injected here -->
        </div>
    </div>
</section>
<!-- Owl Carousel Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<?php
$uri = uri_string(); // Gets the current URL path
if ($uri == 'home' || $uri == '') { // Adjust 'home' if your homepage route is different
?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Ambrosia Ayurveda",
            "url": "https://ambrosiaayurved.in",
            "logo": "https://ambrosiaayurved.in/assets/images/new_logo11.webp",
            "sameAs": [
                "https://www.instagram.com/ambrosia.ayurved/",
                "https://www.facebook.com/profile.php?id=61575172705272"
            ]
        }
    </script>
<?php } ?>

<script>
    function closePromo() {
        document.getElementById("promo-popup").style.display = "none";

        // Save current time as the time the popup was closed
        const now = new Date();
        localStorage.setItem("promo_closed_time", now.getTime());
    }

    document.addEventListener("DOMContentLoaded", function() {
        const lastClosed = localStorage.getItem("promo_closed_time");
        const now = new Date().getTime();

        // 86400000 = 24 hours in milliseconds
        const oneDay = 24 * 60 * 60 * 1000;

        if (!lastClosed || now - lastClosed > oneDay) {
            setTimeout(() => {
                document.getElementById("promo-popup").style.display = "flex";
            }, 3000); // Show after 3 seconds
        }
    });

    $(document).ready(function() {
        $(".charter-carousel-2").owlCarousel({
            loop: true, // Enables infinite loop
            margin: 10, // Adds space between items
            nav: false, // Hides navigation arrows
            dots: false, // Hides dots
            autoplay: true, // Enables automatic sliding
            autoplayTimeout: 3000, // Time in ms for each slide
            autoplayHoverPause: true, // Pauses on hover
            responsive: {
                0: {
                    items: 1 // Number of items for small screens
                },
                600: {
                    items: 2 // Number of items for medium screens
                },
                1000: {
                    items: 3 // Number of items for larger screens
                }
            }
        });
    });



    document.addEventListener("scroll", function() {
        const button = document.querySelector(".floating-order-btn");
        if (window.scrollY > 100) {
            button.style.opacity = "1";
        } else {
            button.style.opacity = "0";
        }
    });




    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("orderModalFirst"); // Ensure ID matches the modal
        const openModalBtn = document.getElementById("openModal"); // Now button
        const closeModalBtn = document.querySelector("#orderModalFirst .close"); // Close button inside modal

        openModalBtn.addEventListener("click", function() {
            modal.style.display = "flex";
        });

        closeModalBtn.addEventListener("click", function() {
            modal.style.display = "none";
        });

        // Close modal when clicking outside
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("orderModalSecond");

        // Check PHP session value (inserted by PHP)
        <?php if ($this->session->flashdata('OrderModelSecond')): ?>
            if (modal) {
                modal.style.display = "flex"; // Show modal automatically
            }
        <?php endif; ?>
    });


    fetch("https://ambrosiaayurved.in/blog/wp-json/wp/v2/posts?_embed")
        .then(response => response.json())
        .then(posts => {
            console.log("Error is Posts", posts)
            let html = "";

            // Show only first 6 blog posts
            posts.slice(0, 6).forEach(post => {
                const title = post.title.rendered;
                const link = post.link;
                const excerpt = post.excerpt.rendered.replace(/<[^>]+>/g, '').substring(0, 130);
                const date = new Date(post.date).toDateString();
                const image = post._embedded['wp:featuredmedia']?.[0]?.source_url || "https://via.placeholder.com/400x200?text=No+Image";

                html += `
                <a href="${link}" target="_blank" class="blog-card-link">
                    <div class="blog-card">
                        <img src="${image}" alt="${title}">
                        <div class="blog-card-content">
                            <h3>${title}</h3>
                            <p>${excerpt}...</p>
                            <small>${date}</small>
                            <span class="read-more-btn">Read More</span>
                        </div>
                    </div>
                </a>`;
            });

            document.getElementById("blog-posts").innerHTML = html;

            // Scroll animation using IntersectionObserver
            const cards = document.querySelectorAll(".blog-card");

            const observer = new IntersectionObserver(entries => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add("show");
                        }, index * 100); // stagger the animation
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.4
            });

            cards.forEach(card => {
                observer.observe(card);
            });
        })
        .catch(err => {
            console.error("Error loading blogs:", err);
            document.getElementById("blog-posts").innerHTML = "<p>Unable to load latest blogs right now.</p>";
        });
</script>
