fixFooterPlacement = ->
  windowHeight = $(window).height()
  bodyHeight = $('body').height()
  mainContent = $('#main-container')
  if windowHeight > bodyHeight
    $(mainContent).css 'min-height', $(mainContent).height() + windowHeight - bodyHeight
  return

fixFooterPlacement()
$(window).bind 'resize', fixFooterPlacement

$('.overlay').css 'line-height', ->
  return ''+$(this).height()+'px'
