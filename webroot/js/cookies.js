/**
 * Simple utility functions for reading and writing cookies with js
 *
 * @link          http://www.quirksmode.org/js/cookies.html
 * @package       mi_panel
 * @subpackage    mi_panel.vendors.js
 * @since         v 1.0 (23-Nov-2009)
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function deleteCookie(name) {
	createCookie(name,"",-1);
}