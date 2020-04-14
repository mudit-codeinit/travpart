$(function () {

    var pickupID = '';
    var pickupName = '';

    $('.vehicle-section input[name="search"]').on('keyup', function (e) {
        var that = $(this);
        last = e.timeStamp;
        setTimeout(function () {
            var terms = that.val();
            if (last - e.timeStamp === 0) {
                $.getJSON("https://travelbeesapi.com/webServices/cars/api.php", {
                    action: "getCarLocation",
                    term: that.val()
                }, function (result) {
                    if (!result.airports && !result.cities && $.isEmptyObject(result.airports) && $.isEmptyObject(result.cities))
                        return;
                    $('.vehicle-section ul>li').remove();
                    if (!!result.airports) {
                        $.each(result.airports, function (i, item) {
                            $('.vehicle-section ul').append('<li regionid="' + item.id + '">' + item.latinFullName + '</li>');
                        });
                    }
                    if (!!result.cities) {
                        $.each(result.cities, function (i, item) {
                            $('.vehicle-section ul').append('<li regionid="' + item.id + '">' + item.latinFullName + '</li>');
                        });
                    }
                    $('.vehicle-section .autocompletion-list').show();
                });
            }
        }, 1000);
    });

    $('.vehicle-section ul').on('click', 'li', function () {
        $('.vehicle-section input[name="search"]').val($(this).text());
        pickupName = $(this).text();
        pickupID = $(this).attr('regionid');
        $('.vehicle-section .autocompletion-list').hide();
    });

    $('.vehicle-booking').click(function (e) {
        e.preventDefault();
        var daterange = $('.vehicle-section input[name="date_range_vehicle"]').val() || $('.vehicle-section input[name="date_range_vehicle"]').attr('placeholder');
        daterange = daterange.split('-');
        var startdate = daterange[0].trim().split('/');
        var enddate = daterange[1].trim().split('/');

        startdate = startdate[2] + '-' + startdate[0] + '-' + startdate[1];
        enddate = enddate[2] + '-' + enddate[0] + '-' + enddate[1];

        if (!!pickupID && !!pickupName) {
            document.location = 'https://www.travpart.com/car/car-hire/?clientID=674902&pickupID=' + pickupID + '&pickupName=' + pickupName + '&returnID=' + pickupID + '&returnName=' + pickupName + '&pickupDateTime=' + startdate + 'T08:00&returnDateTime=' + enddate + 'T08:00#/vehicles';
        }

    });

});