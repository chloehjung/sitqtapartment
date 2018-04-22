  <div class="boxes-holder">
    <div class="row text-center">
    <% loop Menu(1) %>
      <% if $Title=='List' %>
        <% loop Children %>
          <div class="col-md-4 col-sm-6 box-holder">
            <a href="$Link">
              <div class="box text-center">
                <i class="$Icon" style="font-size:50px;"></i>
                <p>$Title</p>
              </div>
            </a>
          </div>
        <% end_loop %>
      <% else_if $Title=='Home' %>

      <% else %>
      <div class="col-md-4 col-sm-6 box-holder">
        <a href="$Link">
          <div class="box text-center">
            <i class="$Icon" style="font-size:50px;"></i>
            <p>$Title</p>
          </div>
        </a>
      </div>
      <% end_if %>
    <% end_loop %>
    </div>
  </div>
