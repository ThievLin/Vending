$(document).ready(function () {
    var date_input = $('input[name="date"]');
    var container =
        $(".bootstrap-iso form").length > 0
            ? $(".bootstrap-iso form").parent()
            : "body";
    var filterButton = $('<button class="btn btn-primary">Filter</button>'); // Create filter button

    $(".add-botton").append(filterButton);
    date_input.datepicker({
        format: "mm/dd/yyyy",
        container: container,
        todayHighlight: true,
        autoclose: true,
    });

    filterButton.on("click", function () {
        var selectedDate = date_input.datepicker("getFormattedDate");
        var today = new Date();
        var mm = today.getMonth() + 1;
        var dd = today.getDate();
        var yyyy = today.getFullYear();

        if (mm < 10) {
            mm = "0" + mm;
        }

        if (dd < 10) {
            dd = "0" + dd;
        }
        // console.log($results);
        var formattedDate = mm + "/" + dd + "/" + yyyy;
        if (selectedDate > formattedDate) {
            console.log("Filtering data for date: 111111");
            $(".filter-date").html(
                '<p class="detail-subtitle">Daily Income</p><span class="number">1112(៛)</span>'
            );
        } else {
            console.log("Filtering data for date:", selectedDate);
            $(".filter-date").html(
                '<p class="detail-subtitle">Daily Income</p><span class="number"><?php echo 1111 ?>(៛)</span>'
            );
        }
    });
});

$(function () {
    var current = location.pathname;
    $("#sidebar ul li a").each(function () {
        var $this = $(this);
        // if the current path is like this link, make it active
        if ($this.attr("href").indexOf(current) !== -1) {
            $this.addClass("active");
        }
    });
});
// $(document).ready(function () {

//     $("#uielementsmenu").on("show.bs.collapse", function () {
//         $(".fa-angle-right")
//             .removeClass("fa-angle-right")
//             .addClass("fa-chevron-down");
//     });

//     $("#uielementsmenu").on("hide.bs.collapse", function () {
//         $(".fa-chevron-down")
//             .removeClass("fa-chevron-down")
//             .addClass("fa-angle-right");
//     });
//     $("#pro").on("show.bs.collapse", function () {
//         $(".fa-angle-right")
//             .removeClass("fa-angle-right")
//             .addClass("fa-chevron-down");
//     });

//     $("#pro").on("hide.bs.collapse", function () {
//         $(".fa-chevron-down")
//             .removeClass("fa-chevron-down")
//             .addClass("fa-angle-right");
//     });
// });
// $(document).ready(function () {
//     $("#provinc").change(function () {
//         if ($(this).val() !== "") {
//             $("#distric").prop("disabled", false);
//         } else {
//             $("#distric").prop("disabled", true);
//         }
//     });
//     $("#distric").change(function () {
//         if ($(this).val() !== "") {
//             $("#communes").prop("disabled", false);
//         } else {
//             // If no option is selected in the first dropdown, disable the second dropdown
//             $("#communes").prop("disabled", true);
//         }
//     });
//     $("#communes").change(function () {
//         if ($(this).val() !== "") {
//             $("#villege").prop("disabled", false);
//         } else {
//             // If no option is selected in the first dropdown, disable the second dropdown
//             $("#villege").prop("disabled", true);
//         }
//     });

//     $("#provinc").change(function () {
//         var provinceId = $(this).val();
//         console.log("province ID:", provinceId);
//     });
// });
