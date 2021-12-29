"use strict";

/* ===== Smooth scrolling ====== */
/*  Note: You need to include smoothscroll.min.js (smooth scroll behavior polyfill) on the page to cover some browsers */
/* Ref: https://github.com/iamdustan/smoothscroll */

const pageNavLinks = document.querySelectorAll('.scrollto');

$(document).ready(function() {
	$('#table').dataTable({
		"language" : {
			"paginate": {
				"first":      "Első",
				"last":       "Utolsó",
				"next":       "Következő",
				"previous":   "Előző",
			},
		"decimal":        "",
		"emptyTable":     "A táblázat üres.",
		"info":           "Jelenleg _START_ től _END_ ig láthatsz az összes _TOTAL_ rekordból",
		"infoEmpty":      "Mutass 0 to 0 of 0 rekordot",
		"infoFiltered":   "(filtered from _MAX_ total entries)",
		"infoPostFix":    "",
		"thousands":      ",",
		"lengthMenu":     "Mutass _MENU_ rekordot",
		"loadingRecords": "Betöltés...",
		"processing":     "Feldolgozás...",
		"search":         "Keresés:",
		"zeroRecords":    "Sajnos nem találtunk",
		},
		"order": [[ 0, "desc" ]]
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
