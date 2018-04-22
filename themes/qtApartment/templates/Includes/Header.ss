<header class="header" role="banner">
	<div class="inner">
		<div class="unit size4of4 lastUnit">
			<% if $SearchForm %>
				<span class="search-dropdown-icon">L</span>
				<div class="search-bar">
					$SearchForm
				</div>
			<% end_if %>
			<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top top-nav primary">
				<div class="container header-holder">
						<a class="navbar-brand" href="$Basehref">
							<img src="$ThemeDir/images/logo_whitestroke.png" alt="qtApartment logo" style="height:95px">
		        </a>
						 <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				        <span class="navbar-toggler-icon"></span>
				      </button>

				      <div class="navbar-collapse collapse" id="navbarsExampleDefault" style="">
				        <ul class="navbar-nav ml-auto">
									<% loop $Menu(1) %>
										<% if Children %>
											<li class="<% if $LinkingMode=='current' %>active<% end_if %> nav-item dropdown">
						            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">$MenuTitle.XML</a>
						            <div class="dropdown-menu" aria-labelledby="dropdown01">
													<% loop Children %>
														<a class="dropdown-item" href="$Link" title="$Title.XML">$MenuTitle.XML<% if $LinkingMode=='current' %><span class="sr-only">(current)</span><% end_if %></a>
													<% end_loop %>
						            </div>
						          </li>
										<% else %>
										<li class="<% if $LinkingMode=='current' %>active<% end_if %> nav-item">
											<a class="nav-link" href="$Link" title="$Title.XML">$MenuTitle.XML<% if $LinkingMode=='current' %><span class="sr-only">(current)</span><% end_if %>
											</a>
										</li>
										<% end_if %>
									<% end_loop %>
				      </div>

							<div class="navbar-nav login-holder">
								<% if $Member.currentUser %>
									<span>Logged in as <span style="color:red">$Member.currentUser.Name</span><span> | <a href="Security/logout">Log out</a>
								<% else %>
									<a href="Security/login">Log in</a>
								<% end_if %>
							</div>
						</div>
			    </nav>
		</div>
	</div>
</header>
