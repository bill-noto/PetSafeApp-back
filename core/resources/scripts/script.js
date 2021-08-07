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

// Create validation logs
function verify() {
    var n = $('#service_id').val();
    var e = $('#client').val();
    var d = $('#date').val();
    var t = $('#time').val();
    var h = $('#plc');
    var p = $('#plct');
    if (!n || !e || !d || !t) {
        h.addClass(['font-semibold', 'text-lg']);
        h.text('ERROR');
        p.text('All fields are required.')
    } else {
        h.addClass(['font-semibold', 'text-lg']);
        h.text('SUCCESS');
        p.text('You may create the log.')
        $('#submission').addClass('hidden');
        $('#submit').removeClass('hidden');
    }
}

$('#submission').on('click', function () {
    modal('show');
    verify();
})

// Create validation posts
function verify2() {
    var t = $('#title').val();
    var b = $('#body').val();
    var h = $('#plc');
    var p = $('#plct');
    if ( !t || !b) {
        h.addClass(['font-semibold', 'text-lg']);
        h.text('ERROR');
        p.text('Author, title & body are required.')
    } else {
        h.addClass(['font-semibold', 'text-lg']);
        h.text('SUCCESS');
        p.text('You may create the post.')
        $('#check').addClass('hidden');
        $('#submit').removeClass('hidden');
    }
}

$('#check').on('click', function () {
    modal('show');
    verify2();
})
