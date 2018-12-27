<!--yearly & weekly revenue chart start-->
<div id="sales-chart">
  <div class="row">
    <div class="col s12 m8 l8">
      <div id="revenue-chart" class="card">
        <div class="card-content">
          <h4 class="header mt-0">REVENUE FOR 2017
            <span class="purple-text small text-darken-1 ml-1">
              <i class="material-icons">keyboard_arrow_up</i> 15.58 %</span> <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow right">Details</a>
          </h4>
          <div class="row">
            <div class="col s12">
              <div class="yearly-revenue-chart">
                <canvas id="thisYearRevenue" class="firstShadow" height="350" width="986" style="width: 986px; height: 350px;"></canvas>
                <canvas id="lastYearRevenue" height="350" width="986" style="width: 986px; height: 350px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col s12 m4 l4">
      <div id="weekly-earning" class="card">
        <div class="card-content">
          <h4 class="header m-0">Earning
            <i class="material-icons right grey-text lighten-3">more_vert</i>
          </h4>
          <p class="no-margin grey-text lighten-3 medium-small">Mon 15 - Sun 21</p>
          <h3 class="header">$899.39
            <i class="material-icons deep-orange-text text-accent-2">arrow_upward</i>
          </h3>
          <canvas id="monthlyEarning" class="" height="229" width="458" style="width: 458px; height: 229px;"></canvas>
          <div class="center-align">
            <p class="lighten-3">Total Weekly Earning</p>
            <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow">View Full</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--yearly & weekly revenue chart end-->  