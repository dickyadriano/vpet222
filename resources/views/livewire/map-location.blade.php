<!-- Header -->
<div class="header bg-gradient-primary">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    {{--                        <h6 class="h2 text-white d-inline-block mb-0">Customer</h6>--}}
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/welcome"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('customer-location') }}">Location</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-3">
    <div class="row p-3">
        <div class="col-sm-2">
            <div class="form-group">
                <label>Longtitude: </label>
                <label wire:model="long"></label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label >Lattitude: </label>
                <label wire:model="lat"></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card border-0">
                {{--                    <div id="map-default" class="map-canvas" data-lat="-8.672844" data-lng="115.226684" style="height: 730px;"></div>--}}
                <div wire:ignore id='map' style='width: 100%; height: 80vh;'></div>

            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:load', () => {
            const defaultLocation = [115.22680528081725, -8.672911449382596]

            mapboxgl.accessToken = '{{ env("MAPBOX_KEY") }}';
            var map = new mapboxgl.Map({
                container: 'map',
                center: defaultLocation,
                zoom: 12,
                style: 'mapbox://styles/mapbox/dark-v10'
            });
            //light-v10, outdoor-v11, satellite-v9, streets-v11, dark-v10

            // console.log("ini blade", @this.test);

            const geoJson = {
                "type": "FeatureCollection",
                "features": [
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "115.21664496081837",
                                "-8.691200408919642"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "Mantap",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 30,
                            "title": "Hello new",
                            "image": "1a1eb1e4106fff0cc3467873f0f39cab.jpeg",
                            "description": "Mantap"
                        }
                    },
                ]
            }

            const loadLocations = () => {
                geoJson.features.forEach((loation) => {
                    const {geometry, properties} = location
                    const {iconSize, locationId, title, iamge, description} = properties

                    let markerElement = document.createElement('div')
                    markerElement.className = 'marker' + locationId
                    markerElement.id = locationId
                    markerElement.style.backgroundImage = 'url(https://cdn-icons-png.flaticon.com/512/5717/5717582.png)'
                    markerElement.style.backgroundSize = 'cover'
                    markerElement.style.width = '50px'
                    markerElement.style.height = '50px'

                    new mapboxgl.Marker(markerElement)
                        .setLngLat(geometry.coordinates)
                        .addTo(map)
                })
            }
            loadLocations()



            map.addControl(new mapboxgl.NavigationControl())

            map.on('click', (e) => {
                const longtitude = e.lngLat.lng
                const lattitude = e.lngLat.lat

                console.log(longtitude, lattitude)
            })

        })
    </script>
@endpush
