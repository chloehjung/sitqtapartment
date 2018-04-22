<nav class="primary">
	<span class="nav-open-button">²</span>
		<% loop $Menu(1) %>
			<span class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></span>
			<% if not Last %>
				/
			<% end_if %>
		<% end_loop %>
</nav>
