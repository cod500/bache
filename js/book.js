/* Documentation sample */


function loadPage(page) {

	var container = $('.bache-book .p' + page);
	// img.load(function() {
	// 	var container = $('.bache-book .p'+page);
	// 	img.css({width: container.width(), height: container.height()});
	// 	img.appendTo($('.bache-book .p'+page));
	// 	container.find('.loader').remove();
	// });
	$.ajax({ url: 'pages/' + page + '.php' }).
		done(function (pageHtml) {
			// $('.sj-book .p' + page).html(pageHtml.replace('samples/steve-jobs/', ''));

			$(pageHtml).appendTo($('.bache-book .p' + page));

			// Remove the loader indicator

			container.find('.loader').remove();
		});



}

function addPage(page, book) {

	var id, pages = book.turn('pages');

	var element = $('<div />', {});

	if (book.turn('addPage', element, page)) {
		if (page < 28) {
			element.html('<div class="gradient"></div><div class="loader"></div>');
			loadPage(page);
		}
	}
}

function updateTabs() {

	var tabs = { 7: 'Clases', 12: 'Constructor', 14: 'Properties', 16: 'Methods', 23: 'Events' },
		left = [],
		right = [],
		book = $('.bache-book'),
		actualPage = book.turn('page'),
		view = book.turn('view');

	for (var page in tabs) {
		var isHere = $.inArray(parseInt(page, 10), view) != -1;

		if (page > actualPage && !isHere)
			right.push('<a href="#page/' + page + '">' + tabs[page] + '</a>');
		else if (isHere) {

			if (page % 2 === 0)
				left.push('<a href="#page/' + page + '" class="on">' + tabs[page] + '</a>');
			else
				right.push('<a href="#page/' + page + '" class="on">' + tabs[page] + '</a>');
		} else
			left.push('<a href="#page/' + page + '">' + tabs[page] + '</a>');

	}

	$('.bache-book .tabs .left').html(left.join(''));
	$('.bache-book .tabs .right').html(right.join(''));

}


function numberOfViews(book) {
	return book.turn('pages') / 2 + 1;
}


function getViewNumber(book, page) {
	return parseInt((page || book.turn('page')) / 2 + 1, 10);
}


function moveBar(yes) {
	if (Modernizr && Modernizr.csstransforms) {
		$('#slider .ui-slider-handle').css({ zIndex: yes ? -1 : 10000 });
	}
}

function setPreview(view) {

	var previewWidth = 115,
		previewHeight = 73,
		previewSrc = 'pics/preview.jpg',
		preview = $(_thumbPreview.children(':first')),
		numPages = (view == 1 || view == $('#slider').slider('option', 'max')) ? 1 : 2,
		width = (numPages == 1) ? previewWidth / 2 : previewWidth;

	_thumbPreview.
		addClass('no-transition').
		css({
			width: width + 15,
			height: previewHeight + 15,
			top: -previewHeight - 30,
			left: ($($('#slider').children(':first')).width() - width - 15) / 2
		});

	preview.css({
		width: width,
		height: previewHeight
	});

	if (preview.css('background-image') === '' ||
		preview.css('background-image') == 'none') {

		preview.css({ backgroundImage: 'url(' + previewSrc + ')' });

		setTimeout(function () {
			_thumbPreview.removeClass('no-transition');
		}, 0);

	}

	preview.css({
		backgroundPosition:
			'0px -' + ((view - 1) * previewHeight) + 'px'
	});
}

setTimeout(function () {

	// // Store initial image size
	// function setImageSize() {
	// 	var imageSize = Math.floor($('.zooma-main img:first-child').height());
	// 	if (imageSize <= 0) {
	// 		requestAnimationFrame(setImageSize);
	// 	}
	// 	else {
	// 		$('.zooma-main').css({ width: imageSize, height: imageSize });
	// 		$('.zooma-main img').addClass('is-loaded');
	// 	}
	// }

	// requestAnimationFrame(setImageSize);

	// // Set state for first image
	// $('.product img:first-child').addClass('is-active');


	// Main image click to zoom event listener
	// $('.zooma-main img').on('click', function (e) {
	// 	// Toggle zoom-out cursor and unset max-width
	// 	$(this).toggleClass('is-zoomed-in');
	// 	$(this).toggleClass('initial-height');

	// 	// Zoom in
	// 	if ($(this).hasClass('is-zoomed-in')) {
	// 		// Variables for calculating relative position
	// 		var scale = e.target.naturalWidth / $(e.target).parent().width();
	// 		var yScale = e.target.naturalHeight / $(e.target).parent().height();
	// 		var max = -(1 - 1 / scale);
	// 		var yMax = -(1 - 1 / yScale);

	// 		// Adjust mouse scale to the full-size image, then redraw
	// 		e.offsetX *= scale;
	// 		e.offsetY *= yScale;
	// 		calculateZoom(e);

	// 		// Mouse event listener
	// 		$(this).on('mousemove', calculateZoom);

	// 		function calculateZoom(e) {
	// 			var x = e.offsetX * max + 'px';
	// 			var y = e.offsetY * yMax + 'px';
	// 			$(e.target).css({ left: x, top: y });
	// 		}
	// 	}
	// 	// Zoom out
	// 	else {
	// 		$(this).off('mousemove').prop('style', '');
	// 	}
	// });





	// $(".silhouette").each(function (index) {
	// 	let content = $(this).attr('data-title');
	// 	$('.tooltip').jBox('Mouse', {
	// 		content: content
	// 	});
	// });

	// $('area').powerTip({
	// 	followMouse: true
	// });
	// var panzoom = Panzoom(document.getElementById("single-panzoom"), {
	// 	// minScale: 10,
	// 	// contain: 'outside'
	// 	zoomEnabled: true,
	// 	controlIconsEnabled: true
	// });
	// // panzoom.zoom(10, { animate: true })
	// panzoom.zoomToPoint(6, { clientX: 100, clientY: 100 }, { animate: true });


	//Attatches tooltip to body so it stays relevant to page and not image
	//Attatching to mouse 
	$('.tooltipLink').hover(function () {
		var title = $(this).attr('data-tooltip');
		$(this).data('tipText', title);
		if (title == '') { }
		else {
			$('<p class="tooltip" style="z-index:9000"></p>').fadeIn(200).text(title).appendTo('body');
		}
	}, function () {
		$(this).attr('data-tooltip', $(this).data('tipText'));
		$('.tooltip').fadeOut(200);
	}).mousemove(function (e) {
		var mousex = e.pageX;
		var mousey = e.pageY;
		$('.tooltip').css({
			top: mousey,
			left: mousex,
			position: 'absolute'
		})
	});


	//Click events for areas on image

	$('.tooltipLink').click(function (e) {
		if ($('.pin').length) {
			$('.pin').remove();
		}
		var img = $(this).attr("data-img").split('-')

		e = e || window.event;
		var mousex = e.pageX - 10;
		var mousey = e.pageY - 25;
		// var coords = $(this).attr("coords").split(', ');

		$(`<p class="pin" style="z-index:9000"></p>`).appendTo('body');
		$(`.pin`).css({
			top: mousey,
			left: mousex
		});

		$('.pin').fadeOut(800, function () { $(this).remove(); });

		$('#img-box').attr("src", `./cropped/${img[0]}/${img[1]}.png`);
		$('#image-info').text($(this).attr('data-tooltip'));


	})

	// $('area').on('click', function () {
	// 	if ($('#map-2').hasClass('fixed-height')) {
	// 		var coords = $(this).attr("coords").split(', ');
	// 		$('#map-2').removeClass('fixed-height');
	// 		// $('#map-2').css({ left: coords[0] + 'px', top: coords[1] + 'px' });
	// 		$('#map-2').css('marginLeft', '-' + coords[0] + 'px');
	// 		$('#map-2').css('marginTop', '-' + coords[1] + 'px');
	// 	} else {
	// 		$('#map-2').addClass('fixed-height');
	// 		$('#map-2').css('marginLeft', '-' + '0px');
	// 		$('#map-2').css('marginTop', '-' + '0px');
	// 	}

	// });

	// const paths = document.querySelectorAll('.panzoom');
	// paths.forEach((elem) => {
	// 	const parent = elem.parentElement;
	// 	const panzoom = Panzoom(elem, {
	// 		minScale: 1,
	// 		maxScale: 5,
	// 		contain: 'outside',
	// 		disableZoom: false,
	// 		animate: true,
	// 	});

	// 	const resetButton = document.getElementById('reset-btn');
	// 	// parent.addEventListener('wheel', panzoom.zoomWithWheel);
	// 	const zoomInButton = document.getElementById('zoom-in');
	// 	const zoomOutButton = document.getElementById('zoom-out');
	// 	// const rangeInput = document.getElementById('zoom-range');
	// 	zoomInButton.addEventListener('click', panzoom.zoomIn);
	// 	zoomOutButton.addEventListener('click', panzoom.zoomOut);
	// 	resetButton.addEventListener('click', panzoom.reset())
	// 	// rangeInput.addEventListener('input', (event) => {
	// 	// 	panzoom.zoom(event.target.valueAsNumber)
	// 	// })
	// });

	// var $section = $('#canvas');
	//Even page Zoom
	$('.panzoom-even').panzoom({
		$zoomIn: $("#zoom-in-even"),
		$zoomOut: $("#zoom-out-even"),
		$zoomRange: $(".zoom-range"),
		$reset: $("#reset-even"),
		startTransform: 'scale(1)',
		increment: 0.1,
		minScale: 1,
		contain: 'invert',
		maxScale: 5,
		animate: true,
		onEnd: function () {

		}
	}).panzoom('zoom', true);

	//Odd page zoom
	$('.panzoom-odd').panzoom({
		$zoomIn: $("#zoom-in-odd"),
		$zoomOut: $("#zoom-out-odd"),
		$zoomRange: $(".zoom-range"),
		$reset: $("#reset-odd"),
		startTransform: 'scale(1)',
		increment: 0.1,
		minScale: 1,
		contain: 'invert',
		maxScale: 5,
		animate: true,
		onEnd: function () {

		}
	}).panzoom('zoom', true);


	// $(document).on("mousemove", function (e) {
	// 	if ($('.pin').length) {
	// 		$('.pin').fadeOut(500, function () { $(this).remove(); });

	// 	}
	// });

	// var currentZoom = 1;
	// $('.tooltipLink').click(function () {
	// 	currentZoom += 1.3;
	// 	$('.tooltipLink').css({
	// 		zoom: currentZoom,
	// 		'-moz-transform': 'scale(' + currentZoom + ')'
	// 	});
	// });

}, 1000)
