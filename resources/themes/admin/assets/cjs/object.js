$(document).on("click", "[data-to-step]", function (e) {

    var $li = $(this).closest('li'),
        step = $(this).attr('data-to-step'),
        $target = $('li[data-step="' + step + '"]'),
        $target_content = $target.find('div.step-content');

    if ($li !== $target) {

        var $unused = $('li[data-step!="' + step + '"]');

        $unused.removeClass('active');

        $unused.find('div.step-content').fadeOut('slow');

        $target.addClass('active');

        $target_content.fadeIn('fast', function () {

            $('html, body').animate({scrollTop: $target.offset().top}, 600);

        });

    }

});
$(document).on("change", "#select-all-days", function (e) {

    var $table = $('table.schedule-table');

    if ($(this).prop("checked")) {

        $table.find('[type="checkbox"]').prop("checked", "checked");

    } else {

        $table.find('[type="checkbox"]').prop("checked", false);

    }

    $table.find('[name]').first().change();

});

$(document).find("table.schedule-table thead").on("click", "small", function (e) {

    var day = $(this).attr('data-day'),
        $column = $("table.schedule-table").find("td[data-day='" + day + "']"),
        $whole = $column.find('input[type="checkbox"]'),
        $whole_day_checked = $("#select-all-days"),
        $selected = $whole.filter(function () {

            return $(this).prop("checked");

        });

    if ($selected.length > ($whole.length - $selected.length)) {

        $whole.prop("checked", false);

        $whole_day_checked.prop("checked", false);

    } else {

        $whole.prop("checked", true);

    }

    $whole.change();

});

$(document).on("click", "#select-image", function (e) {

    var $target = $($(this).attr('data-target'));

    $target.click();

});

$(document).on("change", "input[type='file'][data-image-preview]", function (e) {

    var $target = $($(this).attr('data-target'));

    if (this.files[0] !== undefined && this.files[0] !== null) {

        var $preview = $('div.thumbnail'),
            reader = new FileReader();

        reader.onload = function (e) {
            var src;
            src = e.target.result;
            return $target.attr('src', src);
        };

        reader.readAsDataURL(this.files[0]);

    }

});

$(document).on("click", "div[data-service-row] span[data-remove]", function (e) {

    var $row = $(this).closest('[data-service-row]'),
        id = $row.attr('data-service-row'),
        $step = $(this).closest('div.step-content[data-model-id]'),
        model_id = $step.attr('data-model-id'),
        url = '/api/object/' + model_id + '/service/' + id + '/remove',
        $modal = $('#removeServiceModal');

    $modal.find('form').attr('action', url);

    $modal.modal();

});

var form_object_timer;

$(document).on("change", "form#object-form [name]", function (e) {

    clearTimeout(form_object_timer);

    var $form = $(this).closest("form");

    form_object_timer = setTimeout(function () {

        $form.submit();

        clearTimeout(form_object_timer);

    }, 2500);

    return e.preventDefault();

});

$(document).on("object-service-added", function (e, response) {

    if (response.html !== undefined &&
        response.html !== null &&
        response.html.length) {


        var $button = $("a[data-add-service]").closest('div.col-12'),
            $node = $(response.html);

        $node.insertBefore($button);

        $('#createServiceModal').modal('hide');

    }

});

$(document).on("object-service-removed", function (e, response) {

    if (response.id !== undefined &&
        response.id !== null) {


        var $row = $("div[data-service-row='" + response.id + "']"),
            $modal = $('#removeServiceModal');

        $modal.modal('hide');

        $row.fadeOut("slow", function () {

            $row.remove();

        });

    }

});
