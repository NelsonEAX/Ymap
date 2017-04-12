<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <div class="container">
<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="min_popul" class="col-sm-2 control-label">От</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="min_popul" min="0" max="13000000" step="1000">
        </div>
    </div>
    <div class="form-group">
        <label for="max_popul" class="col-sm-2 control-label">До</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="max_popul" min="0" max="13000000" step="1000">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Получить</button>
        </div>
    </div>
</form>
            <button class="btn btn-danger">Y.MAP {{ $current_time }}</button>          
        </div>
        <div class="container">
            <div id="map" style="width: 1170px; height: 700px"></div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
        ymaps.ready(function (){
                var mapCenter = [55.755381, 37.619044],
                map = new ymaps.Map('map', {
                    center: [55.751574, 37.573856],
                    zoom: 9,
                    controls: []
                });

                // Создаем собственный макет с информацией о выбранном геообъекте.
                var customItemContentLayout = ymaps.templateLayoutFactory.createClass(
                    // Флаг "raw" означает, что данные вставляют "как есть" без экранирования html.
                    '<h2 class=ballon_header><?php echo '{{ properties.balloonContentHeader|raw }}'?></h2>' + 
                    '<div class=ballon_body><?php echo '{{ properties.balloonContentBody|raw }}'?></div>' +
                    '<div class=ballon_footer><?php echo '{{ properties.balloonContentFooter|raw }}'?></div>'
                );                

                var clusterer = new ymaps.Clusterer({
                    clusterDisableClickZoom: true,
                    clusterOpenBalloonOnClick: true,
                    // Устанавливаем режим открытия балуна. 
                    // В данном примере балун никогда не будет открываться в режиме панели.
                    clusterBalloonPanelMaxMapArea: 0,
                    // Устанавливаем размер макета контента балуна (в пикселях).
                    clusterBalloonContentLayoutWidth: 350,
                    // Устанавливаем собственный макет.
                    clusterBalloonItemContentLayout: customItemContentLayout,
                    // Устанавливаем ширину левой колонки, в которой располагается список всех геообъектов кластера.
                    clusterBalloonLeftColumnWidth: 120
                });

                var places = [
                    @foreach ($places as $place)
                    {   "geo": [{{ $place->geo }}],
                        "locality": "{{ $place->locality }}",
                        "district": "{{ $place->district }}",
                        "population": "{{ $place->population }}"},
                    @endforeach
                ]

                // Заполняем кластер геообъектами со случайными позициями.
                var placemarks = [];
                places.forEach(function(place){
                    var placemark = new ymaps.Placemark( place.geo, {
                        // Устаналиваем данные, которые будут отображаться в балуне.
                        balloonContentHeader: place.locality,
                        balloonContentBody: place.district,
                        balloonContentFooter: place.population
                    });
                    placemarks.push(placemark);
                });

                clusterer.add(placemarks);
                map.geoObjects.add(clusterer);
                
                clusterer.balloon.open(clusterer.getClusters()[0]);
            });
    </script>
    </body>
    
</html>