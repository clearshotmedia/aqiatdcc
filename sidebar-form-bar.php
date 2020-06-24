<?php
/**
 * Template for form
 *
 *
 * @package aqia
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area container">


	<?php dynamic_sidebar( 'sidebar-1' ); ?>
<hr class="brand-primary">
<!-- MultiStep Form -->
<div class="row">
    <div class="col-md-12 col-md-offset-3">
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Contact Details</li>
                <li>Specifics</li>
                <li>Part Three</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h4 class="fs-title">Contact Details</h4>
                <h3 class="fs-subtitle"></h3>
                <input type="text" name="fname" placeholder="First Name"/>
				<input type="text" name="lname" placeholder="Last Name"/>
				<input type="text" name="email" placeholder="Email"/>
				<input type="text" name="phone" placeholder="Phone"/>
				<input type="text" name="club" placeholder="Club / Organisation"/>
				<input type="text" name="position" placeholder="Position"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h4 class="fs-title">Specifics</h4>
				<h3 class="fs-subtitle"></h3>
				
				<p>Select your industry</p>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">Fitness</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">Sport</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">Outdoor Recreation</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">Community Recreation</label>
				</div>
				<hr class="brand primary">
				<p>Are you a volunteer or paid employee?</p>
				<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline1">Volunteer</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline2">Employee</label>
</div>

					<hr class="brand primary">
				<p>What information or assistance are you looking for?</p>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">HR</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">Legal</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">Volunteer and Club Support</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">Marketing and Social Media</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">Grants and Funding</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline">
  					<input type="checkbox" class="custom-control-input" id="customCheck1">
  					<label class="custom-control-label" for="customCheck1">Workforce Development</label>
				</div>
				
				<hr class="brand primary">
				
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h4 class="fs-title">Opt Out</h4>
                <h3 class="fs-subtitle">Add opt out text here</h3>
                
                
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        </form>
       
    </div>
</div>
<!-- /.MultiStep Form -->
</aside><!-- #secondary -->
<script>


</script>