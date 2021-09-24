$(function () {

    // ------------------------------------------------------- //
    // Testimonials Slider
    // ------------------------------------------------------ //
    // $('.testimonials-slider').owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     dots: false,
    //     nav: true,
    //     smartSpeed: 700,
    //     navText: [
    //         "<i class='fa fa-angle-left'></i>",
    //         "<i class='fa fa-angle-right'></i>"
    //     ],
    //     responsiveClass: true,
    //     responsive: {
    //         0: {
    //             items: 1,
    //             nav: false,
    //             dots: true
    //         },
    //         600: {
    //             items: 1,
    //             nav: true
    //         },
    //         1000: {
    //             items: 2,
    //             nav: true,
    //             loop: false
    //         }
    //     }
    // });


    // ------------------------------------------------------- //
    // Scroll Top Button
    // ------------------------------------------------------- //
    $('#scrollTop').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });

    var c, currentScrollTop = 0,
        navbar = $('.navbar');
    $(window).on('scroll', function () {

        // Navbar functionality
        var a = $(window).scrollTop(),
            b = navbar.height();

        currentScrollTop = a;
        if (c < currentScrollTop && a > b + b) {
            navbar.addClass("scrollUp");
        } else if (c > currentScrollTop && !(a <= b)) {
            navbar.removeClass("scrollUp");
        }
        c = currentScrollTop;


        if ($(window).scrollTop() >= 2000) {
            $('#scrollTop').addClass('active');
        } else {
            $('#scrollTop').removeClass('active');
        }
    });


    // ---------------------------------------------------------- //
    // Preventing URL update on navigation link click
    // ---------------------------------------------------------- //
    $('.link-scroll').on('click', function (e) {
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top
        }, 1000);
        e.preventDefault();
    });


    // ---------------------------------------------------------- //
    // Scroll Spy
    // ---------------------------------------------------------- //
    // $('body').scrollspy({
    //     target: '#navbarSupportedContent',
    //     offset: 80
    // });

    // ------------------------------------------------------- //
    // Navbar Toggler Button
    // ------------------------------------------------------- //
    $('.navbar .navbar-toggler').on('click', function () {
        $(this).toggleClass('active');
    });

    // ------------------------------------------------------ //
    // For demo purposes, can be deleted
    // ------------------------------------------------------ //

    var stylesheet = $('link#theme-stylesheet');
    $("<link id='new-stylesheet' rel='stylesheet'>").insertAfter(stylesheet);
    var alternateColour = $('link#new-stylesheet');

    // if ($.cookie("theme_csspath")) {
    //     alternateColour.attr("href", $.cookie("theme_csspath"));
    // }

    $("#colour").change(function () {

        if ($(this).val() !== '') {

            var theme_csspath = 'css/style.' + $(this).val() + '.css';

            alternateColour.attr("href", theme_csspath);

            $.cookie("theme_csspath", theme_csspath, {
                expires: 365,
                path: document.URL.substr(0, document.URL.lastIndexOf('/'))
            });

        }

        return false;
    });

});

// ================================================================================================================================================
// ================================================================================================================================================
// ========================================================OTHER FUNCTIONS=========================================================================
// ================================================================================================================================================
// ================================================================================================================================================

// Scroll Animations ========================================================
var WINDOW_WIDTH = window.innerWidth || document.documentElement.clientWidth;
var WINDOW_HEIGHT = window.innerHeight || document.documentElement.clientHeight;

var ScrollMonitor = function (options) {
    this.items = [];
    this.options = {};

    for (var key in options) {
        this.options[key] = options[key];
    }
};

ScrollMonitor.prototype.add = function (node, options) {
    var gap = options.gap || 0;
    this.items.push({
        node: node,
        gap: +gap === gap ? [gap, gap, gap, gap] : gap,
        callbacks: {
            step: options.step || function (node, distance) {},
            enter: options.enter || function (node, distance) {},
            leave: options.leave || function (node, distance) {}
        }
    });

    this.resize();
};

ScrollMonitor.prototype.resize = function () {
    WINDOW_WIDTH = window.innerWidth || document.documentElement.clientWidth;
    WINDOW_HEIGHT = window.innerHeight || document.documentElement.clientHeight;

    for (var i = 0; i < this.items.length; i++) {
        var node = this.items[i].node;
        this.items[i].rect = {
            top: node.offsetTop,
            left: node.offsetLeft,
            width: node.clientWidth,
            height: node.clientHeight
        };
    }
};

ScrollMonitor.prototype.scroll = function (scrollX, scrollY) {

    for (var i = 0; i < this.items.length; i++) {
        var item = this.items[i];
        var rect = item.rect;
        var gap = item.gap;

        var distance = {
            top: (rect.top + rect.height) - scrollY,
            left: (rect.left + rect.width) - scrollX,
            right: rect.left - (WINDOW_WIDTH + scrollX),
            bottom: rect.top - (WINDOW_HEIGHT + scrollY),
        };

        var inView = (distance.right < -gap[1] && distance.left > gap[3] && distance.bottom < -gap[2] && distance.top > gap[0]);

        if (inView && !item.callbacks.once) {
            item.callbacks.once = true;
            item.callbacks.enter.call(this, item.node, distance);
        }

        if (!inView && item.callbacks.once) {
            item.callbacks.once = false;
            item.callbacks.leave.call(this, item.node, distance);
        }

        item.callbacks.step.call(this, item.node, distance);
    }
};

var monitor = new ScrollMonitor();
var nodeList = document.querySelectorAll('.item');

for (var i = 0; i < nodeList.length; i++) {
    monitor.add(nodeList[i], {
        gap: 0,
        enter: function (node, distance) {
            node.classList.add('in-view');
        },
        leave: function (node, distance) {
            node.classList.remove('in-view');
        }
    });
}

window.onscroll = function () {
    monitor.scroll(window.pageXOffset, window.pageYOffset);
};
window.onresize = function () {
    monitor.resize();
    window.onscroll();
};

window.onresize();

function calculator() {
    const loanstruct = {
        loanAmount: document.getElementById("amount").value,
        annualInterestrate: document.getElementById("apr").value,
        loanDuration: document.getElementById("tenure").value
    };
    // Passing the object as the arguement. The function also returns an object that includes both EMI & Total
    console.log(loanstruct)

    function EMIVal2(loan) {
        interest = loan.annualInterestrate / 1200;
        let term = loan.loanDuration * 12;
        let top = Math.pow((1 + interest), term);
        let bottom = top - 1;
        let ratio = top / bottom;
        EMI = loan.loanAmount * interest * ratio;
        Total = EMI * term;
        const EMIObj = {
            EMI: EMI.toFixed(0),
            Total: Total.toFixed(0)
        };
        return EMIObj
    }
    console.log(EMIVal2(loanstruct));

    // document.getElementById("EMICapt").innerHTML = '<P><b>EMI: Rs. </b>' + EMIVal2(loanstruct).EMI + '<br>' + '<b> Total: Rs. </b>' + EMIVal2(loanstruct).Total + '</P>';
    document.getElementById("emi").innerText = EMIVal2(loanstruct).EMI;
    document.getElementById("total").innerText = EMIVal2(loanstruct).Total;
    return false
}
// Scroll Animations========================================================

// Personal Loan Eligble Calculator=========================================
$('.p_loan').click(function () {
    var salary = parseInt($('#salary').val());
    var obligate = parseInt($('#obligate').val());
    var card_outstanding = parseInt($('#card_outstanding').val());

    var Total_obligate = (0.05 * card_outstanding) + obligate;

    var value = (salary <= 5e4) ? ((salary * 0.5) - Total_obligate) : ((salary * 0.7) - Total_obligate);

    var result = parseInt((value / 2175) * 1e5);

    $('#result').text(result <= 0 ? 'You are not Eligible' : '₹ ' + result.toFixed(0));
    // $('#result').text((salary <= 5e4) ? true : false);

});
