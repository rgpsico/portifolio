$(document).ready(function(){
    $(".cidade").select2({
        placeholder: "Select a Program",
        allowClear: true,
        minimumInputLength: 3,
        ajax: {
          url: "ajax.php",
          dataType: 'json',
          quietMillis: 200,
          data: function (term, page) {
            return {
              term: term, //search term
              flag: 'selectprogram',
              page: page // page number
            };
          },
          results: function (data) {
            return {results: data};
          }
        },
        dropdownCssClass: "bigdrop",
        escapeMarkup: function (m) { return m; }
      });
    });