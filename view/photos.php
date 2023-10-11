<?php require "header.php"; ?> 

	<main id="photos">
		
		<h2 class=pageTitle>LES PHOTOS</h2>

		<div class="imagesTrek">

			<div>
				<button id="before"> &lt; </button>
				<div id="sliderContainer">
					<img name="slide" src="../public/images/imagesOfSlider/0.JPG" id="imagesOfSlider" alt="Perigord" />
				</div>
				<button id="next"> &gt; </button>
				<h4 id="titleImage"></h4>
				<h4 id="counterImage"></h4>			
			</div>

			<script src="../public/javascript/slider.js"></script>		

		</div>

	</main>

<?php require "footer.php"; ?> 
