$(function(){
  activateMenus();
});

  /* Func: ActivateMenus
   * Desc: Get the menus going
   * Args: none
   */
  function activateMenus() {
    $('#header-top').append('<a href="#" class="menu-button">Menu</a>');
    $('#header-top').delegate('.menu-button', 'click', function () {
      $('body').toggleClass('sideNav');
    });
          
    $('nav li:has(.mega, .sub) > a').click(function (e) {
      e.preventDefault();
      var li = $(this).parent();
      // Only close menu if user clicked to open it
      if (li.hasClass('hover') && clickOpened) {
        li.removeClass('hover');
      }
      else {
        li.addClass('hover');
        $('nav li').not(li).removeClass('hover');
        clickOpened = true;
      }
      return false;
    });

    $('nav li:has(.mega, .sub)').click(function (e) {
      e.stopPropagation();
    });

    // Menu config
    var byuMenuConfig = {
      sensitivity: 10,
      interval: 75,
      over: rollOver, // function = onMouseOver callback (REQUIRED)    
      timeout: 350, // number = milliseconds delay before onMouseOut    
      out: rollOut // function = onMouseOut callback (REQUIRED)    
    };
    //$('#secondary-nav > ul > li, #primary-nav > ul > li').hoverIntent(byuMenuConfig);
    $('nav.no-js').removeClass('no-js');

    /* Positions menu divs */
    $('nav li .sub').each(function () {
      var mega = $(this);
      var left = mega.parent().position().left;
      if (left > mega.parent().parent().outerWidth() - mega.outerWidth())
        mega.css('right', 0);
    });
  }


  /* Func: SetPrimaryNavPosition
   * Desc: Move the nav around so it works in the sidebar
   * Args: none
   */
  function setupNavPosition() {
    $('#main-header').append('<div class="nav-container"></div>');
    $('#secondary-nav, #primary-nav').detach().appendTo('.nav-container');
  }


  /* Func: RollOver
  * Desc: Show a dropdown menu on rollover. Called by the hoverIntent function.
  * Args: @evt	- Event object. Automatically generated.
  */
  function rollOver(evt) {

    if (!$(this).hasClass('hover')) {
      clickOpened = false;
      $(this).addClass('hover');
      $('nav li').not(this).removeClass('hover');
      $(document).click(hideAllMenus);
    }
    //if(evt !== undefined) evt.stopPropagation();
  }

  /* Func: RollOut
  * Desc: Hide a dropdown menu on rollout. Called by the hoverIntent function.
  * Args: -
  */
  function rollOut() {
    $(this).removeClass('hover');
  }

  /* Func: HideAllMenus
  * Desc: Hide all dropdown menus. Bound to click action.
  * Args: -
  */
  function hideAllMenus() {
    $('nav li').removeClass('hover');
    $(document).unbind('click');
  }

  function endsWith(str, suffix) {
    return str.indexOf(suffix, str.length - suffix.length) !== -1;
  }
