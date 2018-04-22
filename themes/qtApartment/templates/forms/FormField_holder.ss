<div class="$OuterClass">
<% if Title %>
	<div id="$Name" class="form-group field<% if extraClass %> $extraClass<% end_if %>">
		<% if Title %>
			<label class="control-label" for="$ID">$Title <% if Required %><span class="required-label">&#42;</span><% end_if %></label>
		<% else %>
			<label class="control-label" for="$ID"></label>
		<% end_if %>
		<% if $BeforeField || $AfterField %>
		<div class="input-group">
		<% end_if %>
		<% if $BeforeField %>
			<span class="input-group-addon">$BeforeField</span>
		<% end_if %>
		<div class="controls">
			$Field
		</div>
		<% if $AfterField %>
			<span class="input-group-addon">$AfterField</span>
		<% end_if %>
		<% if $BeforeField || $AfterField %>
		</div>
		<% end_if %>
		<% if Message %><p class="help-block $MessageType">$Message</p><% end_if %>
		<div class="help-block with-errors"></div>
	</div>
<% else %>
	$Field
	<div class="help-block with-errors"></div>
<% end_if %>
	<% if $RightTitle %><label class="right" for="$ID">$RightTitle</label><% end_if %>
</div>
