


$(document).ready(function () {
    $(".datatable").dataTable({
        sDom: "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-12'i><'col-md-12 center-block'p>>",
        sPaginationType: "bootstrap",
        oLanguage: {
            sLengthMenu: "_MENU_ records per page",
        },
    });
    $(".btn-close").click(function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().fadeOut();
    });
    $(".btn-minimize").click(function (e) {
        e.preventDefault();
        var $target = $(this).parent().parent().next(".box-content");
        if ($target.is(":visible"))
            $("i", $(this))
                .removeClass("glyphicon-chevron-up")
                .addClass("glyphicon-chevron-down");
        else
            $("i", $(this))
                .removeClass("glyphicon-chevron-down")
                .addClass("glyphicon-chevron-up");
        $target.slideToggle();
    });
    $(".btn-setting").click(function (e) {
        e.preventDefault();
        $("#myModal").modal("show");
    });

    $("#myTables").DataTable();
});

$(".validate_email").on("input", function () {
    var email = $(this).val();
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/emailvalidate",
        type: "POST",
        data: {
            email: email,
        },
        success: function (response) {
            response.status === "error"
                ? (document.getElementsByClassName("emailerr")[0].innerHTML =
                      response.message)
                : (document.getElementsByClassName("emailerr")[0].innerHTML =
                      "");
        },
        error: function (error) {
            console.log(error);
        },
    });
});

$(".validate_username").on("input", function () {
    var email = $(this).val();
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/usernamevalidate",
        type: "POST",
        data: {
            username: email,
        },
        success: function (response) {
            response.status === "error"
                ? (document.getElementsByClassName("usernameerr")[0].innerHTML =
                      response.message)
                : (document.getElementsByClassName("usernameerr")[0].innerHTML =
                      "");
        },
        error: function (error) {
            console.log(error);
        },
    });
});

//additional functions for data table
$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
    return {
        iStart: oSettings._iDisplayStart,
        iEnd: oSettings.fnDisplayEnd(),
        iLength: oSettings._iDisplayLength,
        iTotal: oSettings.fnRecordsTotal(),
        iFilteredTotal: oSettings.fnRecordsDisplay(),
        iPage: Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        iTotalPages: Math.ceil(
            oSettings.fnRecordsDisplay() / oSettings._iDisplayLength
        ),
    };
};
$.extend($.fn.dataTableExt.oPagination, {
    bootstrap: {
        fnInit: function (oSettings, nPaging, fnDraw) {
            var oLang = oSettings.oLanguage.oPaginate;
            var fnClickHandler = function (e) {
                e.preventDefault();
                if (oSettings.oApi._fnPageChange(oSettings, e.data.action)) {
                    fnDraw(oSettings);
                }
            };

            $(nPaging)
                .addClass("pagination")
                .append(
                    '<ul class="pagination">' +
                        '<li class="prev disabled"><a href="#">&larr; ' +
                        oLang.sPrevious +
                        "</a></li>" +
                        '<li class="next disabled"><a href="#">' +
                        oLang.sNext +
                        " &rarr; </a></li>" +
                        "</ul>"
                );
            var els = $("a", nPaging);
            $(els[0]).bind(
                "click.DT",
                {
                    action: "previous",
                },
                fnClickHandler
            );
            $(els[1]).bind(
                "click.DT",
                {
                    action: "next",
                },
                fnClickHandler
            );
        },

        fnUpdate: function (oSettings, fnDraw) {
            var iListLength = 5;
            var oPaging = oSettings.oInstance.fnPagingInfo();
            var an = oSettings.aanFeatures.p;
            var i,
                j,
                sClass,
                iStart,
                iEnd,
                iHalf = Math.floor(iListLength / 2);

            if (oPaging.iTotalPages < iListLength) {
                iStart = 1;
                iEnd = oPaging.iTotalPages;
            } else if (oPaging.iPage <= iHalf) {
                iStart = 1;
                iEnd = iListLength;
            } else if (oPaging.iPage >= oPaging.iTotalPages - iHalf) {
                iStart = oPaging.iTotalPages - iListLength + 1;
                iEnd = oPaging.iTotalPages;
            } else {
                iStart = oPaging.iPage - iHalf + 1;
                iEnd = iStart + iListLength - 1;
            }

            for (i = 0, iLen = an.length; i < iLen; i++) {
                // remove the middle elements
                $("li:gt(0)", an[i]).filter(":not(:last)").remove();

                // add the new list items and their event handlers
                for (j = iStart; j <= iEnd; j++) {
                    sClass = j == oPaging.iPage + 1 ? 'class="active"' : "";
                    $("<li " + sClass + '><a href="#">' + j + "</a></li>")
                        .insertBefore($("li:last", an[i])[0])
                        .bind("click", function (e) {
                            e.preventDefault();
                            oSettings._iDisplayStart =
                                (parseInt($("a", this).text(), 10) - 1) *
                                oPaging.iLength;
                            fnDraw(oSettings);
                        });
                }

                // add / remove disabled classes from the static elements
                if (oPaging.iPage === 0) {
                    $("li:first", an[i]).addClass("disabled");
                } else {
                    $("li:first", an[i]).removeClass("disabled");
                }

                if (
                    oPaging.iPage === oPaging.iTotalPages - 1 ||
                    oPaging.iTotalPages === 0
                ) {
                    $("li:last", an[i]).addClass("disabled");
                } else {
                    $("li:last", an[i]).removeClass("disabled");
                }
            }
        },
    },
});

$(".navbar-toggle").click(function (e) {
    e.preventDefault();
    $(".nav-sm").html($(".navbar-collapse").html());
    $(".sidebar-nav").toggleClass("active");
    $(this).toggleClass("active");
});

$(".accordion > a").click(function (e) {
    e.preventDefault();
    var $ul = $(this).siblings("ul");
    var $li = $(this).parent();
    if ($ul.is(":visible")) $li.removeClass("active");
    else $li.addClass("active");
    $ul.slideToggle();
});

$(".accordion li.active:first").parents("ul").slideDown();

// document.getElementById("image").onchange = (evt) => {
//     document.getElementById("preimage").style.display = "none";
//     document.getElementById("preview").style.display = "block";
//     const [file] = document.getElementById("image").files;
//     if (file) {
//         document.getElementById("preview").src = URL.createObjectURL(file);
//     }
// };


// document.getElementById("imagess").onchange = evt => {
//     document.getElementById('previewing').style.display = 'block';
//     const [file] = document.getElementById("imagess").files;
//     if (file) {
//         document.getElementById('previewing').src = URL.createObjectURL(file)
//     }
// }

// document.getElementsByClassName("images")[0].onchange = event => {
//     document.getElementsByClassName("previewing")[0].style.display = "block";
//     const [file] = document.getElementsByClassName("images")[0].files;
//     if (file) {
//         document.getElementsByClassName("previewing")[0].src = URL.createObjectURL(file)
//     }
// }


document.getElementsByClassName("images")[0].onchange = event => {
    document.getElementsByClassName("previewing")[0].style.display = "block";
    if(document.getElementsByClassName("preimage")){
        document.getElementsByClassName("preimage")[0].style.display = "none";
    }
    const [file] = document.getElementsByClassName("images")[0].files;
    if (file) {
        document.getElementsByClassName("previewing")[0].src = URL.createObjectURL(file)
    }
}