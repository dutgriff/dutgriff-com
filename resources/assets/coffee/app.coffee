fixFooterPlacement = ->
  windowHeight = $(window).height()
  bodyHeight = $('body').height()
  mainContent = $('body > .container')
  if windowHeight > bodyHeight
    $(mainContent).css 'min-height', $(mainContent).height() + windowHeight - bodyHeight
  return

fixFooterPlacement()
$(window).bind 'resize', fixFooterPlacement