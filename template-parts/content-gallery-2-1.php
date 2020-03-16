<?php
/**
 * Template part for Gallery 2 + 1 Layout
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OZD_Studio
 */

?>

<?php
if (!isset($GalleryId)) : $GalleryId = 1;
else: $GalleryId++;
endif; 
$ModalId = 'lightboxModal_' . $GalleryId ;
?>

<div class="row">
	<?php $slide_id = 0 ; while ($images[$slide_id]) :?>
	<div class="col-md-6">
		<div onclick="openModal('lightboxModal');currentSlide(<?php echo $slide_id + 1 ?>)" class="gallery-image-wrap cursor" style="background-image: url(<?php echo $images[$slide_id]['url'];?>)">
			<img class="lightbox_open_icon" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/lightbox_open_icon.png">
		</div>
		
	</div>
	<?php  $slide_id++;   if (!isset($images[$slide_id])) {break;}?>					
	<div class="col-md-6">
		<div onclick="openModal('lightboxModal');currentSlide(<?php echo $slide_id + 1 ?>)" class="gallery-image-wrap cursor" style="background-image: url(<?php echo $images[$slide_id]['url'];?>)">
			<img class="lightbox_open_icon" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/lightbox_open_icon.png">
		</div>
	</div>
	<?php  $slide_id++;   if (!isset($images[$slide_id])) {break;}?>					
	<div class="col-md-12">
		<div onclick="openModal('lightboxModal');currentSlide(<?php echo $slide_id + 1 ?>)" class="gallery-image-wrap cursor" style="background-image: url(<?php echo $images[$slide_id]['url'];?>)">
			<img class="lightbox_open_icon" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/lightbox_open_icon.png">			
		</div>
	</div>													
	<?php  $slide_id++; if (!isset($images[$slide_id])) {break;} ; endwhile; $slide_id = 0; ?>
</div>													

<script>
function openModal(modal_id) {
	document.getElementById(modal_id).style.display = "block";
	document.body.style.overflowY = "hidden";
}

function closeModal() {
	document.getElementById('lightboxModal').style.display = "none";
	document.body.style.overflowY = "scroll";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("lightbox-Slides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex-1].style.display = "block";
}
</script>