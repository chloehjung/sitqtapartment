<div class="content-container unit size3of4 lastUnit">
	<article>

		<% with Inspection %>
			<h1>Unit $Unit.ID</h1>
      <h3>$InspectionDate</h3>
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
						<img src="../../$SetRatioSize(400,500).URL">
						
						$URL
					<% end_loop %>
				<% end_if %>
				<% if $DamageRepair %><p>Damage & Repair: $DamageRepair</p><% end_if %>
				<% if $SmokeAlarms %><p style="color:red;">*Smoke alarm needs to be replaced</p><% end_if %>

			<% end_with %>
	</article>
		$Form
		$CommentsForm
</div>


<style>

.blue-border{
	border-radius: 5px;
	border: 3px solid #1a2930;
	padding: 25px 20px 20px 20px;
	width: 100%;
}

.blue-border h2{
	top:-17px;
	left:34px;
	background-color: white;
}

.styled-table{
	border-collapse: collapse;
	border-style: hidden;
}

.styled-table td, .styled-table th{
	border: 1px solid white!important;
	padding:8px 15px!important;
	text-align: center;
}

.styled-table th{
	background-color: #1a2930!important;
	color:white;
	font-weight: normal!important;
}

.styled-table tr:nth-child(odd) {
		background-color: rgba(197,193,192, 0.4)!important;
}

.styled-table tr:nth-child(even) {
		background-color: white!important;
}

.blue-border .styled-table{
	width:100%!important;
}

</style>
