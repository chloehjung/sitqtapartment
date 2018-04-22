<div class="content-container unit size3of4 lastUnit">
	<article>

		<% with Inspection %>
			<h1>Unit $Unit.ID</h1>
			<% if $Member.currentUser.inGroup('Administrators')  %>
			<div style="text-align:right"><a href="{$Top.Link}pdf/$ID">pdf</a><a href="$EditLink">Edit</a> |
			<a href="$DeleteLink">Delete</a>
			</div>
			<% end_if %>
			<div class="content">$Content</div>

			<div class="blue-border row">
				<h2>Lounge</h2>
				<div class="col-md-5">
					$ListLoungeCleaning<br/>
					<% if $Lounge.LoungeComment %><p style="font-weight:bold;">Comment: $Lounge.LoungeComment</p><% end_if %>
				</div>
				<div class="col-md-7">
					<p>Pictures:</p>
				</div>

			</div>
			<div class="blue-border row">
				<h2>Kitchen</h2>
				<div class="col-md-5">
					$ListKitchenCleaning<br/>
					<% if $Kitchen.KitchenComment %><p style="font-weight:bold;">Comment: $Kitchen.KitchenComment</p><% end_if %>
				</div>
				<div class="col-md-7">
					<p>Pictures:</p>
				</div>
			</div>
			<div class="blue-border row">
				<h2>Bedroom1</h2>
				<div class="col-md-5">
					$ListRoomCleaning('Bedroom1')<br/>
					<% if $Bedroom1.Comment %><p style="font-weight:bold;">Comment: $Bedroom1.Comment</p><% end_if %>
				</div>
				<div class="col-md-7">
					<p>Pictures:</p>
				</div>
			</div>
			<div class="blue-border row">
				<h2>Bedroom2</h2>
				<div class="col-md-5">
					$ListRoomCleaning('Bedroom2')<br/>
					<% if $Bedroom2.Comment %><p style="font-weight:bold;">Comment: $Bedroom2.Comment</p><% end_if %>
				</div>
				<div class="col-md-7">
					<p>Pictures:</p>
				</div>
			</div>
			<div class="blue-border row">
				<h2>Bedroom3</h2>
				<div class="col-md-5">
					$ListRoomCleaning('Bedroom3')<br/>
					<% if $Bedroom3.Comment %><p style="font-weight:bold;">Comment: $Bedroom3.Comment</p><% end_if %>
				</div>
				<div class="col-md-7">
					<p>Pictures:</p>
				</div>
			</div>
				<% if $UploadedPics %>
					<% loop $UploadedPics %>
						<img src="$SetRatioSize(400,500).URL">
					<% end_loop %>
				<% end_if %>
				<% if $DamageRepair %><p>Damage & Repair: $DamageRepair</p><% end_if %>
				<% if $SmokeAlarms %><p style="color:red;">*Smoke alarm needs to be replaced</p><% end_if %>

			<% end_with %>

	</article>
		$Form
		$CommentsForm
</div>
