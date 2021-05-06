$('#section_planning_section').change(function () {
    let sectionSelector = $(this);

    // Request the neighborhoods of the selected city.
    $.ajax({
        url: "{{ path('section_planning_index') }}",
        type: "GET",
        dataType: "JSON",
        data: {
            section_id: sectionSelector.val()
        },
        success: function (sectioncategories) {
            let sectioncategorySelect = $("#section_planning_sectionCategory");

            // Remove current options
            sectioncategorySelect.html('');

            // Empty value ...
            sectioncategorySelect.append('<option value> Select a sectioncategory of ' + sectionSelector.find("option:selected").text() + ' ...</option>');


            $.each(sectioncategories, function (key, sectioncategory) {
                sectioncategorySelect.append('<option value="' + sectioncategory.id + '">' + sectioncategory.name + '</option>');
            });
        },
        error: function (err) {
            alert("An error ocurred while loading data ...");
        }
    });
});
