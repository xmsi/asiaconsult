<div class="tabs-part">
	<a href="/" class="tab @if(request()->path() == '/') active-tab @endif">
		<p>Войти</p>
	</a>
	<a href="/registration" class="tab @if(request()->path() == '/registration') active-tab @endif">
		<p>Зарегистрироваться</p>
	</a>
</div>