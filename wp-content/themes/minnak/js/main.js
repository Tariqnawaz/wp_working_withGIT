jQuery(document).ready(function( $ ){
    
  /* TOOLTIP */
  $('[data-toggle="tooltip"]').tooltip()

  /* HEADER FIXED MOBILE */
  $(window).scroll(function(){
    var sticky = $('body'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 46) sticky.addClass('fixed-header');
    else sticky.removeClass('fixed-header');
  });

  /* SIDEBAR TOGGLE */
  $('#toggle-button').click(function(minnak_toggle){
    $('body').toggleClass('open-sidebar');
    $(this).toggleClass('active');
    minnak_toggle.stopPropagation();

    $(document).click(function(e) {
      if (!$('#left-sidebar').is(e.target) && $('#left-sidebar').has(e.target).length === 0) {
        $('body').removeClass('open-sidebar');
        $('#toggle-button').removeClass('active');
      }
    });
  });

  /* SIDEBAR CLOSE AFTER FOCUS MAIN CONTENT - FOR MOBILE */
  var focusable = document.getElementById('left-sidebar').querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
  var firstFocusable = focusable[0];
  var lastFocusable = focusable[focusable.length - 1];
  $(lastFocusable).on('blur', function(){
    $('body').removeClass('open-sidebar');
    $('#toggle-button').removeClass('active');
  });

  /* SIDEBAR MENU HEIGHT */
  function resetHeight(){
    var h1 = $('#masthead').outerHeight();
    var h2 = $('#left-sidebar-footer').outerHeight();
    var wrapperHeight = $('#left-sidebar').height() - h1 - h2 - 10;
    if ($('body').hasClass('admin-bar')) {
      var abh = $('#wpadminbar').outerHeight();
    }
    else {
      var abh = 0;
    }
    var total_h = h1+h2+abh;
    $('#left-sidebar .menu-content-area').css({'height': 'calc(100vh - ' + total_h + 'px)' });
    $('#left-sidebar .menu-content-area').css({'margin-top': 'calc( -1 * (100vh - ' + total_h + 'px) / 2 )' });
    $('#left-sidebar .menu-scrollable').css({'max-height': wrapperHeight});
  }

  resetHeight();

  $('#left-sidebar .nav-link').click(function(){
    resetHeight();  
  });

  $(window).resize(function(){
    resetHeight();
  });

  /* TAB MENU ACTION */
  var mousedown_tab = false;
  $('#left-sidebar .vertical-menu-item a.nav-link').on('mousedown', function () {
    if ( !$(this).parent().hasClass("active-menu") ) {
      $(this).parent().parent().find(".active-menu").removeClass("active-menu");
      $(this).parent().addClass("active-menu")
    }
    mousedown_tab = true;
  });
  $('#left-sidebar .vertical-menu-item a.nav-link').on('focusin', function () {
    if(!mousedown_tab) {
      if ( !$(this).parent().hasClass("active-menu") ) {
        $(this).parent().parent().find(".active-menu").removeClass("active-menu");
        $(this).parent().addClass("active-menu");
      }
    }
    mousedown_tab = false;
  });

  /* ADD CLASS TO SUB CATEGORY */
  $('li.cat-item:has(ul.children)').addClass('menu-item-has-children');

  /* SUB MENU OPEN (WITH TAB KEY) */
  var mousedown = false;
  $('#left-sidebar .menu-item-has-children > a').on('mousedown', function () {
      if ( $(this).parent().hasClass("open-sub-menu") ) {
        $(this).parent().removeClass("open-sub-menu");
        resetHeight(); 
      }
      else {
        $(this).parent().addClass("open-sub-menu");
        resetHeight(); 
      }
      mousedown = true;
  });

  $('#left-sidebar .menu-item-has-children > a').on('focusin', function () {
      if(!mousedown) {
        if ( ($(this).parent().hasClass("open-sub-menu")) && ( !$(this).is(":focus") ) ) {
          $(this).parent().removeClass("open-sub-menu");
          resetHeight(); 
        }
        else {
          $(this).parent().addClass("open-sub-menu");
          resetHeight(); 
        }
      }
      mousedown = false;
  });

    $('#left-sidebar a').keydown(function (e) {
      if ( !$(this).parent().prev().hasClass("open-sub-menu") && ( e.shiftKey && e.which === 9) && $(this).parent().prev().hasClass("menu-item-has-children") ) {
        $(this).parent().prev().addClass("open-sub-menu");
      }
    });
    setTimeout(function() { 
      $('#left-sidebar .menu-item-has-children > a').keydown(function (e) {
        if ( !e.shiftKey && e.which === 9){
          $(this).parent().addClass("open-sub-menu");
        }
        if ( e.shiftKey && e.which === 9){
          if (!$(this).parent().prev().hasClass("open-sub-menu")) {
            $(this).parent().prev().addClass("open-sub-menu")
          }
        }
      });
    }, 200);

  /* Target Menu */
  const items = document.querySelectorAll('.menu li.menu-item');
    for (let item of items) {
        item.addEventListener('click', function(e) {
                if ('#'+e.currentTarget.id === location.hash) {
                    e.preventDefault();
                    window.location.hash = '';
                }
        });
    }

});