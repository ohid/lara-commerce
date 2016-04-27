
<ul class="" id="bxslider-home4">
	
	@foreach($sliders as $slider)
		<li>
			<img src="{{ $slider->slider_img }}" alt="Slide">
			<div class="caption-group">
				<h2 class="caption title">
					{{ $slider->name }} <span class="primary"> <strong>{{ $slider->offer }}</strong></span>
				</h2>
				<h4 class="caption subtitle">{{ $slider->short_title }}</h4>
				<a class="caption button-radius" href="/{{ $slider->id }}"><span class="icon"></span>Shop now</a>
			</div>
		</li>
	@endforeach

</ul>
