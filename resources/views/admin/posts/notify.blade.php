<script>
	@if (Session::has('post-created'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Запись добавлена',
	    timeout: 10000
	});
	@endif
	@if (Session::has('post-destroyed'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Запись удалена',
	    timeout: 10000
	});
	@endif
	@if (Session::has('post-updated'))
	UIkit.notification({
	    message: '<span uk-icon="bell" class="uk-margin-small-right"></span>Запись обновлена',
	    timeout: 10000,
	});
	@endif
</script>