(function() {
  jQuery.fn._bsa_obect2html = function(obj) {
    var $root, key;
    if ($.isPlainObject(obj)) {
      $root = $('<div/>');
      for (key in obj) {
        if ($.isPlainObject(obj[key])) {
          $root.append($()._bsa_obect2html(obj[key]));
        } else {
          $root.append($('<' + key + '/>').text(obj[key]));
        }
      }
      return $root.html();
    }
  };

  jQuery.fn.bsAsk = function(options) {
    var $button, button, buttons, key, pop_settings, popover, settings;
    settings = $.extend({
      container: false,
      placement: 'right',
      title: 'jQuery bsAsk',
      trigger: 'click',
      content: 'Content goes here...',
      buttons: false,
      hideOnAction: true
    }, options);
    pop_settings = {
      container: settings.container,
      placement: settings.placement,
      title: settings.title,
      trigger: settings.trigger,
      html: $.isPlainObject(settings.content) ? true : false,
      content: $.isPlainObject(settings.content) ? this._bsa_obect2html(settings.content) : settings.content
    };
    if (!settings.buttons === false) {
      pop_settings['template'] = '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div><div style="padding: 5px; background-color: #f7f7f7; border-top: 1px solid #ebebeb; display: flex; justify-content: space-between;" class="popover-buttons"></div></div>';
    }
    popover = this.popover(pop_settings);
    if ($.isPlainObject(settings.buttons)) {
      buttons = popover.data('bs.popover').tip().find('.popover-buttons');
      for (key in settings.buttons) {
        if (key === 'callback') {
          popover.on('action', settings.buttons[key]);
        } else {
          button = $.extend({
            type: 'btn-default',
            "class": 'pull-left'
          }, settings.buttons[key]);
          $button = $('<a/>');
          $button.addClass('btn btn-sm btn-flat').addClass(button.type).addClass(button["class"]);
          $button.text(button.text);
          $button.on('click', function(e) {
            e.preventDefault();
            popover.trigger('action', [key]);
            if (settings.hideOnAction) {
              return popover.popover('hide');
            }
          });
          buttons.append($button);
        }
      }
    }
    return this;
  };

}).call(this);

//# sourceMappingURL=jquery.bsAsk.js.map
