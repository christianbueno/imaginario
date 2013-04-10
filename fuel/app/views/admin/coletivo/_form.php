
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
        <?php echo Form::label('Nome', 'name'); ?>

        <div class="input">
            <?php echo Form::input('name', isset($coletivo) ? $coletivo->name : '', array('class' => 'span4')); ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Cor', 'color'); ?>

        
            #<?php echo Form::input('color', isset($coletivo) ? $coletivo->color : '', array('class' => 'span1 colorpicker')); ?>
        
    </div>    
    <div class="clearfix">
        <?php echo Form::label('Descrição', 'description'); ?>

        <div class="input">
            <?php echo Form::textarea('description', isset($coletivo) ? $coletivo->description : '', array('class' => 'span4')); ?>
        </div>
    </div>    
    <div class="clearfix">
        <abbr title="São as pessoas que possuem permissão de compartilhar conteudo na página do coletivo. Preencha o(s) e-mail sem espaços e separados por ponto e virgula">Colaboradores</abbr>

        <div class="input">
            <?php echo Form::textarea('admins', isset($coletivo) ? $coletivo->admins : '', array('class' => 'span4','placeholder' => 'colaborador1@email.com;colaborador2@email.com;colaborador3... etc')); ?>                       
        </div>

    </div>      
    <div class="clearfix">
        <?php echo Form::label('Logo', 'logo'); ?>
            <?php echo Html::img( 'arquivos/'.(isset($coletivo->image) ? $coletivo->image : 'notfound.gif')); ?>  
            
            <div class="input">
                <?php echo Form::file('file_logo'); ?>
                <?php echo Form::hidden('logo', Input::post('logo', (isset($coletivo) ? $coletivo->image : 'notfound.gif')), array('class' => 'span4')); ?>
            </div>
    </div>
    <div class="clearfix" style="position: relative">
        <?php echo Form::label('Endereço', 'address'); ?>

        <div class="input">
            <?php echo Form::input('address', isset($coletivo) ? $coletivo->address : '', array('class' => 'span4', 'placeholder' => 'Digite o endereço')); ?>
            <?php echo Form::hidden('latlng', Input::post('logo', (isset($coletivo) ? $coletivo->latlng : ''))); ?>
        </div>

        <div id="map-canvas" class="mapa-coletivo"/>
    </div>    

    

    <div class="actions">
        <?php echo Form::submit('submit', 'Salvar', array('class' => 'btn btn-primary')); ?>

    </div>
</fieldset>

<script>
  var start_colorpicker = true;
</script>