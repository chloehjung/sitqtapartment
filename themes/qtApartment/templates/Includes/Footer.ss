<footer class="footer" role="contentinfo">
	<div class="container">
		<a href="$BaseHref" class="brand" rel="home">$SiteConfig.Title</a>
		<span class="arrow">&rarr;</span>
			<% loop $Menu(1) %>
				<span class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></span>
				<% if not Last %>
					/
				<% end_if %>
			<% end_loop %></div>
	</div>
</footer>
