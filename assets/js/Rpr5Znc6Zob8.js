$(document).ready(function () {

    $(window).load(function () {
        $("div.lds-dual-ring").hide();
    });
    

    tippy('#Qr6Zbo0avig', {
        content: '<strong>Welcome</strong>',
        allowHTML: true,
        animation: 'scale',
        placement: 'right-end',
        role: 'tooltip',
        zIndex: 9999,
      });

    $(window).bind('resize', function () {
        var width = $(window).width();
        var height = $(window).height();
        if (width <= 1279) {
            $('.ihelpdesk-girl-icon').hide();
        }
        if (width >= 1280) {
            $('.ihelpdesk-girl-icon').show();
        }
    });
    
});


