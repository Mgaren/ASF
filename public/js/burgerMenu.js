$('#openButton').click(function (e) {
    e.preventDefault();
    $('body').toggleClass('with--sidebar')
})

$('#openButton-ASF').click(function (e) {
    e.preventDefault();
    $('body').toggleClass('with--sidebar-Asf')
})

$('#openButton-section').click(function (e) {
    e.preventDefault();
    $('body').toggleClass('with--sidebar-section')
})
