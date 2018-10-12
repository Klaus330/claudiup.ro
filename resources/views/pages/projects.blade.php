<!-- Portfolio Panel Items Starts -->
<div class="bl-panel-items" id="bl-panel-work-items">
	@for ($i = 0; $i < count($projects) ; $i++)
	      @switch($projects[$i]->type)
	        @case('image')
	            @include("pages.includes.portofolio.projects.image")
	            @break
	        @case('youtube')
	            @include("pages.includes.portofolio.projects.youtube")
	            @break
	        @case('slide')
	            @include("pages.includes.portofolio.projects.slide")
	            @break	            
	        @case('book')
	            @include("pages.includes.portofolio.projects.book")
	            @break
	    @endswitch
    @endfor
    @include("pages.includes.portofolio.nav")
</div>
<!-- Portfolio Panel Items Ends -->