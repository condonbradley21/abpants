


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
    <head>
        <?php include("javascriptcss.php");?>
	</head>
	<body>
		<?php include("nav.php");?>
		<div class="bgcontainer" style="margin-top: 10px;">
			<div class="col-md-12 text-center center">
				<h1>Under Construction</h1>
				<br/>
			</div>
			<div class="col-md-12 text-center">
				<h2>The site will be live in:</h2>
				<br/>
			</div>
			<div class="col-md-2 hidden-xs"></div>
			<div class="col-md-2 col-sm-6 col-xs-9 text-center">
				<div id="progress_days" style="background-color: transparent;" class="prg"></div>
			</div>
			<div class="col-md-2 col-sm-6 col-xs-9 text-center">
				<div id="progress_hours" style="background-color: transparent;" class="prg"></div>
			</div>
			<div class="col-md-2 col-sm-6 col-xs-9 text-center">
				<div id="progress_mins" style="background-color: transparent;" class="prg"></div>
			</div>
				<div class="col-md-2 col-sm-6 col-xs-9 text-center">
			<div id="progress_secs" style="background-color: transparent;" class="prg"></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center text-center v-center">
					<p class="lead"></p>
					<br />
					<form class="col-lg-12">
						<div class="input-group" style="width: 340px; text-align: center; margin: 0 auto;">
						</div>
					</form>
				</div>
			</div>
			<br/>
			<br/>			
			<div class="row">
				<div class="col-lg-12 text-center v-center" style="font-size: 39pt;">
					<a href="#"><span class="avatar"><i class="fa fa-google-plus"></i></span></a>
					<a href="#"><span class="avatar"><i class="fa fa-linkedin"></i></span></a>
					<a href="#"><span class="avatar"><i class="fa fa-facebook"></i></span></a>
					<a href="#"><span class="avatar"><i class="fa fa-github"></i></span></a>
				</div>       
			</div>
		</div>
	</body>
</html>
<link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        // the date of the release - for example the below will set the release date to 
        // 1st of March (month is 0-based), 2100 at noon 12:00 o'clock
        // var release_date = new Date(2100, 2, 1, 12, 0, 0);
        // format is: new Date(year, month [, day, hour, minute, second, millisecond]);
        // (note that the month is 0-based).

        // for showcase purpose, we set the release date to be 10 days from the current time
        var release_date = new Date(2014,9,1,12,0,0);
        release_date.setDate(release_date.getDate() + 10);

        var release_unixtime_ms = release_date.getTime(),
            total_days = Math.floor((release_unixtime_ms - (new Date()).getTime()) / (24 * 60 * 60 * 1000)),
            update_timer = null,
            progress_days,
            progress_hours,
            progress_mins,
            progress_secs;

        // define a function to initialize the progressbars
        function init_progressbars() {
            // set the width and height of each progressbar to the width of their container
            $(".prg").each(function () {
                $(this)
                    .width($(this).parent().width())
                    .height($(this).parent().width());
            });

            // initialize the progressbar widgets
            progress_days = $("#progress_days").shieldProgressBar({
                min: 0,
                max: total_days,
                value: total_days,
                layout: "circular",
                layoutOptions: {
                    circular: {
                        borderColor: "black",
                        width: 30,
                        borderWidth: 3,
                        color: "#1E98E4",
                        backgroundColor: "white"
                    }
                },
                text: {
                    enabled: true,
                    template: '<span style="font-size:27px;color:black;">{0:n0} days</span> '
                },
                reversed: true
            }).swidget();

            progress_hours = $("#progress_hours").shieldProgressBar({
                min: 0,
                max: 24,
                value: 24,
                layout: "circular",
                layoutOptions: {
                    circular: {
                        borderColor: "black",
                        width: 23,
                        borderWidth: 3,
                        color: "#1E98E4",
                        backgroundColor: "white"
                    }
                },
                text: {
                    enabled: true,
                    template: '<span style="font-size:27px;color:black;">{0:n0} hours</span> '
                },
                reversed: true
            }).swidget();

            progress_mins = $("#progress_mins").shieldProgressBar({
                min: 0,
                max: 60,
                value: 60,
                layout: "circular",
                layoutOptions: {
                    circular: {
                        borderColor: "black",
                        width: 15,
                        borderWidth: 3,
                        color: "#1E98E4",
                        backgroundColor: "white"
                    }
                },
                text: {
                    enabled: true,
                    template: '<span style="font-size:27px;color:black;">{0:n0} min</span> '
                },
                reversed: true
            }).swidget();

            progress_secs = $("#progress_secs").shieldProgressBar({
                min: 0,
                max: 60,
                value: 60,
                layout: "circular",
                layoutOptions: {
                    circular: {
                        borderColor: "black",
                        width: 10,
                        borderWidth: 3,
                        color: "#1E98E4",
                        backgroundColor: "white"
                    }
                },
                text: {
                    enabled: true,
                    template: '<span style="font-size:27px;color:black;">{0:n0} sec</span> '
                },
                reversed: true
            }).swidget();

            // restart the update timer
            clearInterval(update_timer);
            update_timer = setInterval(update_progressbars, 300);
        }

        function update_progressbars() {
            var total_remaining_seconds = Math.floor((release_unixtime_ms - (new Date()).getTime()) / 1000),
                remaining_days = Math.floor(total_remaining_seconds / (24 * 60 * 60));

            total_remaining_seconds = total_remaining_seconds % (24 * 60 * 60);
            var remaining_hours = Math.floor(total_remaining_seconds / (60 * 60));

            total_remaining_seconds = total_remaining_seconds % (60 * 60);
            var remaining_mins = Math.floor(total_remaining_seconds / 60);
            var remaining_secs = total_remaining_seconds % 60;

            // update the progressbars if new values are different
            if (remaining_days != progress_days.value()) {
                progress_days.value(remaining_days);
            }
            if (remaining_hours != progress_hours.value()) {
                progress_hours.value(remaining_hours);
            }
            if (remaining_mins != progress_mins.value()) {
                progress_mins.value(remaining_mins);
            }
            if (remaining_secs != progress_secs.value()) {
                progress_secs.value(remaining_secs);
            }
        }

        // call this function whenever the window size changes
        $(window).on("resize", init_progressbars);

        // init the progressbars now
        init_progressbars();
    });
</script>
