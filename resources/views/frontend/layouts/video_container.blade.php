<div class="video-container">
    <video autoplay loop muted id="video-bg">
    	<?php
    		$video = \App\Models\Video::where('id','=',1)->first();
    	?>
    	@if(empty($video))
        <source src="{{ asset('assets/video/main_video.mp4') }}" type="video/mp4">
    	@else
        <source src="{{ asset($video->name) }}" type="video/mp4">
    	@endif
    </video>
</div>