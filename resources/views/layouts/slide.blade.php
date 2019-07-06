<div class="hero-header">
    <!-- Hero Slider-->
    <div id="hero-slider" class="hero-slider">

        @foreach($slides as $slide)
            <div class="item-slider" style="background:url(storage/{{ $slide->profileImage }});">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="info-slider">
                                <h1>{{ $slide->title }}</h1>
                                <p>{{ $slide->description }}</p>
                                <a href="{{ $slide->link }}" target="_blank" class="btn-iw outline">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- End Hero Slider-->
</div>