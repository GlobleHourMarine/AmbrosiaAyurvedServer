<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customer Reviews | Our Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    :root {
      --primary-green: #2e856e;
      --light-green: #e6f2ef;
      --accent-green: #5cb85c;
      --positive-color: #4a934a;
      --text-dark: #2d3748;
      --text-medium: #4a5568;
      --text-light: #718096;
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12);
      --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
      --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
      background: #f8fafc;
      font-family: 'Inter', 'Segoe UI', sans-serif;
      color: var(--text-medium);
    }

    .container {
      max-width: 1200px;
    }

    .review-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: var(--shadow-sm);
      padding: 24px;
      transition: var(--transition);
      border: 1px solid rgba(46, 133, 110, 0.1);
      display: flex;
      flex-direction: row;
      height: 100%;
      position: relative;
      overflow: hidden;
      
    }

    .review-card:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-lg);
      border-color: rgba(46, 133, 110, 0.3);
      background-color:rgba(159, 253, 159, 0.2);
      /* color:white !important; */
    }

    .review-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 4px;
      height: 100%;
      /* background-color: var(--primary-green); */
      transition: var(--transition);
    }

    .review-card:hover::before {
      width: 6px;
    }

    .product-image-container {
      position: relative;
      width: 200px;
      height: 200px;
      margin-right: 20px;
      overflow: hidden;
      border-radius: 8px;
      /* background-color: #f5f5f5; */
      flex-shrink: 0;
      /* box-shadow: var(--shadow-sm); */
    }

    .product-image {
      width: 100%;
      height: 100%;
      object-fit: contain;
      display: block;
      transition: var(--transition);
    }

    .product-image-container:hover .product-image {
      transform: scale(1.03);
    }

    .image-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0, 0, 0, 0.6);
      color: white;
      border: none;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 10;
      transition: var(--transition);
      opacity: 0.8;
    }

    .image-nav:hover {
      background: rgba(0, 0, 0, 0.9);
      opacity: 1;
    }

    .image-prev {
      left: 12px;
    }

    .image-next {
      right: 12px;
    }

    .image-counter {
      position: absolute;
      bottom: 10px;
      right: 10px;
      background: rgba(0, 0, 0, 0.6);
      color: white;
      padding: 3px 10px;
      border-radius: 12px;
      font-size: 11px;
      font-weight: 500;
    }

    .review-content {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .review-author {
      font-size: 15px;
      color: var(--text-dark);
      font-weight: 600;
      margin-top: 5px;
    }

    .review-date {
      font-size: 13px;
      color: var(--text-light);
      margin-top: 2px;
    }

    .star-rating {
      margin: 10px 0;
    }

    .star-rating i {
      font-size: 18px;
      margin-right: 3px;
    }

    .filled-star {
      color: #f59e0b;
    }

    .half-star {
      position: relative;
      display: inline-block;
    }

    .half-star::before {
      content: '\f586';
      position: absolute;
      left: 0;
      width: 50%;
      overflow: hidden;
      color: #f59e0b;
    }

    .review-text {
      color: var(--text-medium);
      font-size: 15px;
     
      margin-bottom: 12px;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      flex-grow: 1;
    }

    .section-title {
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 0;
      font-size: 28px;
      letter-spacing: -0.5px;
    }

    .average-rating-badge {
      background: linear-gradient(135deg, var(--primary-green), var(--accent-green));
      color: white;
      padding: 10px 18px;
      border-radius: 24px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      box-shadow: var(--shadow-sm);
    }

    .average-rating-badge i {
      margin-right: 8px;
      font-size: 18px;
    }

    .review-heading {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 8px;
      color: var(--text-dark);
    }

    .review-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: auto;
      padding-top: 4px;
      border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    .reviews-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 24px;
    }

    .verified-badge {
      background-color: var(--light-green);
      color: var(--primary-green);
      font-size: 12px;
      padding: 2px 8px;
      border-radius: 4px;
      margin-left: 8px;
      display: inline-flex;
      align-items: center;
    }

    .verified-badge i {
      font-size: 12px;
      margin-right: 4px;
    }

    .btn-load-more {
      background-color: white;
      color: var(--primary-green);
      border: 1px solid var(--primary-green);
      padding: 10px 24px;
      border-radius: 8px;
      font-weight: 500;
      transition: var(--transition);
    }

    .btn-load-more:hover {
      background-color: var(--light-green);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .empty-state {
      background-color: var(--light-green);
      border-radius: 12px;
      padding: 40px;
      text-align: center;
    }

    .empty-state i {
      font-size: 48px;
      color: var(--primary-green);
      margin-bottom: 20px;
    }

    @media (max-width: 992px) {
      .reviews-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 767px) {
      .reviews-grid {
        grid-template-columns: 1fr;
      }
      
      .review-card {
        flex-direction: column;
      }
      
      .product-image-container {
        width: 100%;
        height: 200px;
        margin-right: 0;
        margin-bottom: 20px;
      }
      
      .section-title {
        font-size: 24px;
      }
    }





.review-card {
    background-color: white;
    border-radius: 12px;
    box-shadow: var(--shadow-sm);
    padding: 10px 20px;
    transition: var(--transition);
    border: 1px solid rgba(46, 133, 110, 0.1);
    display: flex
;
    /* flex-direction: row; */
    /* height: 100%; */
    position: relative;
    overflow: hidden;
}
*, ::after, ::before {
    /* box-sizing: border-box; */
}
*, ::after, ::before {
    /* box-sizing: border-box; */
}


.product-image {
    width: 100%;
    height: 100%;
    object-fit: conver;
    object-fit: cover;
    display: block;
    transition: var(--transition);
}
.review-heading {
      margin-top: 10px !important;
}
.review-text {
  /* line-height:0px; */
}


  </style>
</head>

<body>

  <div class="container py-5">
    <?php if (!empty($reviews)): ?>
      <?php
      $totalRating = array_sum(array_column($reviews, 'rating'));
      $totalReviews = count($reviews);
      $avgRating = round($totalRating / $totalReviews, 1);
      $fullStars = floor($avgRating);
      $hasHalfStar = ($avgRating - $fullStars) >= 0.5;
      ?>
      
      <div class="d-flex justify-content-between align-items-center mb-5">
        <h4 class="" style="color:black;text-align:center;font-weight:300;">our happy customers</h4>
        <div class="average-rating-badge">
          <i class="bi bi-star-fill"></i> <?php echo $avgRating; ?> out of 5 (<?php echo $totalReviews; ?> reviews)
        </div>
      </div>

      <div class="reviews-grid">
        <?php foreach ($reviews as $index => $review): ?>
          <div class="<?php echo ($index >= 9) ? 'd-none extra-review' : ''; ?>">
            <div class="review-card">
              <div class="product-image-container" id="imageContainer-<?php echo $index; ?>">
                <?php
                $file_paths_raw = $review['file_path'];
                $file_paths = is_array($file_paths_raw) ? $file_paths_raw : json_decode($file_paths_raw, true);
                $has_images = false;
                
                if ($file_paths && is_array($file_paths)) {
                  $image_count = 0;
                  foreach ($file_paths as $i => $file_path) {
                    $ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                      $image_count++;
                      echo '<img src="' . base_url($file_path) . '" class="product-image" alt="Product image" data-index="'.$i.'" '.($i > 0 ? 'style="display:none;"' : '').'>';
                      $has_images = true;
                    }
                  }
                }
                
                // If no images, show placeholder
                if (!$has_images) {
                  echo '<div class="product-image d-flex align-items-center justify-content-center bg-light">';
                  echo '<i class="bi bi-image text-muted" style="font-size: 3rem;"></i>';
                  echo '</div>';
                } else if ($image_count > 1) {
                  echo '<button class="image-nav image-prev" onclick="prevImage('.$index.')"><i class="bi bi-chevron-left"></i></button>';
                  echo '<button class="image-nav image-next" onclick="nextImage('.$index.')"><i class="bi bi-chevron-right"></i></button>';
                  echo '<span class="image-counter">1/'.$image_count.'</span>';
                }
                ?>
              </div>
              
              <div class="review-content">
                <h6 class="review-heading"><?php echo $review['product_name']; ?></h6>
                
                <div class="star-rating">
                  <?php 
                  $rating = $review['rating'];
                  $fullStars = floor($rating);
                  $hasHalfStar = ($rating - $fullStars) >= 0.5;
                  
                  for ($i = 1; $i <= 5; $i++): 
                    if ($i <= $fullStars): ?>
                      <i class="bi bi-star-fill filled-star"></i>
                    <?php elseif ($i == $fullStars + 1 && $hasHalfStar): ?>
                      <i class="bi bi-star-half half-star"></i>
                    <?php else: ?>
                      <i class="bi bi-star"></i>
                    <?php endif;
                  endfor; ?>
                  <span style="margin-left: 8px; color: var(--text-light); font-size: 14px;"><?php echo $rating; ?></span>
                </div>
                
                <p class="review-text"><?php echo $review['message']; ?></p>
                
                <div class="review-footer">
                  <div>
                    <span class="review-author"><?php echo $review['fname']; ?></span>
                    <?php if ($review['verified_purchase'] ?? false): ?>
                      <span class="verified-badge"><i class="bi bi-patch-check-fill"></i> Verified</span>
                    <?php endif; ?>
                    <div class="review-date">Reviewed on <?php echo date('F j, Y', strtotime($review['date'])); ?></div>
                  </div>
                  <?php if ($review['helpful_count'] ?? false): ?>
                    <div style="font-size: 13px; color: var(--primary-green);">
                      <i class="bi bi-hand-thumbs-up-fill"></i> <?php echo $review['helpful_count']; ?> found this helpful
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <?php if (count($reviews) > 9): ?>
        <div class="text-center mt-5">
          <button id="viewMoreBtn" class="btn btn-load-more px-4">
            <i class="bi bi-chevron-down me-2"></i> Load More Reviews
          </button>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <div class="empty-state">
        <i class="bi bi-chat-square-text"></i>
        <h3 class="mb-3">No Reviews Yet</h3>
        <p class="text-muted">Be the first to share your experience with this product!</p>
        <!-- <button class="btn btn-success mt-3">Write a Review</button> -->
      </div>
    <?php endif; ?>
  </div>

  <script>
    // Image navigation functions
    function prevImage(reviewIndex) {
      const container = document.getElementById(`imageContainer-${reviewIndex}`);
      const images = container.querySelectorAll('.product-image');
      const counter = container.querySelector('.image-counter');
      let currentIndex = 0;
      
      // Find currently visible image
      images.forEach((img, index) => {
        if (img.style.display !== 'none') {
          currentIndex = index;
        }
      });
      
      // Calculate previous index
      const prevIndex = (currentIndex - 1 + images.length) % images.length;
      
      // Update display
      images[currentIndex].style.display = 'none';
      images[prevIndex].style.display = 'block';
      
      // Update counter
      if (counter) {
        counter.textContent = `${prevIndex + 1}/${images.length}`;
      }
    }
    
    function nextImage(reviewIndex) {
      const container = document.getElementById(`imageContainer-${reviewIndex}`);
      const images = container.querySelectorAll('.product-image');
      const counter = container.querySelector('.image-counter');
      let currentIndex = 0;
      
      // Find currently visible image
      images.forEach((img, index) => {
        if (img.style.display !== 'none') {
          currentIndex = index;
        }
      });
      
      // Calculate next index
      const nextIndex = (currentIndex + 1) % images.length;
      
      // Update display
      images[currentIndex].style.display = 'none';
      images[nextIndex].style.display = 'block';
      
      // Update counter
      if (counter) {
        counter.textContent = `${nextIndex + 1}/${images.length}`;
      }
    }

    // Load more reviews
    document.getElementById('viewMoreBtn')?.addEventListener('click', () => {
      document.querySelectorAll('.extra-review').forEach(el => {
        el.classList.remove('d-none');
      });
      document.getElementById('viewMoreBtn').style.display = 'none';
      
      // Smooth scroll to show the newly loaded reviews
      setTimeout(() => {
        const lastReview = document.querySelector('.extra-review:last-child');
        lastReview.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }, 100);
    });
  </script>
</body>

</html>