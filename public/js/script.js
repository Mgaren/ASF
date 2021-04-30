$(document).on('change', '#section_planning_section', '#section_planning_sectionCategory', function () {
    let $field = $(this)
    let $form = $field.closest('form')
    let data = {}
    data[$field.attr('name')] = $field.val()
    $.post($form.attr('action'), data).then(function (data) {
        let $imput = $(data).find('#section_planning_sectionCategory')
        $('#section_planning_sectionCategory').replaceWith($imput)
    })
})
