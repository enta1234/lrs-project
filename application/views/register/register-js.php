<script>
    // auto show modal
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    //slideToggle 
    (function ($) {
        'use strict';
        $('.flip').on("click", function () {
            $(this).next().slideToggle('slow');
            $(this).find('i').toggle();
            $('.panel').not($(this).next()).slideUp('slow');
        });
    }(jQuery));

    // ------------------------------------------------- low work --------------------------------------------------
    // ------------------------------------------------- low work --------------------------------------------------
    // add work
    var i = 0;
    $('.add-work-btn').click(function () {
        var gb = ["work_year[0]","work_year[1]","work_year[2]","work_year[3]","work_year[4]"];
        var $clone = $('.div-selected-work').find('div.clond-low-work.gb-3').clone(true).removeClass('clond-low-work');
        $('.div-selected-work').append($clone);
        var name = document.getElementById(gb[i]);
        console.log(i);
        i++;
    });
    // delete work
    $('.icon-delete').click(function () {
        $(this).parents('.gb-3').detach();
    });

    // ------------------------------------------------- language --------------------------------------------------
    // ------------------------------------------------- language --------------------------------------------------
    // add language
    $('.add-language-btn').click(function () {
        var $clone = $('.div-selected-language').find('div.clond-language').clone(true).removeClass('clond-language');
        $('.div-selected-language').append($clone);
    });
    // delete language
    $('.icon-delete').click(function () {
        $(this).parents('.gb-2').detach();
    });
    // ------------------------------------------------- Skill --------------------------------------------------
    // ------------------------------------------------- Skill --------------------------------------------------
    // add skill
    $('.add-skill-btn').click(function () {
        var $clone = $('.div-selected-skill').find('div.clond-skill').clone(true).removeClass('clond-skill');
        $('.div-selected-skill').append($clone);
    });
    // delete skill
    $('.icon-delete').click(function () {
        $(this).parents('.gb-1').detach();
    });

// Page Scroll
jQuery(document).ready(function ($) {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			|| location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top - 32
				}, 1000);
				return false;
			}
		}
	});
});
    // Fixed Nav
    jQuery(document).ready(function ($) {
        $(window).scroll(function(){
            var scrollTop = 142;
            if($(window).scrollTop() >= scrollTop){
                $('nav').css({
                    position : 'fixed',
                    top : '0'
                });
            }
            if($(window).scrollTop() < scrollTop){
                $('nav').removeAttr('style');	
            }
        })
    
    // Active Nav Link
    $('nav ul li a').click(function(){
            $('nav ul li a').removeClass('active');
            $(this).addClass('active');
        });
    })
    // cal age
    function submitBday() {
    var Bdate = document.getElementById('birthday').value;
    var Bday = +new Date(Bdate);
    var Q4A = ~~((Date.now() - Bday) / (31557600000));
    var theBday = document.getElementById('resultBday');
    theBday.setAttribute("value", Q4A);
    }

    // onChange of radio
    $(document).ready(function(){
        $("input[name='ever_work']").change(function() {
            var ever_work = $('input:radio[name="ever_work"]:checked').val();
            if(ever_work=="ไม่เคย"){
                document.getElementById("selectClinic").setAttribute("disabled","");
            }else{
                document.getElementById("selectClinic").removeAttribute("disabled");
            }
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

</script>
</body>
</html>