/*
JS file for ATS
*/

(function($) {
  $(document).ready(function() {
    // instantiate home page carousel
    $('.section-carousel').flexslider({
      'directionNav': false,
      'controlNav': true,
      'slideshowSpeed': 7000,
      'animationSpeed': 1000,
      'controlsContainer': '.nav-carousel .content-container'
    });


    // instantiate testimonial slider
    $('.section-testimonials').flexslider({
      'directionNav': false,
      'controlNav': false,
      'slideshowSpeed': 7000,
      'animationSpeed': 1000
    });
    

    // bind quick contact dropdown
    $(".nav-banner .quick-contact").click(function(e) {
      e.preventDefault();
      $(this).toggleClass("open");
      $("#quick-contact").slideToggle();
    });
    
    // set default interest drop-down on contact form based on referring URL
    var vars = [], hash;
    var q = document.URL.split('?')[1];
    if(q != undefined) {
      q = q.split('&');
      for(var i = 0; i < q.length; i++) {
          hash = q[i].split('=');
          vars.push(hash[1]);
          vars[hash[0]] = hash[1];
      }
    }
    
    if (vars['referral']) {
      $("form #field_1_5 select option[value='Customer Referral']").attr("selected", true);
    }
  });
})(jQuery);
