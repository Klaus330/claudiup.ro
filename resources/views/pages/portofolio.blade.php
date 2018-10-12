<!-- Portfolio Starts -->
<section id="bl-work-section">
	<!-- Portfolio Title Starts -->
    <div class="bl-box valign-wrapper">
        <div class="page-title center-align">
            <span class="title-bg">works</span>
            <h2 class="center-align">
                <span data-hover="my">my </span>
                <span data-hover="portfolio">portfolio</span>
            </h2>
        </div>
    </div>
	<!-- Portfolio Title Ends -->

    <!-- Portfolio Expanded Starts -->
    <div class="bl-content">

        <!-- Main Heading Starts -->
        <div class="container page-title center-align">
            <h2 class="center-align">
                <span data-hover="my">my </span>
                <span data-hover="portfolio">portfolio</span>
            </h2>
            <span class="title-bg">works</span>
        </div>
        <!-- Main Heading Ends -->

        <div class="container">
            <!-- Divider Starts -->
            <div class="divider center-align">
                <span class="outer-line"></span>
                <span class="fa fa-suitcase" aria-hidden="true"></span>
                <span class="outer-line"></span>
            </div>
            <!-- Divider Ends -->

            <div class="row center-align da-thumbs" id="bl-work-items">
                @if(count($projects))
                    @for ($i = 0; $i < count($projects) ; $i++)
                        @include('pages.includes.portofolio.projects.thumbnail')
                    @endfor
                @else
                    <span> There are no project uploaded yet.</span>
                @endif
            </div>
        </div>
    </div>
    <!-- Portfolio Expanded Ends -->
    <img alt="close" src="images/close-button.png" class="bl-icon-close" />
</section>
<!-- Portfolio Section Ends -->

