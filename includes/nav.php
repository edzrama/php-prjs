<ul>
	<?php
		foreach ($NavItems as $item) {
		 echo "<li><a href=\"$item[slug]\">$item[title]</a></li>";
		}
	?>
</ul>