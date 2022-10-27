<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.2/dist/jBox.all.min.js"></script>
	<link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.2/dist/jBox.all.min.css" rel="stylesheet">
	<!-- <script type="text/javascript" src="./extras/jquery.min.1.7.js"></script> -->
	<script type="text/javascript" src="./extras/jquery-ui-1.8.20.custom.min.js"></script>
	<script type="text/javascript" src="./extras/jquery.mousewheel.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@panzoom/panzoom/dist/panzoom.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.panzoom/3.2.2/jquery.panzoom.min.js"></script>
	<script type="text/javascript" src="./extras/modernizr.2.5.3.min.js"></script>
	<script type="text/javascript" src="./lib/hash.js"></script>
	<script src="./js/jquery.panzoom.js"></script>
	<title>Bache Silhouettes</title>
</head>

<body class="bg-gradient-to-r from-gray-100 to-gray-300flex flex-col">
	<nav id="header" class="w-full z-30 top-0 text-white py-1 lg:py-6">
		<div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-2 lg:py-6">
			<div class="pl-4 flex items-center">
				<a class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
				Bache Silhouettes
				</a>
			</div>

			<div class="block lg:hidden pr-4">
				<button id="nav-toggle"
					class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-800 hover:border-green-500 appearance-none focus:outline-none">
					<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<title>Menu</title>
						<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
					</svg>
				</button>
			</div>

			<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 text-black p-4 lg:p-0 z-20"
				id="nav-content">
				<ul class="list-reset lg:flex justify-end flex-1 items-center">
					<li class="mr-3">
						<a class="text-white inline-block py-2 px-4 font-bold no-underline" href="#">Active</a>
					</li>
					<li class="mr-3">
						<a class="text-white inline-block no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
							href="#">link</a>
					</li>
					<li class="mr-3">
						<a class="text-white inline-block no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
							href="#">link</a>
					</li>
				</ul>
				<button id="navAction"
					class="text-white mx-auto lg:mx-0 hover:underline  font-extrabold rounded mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">
					Action
				</button>
			</div>
		</div>
	</nav>
	<div class="text-center px-3 lg:px-0">
		<h1 class="my-4 text-2xl md:text-3xl lg:text-5xl font-black leading-tight mt-20">
			Ledger book of William Bache, with associated pieces

		</h1>
		<p class="leading-normal text-gray-800 text-base md:text-xl lg:text-2xl mb-8">
			William Bache, 22 Dec 1771 - 09 Jul 1845
		</p>
	</div>


	<div id="canvas">
		<div
			class="flex flex-col items-center bg-white  border shadow-md md:flex-row dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
			<img id="img-box" class="object-cover w-full h-96 md:h-auto md:w-48 md:"
				src="https://ids.si.edu/ids/deliveryService?id=NPG-NPG_2002_184_p1" alt="">
			<div class=" flex flex-col justify-between p-4 leading-normal">
				<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">National Portrait
					Gallery, Smithsonian Institution; partial gift of Sarah Bache Bloise</h5>
				<p class="mb-3 font-normal text-gray-700 dark:text-gray-400" id="image-info">Click on a silhouette to
					see information.
				</p>
			</div>
		</div>
		<div id="book-zoom">
			<div class="bache-book">

			</div>
		</div>
		<!-- Book controls -->
		<div class="zoom-controls py-5">
			<div>
				<button id="zoom-in-even"
					class="rounded px-4 py-2 text-xs text-gray-800 font-extrabold rounded my-2 md:my-6 py-2 px-8 shadow-lg">Zoom
					In </button>
				<button id="zoom-out-even"
					class="rounded px-4 py-2 text-xs text-gray-800 font-extrabold rounded my-2 md:my-6 py-2 px-8 shadow-lg ">Zoom
					Out</button>
				<!-- <input type="range" class="zoom-range"> -->
				<button
					class="rounded px-4 py-2 text-xs text-gray-800 font-extrabold rounded my-2 md:my-6 py-2 px-8 shadow-lg"
					id="reset-even">Reset</button>
			</div>

			<div>
				<button id="zoom-in-odd"
					class="rounded px-4 py-2 text-xs text-gray-800 font-extrabold rounded my-2 md:my-6 py-2 px-8 shadow-lg">Zoom
					In </button>
				<button id="zoom-out-odd"
					class="rounded px-4 py-2 text-xs text-gray-800 font-extrabold rounded my-2 md:my-6 py-2 px-8 shadow-lg ">Zoom
					Out</button>
				<!-- <input type="range" class="zoom-range"> -->
				<button
					class="rounded px-4 py-2 text-xs text-gray-800 font-extrabold rounded my-2 md:my-6 py-2 px-8 shadow-lg"
					id="reset-odd">Reset</button>
			</div>
		</div>
		<div class="controls">
			<button id="previous-page"
				class="mx-auto lg:mx-0 text-gray-800 font-extrabold rounded my-2 md:my-6 py-2 px-8 shadow-lg ">&larr;</button>
			<label for="page-number">Page:</label> <input type="text" size="3" id="page-number"> <span
				style="font-size: 20px;">of</span> <span id="number-pages"></span>
			<button id="next-page"
				class="mx-auto lg:mx-0 text-gray-800 font-extrabold rounded my-2 md:my-6 py-2 px-8 shadow-lg ">&rarr;</button>
		</div>
	</div>

	<section class="bg-white border-b py-8">
		<div class="container mx-auto flex flex-wrap pt-4 pb-12">
			<h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-gray-800">
			William Bache
			</h2>
			<div class="w-full mb-4">
				<div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
			</div>

			<div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
				<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
					<a href="#" class="flex flex-wrap no-underline hover:no-underline">
						<p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-6">
							GETTING STARTED
						</p>
						<div class="w-full font-bold text-xl text-gray-800 px-6">
							Lorem ipsum dolor sit amet.
						</div>
						<p class="text-gray-600 text-base px-6 mb-5">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
							at ipsum eu nunc commodo posuere et sit amet ligula.
						</p>
					</a>
				</div>
				<div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
					<div class="flex items-center justify-start">
						<button
							class="mx-auto lg:mx-0 hover:underline gradient2 text-gray-800 font-extrabold rounded my-6 py-4 px-8 shadow-lg">
							Action
						</button>
					</div>
				</div>
			</div>

			<div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
				<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
					<a href="#" class="flex flex-wrap no-underline hover:no-underline">
						<p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-6">
							GETTING STARTED
						</p>
						<div class="w-full font-bold text-xl text-gray-800 px-6">
							Lorem ipsum dolor sit amet.
						</div>
						<p class="text-gray-600 text-base px-6 mb-5">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
							at ipsum eu nunc commodo posuere et sit amet ligula.
						</p>
					</a>
				</div>
				<div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
					<div class="flex items-center justify-center">
						<button
							class="mx-auto lg:mx-0 hover:underline gradient2 text-gray-800 font-extrabold rounded my-6 py-4 px-8 shadow-lg">
							Action
						</button>
					</div>
				</div>
			</div>

			<div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
				<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
					<a href="#" class="flex flex-wrap no-underline hover:no-underline">
						<p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-6">
							GETTING STARTED
						</p>
						<div class="w-full font-bold text-xl text-gray-800 px-6">
							Lorem ipsum dolor sit amet.
						</div>
						<p class=" text-gray-600 text-base px-6 mb-5">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
							at ipsum eu nunc commodo posuere et sit amet ligula.
						</p>
					</a>
				</div>
				<div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
					<div class="flex items-center justify-end">
						<button
							class="mx-auto lg:mx-0 hover:underline gradient2 text-gray-800 font-extrabold rounded my-6 py-4 px-8 shadow-lg">
							Action
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="content-description w-full mx-auto text-center pt-6 pb-12">
		<h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-white">
			Content
		</h2>
		<div class="w-full mb-4">
			<div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
		</div>

		<h3 class="my-4 text-3xl font-extrabold">
			Content Description
		</h3>

		<button
			class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded my-6 py-4 px-8 shadow-lg">
			Action!
		</button>
	</section>

	<!--Footer-->
	<footer class="bg-white ">
		<div class="container mx-auto mt-8 px-8">
			<div class="w-full flex flex-col md:flex-row py-6">
				<div class="flex-1 mb-6">
					<a class="text-orange-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
						Footer
					</a>
				</div>

				<div class="flex-1">
					<p class="uppercase font-extrabold text-gray-500 md:mb-6">Links</p>
					<ul class="list-reset mb-6">
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">FAQ</a>
						</li>
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Help</a>
						</li>
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Support</a>
						</li>
					</ul>
				</div>
				<div class="flex-1">
					<p class="uppercase font-extrabold text-gray-500 md:mb-6">Legal</p>
					<ul class="list-reset mb-6">
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Terms</a>
						</li>
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Privacy</a>
						</li>
					</ul>
				</div>
				<div class="flex-1">
					<p class="uppercase font-extrabold text-gray-500 md:mb-6">Social</p>
					<ul class="list-reset mb-6">
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Facebook</a>
						</li>
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Linkedin</a>
						</li>
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Twitter</a>
						</li>
					</ul>
				</div>
				<div class="flex-1">
					<p class="uppercase font-extrabold text-gray-500 md:mb-6">
						Company
					</p>
					<ul class="list-reset mb-6">
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Official
								Blog</a>
						</li>
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">About
								Us</a>
						</li>
						<li class="mt-2 inline-block mr-2 md:block md:mr-0">
							<a href="#"
								class="font-light no-underline hover:underline text-gray-800 hover:text-orange-500">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>


	<script type="text/javascript">

		function loadApp() {

			var flipbook = $('.bache-book');

			// Check if the CSS was already loaded

			if (flipbook.width() == 0 || flipbook.height() == 0) {
				setTimeout(loadApp, 10);
				return;
			}

			// Mousewheel

			$('#book-zoom').mousewheel(function (event, delta, deltaX, deltaY) {

				var data = $(this).data(),
					step = 30,
					flipbook = $('.bache-book'),
					actualPos = $('#slider').slider('value') * step;

				if (typeof (data.scrollX) === 'undefined') {
					data.scrollX = actualPos;
					data.scrollPage = flipbook.turn('page');
				}

				data.scrollX = Math.min($("#slider").slider('option', 'max') * step,
					Math.max(0, data.scrollX + deltaX));

				var actualView = Math.round(data.scrollX / step),
					page = Math.min(flipbook.turn('pages'), Math.max(1, actualView * 2 - 2));

				if ($.inArray(data.scrollPage, flipbook.turn('view', page)) == -1) {
					data.scrollPage = page;
					flipbook.turn('page', page);
				}

				if (data.scrollTimer)
					clearInterval(data.scrollTimer);

				data.scrollTimer = setTimeout(function () {
					data.scrollX = undefined;
					data.scrollPage = undefined;
					data.scrollTimer = undefined;
				}, 1000);

			});

			// Slider

			$("#slider").slider({
				min: 1,
				max: 100,

				start: function (event, ui) {
					if (!window._thumbPreview) {
						_thumbPreview = $('<div />', { 'class': 'thumbnail' }).html('<div></div>');
						setPreview(ui.value);
						_thumbPreview.appendTo($(ui.handle));
					} else
						setPreview(ui.value);

					moveBar(false);
				},

				slide: function (event, ui) {
					setPreview(ui.value);
				},

				stop: function () {
					if (window._thumbPreview)
						_thumbPreview.removeClass('show');

					$('.bache-book').turn('page', Math.max(1, $(this).slider('value') * 2 - 2));
				}
			});


			// URIs

			Hash.on('^page\/([0-9]*)$', {
				yep: function (path, parts) {
					var page = parts[1];

					if (page !== undefined) {
						if ($('.bache-book').turn('is'))
							$('.bache-book').turn('page', page);
					}

				},
				nop: function (path) {

					if ($('.bache-book').turn('is'))
						$('.bache-book').turn('page', 1);
				}
			});

			// Arrows

			$(document).keydown(function (e) {

				var previous = 37, next = 39;

				switch (e.keyCode) {
					case previous:

						$('.bache-book').turn('previous');

						break;
					case next:

						$('.bache-book').turn('next');

						break;
				}

			});

			// Create the flipbook
			var numberOfPages = 5;
			flipbook.turn({
				elevation: 50,
				acceleration: false,
				gradients: true,
				autoCenter: true,
				duration: 1000,
				pages: numberOfPages,
				when: {

					turning: function (e, page, view) {

						var book = $(this),
							currentPage = book.turn('page'),
							pages = book.turn('pages');

						if (currentPage > 3 && currentPage < pages - 3) {
							if (page == 1) {
								book.turn('page', 2).turn('stop').turn('page', page);
								e.preventDefault();
								return;
							} else if (page == pages) {
								book.turn('page', pages - 1).turn('stop').turn('page', page);
								e.preventDefault();
								return;
							}
						} else if (page > 3 && page < pages - 3) {
							if (currentPage == 1) {
								book.turn('page', 2).turn('stop').turn('page', page);
								e.preventDefault();
								return;
							} else if (currentPage == pages) {
								book.turn('page', pages - 1).turn('stop').turn('page', page);
								e.preventDefault();
								return;
							}
						}

						Hash.go('page/' + page).update();

						if (page == 1 || page == pages)
							$('.bache-book .tabs').hide();


					},

					turned: function (e, page, view) {

						var book = $(this);
						$('#page-number').val(page);
						$('#slider').slider('value', getViewNumber(book, page));

						if (page != 1 && page != book.turn('pages'))
							$('.bache-book .tabs').fadeIn(500);
						else
							$('.bache-book .tabs').hide();

						book.turn('center');
						updateTabs();

					},

					start: function (e, pageObj) {

						moveBar(true);

					},

					end: function (e, pageObj) {

						var book = $(this);

						setTimeout(function () {
							$('#slider').slider('value', getViewNumber(book));
						}, 1);

						moveBar(false);

					},

					missing: function (e, pages) {

						for (var i = 0; i < pages.length; i++)
							addPage(pages[i], $(this));

					}
				}
			}).turn('page', 2);

			$('#number-pages').html(numberOfPages);

			$('#page-number').keydown(function (e) {

				if (e.keyCode == 13)
					$('.bache-book').turn('page', $('#page-number').val());

			});

			$('#next-page').click(function () {
				$('.bache-book').turn('next');
			})

			$('#previous-page').click(function () {
				$('.bache-book').turn('previous');
			})


			$('#slider').slider('option', 'max', numberOfViews(flipbook));

			flipbook.addClass('animated');


			// Show canvas

			$('#canvas').css({ visibility: 'visible' });
		}

		// Hide canvas

		$('#canvas').css({ visibility: 'hidden' });

		yepnope({
			test: Modernizr.csstransforms,
			yep: ['./lib/turn.min.js', 'css/jquery.ui.css'],
			nope: ['./lib/turn.html4.min.js', 'js/jquery.panzoom.js', 'css/style.css', 'css/jquery.ui.html4.css'],
			both: ['css/book.css', './js/book.js'],
			complete: loadApp
		});

	</script>

</body>

</html>