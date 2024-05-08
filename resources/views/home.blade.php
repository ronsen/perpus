<x-app>
	<form method="POST" action="/login">
		@csrf

		<input type="email" name="email" value="admin@example.com" placeholder="Email" aria-label="Email" autocomplete="email">
		<input type="password" name="password" value="password" placeholder="Password" aria-label="Password">
		<button type="submit">Masuk</button>
	</form>

	<article>
		<small>Created by <a href="https://s.id/ronsen">Ronald Nababan</a></small>
	</article>
</x-app>