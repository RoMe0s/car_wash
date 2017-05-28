var map,
    init = function () {

        var $map = $("#map"),
            target = $("#map").attr('data-target'),
            $input = $(target),
            value = $input.val(),
            point = [55.76, 37.64],
            pointer = null;

        if(value.length) {

            point = JSON.parse(value);

            pointer = new ymaps.Placemark(point, {}, {draggable: true});

        }

        map = new ymaps.Map("map", {
            center: point,
            zoom: 7,
            controls: []
        });

        var searchControl = new ymaps.control.SearchControl({
            provider: 'yandex#publicMap',
            options: {
                noPlacemark: true
            }
        });

        if(pointer) {

            pointer.events.add('dragend', function (e) {

                setValue(pointer.geometry.getCoordinates(), $input);

            });

            map.geoObjects.add(pointer);

        }

        searchControl.events.add('resultselect', function (e) {

            var results = searchControl.getResultsArray(),
                selected = e.get('index'),
                point = results[selected].geometry.getCoordinates();

            map.geoObjects.removeAll();

            setValue(results[selected].geometry.getCoordinates(), $input);

            var mark = new ymaps.Placemark(point, {}, {draggable: true});

            mark.events.add('dragend', function (e) {

                setValue(mark.geometry.getCoordinates(), $input);

            });

            map.geoObjects.add(mark);

        });

        map.controls.add(searchControl);

    };

ymaps.ready(init);

function setValue(arr, $target) {

    var value = JSON.stringify(arr);

    $target.val(value);

    $target.change();

}
