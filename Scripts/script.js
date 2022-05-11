// left: 37, up: 38, right: 39, down: 40,
// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
var keys = { 37: 1, 38: 1, 39: 1, 40: 1 };

function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

function disableScroll() {
    if (window.addEventListener) // older FF
        window.addEventListener('DOMMouseScroll', preventDefault, false);
    window.onwheel = preventDefault; // modern standard
    window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
    window.ontouchmove = preventDefault; // mobile
    document.onkeydown = preventDefaultForScrollKeys;
}

function enableScroll() {
    if (window.removeEventListener)
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.onmousewheel = document.onmousewheel = null;
    window.onwheel = null;
    window.ontouchmove = null;
    document.onkeydown = null;
}

function OpenPopup(url, title, w, h, size) {
    if (url != '') {
        $("#myModal .modal-title").text(title);
        $("#myModal .modal-body").html("<iframe src=\"" + url + "\"></iframe>");
        $("#myModal .modal-body").height(h);

        $('#myModal').modal('show');
    }
}
function OpenPopup2(url, title, w, h, size) {
    if (url != '') {
        $("#myModal .modal-dialog").width('80%');
        $("#myModal .modal-title").text(title);
        $("#myModal .modal-body").html("<iframe src=\"" + url + "\"></iframe>");
        $("#myModal .modal-body").height(h);
        setTimeout(function () {
            HideLoading();
            $('#myModal').modal('show');
        }, 4000);
        
    }
}

function ClosePopup(bReload) {
    $("#myModal .modal-body").html("");
    $('#myModal').modal('hide');

    if (bReload)
        location.reload(true);
}

function ClosePopupAndReloadPage() {
    ShowLoading();
    ClosePopup(true);
}

function ShowLoading() {
    $(".img-loading-wrap").show();
}

function HideLoading() {
    $(".img-loading-wrap").hide();
}

//------------------------------------------------------------------------------------
var slotCount = 1;

$(function ()
{
    //Định nghĩa trường bắt buộc nhập
    var kytuRequired = "(*)";
    var inputRequireds = $('[data-val-required]');
    if (inputRequireds.length > 0)
    {
        $.each(inputRequireds, function (index, value)
        {
            var divParent = $(value.closest('div.control-group.form-group'));
            var lable = divParent.find('label');
            //Nếu mà chưa có kytu
            if ($(lable).find('input').length == 0)
            {
                //if (!(lable.text().indexOf(kytuRequired) >= 0)) {
                //    lable.text(lable.text() + " " + kytuRequired);
                //}
                ChangeRequired(lable);
            }
            else
            {
                var div_parent = $(lable).closest('div.control-group.form-group');
                var _label = div_parent.find('label')[0];
                ChangeRequired($(_label));
            }
        });
    }
    function ChangeRequired(lable)
    {
        if (!(lable.text().indexOf(kytuRequired) >= 0))
        {
            var kytu = `<span class="text-danger">${kytuRequired}</span>`;
            lable.html(lable.text() + " " + kytu);
        }
    }

    $('#myModal').on('hidden', function () {
        enableScroll();
    });

    $(".input-numberic").keydown(function (e) {

        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 188]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything

            if (e.keyCode == 188 && $(this).val().indexOf(",") >= 0) {
                e.preventDefault();
            }
            else {
                return;
            }
        }

        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

function capitalizeFirstAllWords(str) {
    var pieces = str.split(" ");
    for (var i = 0; i < pieces.length; i++) {
        var j = pieces[i].charAt(0).toUpperCase();
        pieces[i] = j + pieces[i].substr(1);
    }
    return pieces.join(" ");
}

(function ($) {
    $.fn.onChangeSetValue = function (options) {
        var settings = $.extend({
            selector: null,
            valueIs: 'value'
        }, options);
        var $this = this;

        if ($(settings.selector).val() == '') {
            $(settings.selector).val($this.find('option:selected').text());
        }

        $this.change(function () {
            if (settings.selector != null) {
                if (settings.valueIs == 'text')
                    $(settings.selector).val($this.find('option:selected').text());
                else
                    $(settings.selector).val($this.val());
            }
        });
    };
}(jQuery));

(function ($) {
    $.fn.numberFormat = function () {

        var $this = this;
        var $input = $('<input type="text" id="mask-' + $this.attr('id') + '" value="' + $this.val().replace(/\d(?=(?:\d{3})+(?!\d))/g, '$&,') + '" class="' + $this.attr('class') + '" />');

        $this.after($input);
        //$this.removeAttr('name');
        //$this.attr('type', 'hidden');
        $this.css({ 'opacity': 0, 'height': 0, 'margin': 0, 'padding': 0 });

        $input.keyup(function (event) {
            if (event.keyCode != 8 && event.keyCode != 37 && event.keyCode != 39) {

                this.value = this.value.replace(/[^0-9\.]/g, ''); // number only
                var str = $(this).val();
                str = str.replace(/\D+/g, '');

                $(this).val(str.replace(/\d(?=(?:\d{3})+(?!\d))/g, '$&,'));
            }
        });
        $input.change(function (event) {
            this.value = this.value.replace(/[^0-9\.]/g, ''); // number only
            var str = $(this).val();
            str = str.replace(/\D+/g, '');

            $this.val(str);
            $(this).val(str.replace(/\d(?=(?:\d{3})+(?!\d))/g, '$&,'));
        });
    };
}(jQuery));

function ClickEventHandler(isAppend, url, parent, formData, callbackFunction) {
    if (url != "") {
        ShowLoading();
        $.ajax({
            type: "POST",
            url: url,
            data: JSON.stringify(formData),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                if (isAppend)
                    $(parent).append(data);
                else
                    $(parent).prepend(data);

                HideLoading();
                if (typeof callbackFunction == 'function') {
                    callbackFunction.call();
                }
            },
            error: function (data) {
                console.log(data);
                HideLoading();
            }
        });
    }
    return false;
}
function alertPopup(title, text, type)
{
    $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: title,
        // (string | mandatory) the text inside the notification
        text: text,
        class_name: 'gritter-' + type + ' gritter-light' //gritter-dark
    });
};
function ucFirstAllWords(str)
{
    var pieces = str.split(" ");
    for (var i = 0; i < pieces.length; i++)
{
        var j = pieces[i].charAt(0).toUpperCase();
        pieces[i] = j + pieces[i].substr(1);
    }
    return pieces.join(" ");
}