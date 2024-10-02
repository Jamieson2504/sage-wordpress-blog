<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())

    <link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/sage-main/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/sage-main/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/sage-main/favicon/favicon-16x16.png">
    <link rel="manifest" href="/wp-content/themes/sage-main/favicon/site.webmanifest">
    <link rel="mask-icon" href="/wp-content/themes/sage-main/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/wp-content/themes/sage-main/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/wp-content/themes/sage-main/favicon/browserconfig.xml">
    <meta name="theme-color" content="#FFFFF9">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Danfo:ELSH@0..100&display=swap" rel="stylesheet">
    
  </head>

  <body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
  
      @include('sections.header')

      <div class="grid-bg">
        <div class="grid-bg__item"></div><!-- /.grid-bg__item -->
        <div class="grid-bg__item"></div><!-- /.grid-bg__item -->
        <div class="grid-bg__item"></div><!-- /.grid-bg__item -->
        <div class="grid-bg__item"></div><!-- /.grid-bg__item -->
        <div class="grid-bg__item"></div><!-- /.grid-bg__item -->
        <div class="grid-bg__item"></div><!-- /.grid-bg__item -->  
        <div class="grid-bg__item"></div><!-- /.grid-bg__item -->  
      </div><!-- /.grid-lines -->


      <div class="cursor">
        <div class="cursor__inner"></div><!-- /.cursor__innner -->
      </div>

      @yield('hero')

      <div class="page-content lg:flex">
          <main id="main" class="main">
            @yield('content')
          </main>
    
          @hasSection('sidebar')
            <aside class="sidebar">
              @yield('sidebar')
            </aside>
          @endif
      </div><!-- /.site-wrapper -->


      @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
