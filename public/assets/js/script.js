/*------------------------------------------------------------------
* Bootstrap Simple Admin Template
* Version: 3.0
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-------------------------------------------------------------------*/
(function () {
    "use strict";
    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
        $("#body").toggleClass("active");

        if ($("#sidebar").hasClass("active")) {
            $("#body").css("margin-left", "0");
            $(".navbar").css("width", "100%");
        } else {
            $("#body").css("margin-left", "250px");
            $(".navbar").css("width", "83%");
        }
    });
})();
//return to page button 


function patient(url) {
    $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
            const number_link = data.meta.links;
            const curr = data.meta.current_page;
            const last = data.meta.last_page;
            var text = "";
            $(".pagination").find("li").remove();
            number_link.forEach((el) => {
                text += `<li class="page-item ${el.active ? "active" : ""} ${
                    el.url ? "" : "disabled"
                }">
                    <a class="page-link"  tabindex="-1" data-url="${
                        el.url
                    }" id="click_link_page">${el.label}</a>
                </li>`;
            });

            $("#current_page").text(curr);
            $("#last_page").text(last);

            $(".pagination").append(text);
            $("#contact").find("tr").remove();

            data.data.forEach((el) => {
                $("#contact").append(
                    "<tr>" +
                        "<td> " +
                        el.id +
                        " </td>" +
                        "<td> " +
                        el.name +
                        " </td>" +
                        "<td> " +
                        el.gender +
                        " </td>" +
                        "<td> " +
                        el.dob +
                        " </td>" +
                        "<td> " +
                        el.province +
                        " </td>" +
                        "<td> " +
                        el.district +
                        " </td>" +
                        "<td> " +
                        el.commune +
                        " </td>" +
                        "<td> " +
                        el.village +
                        " </td>" +
                        "</tr>"
                );
            });
        },
    });
}

//on click pagination
$("body").on("click", "#click_link_page", function () {
    var url = $(this).data("url");
    patient(url);
});

//get all provinces
$.ajax({
    type: "GET",
    url: "/api/provinces/web",
    success: function (data) {
        $.each(data.data, function (key, val) {
            $("#province").append(
                "<option value= " + val.id + ">" + val.name_en + "</option>"
            );
        });
    },
    error: function () {
        console.log(data);
    },
});

//get all districts
$("#province").change(function () {
    var province_id = $("select[name=province]").val();
    if (province_id != "") {
        $.ajax({
            type: "GET",
            url: "/api/districts/" + province_id + "/web",
            success: function (data) {
                $("#districts").find("option").remove();
                $("#communes").find("option").remove();
                $("#villages").find("option").remove();
                $("#communes").append(
                    '<option value="">Please Choose</option>'
                );
                $("#villages").append(
                    '<option value="">Please Choose</option>'
                );
                $("#districts").append(
                    '<option value="">Please Choose</option>'
                );
                $.each(data.data, function (key, val) {
                    $("#districts").append(
                        "<option value= " +
                            val.id +
                            ">" +
                            val.name_en +
                            "</option>"
                    );
                });
            },
            error: function () {
                console.log(data);
            },
        });
    } else {
        $("#districts").find("option").remove();
        $("#communes").find("option").remove();
        $("#villages").find("option").remove();
        $("#communes").append('<option value="">Please Choose</option>');
        $("#villages").append('<option value="">Please Choose</option>');
        $("#districts").append('<option value="">Please Choose</option>');
    }
});

//get all communes
$("#districts").change(function () {
    var district_id = $("select[name=districts]").val();
    if (district_id != "") {
        $.ajax({
            type: "GET",
            url: "/api/communes/" + district_id + "/web",
            success: function (data) {
                $("#communes").find("option").remove();
                $("#villages").find("option").remove();
                $("#communes").append(
                    '<option value="">Please Choose</option>'
                );
                $("#villages").append(
                    '<option value="">Please Choose</option>'
                );
                $.each(data.data, function (key, val) {
                    $("#communes").append(
                        "<option value= " +
                            val.id +
                            ">" +
                            val.name_en +
                            "</option>"
                    );
                });
            },
            error: function () {
                console.log(data);
            },
        });
    } else {
        $("#communes").find("option").remove();
        $("#villages").find("option").remove();
        $("#communes").append('<option value="">Please Choose</option>');
        $("#villages").append('<option value="">Please Choose</option>');
    }
});

//get all villages
$("#communes").change(function () {
    var commune_id = $("select[name=communes]").val();
    if (commune_id != "") {
        $.ajax({
            type: "GET",
            url: "/api/villages/" + commune_id + "/web",
            success: function (data) {
                $("#villages").find("option").remove();
                $("#villages").append(
                    '<option value="">Please Choose</option>'
                );
                $.each(data.data, function (key, val) {
                    $("#villages").append(
                        "<option value= " +
                            val.id +
                            ">" +
                            val.name_en +
                            "</option>"
                    );
                });
            },
            error: function () {
                console.log(data);
            },
        });
    } else {
        $("#villages").find("option").remove();
        $("#villages").append('<option value="">Please Choose</option>');
    }
});

//post data patient to database
// $("html").on("click", "#submit", function (e) {
//     e.preventDefault();
//     var myGender = $("input[name='gender']:checked").val();
//     var data = {
//         name: $("#name").val(),
//         email: $("#email").val(),
//         phone: $("#phone").val(),
//         gender: myGender,
//         date_of_birth: $("#date_of_birth").val(),
//         village_id: $("#villages").val(),
//         province: $("#province").val(),
//         districts: $("#districts").val(),
//         communes: $("#communes").val(),
//     };
//     $.ajaxSetup({
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//     });
//     // ajax request send
//     $.ajax({
//         type: "POST",
//         url: "/api/patient/store",
//         data: data,
//         dataType: "json",
//         success: function (response) {
//             if (response.status == 400) {
//                 $("#savaform_errlist").html();
//                 $("#savaform_errlist").addClass("alert alert-danger");
//                 $("#savaform_errlist").find("li").remove();
//                 $.each(response.messages, function (key, err_value) {
//                     $("#savaform_errlist").append(
//                         '<li> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' +
//                             err_value +
//                             "</li>"
//                     );
//                 });
//             }
//             if (response.messages == "successfully") {
//                 location.reload();
//             }
//         },
//         error: function () {
//             console.log(data);
//         },
//     });
// });
