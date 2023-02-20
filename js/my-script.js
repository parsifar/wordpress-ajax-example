jQuery(document).ready(function ($) {
    // here in JS we have access to the localized object (localized_object)
    console.log(localized_object);

    //add a click listener to the delete button
    $("#delete-post-btn").click(function () {
        console.log("click");

        $.ajax({
            type: "POST",
            url: localized_object["ajax-url"],
            data: {
                action: "delete_my_post",
                my_nonce: localized_object["my-nonce"],
            },
            success: function (result) {
                $("#results").html(result.data.message);
            },
            error: function (error) {
                $("#results").html(error.data.message);
            },
        });
    });
});
