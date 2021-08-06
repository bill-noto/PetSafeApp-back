// Burger Menu
var bmenu = $('#bMenu')
$('#burger').on('click', function () {
    if (bmenu.hasClass('hidden')) {
        bmenu.removeClass('hidden');
    } else {
        bmenu.addClass('hidden');
    }
})

// Modals & overlays .
function modal(action) {
    if (action === 'show') {
        $('#modal').fadeIn(1000);
        $('#overlay').fadeIn(1000);
    } else if (action === 'hide') {
        $('#modal').fadeOut(1000);
        $('#overlay').fadeOut(1000);
    }
}

$('#modalClose').on('click', function () {
    modal('hide');
})

$('#overlay').on('click', function () {
    modal('hide');
})

// Form validation
function verify() {
    var n = $('#service_id').val();
    var e = $('#for').val();
    var d = $('#date').val();
    var t = $('#time').val();
    var h = $('#plc');
    var p = $('#plct');
    if (!n || !e || !d || !t) {
        h.addClass(['font-semibold', 'text-lg']);
        h.text('ERROR');
        p.text('All fields are required.')
    } else {
        $('#submission').addClass('hidden');
        $('#submit').removeClass('hidden');
    }
}

$('#submission').on('click', function () {
    modal('show');
    verify();
})
