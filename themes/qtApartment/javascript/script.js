jQuery.noConflict();

(function($) {
	$(document).ready(function() {
		/* removes text from search form on focus and replaces it on unfocus - if text is entered then it does not get replaced with default on unfocus */
		$('#SearchForm_SearchForm_action_results').val('L');
		var searchField = $('#SearchForm_SearchForm_Search');
		var default_value = searchField.val();
		searchField.focus(function() {
			$(this).addClass('active');
			if(searchField.val() == default_value) {
				searchField.val('');
			}
		});
		searchField.blur(function() {
			  if(searchField.val() == '') {
					searchField.val(default_value);
			  }
		});

		if (!$.browser.msie || ($.browser.msie && (parseInt($.browser.version, 10) > 8))) {
			var searchBarButton = $("span.search-dropdown-icon");
			var searchBar = $('div.search-bar');
			var menuButton = $("span.nav-open-button");
			var menu = $('.header .primary ul');
			var mobile = false;
			var changed = false;

			$('body').append('<div id="media-query-trigger"></div>');

			function menuWidthCheck() {
				var header_w = $('header .inner').width();
				var elements_w = menu.width() + $('.brand').width();

				if ((header_w < elements_w) || ($(window).width() <= 768)) {
					$('body').addClass('tablet-nav');
				}
				else {
					$('body').removeClass('tablet-nav');
				}

				mobile_old = mobile;
				if ($('#media-query-trigger').css('visibility') == 'hidden') {
					mobile = false;
				}
				else {
					mobile = true;
				}

				if (mobile_old != mobile) {
					changed = true;
				}
				else {
					changed = false;
				}
			}

			menuWidthCheck();

			$(window).resize(function() {
				menuWidthCheck();

				if (!mobile) {
					menu.show();
					searchBar.show();
				}
				else {
					if (changed) {
						menu.hide();
						searchBar.hide();
					}
				}
			});

			/* toggle navigation and search in mobile view */
			searchBarButton.click(function() {
				menu.slideUp();
				searchBar.slideToggle(200);
			});

			menuButton.click(function() {
				searchBar.slideUp();
				menu.slideToggle(200);
			});
		}
	});

	$('.ss-uploadfield-fromcomputer input[type="file"]').each(function(idx, item) {
		$(item).attr('accept', 'image/*;capture=camera');
		// $(item).attr('capture', 'camera');
  	// $(item).attr('onchange', 'fileSelected()');

	});

	// function fileSelected() {
	//
  //       var count = document.getElementById('Form_Form_UploadedPics').files.length;
	//
  //             document.getElementById('details').innerHTML = "";
	//
  //             for (var index = 0; index < count; index ++)
	//
  //             {
	//
  //                    var file = document.getElementById('Form_Form_UploadedPics').files[index];
	//
  //                    var fileSize = 0;
	//
  //                    if (file.size > 1024 * 1024)
	//
  //                           fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
	//
  //                    else
	//
  //                           fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
	//
  //                    document.getElementById('details').innerHTML += 'Name: ' + file.name + '<br>Size: ' + fileSize + '<br>Type: ' + file.type;
	//
  //                    document.getElementById('details').innerHTML += '<p>';
	//
  //             }
	//
  //     }
}(jQuery));
