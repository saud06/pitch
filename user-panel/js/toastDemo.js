(function($) {
  showLoginFailedToast = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Invalid!</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>You have entered invalid user credentials. Please try again.</h6>',
      showHideTransition: 'slide',
      icon: 'error',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  showLoginSuccessToast = function(message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Success!</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>Hello <strong>' + String(message) + '</strong>, You have successfully logged in to your account.</h6>',
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  showInvalidEmailToast = function(message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Invalid!</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>Email address exists! Please try with another one.</h6>',
      showHideTransition: 'slide',
      icon: 'error',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  showInvalidImageToast = function(message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Invalid!</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>' + String(message) + '</h6>',
      showHideTransition: 'slide',
      icon: 'error',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  showAddUserToast = function(message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Success!</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>' + String(message) + '</h6>',
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  showUpdateStatusToast = function(message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Success!</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>Status updated successfully for the user: <strong>' + String(message) + '</strong>.</h6>',
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  showUpdateCompanyStatusToast = function(message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Success!</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>Status updated successfully for the company: <strong>' + String(message) + '</strong>.</h6>',
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  showUpdateVideoStatusToast = function(message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Success!</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>Status updated successfully for the video: <strong>' + String(message) + '</strong>.</h6>',
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  showErrorVideoToast = function(message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Error!</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>' + String(message) + '</h6>',
      showHideTransition: 'slide',
      icon: 'error',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  showScheduleInfoToast = function(message) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: "<h4>Info:</h4><hr style='margin-top: 5px; margin-bottom: 10px'>",
      text: '<h6>' + String(message) + '</h6>',
      showHideTransition: 'slide',
      icon: 'info',
      loaderBg: '#fff',
      position: 'top-center',
      hideAfter: 8000
    })
  };

  // demos
  showSuccessToast = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Success',
      text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#fff',
      position: 'top-right'
    })
  };
  showInfoToast = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Info',
      text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
      showHideTransition: 'slide',
      icon: 'info',
      loaderBg: '#46c35f',
      position: 'top-right'
    })
  };
  showWarningToast = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Warning',
      text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
      showHideTransition: 'slide',
      icon: 'warning',
      loaderBg: '#57c7d4',
      position: 'top-right'
    })
  };
  showDangerToast = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Danger',
      text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
      showHideTransition: 'slide',
      icon: 'error',
      loaderBg: '#f2a654',
      position: 'top-right'
    })
  };
  showToastPosition = function(position) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Positioning',
      text: 'Specify the custom position object or use one of the predefined ones',
      position: String(position),
      icon: 'info',
      stack: false,
      loaderBg: '#f96868'
    })
  }
  showToastInCustomPosition = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Custom positioning',
      text: 'Specify the custom position object or use one of the predefined ones',
      icon: 'info',
      position: {
        left: 120,
        top: 120
      },
      stack: false,
      loaderBg: '#f96868'
    })
  }
  resetToastPosition = function() {
    $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
    $(".jq-toast-wrap").css({
      "top": "",
      "left": "",
      "bottom": "",
      "right": ""
    }); //to remove previous position style
  }
})(jQuery);