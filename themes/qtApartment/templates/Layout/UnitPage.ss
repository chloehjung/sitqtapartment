<div class="content-container unit size3of4 lastUnit">
	<article>
		<h2>$Title</h2>
		<div class="content">$Content</div>
		<div class='inspection'>
			<table class="styled-table">
				<tr>
					<th>UnitNumber</th>
					<th>Student Name</th>
					<th>Student Email</th>
          <th>Email</th>
				</tr>
    <% loop getUnits() %>
					<tr>
						<td>$UnitNum</td>
						<td>$getStudentNames()</td>
						<td>$getStudentEmailsWithSpace()</td>
            <td><a href="mailto:$getStudentEmails()">Send Mail</a></td>
					</tr>
    <% end_loop %>
			</table>
		</div>
	</article>
		$Form
		$CommentsForm
</div>
