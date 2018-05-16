<div class="content-container unit size3of4 lastUnit">
	<article>
		<% if StatusMessage() %>
			$StatusMessage
		<% end_if %>
		<h1>$Title</h1>
		<div class="content">$Content</div>
	</article>
		$Form
		$CommentsForm
</div>
