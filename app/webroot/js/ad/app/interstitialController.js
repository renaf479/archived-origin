antemeridian = (function(overlayController) {
	return function() {
		overlayController.apply(overlayController, arguments);
	};
})(antemeridian);


/*
addToMe = (function (originalFn) {
  return function () {
    originalFn.apply(originalFn, arguments); // call the original function
    // other stuff
  };
})(addToMe); // pass the reference of the original function
*/