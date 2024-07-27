"use strict";

$(function(){
    jQuery.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.fn.aiSubmit = function(url, fall){
        let t = $(this);
        let data = new FormData(t[0]);
        let btn = t.find("button:submit")

        btn.prop("disabled", true);

        $.ajax({
            type: "POST",
            data: data,
            url: url,
            processData: false,
            contentType: false,
            success: function (callback) {
                btn.prop("disabled", false);
            },
            error: function (callback){
                btn.prop("disabled", false);
                let msg;

                try {
                    let response = JSON.parse(callback.responseText);

                    msg = response.message;
                } catch (ex) {
                    msg = "Koneksi terputus, coba segarkan halaman!";
                }

                $('input').val('');
                $('#failed .msg').text(msg);
                $('#failed').removeClass('d-none');
                $('#form').addClass('d-none');
            }
        });
    }
});
