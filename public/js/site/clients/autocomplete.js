$(document).ready(function($) {
    autocomplete = new google.maps.places.Autocomplete($("#address")[0], { types: ['address'], componentRestrictions: {country: "us"}});
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        for (var i = 0; i < place.address_components.length; i++) {
            for (var j = 0; j < place.address_components[i].types.length; j++) {
                if (place.address_components[i].types[j] == "postal_code") {
                    $("#zip").val(place.address_components[i].long_name);

                }
            }
        }
    });

});
