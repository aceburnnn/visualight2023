$('i.glyphicon-refresh-animate').hide();
function updateRoutes(r) {
    _opts.routes.available = r.available;
    _opts.routes.assigned = r.assigned;
    search('available');
    search('assigned');
}

$('#btn-new').click(function () {
    var $this = $(this);
    var route = $('#inp-route').val().trim();
    
    if (route !== '') {
        $this.children('i.glyphicon-refresh-animate').show();
        $.post($this.attr('href'), { route: route }, function (response) {
            $('#inp-route').val('').focus();

            
            // Check if there's an error message in the response
            if (response.errorMessage) {
                // Display the error message
                $('#success-message').removeClass('alert-success').addClass('alert-danger').text(response.errorMessage).show();
            } else if (response.successMessage) {
                // Hide any existing error message
                $('#success-message').hide();

                // Display the success message in the div
                if (response.successMessage) {
                    $('#success-message').removeClass('alert-danger').addClass('alert-success').text(response.successMessage).show();
                }
            }

            updateRoutes(response.routes);
        }).always(function () {
            $this.children('i.glyphicon-refresh-animate').hide();
        });
    }
    return false;
});



$('.btn-assign').click(function () {
    var $this = $(this);
    var target = $this.data('target');
    var routes = $('select.list[data-target="' + target + '"]').val();

    if (routes && routes.length) {
        $this.children('i.glyphicon-refresh-animate').show();
        $.post($this.attr('href'), {routes: routes}, function (r) {
            updateRoutes(r);
        }).always(function () {
            $this.children('i.glyphicon-refresh-animate').hide();
        });
    }
    return false;
});

$('#btn-refresh').click(function () {
    var $icon = $(this).children('span.glyphicon');
    $icon.addClass('glyphicon-refresh-animate');
    $.post($(this).attr('href'), function (r) {
        updateRoutes(r);
    }).always(function () {
        $icon.removeClass('glyphicon-refresh-animate');
    });
    return false;
});

$('.search[data-target]').keyup(function () {
    search($(this).data('target'));
});

function search(target) {
    var $list = $('select.list[data-target="' + target + '"]');
    $list.html('');
    var q = $('.search[data-target="' + target + '"]').val();
    $.each(_opts.routes[target], function () {
        var r = this;
        if (r.indexOf(q) >= 0) {
            $('<option>').text(r).val(r).appendTo($list);
        }
    });
}

// initial
search('available');
search('assigned');
