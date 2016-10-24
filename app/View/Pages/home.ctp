<style type="text/css">
	.carousel {
    height: 100%;
	}

	.carousel .item,.carousel .active, .carousel-inner {
	    height: 100%;
	}

	/* Background images are set within the HTML using inline CSS, not here */

	.fill {
	    width: 100%;
	    height: 100%;
	    background-position: center;
	    -webkit-background-size: cover;
	    -moz-background-size: cover;
	    background-size: cover;
	    -o-background-size: cover;
	}
</style>
<div class="row" style="height:450px">
 <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo $this->webroot;?>/img/image1.jpg'); ?>"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo $this->webroot;?>/img/image2.jpg'); ?>"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo $this->webroot;?>/img/image3.jpg'); ?>"></div>
                <div class="carousel-caption">
                    <h2></h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
</div>
<br>
    <?php $this->Js->buffer("
    	$('.carousel').carousel({
        	interval: 5000 //changes the speed
    	})	
    ");