$ ->
  $window = $(window)
  $window.on 'scroll', ->
    scrollTop = $window.scrollTop()
    landingHeight = $('#landingBody').height()
    $('.landingContent')
      .css 'transform', 'translateY(-' + scrollTop + 'px)'
      .css 'opacity', ''+(landingHeight - scrollTop*2) / landingHeight+''
    return
  return