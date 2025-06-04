let wheel = function () {
  let lastPos = jQuery(this.scrollTop());
  let direction = getScrollDirection() || undefined;
}

jQuery(document).ready(function () {
  startOwlSlider();
  setHamburgerOnClick();
  wrapIframe();
  replaceImgWithSvg();
  setAlignInATag();
  setOnSearch();
  startEventListeners();
  changeSubmitButtonState();
  sizeWoningTypeTitleBox();
  sizeWoningTypeContentBox();
  //setOnSubMenuListener();
  setOnZipcodeChange();
  // We repeat to update elements that came before a large text.
  sizeWoningTypeTitleBox();
  sizeWoningTypeContentBox();
});

jQuery(window).scroll(function () {
  setOnHeaderClass();
  getScrollDirection();
  setScrollDirection();
  hideElements();
});

jQuery(window).resize(function () {
  maxWindowHeight = jQuery(window).outerHeight();
  maxDocumentHeight = jQuery(document.body).outerHeight();

  sizeWoningTypeTitleBox();
  sizeWoningTypeContentBox();
});



// functions

function sizeWoningTypeTitleBox() {
  const elementToCheck = ".clickable-container";
  const elementToUpdate = elementToCheck + " h3";
  let heighestHeight = 0;
  let currentOffset = typeof jQuery(elementToCheck).first().offset() != "undefined" ? jQuery(elementToCheck).first().offset().top : false;
  let heights = {};
  let element = false;


  // check if the current offset is set
  if (!currentOffset) { return; }

  // reset the height of the items
  jQuery(elementToUpdate).css({ height: 'auto' });

  // we loop through it and get the heights
  jQuery(elementToUpdate).each(function () {
    let element = jQuery(this);

    // check if we have to reset the height.
    if (currentOffset != element.offset().top) {
      // we save the reference
      heights[currentOffset] = heighestHeight;
      // we reset the heighestheight and the offset which checks the reset
      heighestHeight = element.outerHeight();
      currentOffset = element.offset().top;
    }

    heighestHeight = element.outerHeight() > heighestHeight ? element.outerHeight() : heighestHeight;
  })

  heights[currentOffset] = heighestHeight;

  // set the height 
  jQuery(elementToUpdate).each(function () {
    let element = jQuery(this);

    element.css({ height: heights[element.offset().top] })
  });
}



function sizeWoningTypeContentBox() {
  const elementToCheck = ".clickable-container";
  const elementToUpdate = elementToCheck + " .description-content";
  let heighestHeight = 0;

  // reset the height of the items
  jQuery(elementToUpdate).css({ height: 'auto' });

  // we loop through it and get the heights
  jQuery(elementToUpdate).each(function () {
    let element = jQuery(this);

    heighestHeight = element.outerHeight() > heighestHeight ? element.outerHeight() : heighestHeight;
  })

  // set the height 
  jQuery(elementToUpdate).css({ height: heighestHeight });
}



function wrapIframe() {
  jQuery(".page-content iframe").wrap("<div class='embed-container'></div>");
}

function setOnSearch() {
  let searchScreen = jQuery('.search-screen');
  let inputElement = jQuery('#s');
  let activeState = 'active';

  jQuery('.launch-search, .btn-search-close').on('click', function (e) {
    e.preventDefault();

    inputElement.prop('disabled', false);
    searchScreen.toggleClass(activeState);

    if (!searchScreen.hasClass(activeState)) {
      inputElement.val("");
      return;
    }
    inputElement.focus();

  });

  // Move away the searchscreen
  jQuery(document).on('keyup', function (e) {
    if (searchScreen.hasClass(activeState)) {
      // Keycode 27 is escape key
      if (e.keyCode == 27) {
        searchScreen.removeClass(activeState)
        inputElement.val("");
        inputElement.prop('disabled', true);
      }
    }
  });
}


function startEventListeners() {
  // File upload event listener
  const fileUploadElementLabel = jQuery(".file-upload-field .gfield_label").first();
  const fileUploadElement = jQuery(".file-upload-field [type='file']");
  fileUploadElement.on("change", function () {
    if (this.files.length === 0) return;

    fileUploadElementLabel.attr("data-before", this.files[0]["name"]);
    fileUploadElementLabel.attr("title", "Current file: " + this.files[0]["name"]);
  });


}

function changeSubmitButtonState() {
  const disabledClassName = "disabled";
  let privacyCheckbox = jQuery(".privacy-button input[type=checkbox]");
  let submitButton = jQuery("input[type=submit]");

  // Set the button to disabled first
  submitButton.addClass(disabledClassName);

  // Listen for changes
  privacyCheckbox.on("change", function () {
    if (jQuery(this).is(":checked")) {
      submitButton.removeClass(disabledClassName);
      return;
    }
    submitButton.addClass(disabledClassName);
  });
}


function hideElements() {
  let obligationButton = jQuery(".offerte-container").first();
  const elements = {
    obligation: jQuery(".obligation-free-quote").first()
  }

  if (elements.obligation.length > 0) {
    if (isElementInViewport(elements.obligation)) {
      obligationButton.addClass("hide");
      return;
    }
    obligationButton.removeClass("hide");
  }
}


function isElementInViewport(element) {
  // Convert back to plain JavaScript if this element is instance of jQuery
  if (element instanceof jQuery) element = element[0];

  var rect = element.getBoundingClientRect();

  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= jQuery(window).height() &&
    rect.right <= jQuery(window).width()
  );
}

function setOnHeaderClass() {
  var togglePosition = 1;
  var currentPosition = jQuery(window).scrollTop();
  if (currentPosition > togglePosition) {
    jQuery("header").addClass('scrolled');
    jQuery("main").addClass('scrolled');
  } else {
    jQuery("header").removeClass('scrolled');
    jQuery("main").removeClass('scrolled');
  }
}

function startOwlSlider() {
  jQuery('section.slider').owlCarousel({
    items: 1,
    nav: true,
    dots: false,
    loop: true,
    autoplay: true,
    autoHeight: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 1000,
    navText: ["<i class=\"fal fa-arrow-alt-left\"></i>", "<i class=\"fal fa-arrow-alt-right\"></i>"]
  });
}

function replaceImgWithSvg() {
  jQuery('img.svg').each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');
    jQuery.get(imgURL, function (data) {
      var $svg = jQuery(data).find('svg');
      if (typeof imgID !== 'undefined') {
        $svg = $svg.attr('id', imgID);
      }
      if (typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass + ' replaced-svg');
      }
      $svg = $svg.removeAttr('xmlns:a');
      if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
      }
      $img.replaceWith($svg);

    }, 'xml');

  });
}

function setScrollDirection() {
  let minScrollHeight = 0;
  let elements = ["header", "main"];
  if (wheel.direction == "down" && wheel.lastPos >= minScrollHeight) {
    jQuery.each(elements, function (index, element) {
      jQuery(element).removeClass("scrolling-up");
      jQuery(element).addClass("scrolling-down");
    });
    return;
  }
  jQuery.each(elements, function (index, element) {
    jQuery(element).removeClass("scrolling-down");
    jQuery(element).addClass("scrolling-up");
  });
}

function getScrollDirection() {
  let position = jQuery(this).scrollTop();
  if (position > wheel.lastPos) {
    wheel.lastPos = position;
    wheel.direction = "down";
    return wheel.direction;
  }
  wheel.lastPos = position;
  wheel.direction = "up";
  return wheel.direction;
}

function setHamburgerOnClick() {
  jQuery('.hamburger').on("click", function () {
    if (jQuery(this).hasClass('is-active')) {
      jQuery(this).removeClass('is-active');
    } else {
      jQuery(this).addClass("is-active");
    }
    jQuery('.main-nav ul').toggleClass("is-open");
    jQuery('html').toggleClass("is-active");
  });
}

function setAlignInATag() {
  jQuery('img[class*=align]').each(function (i, e) {
    jQuery(e).parents('a').addClass(jQuery(e).attr('class'));
  });
}

function setOnRecordView() {
  inView('.should-animate')
    .on('enter', function (element) {
      jQuery(element)
        .addClass('animate__animated')
        .removeClass('remove__animate');
    });
}

function setOnSubMenuListener() {
  let className = '.menu-item-has-children';

  // Wait for click event on submenu
  jQuery(className).on('click', function (event) {
    if (jQuery(event.target).parents('.sub-menu').length == 0) {  // && jQuery(window).outerWidth() > 1199) {
      event.preventDefault();
    }

    jQuery(this).toggleClass('active');
  });

  // Disable active state on window resize
  jQuery(window).resize(function () {
    jQuery(className).removeClass('active');
  });
}

function _fetch(options) {
  return jQuery.ajax({
    url: ajaxurl,
    dataType: 'json',
    data: options,
    method: "POST"
  });
}

function setOnZipcodeChange() {
  let timeout;

  if (jQuery('.zipcode, .housenumber').length == 2) {
    // we set the streetnames to inputs
    jQuery(".streetname input, .city input, .province input").prop('readonly', true);
  }

  jQuery('.zipcode input, .housenumber input').on('keyup', function () {
    let zipcodeQuery = jQuery('.zipcode input');
    let housenumberQuery = jQuery('.housenumber input');

    clearTimeout(timeout);

    // check if we have empty fields
    if (zipcodeQuery.val().length == 0) return;
    if (housenumberQuery.val().length == 0) return;

    // zipcode needs max characters of 6
    if (zipcodeQuery.val().split(" ").join("").length < 3) return;

    timeout = setTimeout(function () {
      _fetch({ action: "on_get_street_details", zipcode: zipcodeQuery.val(), housenumber: housenumberQuery.val() }).done(function (result) {
        jQuery(".streetname input").prop("readonly", false);
        jQuery(".city input").prop("readonly", false);
        jQuery(".province input").prop("readonly", false);

        jQuery(".streetname input").val(result.street);
        jQuery(".city input").val(result.city);
        jQuery(".province input").val(result.province);
      })
    }, 300);
  })
}