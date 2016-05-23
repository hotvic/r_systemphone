(function() {
  var Core, bgAlert, bgAlertD, bgAlertDr, bgAlertL, bgAlertLr, bgBlack, bgBlackD, bgBlackDr, bgBlackL, bgBlackLr, bgDanger, bgDangerD, bgDangerDr, bgDangerL, bgDangerLr, bgDark, bgDarkD, bgDarkDr, bgDarkL, bgDarkLr, bgInfo, bgInfoD, bgInfoDr, bgInfoL, bgInfoLr, bgLight, bgLightD, bgLightDr, bgLightL, bgLightLr, bgPrimary, bgPrimaryD, bgPrimaryDr, bgPrimaryL, bgPrimaryLr, bgSuccess, bgSuccessD, bgSuccessDr, bgSuccessL, bgSuccessLr, bgSystem, bgSystemD, bgSystemDr, bgSystemL, bgSystemLr, bgWarning, bgWarningD, bgWarningDr, bgWarningL, bgWarningLr;

  Core = function(options) {
    var Body, HorizontalMenu, Navbar, Topbar, Window, bodyH, chuteIconStyle, contentHeight, navbarH, runAnimations, runChutes, runFooter, runFormElements, runHeader, runHelpers, runLightBox, runSideMenu, topbarH, windowH;
    Window = $(window);
    Body = $('body');
    Navbar = $('.navbar');
    Topbar = $('#topbar');
    windowH = Window.height();
    bodyH = Body.height();
    navbarH = 0;
    topbarH = 0;
    if (Navbar.is(':visible')) {
      navbarH = Navbar.height();
    }
    if (Topbar.is(':visible')) {
      topbarH = Topbar.height();
    }
    contentHeight = windowH - (navbarH + topbarH);
    runSideMenu = function(options) {
      var authorWidget, lazyLayout, rescale, resizeBody, sbOnLoadCheck, sbOnResize, sidebarLeftToggle, sidebarRightToggle, sidebarTopToggle, triggerResize;
      if ($('.nano.affix').length) {
        $(".nano.affix").nanoScroller({
          preventPageScrolling: true
        });
      }
      sidebarLeftToggle = function() {
        if ($('body.sb-top').length) {
          return;
        }
        if (Body.hasClass('sb-l-c') && options.collapse === "sb-l-m") {
          Body.removeClass('sb-l-c');
        }
        Body.toggleClass(options.collapse).removeClass('sb-r-o').addClass('sb-r-c');
        return triggerResize();
      };
      sidebarRightToggle = function() {
        if ($('body.sb-top').length) {
          return;
        }
        if (options.siblingRope === true && !Body.hasClass('mobile-view') && Body.hasClass('sb-r-o')) {
          Body.toggleClass('sb-r-o sb-r-c').toggleClass(options.collapse);
        } else {
          Body.toggleClass('sb-r-o sb-r-c').addClass(options.collapse);
        }
        return triggerResize();
      };
      sidebarTopToggle = function() {
        return Body.toggleClass('sb-top-collapsed');
      };
      $('.sidebar-toggler').on('click', function(e) {
        e.preventDefault();
        if ($('body.sb-top').length) {
          return;
        }
        Body.addClass('sb-l-c');
        triggerResize();
        if (!Body.hasClass('mobile-view')) {
          return setTimeout(function() {
            return Body.toggleClass('sb-l-m sb-l-o');
          }, 250);
        }
      });
      sbOnLoadCheck = function() {
        if ($('body.sb-top').length) {
          if ($(window).width() < 900) {
            Body.addClass('sb-top-mobile').removeClass('sb-top-collapsed');
          }
          return;
        }
        if (!$('body.sb-l-o').length && !$('body.sb-l-m').length && !$('body.sb-l-c').length) {
          $('body').addClass(options.sbl);
        }
        if (!$('body.sb-r-o').length && !$('body.sb-r-c').length) {
          $('body').addClass(options.sbr);
        }
        if (Body.hasClass('sb-l-m')) {
          Body.addClass('sb-l-disable-animation');
        } else {
          Body.removeClass('sb-l-disable-animation');
        }
        if ($(window).width() < 1281) {
          Body.removeClass('sb-r-o').addClass('mobile-view sb-l-m sb-r-c');
        }
        return resizeBody();
      };
      sbOnResize = function() {
        if ($('body.sb-top').length) {
          if ($(window).width() < 900 && !Body.hasClass('sb-top-mobile')) {
            Body.addClass('sb-top-mobile');
          } else if ($(window).width() > 900) {
            Body.removeClass('sb-top-mobile');
          }
          return;
        }
        if ($(window).width() < 1281 && !Body.hasClass('mobile-view')) {
          Body.removeClass('sb-r-o').addClass('mobile-view sb-l-m sb-r-c');
        } else if ($(window).width() > 1281) {
          Body.removeClass('mobile-view');
        } else {
          return;
        }
        return resizeBody();
      };
      resizeBody = function() {
        var cHeight, sidebarH;
        sidebarH = $('#sidebar_left').outerHeight();
        cHeight = topbarH + navbarH + sidebarH + 21;
        return Body.css('min-height', cHeight);
      };
      triggerResize = function() {
        return setTimeout(function() {
          $(window).trigger('resize');
          if (Body.hasClass('sb-l-m')) {
            return Body.addClass('sb-l-disable-animation');
          } else {
            return Body.removeClass('sb-l-disable-animation');
          }
        }, 300);
      };
      sbOnLoadCheck();
      $("#sidebar_top_toggle").on('click', sidebarTopToggle);
      $("#sidebar_left_toggle").on('click', sidebarLeftToggle);
      $("#sidebar_right_toggle").on('click', sidebarRightToggle);
      rescale = function() {
        return sbOnResize();
      };
      lazyLayout = _.debounce(rescale, 300);
      $(window).resize(lazyLayout);
      authorWidget = $('#sidebar_left .author-widget');
      $('.sidebar-menu-toggle').on('click', function(e) {
        e.preventDefault();
        if ($('body.sb-top').length) {
          return;
        }
        if (authorWidget.is(':visible')) {
          authorWidget.toggleClass('menu-widget-open');
        }
        return $('.menu-widget').toggleClass('menu-widget-open').slideToggle('fast');
      });
      return $('.sidebar-menu li a.accordion-toggle').on('click', function(e) {
        var activeMenu, siblingMenu;
        e.preventDefault();
        if ($('body').hasClass('sb-l-m') && !$(this).parents('ul.sub-nav').length) {
          return;
        }
        if (!$(this).parents('ul.sub-nav').length) {
          if ($(window).width() > 900) {
            if ($('body.sb-top').length) {
              return;
            }
            $('a.accordion-toggle.menu-open').next('ul').slideUp('fast', 'swing', function() {
              return $(this).attr('style', '').prev().removeClass('menu-open');
            });
          }
        } else {
          activeMenu = $(this).next('ul.sub-nav');
          siblingMenu = $(this).parent().siblings('li').children('a.accordion-toggle.menu-open').next('ul.sub-nav');
          activeMenu.slideUp('fast', 'swing', function() {
            return $(this).attr('style', '').prev().removeClass('menu-open');
          });
          siblingMenu.slideUp('fast', 'swing', function() {
            return $(this).attr('style', '').prev().removeClass('menu-open');
          });
        }
        if (!$(this).hasClass('menu-open')) {
          return $(this).next('ul').slideToggle('fast', 'swing', function() {
            return $(this).attr('style', '').prev().toggleClass('menu-open');
          });
        }
      });
    };
    runFooter = function() {
      var pageFooterBtn;
      pageFooterBtn = $('.footer-return-top');
      if (pageFooterBtn.length) {
        return pageFooterBtn.smoothScroll({
          offset: -55
        });
      }
    };
    runHelpers = function() {
      $.fn.disableSelection = function() {
        return this.attr('unselectable', 'on').css('user-select', 'none').on('selectstart', false);
      };
      $.fn.hasScrollBar = function() {
        return this.get(0).scrollHeight > this.height();
      };
      if (!(window.mozInnerScreenX === null)) {
        $('html').addClass('ff');
      }
      return setTimeout(function() {
        return $('#content').removeClass('animated fadeIn');
      }, 800);
    };
    runAnimations = function() {
      if (!$('body.boxed-layout').length) {
        setTimeout(function() {
          return $('body').addClass('onload-check');
        }, 100);
      }
      $('.animated-delay[data-animate]').each(function() {
        var This, delayAnimate, delayAnimation, delayTime;
        This = $(this);
        delayTime = This.data('animate');
        delayAnimation = 'fadeIn';
        if (delayTime.length > 1 && delayTime.length < 3) {
          delayTime = This.data('animate')[0];
          delayAnimation = This.data('animate')[1];
        }
        return delayAnimate = setTimeout(function() {
          return This.removeClass('animated-delay').addClass('animated ' + delayAnimation).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            return This.removeClass('animated ' + delayAnimation);
          });
        }, delayTime);
      });
      return $('.animated-waypoint').each(function(i, e) {
        var Animation, This, offsetVal, waypoint;
        This = $(this);
        Animation = This.data('animate');
        offsetVal = '35%';
        if (Animation.length > 1 && Animation.length < 3) {
          Animation = This.data('animate')[0];
          offsetVal = This.data('animate')[1];
        }
        return waypoint = new Waypoint({
          element: This,
          handler: function(direction) {
            console.log(offsetVal);
            if (This.hasClass('animated-waypoint')) {
              return This.removeClass('animated-waypoint').addClass('animated ' + Animation).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                return This.removeClass('animated ' + Animation);
              });
            }
          },
          offset: offsetVal
        });
      });
    };
    runHeader = function() {
      var btnClass, items, menu, serviceModal;
      $('.search-form').on('click', function(e) {
        var This, searchForm, searchRemove;
        This = $(this);
        searchForm = This.find('input');
        searchRemove = This.find('.search-remove');
        if ($('body.mobile-view').length || $('body.sb-top-mobile').length) {
          This.addClass('search-open');
          if (!searchRemove.length) {
            This.append('<div class="search-remove"></div>');
            setTimeout(function() {
              This.find('.search-remove').fadeIn();
              return searchForm.focus().one('keydown', function() {
                return $(this).val('');
              });
            }, 250);
            if ($(e.target).attr('class') === 'search-remove') {
              return This.removeClass('search-open').find('.search-remove').remove();
            }
          }
        }
      });
      if (jQuery(".info-circle").length > 0) {
        jQuery(".info-circle").each(function() {
          var circle_color, circle_color_class;
          circle_color = jQuery(this).attr("data-circle-color");
          circle_color_class = 'circle-text-' + circle_color;
          return jQuery(this).addClass(circle_color_class);
        });
      }
      if (jQuery(".progress.vertical").length > 0) {
        jQuery(".progress.vertical").each(function() {
          var skillBar, skillVal;
          skillBar = $(this).find('.progress-bar');
          skillVal = skillBar.attr("aria-valuenow");
          return $(skillBar).css({
            height: skillVal + '%'
          });
        });
      }
      if (jQuery(".progress:not(.vertical)").length > 0) {
        jQuery(".progress:not(.vertical)").each(function() {
          var skillBar, skillVal;
          skillBar = $(this).find('.progress-bar');
          skillVal = skillBar.attr("aria-valuenow");
          return $(skillBar).css({
            width: skillVal + '%'
          });
        });
      }
      btnClass = "btn-primary";
      if ($("#user-status").length) {
        $('#user-status').multiselect({
          buttonClass: 'btn ' + btnClass + ' btn-sm btn-bordered btn-bordered',
          buttonWidth: 100,
          dropRight: false
        });
      }
      if ($("#user-role").length) {
        $('#user-role').multiselect({
          buttonClass: 'btn ' + btnClass + ' btn-sm btn-bordered btn-bordered',
          buttonWidth: 100,
          dropRight: true
        });
      }
      menu = $('#topbar-dropmenu-wrapper');
      items = menu.find('.service-box');
      serviceModal = $('.service-modal');
      $('.topbar-dropmenu-toggle').on('click', function() {
        menu.slideToggle(230).toggleClass('topbar-dropmenu-open');
        return serviceModal.fadeIn();
      });
      return $('body').on('click', '.service-modal', function() {
        serviceModal.fadeOut('fast');
        return setTimeout(function() {
          return menu.slideToggle(150).toggleClass('topbar-dropmenu-open');
        }, 250);
      });
    };
    runChutes = function() {
      var Animation, chuteFormat, dataAppend, dataChute, fcLayout, fcRefresh, fcResize, lazyLayout, navAnimate, rescale;
      chuteFormat = $('#content .chute');
      if (chuteFormat.length) {
        chuteFormat.each(function(i, e) {
          var This, chuteScroll;
          This = $(e);
          chuteScroll = This.find('.chute-scroller');
          This.height(contentHeight);
          chuteScroll.height(contentHeight);
          if (chuteScroll.length) {
            return chuteScroll.scroller();
          }
        });
        $('#content').scrollLock('on', 'div');
      }
      rescale = function() {
        if ($(window).width() < 1281) {
          return Body.addClass('chute-rescale');
        } else {
          return Body.removeClass('chute-rescale chute-rescale-left chute-rescale-right');
        }
      };
      lazyLayout = _.debounce(rescale, 300);
      if (!Body.hasClass('disable-chute-rescale')) {
        $(window).resize(lazyLayout);
        rescale();
      }
      navAnimate = $('.chute-nav[data-nav-animate]');
      if (navAnimate.length) {
        Animation = navAnimate.data('nav-animate');
        if (Animation === null || Animation === true || Animation === "") {
          Animation = "fadeIn";
        }
        setTimeout(function() {
          return navAnimate.find('li').each(function(i, e) {
            var Timer;
            return Timer = setTimeout(function() {
              return $(e).addClass('animated animated-short ' + Animation);
            }, 50 * i);
          });
        }, 500);
      }
      dataChute = $('.chute[data-chute-mobile]');
      dataAppend = dataChute.children();
      fcRefresh = function() {
        if ($('body').width() < 585) {
          return dataAppend.appendTo($(dataChute.data('chute-mobile')));
        } else {
          return dataAppend.appendTo(dataChute);
        }
      };
      fcRefresh();
      fcResize = function() {
        return fcRefresh();
      };
      fcLayout = _.debounce(fcResize, 300);
      return $(window).resize(fcLayout);
    };
    chuteIconStyle = function() {
      $('.chute-icon').on("click", function(e) {
        if (jQuery(this).parent().hasClass("hover")) {
          return jQuery('.chute-icon-style').removeClass("hover");
        } else {
          jQuery('.chute-icon-style').removeClass("hover");
          return jQuery(this).parent().addClass("hover");
        }
      });
      return $(document).on("click", function(e) {
        var target;
        target = e.target;
        if (!$(target).is('.chute-icon-style') && !$(target).parents().is('.chute-icon-style')) {
          return jQuery('.chute-icon-style').removeClass("hover");
        }
      });
    };
    HorizontalMenu = function() {
      if (jQuery("body.sb-top").length > 0) {
        $(".sidebar-menu > li > a", ".sidebar-left-content").click(function(event) {
          if ($(this).hasClass("menu-open")) {
            $("a.menu-open", ".sidebar-menu").removeClass("menu-open");
          } else {
            $("a.menu-open", ".sidebar-menu").removeClass("menu-open");
            $(this).toggleClass('menu-open');
          }
          if ($(this).attr('href') === '#') {
            return false;
          }
        });
        return $(".sidebar-menu > li > .sub-nav > li > a", ".sidebar-left-content").click(function(event) {
          if ($(this).hasClass("menu-open")) {
            $("a.menu-open", ".sub-nav").removeClass("menu-open");
          } else {
            $("a.menu-open", ".sub-nav").removeClass("menu-open");
            $(this).toggleClass('menu-open');
          }
          if ($(this).attr('href') === '#') {
            return false;
          }
        });
      }
    };
    runFormElements = function() {
      var Popovers, SmoothScroll, Tooltips, panelScroller;
      Tooltips = $("[data-toggle=tooltip]");
      if (Tooltips.length) {
        if (Tooltips.parents('#sidebar_left')) {
          Tooltips.tooltip({
            container: $('body'),
            template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
          });
        } else {
          Tooltips.tooltip();
        }
        Popovers = $("[data-toggle=popover]");
        if (Popovers.length) {
          Popovers.popover();
        }
        $('.dropdown-menu.keep-dropdown').on('click', function(e) {
          return e.stopPropagation();
        });
        $('.dropdown-menu .nav-tabs li a').on('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          return $(this).tab('show');
        });
        $('.dropdown-menu .btn-group-nav a').on('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          return $(this).siblings('a').removeClass('active').end().addClass('active').tab('show');
        });
        if ($('.btn-states').length) {
          $('.btn-states').on('click', function() {
            return $(this).addClass('active').siblings().removeClass('active');
          });
        }
        panelScroller = $('.panel-scroller');
        if (panelScroller.length) {
          panelScroller.each(function(i, e) {
            var Delay, DropMenuParent, Margin, This, Timer;
            This = $(e);
            Delay = This.data('scroller-delay');
            Margin = 5;
            if (This.hasClass('scroller-thick')) {
              Margin = 0;
            }
            DropMenuParent = This.parents('.dropdown-menu');
            if (DropMenuParent.length) {
              DropMenuParent.prevAll('.dropdown-toggle').on('click', function() {
                return setTimeout(function() {
                  This.scroller();
                  return $('.navbar').scrollLock('on', 'div');
                }, 50);
              });
              return;
            }
            if (Delay) {
              return Timer = setTimeout(function() {
                This.scroller({
                  trackMargin: Margin
                });
                return $('#content').scrollLock('on', 'div');
              }, Delay);
            } else {
              This.scroller({
                trackMargin: Margin
              });
              return $('#content').scrollLock('on', 'div');
            }
          });
        }
        SmoothScroll = $('[data-smoothscroll]');
        if (SmoothScroll.length) {
          return SmoothScroll.each(function(i, e) {
            var Links, Offset, This;
            This = $(e);
            Offset = This.data('smoothscroll');
            Links = This.find('a');
            return Links.smoothScroll({
              offset: Offset
            });
          });
        }
      }
    };
    runLightBox = function() {
      return $(document).delegate('*[data-toggle=lightbox]', 'click', function(event) {
        event.preventDefault();
        return $(this).ekkoLightbox({
          onShown: function() {
            var lightbox;
            lightbox = this;
            return document.addEventListener('serverResponse', function() {
              return lightbox.close();
            });
          }
        });
      });
    };
    return {
      init: function(options) {
        var defaults;
        defaults = {
          sbl: "sb-l-o",
          sbr: "sb-r-c",
          sbState: "save",
          collapse: "sb-l-m",
          siblingRope: true
        };
        options = $.extend({}, defaults, options);
        runHelpers();
        runAnimations();
        runHeader();
        runSideMenu(options);
        runFooter();
        runChutes();
        runFormElements();
        chuteIconStyle();
        HorizontalMenu();
        return runLightBox();
      }
    };
  };

  $(document).on('ready', function() {
    return Core().init();
  });

  bgPrimary = '#6d5cae';

  bgPrimaryL = '#48b0f7';

  bgPrimaryLr = '#10cfbd';

  bgPrimaryD = '#aedbfa';

  bgPrimaryDr = '#40c1d0';

  bgSuccess = '#C3D62D';

  bgSuccessL = '#CADB47';

  bgSuccessLr = '#10cfbd';

  bgSuccessD = '#AEBF25';

  bgSuccessDr = '#a2b31c';

  bgInfo = '#12c7b7';

  bgInfoL = '#68DEBB';

  bgInfoLr = '#78e8c7';

  bgInfoD = '#9fede6';

  bgInfoDr = '#29c598';

  bgWarning = '#FF7022';

  bgWarningL = '#FF8441';

  bgWarningLr = '#ff8e51';

  bgWarningD = '#FF5C03';

  bgWarningDr = '#f05704';

  bgDanger = '#F5393D';

  bgDangerL = '#F6565A';

  bgDangerLr = '#6d5cae';

  bgDangerD = '#F41C20';

  bgDangerDr = '#e61418';

  bgAlert = '#FFBC0B';

  bgAlertL = '#FFC42A';

  bgAlertLr = '#ffc837';

  bgAlertD = '#EBAB00';

  bgAlertDr = '#dca001';

  bgSystem = '#c3b4ef';

  bgSystemL = '#6852b2';

  bgSystemLr = '#756da5';

  bgSystemD = '#4D4773';

  bgSystemDr = '#413b67';

  bgLight = '#FAFAFA';

  bgLightL = '#FEFEFE';

  bgLightLr = '#ffffff';

  bgLightD = '#F2F2F2';

  bgLightDr = '#e7e7e7';

  bgDark = '#2a2f43';

  bgDarkL = '#363C56';

  bgDarkLr = '#404661';

  bgDarkD = '#1E2230';

  bgDarkDr = '#171b28';

  bgBlack = '#273847';

  bgBlackL = '#2a3241';

  bgBlackLr = '#34495a';

  bgBlackD = '#1a2620';

  bgBlackDr = '#0e151a';

}).call(this);

//# sourceMappingURL=app.js.map
