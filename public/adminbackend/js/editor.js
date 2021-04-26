(function ($) {
    'use strict';

    // Inline editor
    var editor = new MediumEditor('.editable');

    // Summernote editor
    $('#summernote').summernote({
        height: 200,
        tooltip: false
    })
})(jQuery);
