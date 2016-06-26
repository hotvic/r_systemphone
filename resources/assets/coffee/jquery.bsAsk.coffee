jQuery.fn._bsa_obect2html = (obj) ->
  if $.isPlainObject(obj)
    $root = $('<div/>')

    for key of obj
      if $.isPlainObject(obj[key])
        $root.append($()._bsa_obect2html(obj[key]))
      else
        $root.append($('<' + key + '/>').text(obj[key]))

    return $root.html()

jQuery.fn.bsAsk = (options) ->
  settings = $.extend({
    container: false,
    placement: 'right',
    title: 'jQuery bsAsk',
    trigger: 'click',
    content: 'Content goes here...',
    buttons: false,
    hideOnAction: true,
  }, options);

  pop_settings = {
    container: settings.container,
    placement: settings.placement,
    title: settings.title,
    trigger: settings.trigger,
    html: if $.isPlainObject(settings.content) then true else false,
    content: if $.isPlainObject(settings.content) then this._bsa_obect2html(settings.content) else settings.content,
  };

  if not settings.buttons == false
    pop_settings['template'] = '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div><div style="padding: 5px; background-color: #f7f7f7; border-top: 1px solid #ebebeb; display: flex; justify-content: space-between;" class="popover-buttons"></div></div>'

  popover = this.popover(pop_settings)

  if $.isPlainObject(settings.buttons)
    buttons = popover.data('bs.popover').tip().find('.popover-buttons')

    for key of settings.buttons
      if key == 'callback'
        popover.on('action', settings.buttons[key])
      else
        button = $.extend({
          type: 'btn-default',
          class: 'pull-left',
        }, settings.buttons[key])

        $button = $('<a/>')
        $button.addClass('btn btn-sm btn-flat').addClass(button.type).addClass(button.class)
        $button.text(button.text)
        $button.on('click', (e) ->
          e.preventDefault();

          popover.trigger('action', [key])

          if settings.hideOnAction
            popover.popover('hide')
        )

        buttons.append($button)

  return this