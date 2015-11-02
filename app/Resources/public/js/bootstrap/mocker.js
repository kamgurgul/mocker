$(document).ready(function () {
    jQuery('#add_header_button').click(function (e) {
        e.preventDefault();

        var headerList = jQuery('#headers_list');
        var headerCount = (headerList.find(':input').length - 1) / 2;

        var newWidget = headerList.attr('data-prototype');
        // replace the "__name__" used in the id and name of the prototype
        // with a number that's unique to your emails
        // end name attribute looks like name="contact[emails][2]"
        newWidget = newWidget.replace(/__name__/g, headerCount);

        // create a new list element and add it to the list
        var newLi = jQuery('<li class="row" style="margin-top: 10px"></li>').html(newWidget);
        newLi.appendTo(headerList);
    });
});

$("#submit_form_button").click(function () {
    $("#mock_form").submit(function (e) {
        $.ajax({
            type: "POST",
            data: $(this).serialize(),
            success: function (data) {
                alert(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
        e.preventDefault();
    });
    $("#mock_form").submit();
});