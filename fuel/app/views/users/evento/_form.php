
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script>
      function initialize() {
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var defaultBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(-33.8902, 151.1759),
            new google.maps.LatLng(-33.8474, 151.2631));
        map.fitBounds(defaultBounds);

        var input = document.getElementById('form_address');
        var searchBox = new google.maps.places.SearchBox(input);
        var markers = [];

        google.maps.event.addListener(searchBox, 'places_changed', function() {
          var places = searchBox.getPlaces();

          for (var i = 0, marker; marker = markers[i]; i++) {
            marker.setMap(null);
          }

          markers = [];
          var bounds = new google.maps.LatLngBounds();
          for (var i = 0, place; place = places[i]; i++) {
            var image = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            var marker = new google.maps.Marker({
              map: map,
              icon: image,
              title: place.name,
              position: place.geometry.location
            });
            document.getElementById('form_latlng').value = place.geometry.location.lat() + "," + place.geometry.location.lng();
            markers.push(marker);

            bounds.extend(place.geometry.location);
          }

          map.fitBounds(bounds);
        });

        google.maps.event.addListener(map, 'bounds_changed', function() {
          var bounds = map.getBounds();
          searchBox.setBounds(bounds);
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<fieldset>
    <div class="clearfix">
        <?php echo Form::label('Título', 'title'); ?>

        <div class="input">
            <?php echo Form::input('title', isset($evento) ? $evento->title : '', array('class' => 'span4', 'placeholder' => 'Titulo para o evento')); ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Descrição', 'description'); ?>

        <div class="input">
            <?php echo Form::textarea('description', isset($evento) ? $evento->description : '', array('class' => 'span4', 'placeholder' => 'Aqui vão as informações adicionais, como por exemplo até quando o evento acontece, horários e etc.')); ?>
        </div>
    </div>   

    <div class="clearfix">
        <?php echo Form::label('Tipo', 'type'); ?>

        <div class="input">
            <?php echo Form::select('type', 'teatro', array(
                'teatral' => 'Teatral',
                'musical' => 'Musical',
                'artistico' => 'Artistico',
                'esportivo' => 'Esportivo',
            )); ?>
        </div>
    </div>  

    <div class="clearfix">
        <?php echo Form::label('Quando', 'when'); ?>

        <div class="input">
            <?php echo Form::input('when', isset($evento) ? $evento->when : '', array('class' => 'span4', 'placeholder' => 'dd/mm/aaaa')); ?>
        </div>
    </div>   
 
  
    <div class="clearfix" style="position: relative">
        <?php echo Form::label('Onde', 'address'); ?>

        <div class="input">
            <?php echo Form::input('address', isset($evento) ? $evento->address : '', array('class' => 'span4', 'placeholder' => 'Digite o endereço')); ?>
            <?php echo Form::hidden('latlng', Input::post('logo', (isset($evento) ? $evento->latlng : ''))); ?>
        </div>

        <div id="map-canvas" class="mapa-evento-adm"/>    
    </div>   
    
    

    

    <div class="actions">
        <?php echo Form::submit('submit', 'Adicionar evento', array('class' => 'btn btn-primary')); ?>

    </div>
</fieldset>