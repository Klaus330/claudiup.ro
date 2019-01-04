<!-- Skills Starts -->
<div class="resume-card resume-card-0" data-index="0">
	<!-- Skills Header Title Starts -->
    <div class="resume-card-header">
        <div class="resume-card-name"><i class="fa fa-star"></i> Skills</div>
    </div>
	<!-- Skills Header Title Starts -->
    <div class="resume-card-body skills">
        <div class="resume-card-body-container second-font">
            <div class="row">
            	@foreach($skills as $skill)
				<!-- Skills Row Starts -->
                <div class="col s3">
                	
						<!-- Single Skills Starts -->
	                    <div class="resume-content">
							<h6 class="uppercase">{{$skill->name}}</h6>
							<p>
								@for ($i = 0; $i < $skill->experience_level ; $i++)
									<i class="fa fa-star"></i> 
								@endfor
								@for ($i = 0; $i < 5 - $skill->experience_level ; $i++)
									<i class="fa fa-star-o"></i> 
								@endfor
							</p>
	                    </div>
						<!-- Single Skills Ends -->
				
                </div>
				<!-- Skills Row Ends -->
				@endforeach
            </div>
        </div>
    </div>
</div>
<!-- Skills Ends -->