(function($) {
  'use strict';
  if ($("#fileuploader").length) {
    $("#fileuploader").uploadFile({
      url: "../admin-panel/uploads",
      fileName: "myfile"
    });
  }
  
  if ($("#fileuploader2").length) {
    $("#fileuploader2").uploadFile({
      url: "../admin-panel/uploads",
      fileName: "myfile"
    });
  }
})(jQuery);