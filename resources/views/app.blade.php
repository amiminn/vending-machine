<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🍹</text></svg>">
    <!-- Primary Meta Tags -->
    <title>Smart Vending Machine</title>
    <meta name="title" content="Smart Vending Machine" />
    <meta name="description" content="Hanya tersedia untuk pembayaran non-tunai. ambil satu botol minumanmu dengan sekali scan." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ env("APP_URL") }}" />
    <meta property="og:title" content="Smart Vending Machine" />
    <meta property="og:description" content="Hanya tersedia untuk pembayaran non-tunai. ambil satu botol minumanmu dengan sekali scan." />
    <meta property="og:image" content="{{ env("APP_URL") }}/icon/vm.jpg" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ env("APP_URL") }}" />
    <meta property="twitter:title" content="Smart Vending Machine" />
    <meta property="twitter:description" content="Hanya tersedia untuk pembayaran non-tunai. ambil satu botol minumanmu dengan sekali scan." />
    <meta property="twitter:image" content="{{ env("APP_URL") }}/icon/vm.jpg" />

<!-- Meta Tags Generated with https://metatags.io -->
    <script>
      window.Laravel = {csrfToken: '{{ csrf_token() }}',app_key : '{{ env("APP_KEY") }}',url : '{{ env("APP_URL") }}'}
      @auth
        let user = {{ Js::from(auth()->user()) }};let token = {{ Js::from(session('token')) }};window.Auth = {user,token}
      @endauth
  </script>
    @vite(['resources/js/app.js', "resources/css/app.css"])
    {{-- <link rel="stylesheet" href="/build/assets/app-Bbxe8Ftd.css">
    <link rel="stylesheet" href="/build/assets/app-B-gXXBrj.css">
    <script src="/build/assets/app-BOB9AfXr.js" type="module"></script> --}}
    @inertiaHead
  </head>
  <body class="">
      @inertia
  </body>
</html>