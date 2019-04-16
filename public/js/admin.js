$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(".post-audit").click(function (event) {
    var target = $(event.target);
    var post_id = target.attr("post-id");
    var status = target.attr("post-action-status");

    $.ajax({
            url: "/admin/posts/" + post_id + "/status",
            method: "POST",
            data: {
                "status": status
            },
            dataType: "json",
            success: function (data) {
                if (data.error !== 0) {
                    alert(data.msg);
                    return;
                }
                console.log("hahahahaha");
                target.parent().parent().remove();
            }
        }
    );
});


$(".resource-delete").click(function (event) {
    if (confirm("Delete?") === false) {
        return;
    }

    var target = $(event.target);
    event.preventDefault();
    var url = $(target).attr("delete-url");
    $.ajax({
        url: url,
        method: "POST",
        data: {"_method": 'DELETE'},
        dataType: "json",
        success: function (data) {
            if (data.error !== 0) {
                alert(data.msg);
                return;
            }

            window.location.reload();
        },
        error: function () {
            alert("error!");
        }
    });
});


$("#type_id").change(function () {
    var url = "/professionals";
    $.ajax({
        url: url,
        method: "GET",
        data: {
            "type_id": $("#type_id").val()
        },
        success: function (data) {
            // console.log($("#type_id").val())
            window.location.reload();
        },
        error: function () {
            console.log("failure");
        }
    });
});


$(function () {
    $('#datetimepicker5').on('click', function () {
        alert("haha");
    })
    // $('#datetimepicker5').datetimepicker({
    //     defaultDate: "11/1/2013",
    //     disabledDates: [
    //         moment("12/25/2013"),
    //         new Date(2013, 11 - 1, 21),
    //         "11/22/2013 00:53"
    //     ]
    // });
});