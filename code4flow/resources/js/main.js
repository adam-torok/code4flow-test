"use strict";

/* ===== Smooth scrolling ====== */
/*  Note: You need to include smoothscroll.min.js (smooth scroll behavior polyfill) on the page to cover some browsers */
/* Ref: https://github.com/iamdustan/smoothscroll */

const pageNavLinks = document.querySelectorAll('.scrollto');

$(document).ready(function() {
	$('#table').dataTable({
	});
} );

$(function () {
	$('tr[data-route]').on('click', function (e) {

		if ($(e.target).is('input') || $(e.target).is('label') || $(e.target).hasClass('btn')) {
			return;
		}

		window.location = $(this).data('route');
	});
});

pageNavLinks.forEach((pageNavLink) => {
	
	pageNavLink.addEventListener('click', (e) => {
		
		e.preventDefault();
		
		var target = pageNavLink.getAttribute("href").replace('#', '');
		
		//console.log(target);
		
        document.getElementById(target).scrollIntoView({ behavior: 'smooth' });

		
    });
	
});
