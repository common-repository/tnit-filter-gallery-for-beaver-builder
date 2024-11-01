// Custom JavaScript Document
jQuery(document).ready(function($) {
    "use strict";
	
     //PrettyPhoto Script
    $('a[data-rel]').each(function () {
        $(this).attr('rel', $(this).data('rel'));
        $(".pretty-gallery a[rel^='prettyPhoto']").prettyPhoto();
    });
  
$(function () {
	
	var $container = [
	$('#gallery-listed0'), 
	$('#gallery-listed1'),
	$('#gallery-listed2'),
	$('#gallery-listed3'),
	$('#gallery-listed4'),
	$('#gallery-listed5'),
	$('#gallery-listed6'),
	$('#gallery-listed7'),
	$('#gallery-listed8'),
	$('#gallery-listed9')
	], 
	$optionSets = [
	$('#filterlist_v50 .filter_testing'),
	$('#filterlist_v51 .filter_testing'),
	$('#filterlist_v52 .filter_testing'),
	$('#filterlist_v53 .filter_testing'),
	$('#filterlist_v54 .filter_testing'),
	$('#filterlist_v55 .filter_testing'),
	$('#filterlist_v56 .filter_testing'),
	$('#filterlist_v57 .filter_testing'),
	$('#filterlist_v58 .filter_testing'),
	$('#filterlist_v59 .filter_testing')
	];

    //Initialize isotope on each container
    jQuery.each($container, function (j) {
        this.isotope({
            itemSelector : '.gallery-box'
        });
    });

    //Initialize filter links for each option set
    jQuery.each($optionSets, function (index, object) {

        var $optionLinks = object.find('a');

        $optionLinks.click(function () {
            var $this = $(this), $optionSet = $this.parents('.filter_testing'), options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-filter');
            // don't proceed if already selected
            if ($this.hasClass('current')) {
                return false;
            }

            $optionSet.find('.current').removeClass('current');
            $this.addClass('current');

            // make option object dynamically, i.e. { filter: '.my-filter-class' }

            // parse 'false' as false boolean
            value = value === 'false' ? false : value;
            options[key] = value;
            if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
              // changes in layout modes need extra logic
                changeLayoutMode($this, options);
            } else {
              // otherwise, apply new options

                $container[index].isotope(options);
            }

            return false;
        });
    });
});
});