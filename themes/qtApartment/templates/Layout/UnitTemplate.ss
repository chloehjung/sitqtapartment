<div class="content-container unit size3of4 lastUnit">
	<article>
		<h2>$Title</h2>
		<div class="content">$Content</div>
		<div class='inspection'>
			<table class="styled-table">
				<tr>
					<th>Date</th>
					<th>Unit Number</th>
					<th>Damages or things needing fixed</th>
				</tr>
    <% loop GetAllInspections($unitNum) %>
					<tr>
						<td><a href="{$Top.Link}view/$ID">$InspectionDate.format('jS M Y')</a></td>
						<td><a href="{$Top.Link}view/$ID">$Unit.UnitNum</a></td>
						<td><a href="{$Top.Link}view/$ID">$DamageRepair</a></td>
					</tr>
    <% end_loop %>
			</table>
		</div>
	</article>
		$Form
		$CommentsForm
</div>
