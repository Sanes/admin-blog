<div class="uk-width-auto uk-visible@m uk-overflow-auto" style="min-height: calc(100vh - 152px);">
	<ul class="uk-nav uk-nav-default">
		<li class="uk-nav-header">Управление</li>
		<li class="uk-nav-divider"></li>
		<li @if(Request::segment(2) == 'posts') class="uk-active" @endif><a href="{{ route('admin.posts.index') }}"><span class="uk-margin-small-right" uk-icon="rss"></span>Записи</a></li>
		<li><a href=""><span class="uk-margin-small-right" uk-icon="comments"></span>Комментарии</a></li>
		<li @if(Request::segment(2) === 'categories') class="uk-active" @endif><a href="{{ route('admin.categories.index') }}"><span class="uk-margin-small-right" uk-icon="menu"></span>Категории</a></li>
		<li><a href=""><span class="uk-margin-small-right" uk-icon="tag"></span>Теги</a></li>
		<li class="uk-nav-divider"></li>
		<li><a href=""><span class="uk-margin-small-right" uk-icon="copy"></span>Страницы</a></li>
		<li><a href=""><span class="uk-margin-small-right" uk-icon="image"></span>Баннеры</a></li>
		<li class="uk-nav-divider"></li>
		<li><a href=""><span class="uk-margin-small-right" uk-icon="users"></span>Пользователи</a></li>
		<li><a href=""><span class="uk-margin-small-right" uk-icon="settings"></span>Роли</a></li>
	</ul>
</div>