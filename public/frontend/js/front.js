$(function () {

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




// ================================Calculators Functions Starts=============================


// ================================EMI Calculator - For All Page ===========================
function calc() {
    var P = document.formval.pr_amt.value;
    var rate = document.formval.int_rate.value;
    var n = document.formval.period.value;
    var r = rate / (12 * 100);
    var prate = (P * r * Math.pow((1 + r), n * 12)) / (Math.pow((1 + r), n * 12) - 1);

    var emi = (Math.ceil(prate * 100) / 100).toFixed(0);
    var outflow = (n * 12) * (emi);
    var int_comp = outflow - P;

    document.getElementById('repayment').innerText = isNaN(emi) ? '0.00' : emi;
    document.getElementById('int_comp').innerText = isNaN(int_comp) ? '0.00' : int_comp.toFixed(0);
    document.getElementById('outflow').innerText = isNaN(outflow) ? '0.00' : outflow.toFixed(0);
};
// ================================EMI Calculator - For All Page ============================

// ------------------------------------------------------------------------------------------

// ================================Personal Loan Eligible Calculator ========================
function eligibleCalc() {
    var salary = parseInt(document.querySelector('#salary').value);
    var obligate = parseInt(document.querySelector('#obligate').value);
    var card_outstanding = parseInt(document.querySelector('#card_outstanding').value);

    var Total_obligate = (0.05 * card_outstanding) + obligate;

    var value = (salary <= 5e4) ? ((salary * 0.5) - Total_obligate) : ((salary * 0.7) - Total_obligate);

    var result = parseInt((value / 2175) * 1e5);

    console.log(result);

    if (isNaN(result)) {
        document.getElementById('result').innerText = "₹ 0.00";
    } else if (0 >= result) {
        document.getElementById('result').innerText = "You are not Eligible";
    } else {
        document.getElementById('result').innerText = result.toFixed(0);
    }
};
// ================================Personal Loan Eligible Calculator ========================

// ------------------------------------------------------------------------------------------

// ================================Homeloan Eligibility Calculator===========================
function h_loan() {
    let salary = parseInt(document.querySelector('#salary').value) * 0.7;
    let other_emi = parseInt(document.querySelector('#other_emi').value);
    let tenure = parseInt(document.querySelector("#tenure").value);
    let propVal = parseInt(document.querySelector("#propVal").value);

    let income, property;
    // Income Eligibility
    switch (true) {
        case (tenure == 5):
            income = ((salary - other_emi) / 1989) * 1e5;
            break;
        case (tenure == 10):
            income = ((salary - other_emi) / 1161) * 1e5;
            break;
        case (tenure == 15):
            income = ((salary - other_emi) / 898) * 1e5;
            break;
        case (tenure == 20):
            income = ((salary - other_emi) / 775) * 1e5;
            break;
        case (tenure == 25):
            income = ((salary - other_emi) / 707) * 1e5;
            break;
        case (tenure == 30):
            income = ((salary - other_emi) / 665) * 1e5;
            break;
        default:
            alert("Fields Are Incorrect");
    }

    if (propVal >= 9e6) {
        property = propVal * 0.75;

    } else if (propVal <= 9e6) {
        property = propVal * 0.8;
    }

    document.getElementById('income').innerText = (income <= 0) ? '0.00' : income.toFixed(0);
    document.getElementById('property').innerText = (property <= 0) ? '0.00' : property.toFixed(0);

};
// ================================Homeloan Eligibility Calculator===========================


var validNumber = new RegExp(/^\d*\.?\d*$/);

function validateNumber(elem) {
    if (validNumber.test(elem.value)) {
        lastValid = elem.value;
    } else {
        elem.value = '';
    }
}

// ------------------------------------------------------------------------------------------