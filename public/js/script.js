$(function(){

	$("#username-field").focus(); //Focus the username field in the index page && sign-in page

	$(".panel-profile-info").click(function () {
		if ( $(this).children(".panel-profile-info-body").is( ":hidden" ) ) {
			$(this).children(".panel-profile-info-body").slideDown( "slow" );
			$(this).children(0).children(0).children("span").first().removeClass();
			$(this).children(0).children(0).children("span").first().addClass('pull-right glyphicon glyphicon-chevron-up');
		} else {
			$(this).children(".panel-profile-info-body").hide();
			$(this).children(0).children(0).children("span").first().removeClass();
			$(this).children(0).children(0).children("span").first().addClass('pull-right glyphicon glyphicon-chevron-down');
		}
		console.log($(this));
	});

	$('.close').bind('click', function(){
		$('#video1').get(0).pause();
		$('#video2').get(0).pause();
		$('#video1').get(0).src = "/video/video1.mp4";//reset video
		$('#video2').get(0).src = "/video/video2.mp4";//reset video
	});

	$('#video1thumb').bind('click', function(){
		$('#video1').get(0).play();
	});
	$('#video2thumb').bind('click', function(){
		$('#video2').get(0).play();
	});

/* ************************* */
	$(".nav-pills-updates").bind('click', function(event){
		event.preventDefault();
				console.log($(this).children(0));
			if ( $(this).siblings().is( ":hidden" ) ) {
				$(this).siblings().slideDown( "slow" );
				$('.panel-profile-info').children(".panel-profile-info-body").hide();

				$('.panel-profile-info').children(0).children(0).children("span").first().removeClass();
				$('.panel-profile-info').children(0).children(0).children("span").first().addClass('pull-right glyphicon glyphicon-chevron-up');
				} else {
				$(this).siblings().hide();
				}
	});
	$(".nav-pills-updates").siblings().hide();	
	$('.panel-activities').hide();
	$('.panel-messages').hide();
	$('.panel-answers').hide();
	$('.panel-questions').hide();

	$('#button-activities').bind('click', function(event){
		event.preventDefault();
		$('.panel-activities').show();
		$('.panel-messages').hide();
		$('.panel-answers').hide();
		$('.panel-questions').hide();
	});	

	$('#nav-pills-button-messages').bind('click', function(event){
		event.preventDefault();
		$('.panel-activities').hide();
		$('.panel-messages').show();
		$('.panel-answers').hide();
		$('.panel-questions').hide();
	});	
	$('#nav-pills-button-answers').bind('click', function(event){
		event.preventDefault();
		$('.panel-activities').hide();
		$('.panel-messages').hide();
		$('.panel-answers').show();
		$('.panel-questions').hide();
	});	
	$('#nav-pills-button-questions').bind('click', function(event){
		event.preventDefault();
		$('.panel-activities').hide();
		$('.panel-messages').hide();
		$('.panel-answers').hide();
		$('.panel-questions').show();
	});	

$( "#uploadImage" ).change(function(e){
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
		
	});


	/* *********************** UPDATE-PROFILE PAGE *********************** */
	$( "#select_carrera" ).change(function(e) {
	  	var root_url = "<?php echo Request::root(); ?>/"; // put this in php file
	  	var BASE = "<?php echo URL::base(); ?>";
	  	var BASE = root_url + 'data';
	  	var select = document.getElementById('select_carrera');
	  	var idx = select.selectedIndex;
	  	var which = select.options[idx].value;
	  	console.log(idx);
	  	idx++;
/*
	  	e.preventDefault();
	    $.post(" {{ URL::to('/especialidad/nueva') }} ", {
	        'message' : idx
	        }, function(data) {
			console.log(msg);
	    });
*/
		$.ajax({
		    type: "POST",
		    url: '/updateprofile-carrera-select-ajax',
		    data: { id: idx }
		}).done(function( msg ) {
			$("#especialidades-col-1").html("");
			$("#especialidades-col-2").html("");
			for (var key in msg) {
			  if (msg.hasOwnProperty(key)) {
			    var val = msg[key];
			    console.log(val.id);

			    if(val.id % 2){

			    console.log(val.nombre);
			    $("#especialidades-col-1").append('<label class="checkbox-inline" style="margin-left:10px;"><input type="checkbox" name="especialidad[]" value="'+ val.nombre +'">'+ val.nombre +'</label><br>');
			    }
			    else{
			    $("#especialidades-col-2").append('<label class="checkbox-inline" style="margin-left:10px;"><input type="checkbox" name="especialidad[]" value="'+ val.nombre +'">'+ val.nombre +'</label><br>');

			    }


			  }
			}
		    //console.log( msg );
		});

	});

});