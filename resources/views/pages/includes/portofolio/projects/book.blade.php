<!-- Project Starts -->
<div data-panel="panel-{{$i}}">
    <div class="row">
      
        <!-- Project Main Content Starts -->
        <div class="col s12 l6 xl6">
            <book location="{{$projects[$i]->pdf->location}}" :project_id="{{$i}}"></book>
        </div>
        <!-- Project Main Content Ends -->

        <!-- Project Details Starts -->
        <div class="col s12 l6 xl6 white-text ">
            <h3 class="font-weight-600 white-text uppercase">{{$projects[$i]->title}}</h3>
              <ul class="project-details white-text second-font">
                <li><i class="fa fa-user"></i><span class="font-weight-600"> Client </span>: <span class="font-weight-400 uppercase">{{$projects[$i]->client}}</span></li>
                <li><i class="fa fa-calendar"></i><span class="font-weight-600"> Date </span>: <span class="font-weight-400 uppercase">{{$projects[$i]->created_at->format("d M, Y")}}</span></li>
                <li><i class="fa fa-cogs"></i> <span class="font-weight-600"> Used Technologies</span> : 
                    <span class="font-weight-400 uppercase">
                            @foreach($projects[$i]->skills as $technology)
                                {{$technology->name}}
                            @endforeach
                    </span>
                </li>
            </ul>
            <hr>
            <p class="second-font">{!!Purifier::clean($projects[$i]->description)!!}</p>
            {{-- <a href="#" class="waves-effect waves-light btn font-weight-500">Preview <i class="fa fa-external-link"></i></a> --}}
        </div>
        <!-- Project Details Ends -->
    </div>
</div>
<!-- Project Ends -->
