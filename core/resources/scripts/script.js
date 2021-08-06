// Burger Menu
var bmenu = $('#bMenu')
$('#burger').on('click', function () {
    if (bmenu.hasClass('hidden')) {
        bmenu.removeClass('hidden');
    } else {
        bmenu.addClass('hidden');
    }
})
