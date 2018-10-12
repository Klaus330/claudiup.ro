<!-- Project Starts -->
<div class="col s12 m6 l3 xl3" data-panel="panel-{{$i}}">
    <a href="#">
    	@if($projects[$i]->thumbnail)
			<img class="responsive-img" src="/images/thumbnail/projects/{{$projects[$i]->thumbnail}}" alt="{{$projects[$i]->title}}" />
		@else
		 	<img class="responsive-img" src="/images/logobw.png" alt="{{$projects[$i]->title}}" />
		 @endif
		<div class="valign-wrapper"><span class="font-weight-400 uppercase">{{$projects[$i]->title}}</span></div>
	</a>
</div>
<!-- Project Ends -->