 @if(session('flash_level'))
	<p class="alert {!! session('flash_level') !!}" style="padding:15px;" role="alert">
	    {!! session('flash_mesage') !!}
	<p>
@endif     