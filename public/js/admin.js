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


// $('#datetimepicker').datetimepicker({
//     weekStart: 0,
//     todayBtn: 1,
//     autoclose: 1,
//     todayHighlight: 1,
//     startView: 2,
//     minView: 1,
//     forceParse: 0,
// });
// $('#datetimepicker').datetimepicker('setStartDate', '2019-01-01');
// $('#datetimepicker').datetimepicker('setEndDate', '2019-12-31');


// $(function () {
//     var picker1 = $('#datetimepicker1').datetimepicker({
//         todayBtn: 1,
//         autoclose: 1,
//         todayHighlight: 1,
//         startView: 2,
//         minView: 1,
//         forceParse: 0,
//         format: 'yyyy-mm-dd hh:00',
//         // locale: moment.locale('zh-cn'),
//         enabledDates: [
//             moment("4/23/2019"),
//             new Date(2019, 11 - 1, 21),
//             "11/22/2019 00:53"
//         ]
//     });
//     var picker2 = $('#datetimepicker2').datetimepicker({
//         todayBtn: 1,
//         autoclose: 1,
//         todayHighlight: 1,
//         startView: 1,
//         minView: 1,
//         forceParse: 0,
//         format: 'yyyy-mm-dd hh:00',
//         // locale: moment.locale('zh-cn')
//     });
//     //动态设置最小值
//     picker1.on('dp.change', function (e) {
//         picker2.data('DateTimePicker').minDate(e.date);
//     });
//     //动态设置最大值
//     picker2.on('dp.change', function (e) {
//         picker1.data('DateTimePicker').maxDate(e.date);
//     });
// });


$(function () {
    $('#datetimepicker6').datetimepicker({
        enabledDates: [
            moment("4/23/2019"),
            new Date(2019, 11 - 1, 21),
            "11/22/2019 00:53"
        ]
    });
    $('#datetimepicker7').datetimepicker({
        useCurrent: false //Important! See issue #1075
    });
    $("#datetimepicker6").on("dp.change", function (e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    $("#datetimepicker7").on("dp.change", function (e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
});