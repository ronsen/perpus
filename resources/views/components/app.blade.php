<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>{{ $title ?? config("app.name") }}</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<body>
	<main>
		<h1>{{ config('app.name') }}</h1>
		<p>Sistem Informasi Perpustakaan</p>

	{{ $slot }}

	</main>
</body>

</html>