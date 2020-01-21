/*jslint browser: true*/
/*global $, jQuery*/

$(document).ready(function ($) {
    
    // Close Alert
    $('#divPopupAlert, #flashMessage').on('click', function() {
        $(this).fadeToggle();
    });
    
    //Navigation
    $('#menu p a').hover(function() {
          $(this).append('<i class="fa fa-caret-right" aria-hidden="true"></i>').fadeIn('slow');
    }, function() {
          $(this).children('.fa').remove();
    });
    
    //Services Height
    var maxHeight = 0;
    $('.svc_mn').each(function(){
       maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
    });
    $('.svc_mn').each(function() {
      $('.svc_mn').height(maxHeight);
    });
    
    // Calc Functions
    $('#calcA').on('click', function() {
        $('#includedContent iframe').css({'display':'block'});
        $('#includedContent iframe').attr("src", "http://dev.eviction247.com/index.php/pages/calc1");
        $('#includedContent').slideDown('slow');
    });
    $('#calcB').on('click', function() {
        $('#includedContent iframe').css({'display':'block'});
        $('#includedContent iframe').attr("src", "http://dev.eviction247.com/index.php/pages/calc2");
        $('#includedContent').slideDown('slow');
    });
    
    // Tab Notice
    $('.hilite').on('click', function hiliteStop(){
        $(this).hide();
        localStorage.setItem('display', $(hilite).is(':visible'));
    });
    
    // Navigation Menu's
    $('#adminBarTrigger').on('click', function() {
        $('#adminBar').slideToggle(500,"linear");
    });
    $('#tabMob').on('click', function() {
        $('.tab_acc').slideToggle(500,"linear");
    });
    $('#statusTrig').on('click', function() {
        $('.act_list').slideToggle(500,"linear");
    });
    $('#formOptionsTrig').on('click', function() {
        $('.form_options').this().slideToggle(500,"linear");
    });
    
    // Progress Bar
    var progIndex = $('.progress_alt').index($('span'));    
    $('span.pg_text').on('click', function() {
        $('.info').children('div.tab').html('#fm' + progIndex).show();                        
    });
    
    // Cycle Buttons
    if ($('#fm1').is(":visible")) {
        $('#fmActions, #submitBtn').hide();
        $('#backBtn').show();
    }
    $('#nextBtn, #prevBtn').on('click', function() {
        if ($('#fm1').is(":visible")) {
            $('#backBtn').show();
            $('#fmActions').hide();
        }
        if ($('#fm1').is(':hidden')) {
            $('#backBtn').hide();
            $('#fmActions').show();
        }
        if ($('#fmf').is(':visible')) {
            $('#saveBtn').removeClass('left');
            $('#submitWrap, #nextBtn').hide();
            $('#submitBtn').show();
        }
        if ($('#fmf').is(':hidden')) {
            $('#saveBtn').addClass('left');
            $('#submitWrap, #nextBtn').show();
            $('#submitBtn').hide();
        }
    });
    
    // Random Hero BG
    function getRandomImage() {
        var images = [
            '/img/dev/1.jpg',
            '/img/dev/2.jpeg',
            '/img/dev/3.jpg',
            '/img/dev/4.jpg',
        ];
        return images[Math.floor(Math.random() * 4)];
    }
    $(function changeBg(){
        //$(".parallax-window").attr('data-image-src', getRandomImage());
    });
    
    // Popup Dimensions
    var thisPopup = $('.popups'),
        childWidth= $(thisPopup).children('div:visible').width(),
        childHeight = $(thisPopup).children('div:visible').height();
    $(thisPopup).css({'height': childHeight, 'width': childWidth});
    
    // Bottom List Border
    // $('.eviction-wrapper').last().css({'border-bottom':'2px solid #3665AF', 'margin-bottom':'50px'})
    
    // Add Flexbox
    var input = $('.fm_input'),
        inputTarget = $('.fm_input').parent();
    $(input).parent().addClass('flex');
    $('input[type="image"], input[type="checkbox"]').parents(inputTarget).removeClass('flex');
    
    // Append Class
    if ($('a:contains("Export")').addClass('exportClass btn-blue'));
    
    // Checkbox fix
    if ($('input[type="checkbox"]').parent('div').addClass('checkbox'));
    if ($('label:contains("Remember")').parent('div').removeClass('checkbox'));
    if ($('label:not(:contains("Remember"))').parent('div').removeClass('fm_mem'));
    $('.actions p').addClass('input');
    
});

$(document).scroll(function() {
    /*
    if($(window).scrollTop() > 0) {
        $(".hr_bot").css({'border-bottom': '4vw solid white'});
    }
    if($(window).scrollTop() > 50) {
        $(".hr_bot").css({'border-bottom': '3vw solid white'});
    } else if($(window).scrollTop() < 50) {
        $(".hr_bot").css({'border-bottom': '4vw solid white'});
    }
    if($(window).scrollTop() > 100) {
        $(".hr_bot").css({'border-bottom': '2vw solid white'});
    } else if($(window).scrollTop() < 100) {
        $(".hr_bot").css({'border-bottom': '3vw solid white'});
    }
    if($(window).scrollTop() > 150) {
        $(".hr_bot").css({'border-bottom': '1vw solid white'});
    } else if($(window).scrollTop() < 150) {
        $(".hr_bot").css({'border-bottom': '2vw solid white'});
    }
    */
});