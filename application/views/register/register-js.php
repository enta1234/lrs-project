<script>
    // var base_url = window.location.origin+'/lrs-project/assets/'; // for loc
    var base_url = window.location.origin+'/assets/'; // for deploy
    $.Thailand({
        database: base_url+'jquery.Thailand.js/database/db.json', 

        $district: $('[name="district"]'),
        $amphoe: $('[name="amphoe"]'),
        $province: $('[name="province"]'),
        $zipcode: $('[name="zipcode"]'),

        onDataFill: function(data){
        },

        onLoad: function(){
            $('#loader, .demo').toggle();
        }
    });

    // watch on change

    $('[name="district"]').change(function(){
    });
    $('[name="amphoe"]').change(function(){
    });
    $('[name="province"]').change(function(){
    });
    $('[name="zipcode"]').change(function(){
    });

    $('#formregiter').validator()
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
        $('.flip-1').on("click", function () {
            // 1
            document.getElementById('lawyer_career').removeAttribute("disabled");
            document.getElementById('company').removeAttribute('disabled');
            document.getElementById('company_address').removeAttribute("disabled");
            document.getElementById('experiencd').removeAttribute("disabled");
            document.getElementById('past_cases').removeAttribute("disabled");
            document.getElementById('expert_cases').removeAttribute("disabled");
            // 2
            document.getElementById('retire_date').setAttribute("disabled","");
            document.getElementById('governmental_age').setAttribute("disabled","");
            document.getElementById('government_position').setAttribute("disabled","");
            document.getElementById('lavel').setAttribute("disabled","");
            document.getElementById('departments').setAttribute("disabled","");
            document.getElementById('ministry').setAttribute("disabled","");
            // 3
            document.getElementById('work_year[0]').setAttribute("disabled","");
            document.getElementById('work_position[0]').setAttribute("disabled","");
            document.getElementById('work_department[0]').setAttribute("disabled","");
            document.getElementById('work_job[0]').setAttribute("disabled","");
            document.getElementById('work_year[1]').setAttribute("disabled","");
            document.getElementById('work_position[1]').setAttribute("disabled","");
            document.getElementById('work_department[1]').setAttribute("disabled","");
            document.getElementById('work_job[1]').setAttribute("disabled","");
            document.getElementById('work_year[2]').setAttribute("disabled","");
            document.getElementById('work_position[2]').setAttribute("disabled","");
            document.getElementById('work_department[2]').setAttribute("disabled","");
            document.getElementById('work_job[2]').setAttribute("disabled","");
            document.getElementById('work_year[3]').setAttribute("disabled","");
            document.getElementById('work_position[3]').setAttribute("disabled","");
            document.getElementById('work_department[3]').setAttribute("disabled","");
            document.getElementById('work_job[3]').setAttribute("disabled","");
            document.getElementById('work_year[4]').setAttribute("disabled","");
            document.getElementById('work_position[4]').setAttribute("disabled","");
            document.getElementById('work_department[4]').setAttribute("disabled","");
            document.getElementById('work_job[4]').setAttribute("disabled","");
        });
        $('.flip-2').on("click", function () {
            // disable 1, 3
            // 1
            document.getElementById('lawyer_career').setAttribute("disabled","");
            document.getElementById('company').setAttribute("disabled","");
            document.getElementById('company_address').setAttribute("disabled","");
            document.getElementById('experiencd').setAttribute("disabled","");
            document.getElementById('past_cases').setAttribute("disabled","");
            document.getElementById('expert_cases').setAttribute("disabled","");
            // 2
            document.getElementById('retire_date').removeAttribute("disabled",'');
            document.getElementById('governmental_age').removeAttribute("disabled");
            document.getElementById('government_position').removeAttribute("disabled");
            document.getElementById('lavel').removeAttribute("disabled");
            document.getElementById('departments').removeAttribute("disabled");
            document.getElementById('ministry').removeAttribute("disabled");
            // 3
            document.getElementById('work_year[0]').setAttribute("disabled","");
            document.getElementById('work_position[0]').setAttribute("disabled","");
            document.getElementById('work_department[0]').setAttribute("disabled","");
            document.getElementById('work_job[0]').setAttribute("disabled","");
            document.getElementById('work_year[1]').setAttribute("disabled","");
            document.getElementById('work_position[1]').setAttribute("disabled","");
            document.getElementById('work_department[1]').setAttribute("disabled","");
            document.getElementById('work_job[1]').setAttribute("disabled","");
            document.getElementById('work_year[2]').setAttribute("disabled","");
            document.getElementById('work_position[2]').setAttribute("disabled","");
            document.getElementById('work_department[2]').setAttribute("disabled","");
            document.getElementById('work_job[2]').setAttribute("disabled","");
            document.getElementById('work_year[3]').setAttribute("disabled","");
            document.getElementById('work_position[3]').setAttribute("disabled","");
            document.getElementById('work_department[3]').setAttribute("disabled","");
            document.getElementById('work_job[3]').setAttribute("disabled","");
            document.getElementById('work_year[4]').setAttribute("disabled","");
            document.getElementById('work_position[4]').setAttribute("disabled","");
            document.getElementById('work_department[4]').setAttribute("disabled","");
            document.getElementById('work_job[4]').setAttribute("disabled","");
        });
        $('.flip-3').on("click", function () {
            // disable 1, 2
            // 1
            document.getElementById('lawyer_career').setAttribute("disabled","");
            document.getElementById('company').setAttribute("disabled","");
            document.getElementById('company_address').setAttribute("disabled","");
            document.getElementById('experiencd').setAttribute("disabled","");
            document.getElementById('past_cases').setAttribute("disabled","");
            document.getElementById('expert_cases').setAttribute("disabled","");
            // 2
            document.getElementById('retire_date').setAttribute("disabled","");
            document.getElementById('governmental_age').setAttribute("disabled","");
            document.getElementById('government_position').setAttribute("disabled","");
            document.getElementById('lavel').setAttribute("disabled","");
            document.getElementById('departments').setAttribute("disabled","");
            document.getElementById('ministry').setAttribute("disabled","");
            // 3
            document.getElementById('work_year[0]').removeAttribute("disabled");
            document.getElementById('work_position[0]').removeAttribute("disabled");
            document.getElementById('work_department[0]').removeAttribute("disabled");
            document.getElementById('work_job[0]').removeAttribute("disabled");
            document.getElementById('work_year[1]').removeAttribute("disabled");
            document.getElementById('work_position[1]').removeAttribute("disabled");
            document.getElementById('work_department[1]').removeAttribute("disabled");
            document.getElementById('work_job[1]').removeAttribute("disabled");
            document.getElementById('work_year[2]').removeAttribute("disabled");
            document.getElementById('work_position[2]').removeAttribute("disabled");
            document.getElementById('work_department[2]').removeAttribute("disabled");
            document.getElementById('work_job[2]').removeAttribute("disabled");
            document.getElementById('work_year[3]').removeAttribute("disabled");
            document.getElementById('work_position[3]').removeAttribute("disabled");
            document.getElementById('work_department[3]').removeAttribute("disabled");
            document.getElementById('work_job[3]').removeAttribute("disabled");
            document.getElementById('work_year[4]').removeAttribute("disabled");
            document.getElementById('work_position[4]').removeAttribute("disabled");
            document.getElementById('work_department[4]').removeAttribute("disabled");
            document.getElementById('work_job[4]').removeAttribute("disabled");
        });
    }(jQuery));

    // ------------------------------------------------- low work --------------------------------------------------
    // ------------------------------------------------- low work --------------------------------------------------
    // add work
    var i = 0;
    $('.add-work-btn').click(function () {
        // var gb = ["work_year[0]","work_year[1]","work_year[2]","work_year[3]","work_year[4]"];
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
        var year = document.getElementById('year').value-543;
        var month = document.getElementById('month').value;
        var day = document.getElementById('day').value;

        var currentTime = new Date();
        var getyear = currentTime.getFullYear();

        var age = getyear-year;
        if (currentTime.getMonth() < month || (currentTime.getMonth() == month && currentTime.getDate() > day)) {
            age--;
        }
        var theBdayDis = document.getElementById('resultBdayDis');
        if(year>100){
            theBdayDis.setAttribute("value", age);
            console.log(theBdayDis.name+ " : " + age + "month" + month + "day" + day);
        }else{
            theBdayDis.setAttribute("value", '0');
        }
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
        $(".selcet-2").select2({
            theme: "bootstrap"
        });
    });

</script>
</body>
</html>