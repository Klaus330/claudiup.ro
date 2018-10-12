<!-- About Section Starts -->
<section>
    <!-- About Title Starts -->
    <div class="bl-box valign-wrapper">
        <div class="page-title center-align">
            <span class="title-bg">Resume</span>
            <h2 class="center-align">
                <span data-hover="About">About </span>
                <span data-hover="Me">Me</span>
            </h2>
        </div>
    </div>
    <!-- About Title Ends -->
    <!-- About Expanded Starts -->
    <div class="bl-content">
        <!-- Main Heading Starts -->
        <div class="container page-title center-align">
            <h2 class="center-align">
                <span data-hover="About">About </span>
                <span data-hover="Me">Me</span>
            </h2>
            <span class="title-bg">Resume</span>
        </div>
        <!-- Main Heading Ends -->
        <div class="container infos">
			<!-- Divider Starts -->
            <div class="divider center-align">
                <span class="outer-line"></span>
                <span class="fa fa-vcard" aria-hidden="true"></span>
                <span class="outer-line"></span>
            </div>
			<!-- Divider Ends -->
            
			<!-- Personal Informations Starts -->
            <div class="row">
				<!-- Picture Starts -->
                <div class="col s12 m5 l4 xl3 profile-picture">
					<img src="/images/photo-about.jpg" class="responsive-img my-picture" alt="My Photo">
                </div>
				<!-- Picture Ends -->
                <div class="col s12 m7 l8 xl9 personal-info">
                    <h6 class="uppercase"><i class="fa fa-user"></i> Personal Informations</h6>
					<div class="col m12 l7 xl7 p-none">
						<p class="second-font">I'm a Freelance Full Stack Developer based in Falticeni, Romania.<br>
						I have serious passion on Back-end development, UI effects and creating intuive apps.
						</p>
					</div>
                    <div class="col s12 m12 l6 p-none">
                        <ul class="second-font list-1">
                            <li><span class="font-weight-600">First Name: </span>Popa</li>
                            <li><span class="font-weight-600">Last Name: </span>Claudiu</li>
                            <li><span class="font-weight-600">Date of birth: </span>03 march 2000</li>
                            <li><span class="font-weight-600">Nationality: </span>Romanian</li>
							<li><span class="font-weight-600">Freelance: </span>Available</li>
                        </ul>
                    </div>
                    <div class="col s12 m12 l6 p-none">
                        <ul class="second-font list-2">
                            <li><span class="font-weight-600">Phone: </span>+40 74 50 25 44</li>
                            <li><span class="font-weight-600">Address: </span>Falticeni, Romania</li>
                            <li><span class="font-weight-600">Email: </span>claudiup340@gmail.com</li>
                            <li><span class="font-weight-600">Spoken Langages: </span>English, Romaninan </li>
							<li><span class="font-weight-600">Skype: </span>p.claus23</li>
                        </ul>
                    </div>
                    <a href="#" class="col s12 m12 l4 xl4 waves-effect waves-light btn font-weight-500">
						Download Resume <i class="fa fa-file-pdf-o"></i>
					</a>
					<a href="/blog" class="col s12 m12 l4 xl4 btn btn-blog font-weight-500">
						My Blog <i class="fa fa-edit"></i>
					</a>
                </div>
            </div>
			<!-- Personal Informations Ends -->
        </div>

		<!-- Resume Starts -->
		<div class="resume-container">
            <div class="container">
                <div class="valign-wrapper row">
                    
					<!-- Resume Menu Starts -->
                    <div class="resume-list col l4">
                        <div class="resume-list-item is-active" data-index="0" id="resume-list-item-0">
                            <div class="resume-list-item-inner">
                                <h6 class="resume-list-item-title uppercase"><i class="fa fa-briefcase"></i> Experience</h6>
                            </div>
                        </div>
                        <div class="resume-list-item" data-index="1" id="resume-list-item-1">
                            <div class="resume-list-item-inner">
                                <h6 class="resume-list-item-title uppercase"><i class="fa fa-graduation-cap"></i> Education</h6>
                            </div>
                        </div>
                        <div class="resume-list-item" data-index="2" id="resume-list-item-2">
                            <div class="resume-list-item-inner">
                                <h6 class="resume-list-item-title uppercase"><i class="fa fa-star"></i> Skills</h6>
                            </div>
                        </div>
                    </div>
					<!-- Resume Menu Ends -->

					<!-- Resume Content Starts -->
                    <div class="col s12 m12 l8 resume-cards-container" style="    padding-bottom: 400px;">
                        <div class="resume-cards">
						    @include("pages.includes.about.experience")
					        @include("pages.includes.about.education")
							@include("pages.includes.about.skills")
                        </div>
                    </div>
					<!-- Resume Content Ends -->

                </div>
            </div>
        </div>
		<!-- Resume Ends -->
        @include("pages.includes.about.results")
    </div>
    <!-- End Expanded About -->
    <img alt="close" src="images/close-button.png" class="bl-icon-close" />
</section>
<!-- About Ends -->