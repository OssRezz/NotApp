$(document).ready(function () {
    $(".close.icon").click(function () {
        $(this).parent().hide();
    });

    $('#btnHb').on('click', function (e) {
        $('.ui.labeled.icon.sidebar')
            .sidebar('setting', 'transition', 'push')
            .sidebar('toggle');
    });

});