<div class="tabs-part">
	<a href="/signin" class="tab @if(request()->path() == 'signin') active-tab @endif">
		<p>Войти</p>
	</a>
	<a href="/" class="tab @if(request()->path() == '/') active-tab @endif">
		<p>Зарегистрироваться</p>
	</a>
</div>