<div class="search">
	<fieldset>
		<legend>Search</legend>
		<form name='search' action=<?=site_url('parent1/index/');?> method='post'>
		<table>
			<tr>
				<td>title</td>
				<td>length</td>					
				<td>release_year</td>
			</tr>
			<tr>
				<td><input name="title" type='text' value='<?php echo $title; ?>'></td>					
				<td><input name="length" type='text' value='<?php echo $length; ?>'></td>					
				<td><input name="release_year" type='text' value='<?php echo $release_year; ?>'></td>
				<td><input type='submit' name='search' value='Search'></td>
			</tr>
		</table>
		</form>
	</fieldset>
</div>
<div class="content">
	<h3>Parent Details</h3>
	<br />				
	<div class="data"><?php echo $table; ?></div>
	<div class="paging"><?php echo $pagination; ?></div>
</div>