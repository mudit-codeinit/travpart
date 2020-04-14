$(function () {

    var choosed_city = '';
    var lat = '';
    var lon = '';
    var choosed_hotel = '';
    var regionid = '';

    $('.hotel-section input[name="search"]').on('keyup', function (e) {
        var that = $(this);
        last = e.timeStamp;
        setTimeout(function () {
            var terms = that.val();
            if (last - e.timeStamp === 0) {
                $.getJSON('/hotel-and-flight-bookings/wp-content/themes/adivaha/api/custom-ajax.php', {
                    action: 'autoSuggetionLookup',
                    locale: 'en_US',
                    term: terms
                }, function (data) {
                    var total = 0;
                    $('.hotel-section ul>li').remove();
                    $.each(data.cities, function (i, v) {
                        if (total == 7) {
                            return false;
                        }
                        total++;
                        $('.hotel-section ul').append('<li lat="' + v.lat + '" lon="' + v.lon + '">' + v.latinFullName + '</li>');

                    });
                    $.each(data.hotels, function (i, v) {
                        if (total == 7) {
                            return false;
                        }
                        total++;
                        $('.hotel-section ul').append('<li regionid="' + v.regionid + '">' + v.latinFullName + '</li>');
                    });
                    $('.hotel-section .autocompletion-list').show();
                });
            }
        }, 1000);
    });

    $('.hotel-section ul').on('click', 'li', function () {
        choosed_city = choosed_hotel = '';
        $('.hotel-section input[name="search"]').val($(this).text());
        if (!$(this).attr('regionid')) {
            choosed_city = $(this).text();
            lat = $(this).attr('lat');
            lon = $(this).attr('lon');
        }
        else {
            choosed_hotel = $(this).text();
            regionid = $(this).attr('regionid');
        }
        $('.hotel-section .autocompletion-list').hide();
    });

    $('.hotel-booking').click(function (e) {
        e.preventDefault();
        var daterange = $('.hotel-section input[name="daterange"]').val().split('-');
        var startdate = daterange[0].trim().replace(/\//g, '-');
        var enddate = daterange[1].trim().replace(/\//g, '-');

        if (choosed_city.length > 1) {
            document.location = 'https://www.travpart.com/hotel-and-flight-bookings/#/search/?fn=search&desti=' + choosed_city + '&lat=' + lat + '&lon=' + lon + '&checkIn=' + startdate + '&checkOut=' + enddate + '&language=en_US&currency=USD&hotelType=1&rooms=1&adults=1&childs=0';
        }
        else if (choosed_hotel.length > 1) {
            document.location = 'https://www.travpart.com/hotel-and-flight-bookings/#/hotel-information/' + regionid + '/?fn=hotelInfo&checkIn=' + startdate + '&checkOut=' + enddate + '&language=en_US&currency=USD&hotelType=1&rooms=1&adults=1&childs=0&is_custom=0';
        }
        else if ($('.hotel-section input[name="search"]').val().length > 1) {
            var terms_arr = $('.hotel-section input[name="search"]').val().split(',');
            var terms = terms_arr[0];

            $.getJSON('/hotel-and-flight-bookings/wp-content/themes/adivaha/api/custom-ajax.php', {
                action: 'autoSuggetionLookup',
                locale: 'en_US',
                term: terms
            }, function (data) {
                var desti = '';
                var desti_hotel_or_destination = '';
                var desti_regionid = '';
                if (data.cities && !!data.cities[0].lat && !!data.cities[0].lon)
                    desti = terms + '&lat=' + data.cities[0].lat + '&lon=' + data.cities[0].lon;
                else if (data.hotels != undefined && data.hotels[0].regionid) {
                    desti_hotel_or_destination = 'hotel';
                    desti_regionid = data.hotels[0].regionid;
                }
                else {
                    desti = "Bali,%20Indonesia&lat=-8.4095178&lon=115.18891600000006";
                }
                if (!desti_hotel_or_destination || desti_hotel_or_destination == 'location') {
                    document.location = 'https://www.travpart.com/hotel-and-flight-bookings/#/search/?fn=search&desti=' + desti + '&checkIn=' + startdate + '&checkOut=' + enddate + '&language=en_US&currency=USD&hotelType=1&rooms=1&adults=1&childs=0';
                }
                else {
                    document.location = 'https://www.travpart.com/hotel-and-flight-bookings/#/hotel-information/' + desti_regionid + '/?fn=hotelInfo&checkIn=' + startdate + '&checkOut=' + enddate + '&language=en_US&currency=USD&hotelType=1&rooms=1&adults=1&childs=0&is_custom=0';
                }
            });
        }
    });
});