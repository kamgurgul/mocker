$(document).ready(function () {

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