<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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
<div class="card-columns">

<div class="card">
  <div class="card-header"><a href="/industry-development/">
    Industry Development</a>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="/industry-development/advocacy-and-engagement/">Advocacy and Engagement</a></li>
    <li class="list-group-item"><a href="/industry-development/careers/">Careers</a></li>
    <li class="list-group-item"><a href="/industry-development/national-training-package/">National Training Package</a></li>
  </ul>

</div>

<div class="card">
  <div class="card-header"><a href="/skilling-qld/">
    Skilling QLD</a>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="/skilling-qld/testimonials/">Testimonials</a></li>

  </ul>

</div>

<div class="card">
  <div class="card-header">
      <a href="/club-information/">
    Club Information </a>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="/club-information/club-and-association-admin/">Organisation and Club Admin</a></li>
    <li class="list-group-item"><a href="/club-information/crisis-management/">Crisis Management</a></li>
    <li class="list-group-item"><a href="/club-information/grants-and-funding/">Grants and Funding</a></li>
	<li class="list-group-item"><a href="/club-information/leadership-culture-and-diversity/">Leadership, Culture and Diversity</a></li>
	<li class="list-group-item"><a href="/club-information/legal-dispute-management/">Legal Dispute Management</a></li>
	<li class="list-group-item"><a href="/club-information/marketing-and-social-media/">Marketing and Social Media</a></li>
	<li class="list-group-item"><a href="/club-information/venue-facility-management/">Venue Facility Management</a></li>
  </ul>

</div>
<div class="card">
  <div class="card-header"><a href="/new-technologies/">
    New Technologies</a>
  </div>
 

</div>
<div class="card">
  <div class="card-header"><a href="/publications-and-reports/">
    Publications and Reports</a>
  </div>


</div>
<div class="card">
  <div class="card-header"><a href="/about-aqia/">
    About AQIA</a>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="/about-aqia/new-aqia/">New AQIA</a></li>
    <li class="list-group-item"><a href="/about-aqia/our-members/">Our Members</a></li>

  </ul>

</div>

</div>

</aside><!-- #secondary -->
