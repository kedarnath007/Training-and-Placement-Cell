$(document).ready(function () {
    $('.box').hide();
    $('#btech').show();
    $('#selectField').change(function () {
        $('.box').hide();
        $('#'+$(this).val()).show();
    });
});

$(document).ready(function () {
    $('.box1').hide();
    $('#inter').show();
    $('#selectField1').change(function () {
        $('.box1').hide();
        $('#'+$(this).val()).show();
    });
});

$(document).ready(function () {
    $('.box2').hide();
    $('#no').show();
    $('#selectField2').change(function () {
        $('.box2').hide();
        $('#'+$(this).val()).show();
    });
});

$(document).ready(function () {
    $('.box2').hide();
    $('#no1').show();
    $('#selectField4').change(function () {
        $('.box2').hide();
        $('#'+$(this).val()).show();
    });
});

$(document).ready(function () {
    $('.box3').hide();
    $('#mno').show();
    $('#selectField3').change(function () {
        $('.box3').hide();
        $('#'+$(this).val()).show();
    });
});