<div class="col-md-12">
  <div class="stepper">
      <div class="step {{ in_array($step, [1,2,3]) ? 'active' : '' }} {{in_array($step, [2,3]) ? 'completed' : ''}}">
          <div class="step-label"></div>
          <div class="step-description">Your Selection</div>
      </div>
      <div class="step {{ in_array($step, [2,3]) ? 'active' : '' }} {{in_array($step, [3]) ? 'completed' : ''}}">
          <div class="step-label"></div>
          <div class="step-description">Your Detail</div>
      </div>
      <div class="step {{ in_array($step, [3]) ? 'active' : '' }} {{ request('status') === 'approved' ? 'completed' : '' }}">
          <div class="step-label"></div>
          <div class="step-description">Final Step</div>
      </div>
  </div>
</div>