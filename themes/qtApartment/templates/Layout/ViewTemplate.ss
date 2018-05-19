<div class="content-container unit size3of4 lastUnit">
	<article>
		<% if StatusMessage() %>
			$StatusMessage
		<% end_if %>

		<% with Inspection %>
			<h1>Unit $Unit.ID</h1>
			<h3>$InspectionDate</h3>
			<% if $Member.currentUser.inGroup('Administrators')  %>
			<div style="text-align:right"><a href="{$Top.Link}downloadpdf/$ID">Download PDF</a> | <a href="{$Top.Link}mailpdf/$ID">Mail</a> | <a href="$EditLink">Edit</a> |
			<a href="$DeleteLink">Delete</a>
			</div>
			<% end_if %>
			<div class="content">$Content</div>

			<div class="blue-border row">
				<h2>Lounge</h2>
				<div class="col-md-6">
					$ListLoungeCleaning<br/>
					<% if $Lounge.LoungeComment %><p style="font-weight:bold;">Comment: $Lounge.LoungeComment</p><% end_if %>
				</div>
				<div class="col-md-6">
					<% if $LoungePics %>
						<% loop $LoungePics %>
							<img style="width:100%" src="$ScaleWidth(900).URL" >
						<% end_loop %>
					<% end_if %>
				</div>

			</div>
			<div class="blue-border row">
				<h2>Kitchen</h2>
				<div class="col-md-6">
					$ListKitchenCleaning<br/>
					<% if $Kitchen.KitchenComment %><p style="font-weight:bold;">Comment: $Kitchen.KitchenComment</p><% end_if %>
				</div>
				<div class="col-md-6">
					<% if $KitchenPics %>
						<% loop $KitchenPics %>
							<img style="width:100%" src="$ScaleWidth(900).URL" >
						<% end_loop %>
					<% end_if %>
				</div>
			</div>
			<div class="blue-border row">
				<h2>Bedroom1</h2>
				<div class="col">
					$ListRoomCleaning('Bedroom1')<br/>
					<% if $Bedroom1.Comment %><p style="font-weight:bold;">Comment: $Bedroom1.Comment</p><% end_if %>
				</div>
				<div class="col-md-6">
					<% if $Bedroom1Pics %>
						<% loop $Bedroom1Pics %>
							<img style="width:100%" src="$ScaleWidth(900).URL" >
						<% end_loop %>
					<% end_if %>
				</div>
			</div>
			<div class="blue-border row">
				<h2>Bedroom2</h2>
				<div class="col">
					$ListRoomCleaning('Bedroom2')<br/>
					<% if $Bedroom2.Comment %><p style="font-weight:bold;">Comment: $Bedroom2.Comment</p><% end_if %>
				</div>
				<div class="col-md-6">
					<% if $Bedroom2Pics %>
						<% loop $Bedroom2Pics %>
							<img style="width:100%" src="$ScaleWidth(900).URL" >
						<% end_loop %>
					<% end_if %>
				</div>
			</div>
			<div class="blue-border row">
				<h2>Bedroom3</h2>
				<div class="col">
					$ListRoomCleaning('Bedroom3')<br/>
					<% if $Bedroom3.Comment %><p style="font-weight:bold;">Comment: $Bedroom3.Comment</p><% end_if %>
				</div>
				<div class="col-md-6">
					<% if $Bedroom3Pics %>
						<% loop $Bedroom3Pics %>
							<img style="width:100%" src="$ScaleWidth(900).URL" >
						<% end_loop %>
					<% end_if %>
				</div>
			</div>
				<% if $DamageRepair %><p>Damage & Repair: $DamageRepair</p><% end_if %>
				<% if $SmokeAlarms %><p style="color:red;">*Smoke alarm needs to be replaced</p><% end_if %>

			<% end_with %>
		</article>
		$Form
		$CommentsForm
</div>
