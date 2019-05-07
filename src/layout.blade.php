<!doctype html>
<html lang="en">
<head>
  <title>Regal Pythons - Ball Pythons, designed for life - @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
	@style(https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css)
  @style(https://fonts.googleapis.com/css?family=Montserrat)
	@assets($assets)
</head>
<body>
  @include('nav')
  
  @yield('content')
  
  @include('footer')
  
  @script(https://code.jquery.com/jquery-3.2.1.slim.min.js)
  @script(https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js)
  @script(https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js)
  @script(https://cdn.jsdelivr.net/npm/contentful@latest/dist/contentful.browser.min.js)
  <script> var exports = {} // quick fix because 'exports' is not defined in rich-text bundle below</script>
  @script(https://unpkg.com/@contentful/rich-text-html-renderer@12.0.0/dist/rich-text-html-renderer.es5.js)
  <script type="text/javascript">

 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', 'UA-19495647-1']);
 _gaq.push(['_setDomainName', 'none']);
 _gaq.push(['_setAllowLinker', true]);
 _gaq.push(['_trackPageview']);

 (function() {
   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();

 // grab active links and set them
document
  .querySelectorAll('a[href="' + location.pathname + '"]')
  .forEach(item => item.classList.add('active'))

</script>
</body>
</html>
