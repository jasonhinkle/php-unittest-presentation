<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">

		<title>PHP Unit Testing - Slideshow</title>

		<meta name="description" content="PHP Unit Testing Presentation">
		<meta name="author" content="Jason Hinkle">

		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">

		<link rel="stylesheet" href="reveal-js/css/reveal.css">
		<link rel="stylesheet" href="reveal-js/css/theme/black.css" id="theme">
		<link rel="stylesheet" href="reveal-js/css/overrides.css">

		<!-- Code syntax highlighting -->
		<link rel="stylesheet" href="reveal-js/lib/css/zenburn.css">

		<!-- Printing and PDF exports -->
		<script>
			var link = document.createElement( 'link' );
			link.rel = 'stylesheet';
			link.type = 'text/css';
			link.href = window.location.search.match( /reveal-js/print-pdf/gi ) ? 'reveal-js/css/print/pdf.css' : 'reveal-js/css/print/paper.css';
			document.getElementsByTagName( 'head' )[0].appendChild( link );
		</script>

		<!--[if lt IE 9]>
		<script src="lib/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="reveal">

			<!-- Any section element inside of this container is displayed as a slide -->
			<div class="slides">

				<section data-background="assets/background.gif">
					<div class="well">
						<h2>Jason Hinkle</h2>
						<p>Eventric, Chicago IL</p>
						<p>github.com/jasonhinkle</p>
					</div>
				</section>

				<section>
					<div><img class="no-border" src="assets/eventric_logo.png"></div>
					<p><span class="fragment">TODO</span><span class="fragment">, More Info...</span></p>
				</section>

				<section>
					<div><img style="height: 400px;" src="assets/thank-you.jpg"></div>
					<p>Contact me <a href="http://twitter.com/jasonhinkle">@jasonhinkle</a></p>
					<p>Presentation materials are online at <a href="https://github.com/jasonhinkle/php-unittest-presentation">github.com/jasonhinkle/php-unittest-presentation</a></p>
				</section>
			</div>

		</div>

		<script src="reveal-js/lib/js/head.min.js"></script>
		<script src="reveal-js/js/reveal.js"></script>

		<script>

			// Full list of configuration options available at:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				controls: true,
				progress: true,
				history: true,
				center: true,

				transition: 'slide', // none/fade/slide/convex/concave/zoom

				// Optional reveal.js plugins
				dependencies: [
					{ src: 'reveal-js/lib/js/classList.js', condition: function() { return !document.body.classList; } },
					{ src: 'reveal-js/plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: 'reveal-js/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: 'reveal-js/plugin/highlight/highlight.js', async: true, condition: function() { return !!document.querySelector( 'pre code' ); }, callback: function() { hljs.initHighlightingOnLoad(); } },
					{ src: 'reveal-js/plugin/zoom-js/zoom.js', async: true },
					{ src: 'reveal-js/plugin/notes/notes.js', async: true }
				]
			});

		</script>

	</body>
</html>
