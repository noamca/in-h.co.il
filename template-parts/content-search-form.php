<?php
/**
 * The Serach Form
 *
 * @package OZD_Studio
 */
?>


<form role="search" method="get" class="search-form" action="<?php echo $current_url; ?>">
	<label for="s">Search for:</label>
	<input type="text" value="" name="s" id="s" />
	<input type="hidden" value="1" name="sentence" />
	<input type="hidden" value="asset" name="post_type" />
	<input type="submit" class="search-submit" value="חפש">

</form>