<!-- <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Shop Pure Ayurvedic Medicines | Diabetes & Wellness Solutions</title>
  <meta name="description" content="Ambrosia Ayurved offers high-quality Ayurvedic medicines. Explore our range, including specialized natural support for diabetes and general wellness."> -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/our_services.css'); ?>">
<!-- </head> -->
<div class="our_services">
	<div class="containerr">
		<h2>Why A5 Herbal Supplement Over Diabetes Medicines?</h2>
		<p>
			Allopathic medicines help manage sugar levels, but may cause side effects. A5 by Ambrosia Ayurved is a 100% Ayurvedic, natural formulation designed to support balanced sugar levels without side effects.
		</p>
		<table>
			<thead>
				<tr>
					<th>Feature / Benefit</th>
					<th>Regular Diabetes Medicines</th>
					<th>A5 by Ambrosia Ayurved</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Primary Goal</td>
					<td>Helps manage blood sugar levels</td>
					<td>Supports balanced blood sugar naturally</td>
				</tr>
				<tr>
					<td>Approach</td>
					<td>Chemical-based management</td>
					<td>100% Ayurvedic, natural formulation</td>
				</tr>
				<tr>
					<td>Ingredients</td>
					<td>Synthetic compounds, additives</td>
					<td>25+ herbs sourced from India & Malaysia</td>
				</tr>
				<tr>
					<td>Effect on Pancreas</td>
					<td>No direct regeneration claims</td>
					<td>Supports pancreatic health naturally</td>
				</tr>
				<tr>
					<td>Insulin Resistance</td>
					<td>No</td>
					<td>May help improve insulin sensitivity</td>
				</tr>
				<tr>
					<td>Natural & Herbal</td>
					<td>❌ Not always</td>
					<td>✅ Completely natural and herbal</td>
				</tr>
				<tr>
					<td>Side Effects</td>
					<td>Possible side effects</td>
					<td>Generally free from known side effects</td>
				</tr>
				<tr>
					<td>Long-Term Use</td>
					<td>Requires medical supervision</td>
					<td>Considered safe for prolonged use</td>
				</tr>
				<tr>
					<td>Overall Manage</td>
					<td>Focuses on sugar control</td>
					<td>Supports overall wellness, energy, and immunity</td>
				</tr>
				<tr>
					<td>Doctor Recommended</td>
					<td>Prescribed by medical doctors</td>
					<td>Formulated by Ayurvedic experts; consult your doctor</td>
				</tr>
				<tr>
					<td>Money-Back Guarantee</td>
					<td>❌ Typically none</td>
					<td>✅ 100% risk-free satisfaction guarantee</td>
				</tr>
			</tbody>
		</table>
		<div class="highlight-box">
			<h3>🌿 Ready to support your diabetes management naturally?</h3>
			<p> Say goodbye to side effects and reliance on daily pills.* <br>Join thousands who have experienced positive changes in 3 months with A5.</p>
			<?php if (!empty($products)): ?>
          	<?php $product = $products[0]; ?>
			<button style="background-color: #4CAF50; border: none; padding: 10px 20px; border-radius: 5px;">
				<a href="<?= base_url($product->slug); ?>" style="text-decoration: none; color: white; font-weight: bold; font-size: 16px;">
					<span style="color: black;">🛒</span> Order A5 Now
				</a>
			</button>
			<?php endif; ?>
		</div>
	</div>
</div>
<script>
	document.addEventListener('DOMContentLoaded', () => {
		const decrementBtns = document.querySelectorAll('.decrement');
		const incrementBtns = document.querySelectorAll('.increment');
		const quantityInputs = document.querySelectorAll('.quantity-input');

		decrementBtns.forEach((btn, index) => {
			btn.addEventListener('click', () => {
				const input = quantityInputs[index];
				let value = parseInt(input.value, 10);
				if (value > 1) input.value = value - 1;
			});
		});

		incrementBtns.forEach((btn, index) => {
			btn.addEventListener('click', () => {
				const input = quantityInputs[index];
				let value = parseInt(input.value, 10);
				input.value = value + 1;
			});
		});
	});

	function handleScroll() {
		const element = document.querySelector('.product-container1');
		const position = element.getBoundingClientRect().top;
		const windowHeight = window.innerHeight;

		if (position < windowHeight - 50) {
			element.classList.add('show');
		}
	}

	window.addEventListener('scroll', handleScroll);

	handleScroll();

	function handleScroll() {
		const productContainers = document.querySelectorAll('.product-container2');

		productContainers.forEach((productContainer) => {
			const image = productContainer.querySelector('.imag');
			const cardsHolder = productContainer.querySelector('.cards-holder');
			const cards = productContainer.querySelectorAll('.cards');

			const position = productContainer.getBoundingClientRect().top;
			const windowHeight = window.innerHeight;

			if (position < windowHeight - 50) {
				productContainer.classList.add('show');
				image.classList.add('show');
				cardsHolder.classList.add('show');

				// Staggered animation for each card
				cards.forEach((card, index) => {
					setTimeout(() => {
						card.classList.add('show');
					}, index * 200);
				});
			}
		});
	}

	window.addEventListener('scroll', handleScroll);

	handleScroll();
</script>