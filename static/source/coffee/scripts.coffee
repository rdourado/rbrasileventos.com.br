(($) ->

  # Masonry / Gallery

  $ '.fancybox'
    .fancybox()

  $ '.grid'
    .masonry {
      itemSelector: '.grid-item'
      columnWidth: '.grid-sizer'
      percentPosition: true
    }

  $ '.quotes'
    .slick {
      slidesToShow: 1
      slidesToScroll: 1
      autoplay: true
      autoplaySpeed: 5000
      arrows: false
      dots: false
      fade: true
      pauseOnHover: false
    }

  # Map

  render_map = ($el) ->
    # var
    $markers = $el.find('.marker')
    # vars
    args =
      zoom: 16
      center: new (google.maps.LatLng)(0, 0)
      mapTypeId: google.maps.MapTypeId.ROADMAP
    # create map
    map = new (google.maps.Map)($el[0], args)
    # add a markers reference
    map.markers = []
    # add markers
    $markers.each ->
      add_marker $(this), map
      return
    # center map
    center_map map
    return

  add_marker = ($marker, map) ->
    # var
    latlng = new (google.maps.LatLng)($marker.attr('data-lat'), $marker.attr('data-lng'))
    # create marker
    marker = new (google.maps.Marker)(
      position: latlng
      map: map)
    # add to array
    map.markers.push marker
    # if marker contains HTML, add it to an infoWindow
    if $marker.html()
      # create info window
      infowindow = new (google.maps.InfoWindow)(content: $marker.html())
      # show info window when marker is clicked
      google.maps.event.addListener marker, 'click', ->
        infowindow.open map, marker
        return
    return

  center_map = (map) ->
    # vars
    bounds = new (google.maps.LatLngBounds)
    # loop through all markers and create bounds
    $.each map.markers, (i, marker) ->
      latlng = new (google.maps.LatLng)(marker.position.lat(), marker.position.lng())
      bounds.extend latlng
      return
    # only 1 marker?
    if map.markers.length == 1
      # set center of map
      map.setCenter bounds.getCenter()
      map.setZoom 16
    else
      # fit to bounds
      map.fitBounds bounds
    return

  $('.map').each ->
    render_map $(this)

) jQuery