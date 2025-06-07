<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      {{-- Inline style to set the HTML background color based on our theme in app.css --}}
      <style>
        html {
          background-color: oklch(1 0 0);
        }
        html.dark {
          background-color: oklch(0.145 0 0);
        }
      </style>
      <title inertia>{{ config('app.name', 'DoLog') }}</title>
      <link rel="icon" href="/favicon.ico" sizes="any">
      <link rel="icon" href="/icons/favicon.svg" type="image/svg+xml">
      <link rel="apple-touch-icon" href="/icons/apple-touch-icon.png">

      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
      <link rel="manifest" href="/site.webmanifest">

      @routes
      @viteReactRefresh
      @vite(['resources/js/app.tsx', "resources/js/pages/{$page['component']}.tsx"])
      @inertiaHead
  </head>
  <body class="font-sans antialiased size-full min-h-dvh bg-neutral-200 text-neutral-950 dark:bg-neutral-900 dark:text-white">
    @inertia
  </body>
</html>
