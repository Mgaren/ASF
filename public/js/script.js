$('#section_plannings_section').change(function () {
    let sectionSelector = $(this);

    // Request the neighborhoods of the selected city.
    $.ajax({
        url: "/section/planning/get-categories-from-section",
        type: "GET",
        dataType: "JSON",
        data: {
            section_id: sectionSelector.val()
        },
        success: function (sectioncategories) {
            let sectioncategorySelect = $("#section_plannings_sectionCategory");

            // Remove current options
            sectioncategorySelect.html('');

            $.each(sectioncategories, function (key, sectioncategory) {
                sectioncategorySelect.append('<input type="checkbox" id="section_planningssectionCategory' + sectioncategory.id + '" name="section_plannings[sectionCategory][]" value="' + sectioncategory.id + '">');
                sectioncategorySelect.append('<label for="section_planningssectionCategory' + sectioncategory.id + '">' + sectioncategory.name + '</label>');
            });
        },
        error: function (err) {
            alert("An error ocurred while loading data ...");
        }
    });
});
