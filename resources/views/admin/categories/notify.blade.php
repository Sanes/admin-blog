<script>
	@if (Session::has('category-created'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Категория добавлена',
	    timeout: 10000
	});
	@endif
	@if (Session::has('category-destroyed'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Категория удалена',
	    timeout: 10000
	});
	@endif
	@if (Session::has('category-updated'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Категория обновлена',
	    timeout: 10000,
	});
	@endif
</script>