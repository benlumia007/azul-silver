<form role = "search" method = "get" id = "searchform" class = "searchform" action = "<?php esc_url(home_url('/')); ?>">
<table width = "100%" align = "center" border = "0" cellspacing = "0" cellpadding = "0">
<tr>
	<td>
	<b>Search For:</b>
	</td>
</tr>
<tr>
	<td>
		<input type = "text" value = "<?php echo get_search_query(); ?>" name = "s" id = "s" size = "18"  />
		<input type = "submit" id = "searchsubmit" class = "searchsubmit" value = "<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
	</td>
</tr>
</table>
</form>