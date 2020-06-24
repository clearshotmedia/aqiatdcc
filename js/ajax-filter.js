// external js: isotope.pkgd.js
jQuery(function ($) {



  // external js: isotope.pkgd.js

////////////////////////////////////////////////////////////////
// init Isotope
// external js: isotope.pkgd.js

var filterSelector = '*';
var $container = $('#isotope-list');

// init Isotope
 $container.isotope({
  itemSelector: '.item',
  layoutMode: 'fitRows',
  sortBy: 'selector',
  getSortData: {
    selector: function( itemElem ) {
      return !$( itemElem ).is( filterSelector );
    },
  },
});

var $items = $container.find('.item');

// bind button click
$('.filters').on( 'click', 'button', function() {
  filterSelector = $( this ).attr('data-filter');
  $container.isotope('updateSortData').isotope();
  // change is-filtered-out class
  $items.filter( filterSelector ).removeClass('is-filtered-out');
  $items.not( filterSelector ).addClass('is-filtered-out');
});

// change is-checked class on buttons
$('.filters').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});

  
  
});