/* SVN FILE: $Id: mi_panel.js 2053 2009-12-24 00:22:31Z ad7six $ */

/**
 * functions for showing and hiding menus in the panel
 *
 * Copyright (c) 2009, Javi Arques
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright (c) 2009, Javi Arques
 * @link          www.tbd.com
 * @package       mi_panel
 * @subpackage    mi_panel.vendors.js
 * @since         v 1.0 (23-Nov-2009)
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
$(function() {

/**
 * Toggle the side enu
 */
	$('div#hoverMenu').append('<a id="menuToggle" href="#"><span class="mini-icon mini-arrowthickstop-1-e"></span></a>');

	$('#menuToggle').click().toggle(function() {
			$('div#sidebar').fadeOut('normal', function() {
				$('div#main').animate({'width': '100%'});
				createCookie('showSidebar', 1, 7);
			});
			$(this).html('<span class="mini-icon mini-arrowthickstop-1-w"></span>');
			return false;
		}, function() {
			$('div#main').animate({'width': '79%'}, "normal", function () {
				$('div#sidebar').fadeIn('normal');
			});
			$(this).html('<span class="mini-icon mini-arrowthickstop-1-e"></span>');
			deleteCookie('showSidebar');
			return false;
	});

	if (readCookie('showSidebar') == 1) {
		$('div#sidebar').hide();
		$('div#main').css({'width' : '100%'});
		$('#menuToggle').click();
	}

/**
 * Toggle the header menu
 */
	$('div#hoverMenu').append('<a id="headerToggle" href="#"><span class="mini-icon mini-arrowthickstop-1-n"></span></a>');

	$('#headerToggle').click().toggle(function() {
			$('div#headerContent').fadeOut('normal', function() {
				$('div#header').animate({'height': '30px'});
				createCookie('showHeader', 1, 7);
			});
			$(this).html('<span class="mini-icon mini-arrowthickstop-1-s"></span>');
			return false;
		}, function() {
			$('div#header').animate({'height': '95px'}, "normal", function () {
				$('div#headerContent').fadeIn('normal');
			});
			$(this).html('<span class="mini-icon mini-arrowthickstop-1-n"></span>');
			deleteCookie('showHeader');
			return false;
	});

	if (readCookie('showHeader') == 1) {
		$('div#headerContent').hide();
		$('div#header').css({'height' : '30px'});
		$('#headerToggle').click();
	}

/**
 * Allow checking all rows in a table with js
 */
	//$('input.markAll[type=checkbox]').change(function() {
	$('th input.markAll').live('change', function() {
		var _this = $(this);
		var table = _this.parents('table');
		var checked = _this.is(':checked');
		$('input.identifyRow', table).attr('checked', checked);
	});

/**
 * Hide the search filter widget by default
 */
	$('div#searchFilter form').hide();
	$('div#searchFilter h2').click().toggle(function() {
		$('div#searchFilter form').slideDown('slow');
	}, function() {
		$('div#searchFilter form').slideUp('slow');
	});

/*
 * clickable table rows
 *
 * For a table cell that contains a link, click the link if any part of the cell is clicked
 * For a table cell that contains an input do nothing
 * For a table cell that is just text, check if the row has a link, and if so; click it
 * */
	$('td:has(a)', this).click(function(){
		var count = $(this).find('a').length;
		if (count > 1) {
			return;
		}
		var url = $('a', this).attr('href');
		if (url != undefined) {
			window.location.href = url;
		}
		return false;
	});
	$('td:not(:has(a, input, select))', this).click(function(){
		var url = $(this).parent().find('a').attr('href');
		if (url != undefined) {
			window.location.href = url;
		}
	});


/**
 * UpdateTableHeaders method
 *
 * See link for original inspiration
 *
 * @link http://bitbucket.org/cmcqueen1975/htmlfloatingtableheader/
 * @return void
 * @access public
 */
	function UpdateTableHeaders() {
		$("table.stickyHeader").each(function() {
			var _this = $(this);
			var _floatingHeader = $(".floatingHeader", _this);
			offset = _this.offset();
			scrollTop = $(window).scrollTop();
			if ((scrollTop > offset.top) && (scrollTop < offset.top + _this.height())) {
				_floatingHeader
					.css("visibility", "visible")
			} else {
				_floatingHeader
					.css("visibility", "hidden");
			}
			UpdateTableHeaderWidths();
		});
	}
	function UpdateTableHeaderWidths() {
		$("table.stickyHeader").each(function() {
			var widths = new Array();
			var _this = $(this);
			var _headRow = $(".floatingHeader", _this);
			var _clone = $(".clonedHeader", _this);
			_headRow
				.css("left", _clone.css('left'))
			$('th', _clone).each(function() {
				widths.push($(this).css("width"));
			});
			var i=0;
			$('th', _headRow).each(function() {
				var width = widths[i];
				$(this).css("width", width);
				i++;
			});
		});
	}
	$(document).ready(function() {
		$("table.stickyHeader").each(function() {
			var _this = $(this);
			_headRow = $("tr:first", _this);
			var _clone = _headRow.clone();
			_clone
				.addClass('clonedHeader');
			_headRow
				.before(_clone)
				.addClass("floatingHeader")
				.css("position", "fixed")
				.css("top", "0px")
				.css("visibility", "hidden");
		});
		UpdateTableHeaders();
		$(window).scroll(UpdateTableHeaders);
	});
});