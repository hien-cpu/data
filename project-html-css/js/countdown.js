function dec_hr() {
    hr = parseInt($('.hr').html());
    if (hr !==0) {
        $('.hr').html(hr - 1);
        $('.min').html(59);
        $('.sec').html(59);
    }
    else {
        PaymentResponse;
    }
}

function dec_min() {
    min = parseInt($('.min').html());
    if (min !==0) {
        $('.min').html(min - 1);
        $('.sec').html(59);
    }
    else {
        dec_hr();
    }
}

$(document).ready(function() {
    var Update = function() {
        $('.sec').each(function() {
            var count = parseInt($(this).html());
            if(count !==0) {
                $(this).html(count-1);
            }
            else {
                dec_min();
            }
        });
    }
    setInterval(Update,1000);
});