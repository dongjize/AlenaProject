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
    var today = new Date();
    var maxDate = new Date().setMonth(today.getMonth() + 1);
    $('#datetimepicker').datetimepicker({
        viewMode: 'days',
        format: 'YYYY-MM-DD HH:00',
        minDate: today, // today
        maxDate: maxDate, // next month
        enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17],
        disabledHours: [],
        disabledDates: [],
        // enabledDates: [
        //     moment("4/23/2019"),
        //     new Date(2019, 11 - 1, 21),
        //     "11/22/2019 00:53"
        // ]
    });
    // $('#datetimepicker2').datetimepicker({
    //     viewMode: 'days',
    //     format: 'YYYY-MM-DD HH:00',
    //     useCurrent: false //Important! See issue #1075
    // });
    // $("#datetimepicker1").on("dp.change", function (e) {
    //     $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
    // });
    // $("#datetimepicker2").on("dp.change", function (e) {
    //     $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
    // });
});