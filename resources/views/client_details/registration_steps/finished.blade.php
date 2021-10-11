<div class="finish {{$current_page}}" data-id="finish">
	{{-- <div class="finish" data-id="finish"> --}}
	<h5 class="theme-color-dark text-center">
		{{ zactra::translate_lang('Congrats! You just did something really wise') }}
	</h5>
	<p>{{ zactra::translate_lang('“Debt means enslavement to the past, no matter how much you want to plan well for the future and live according to your own standards today. Unless you’re free from the bondage of paying for your past, you can’t responsibly live in the present and plan for the future.” - Tsh Oxenreider') }}</p>
	<div class="finish-img mt-0">
		<div class="img-block">
			<img src="{{asset('images/new/finish.png')}}" alt="finish">
		</div>
	</div>
	<a class="finish-reg basic-button">{{ zactra::translate_lang('Continue') }}</a>
</div>
