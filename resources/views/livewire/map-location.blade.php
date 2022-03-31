
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
{{--    <div class="row p-3">--}}
{{--        <div class="col-sm-2">--}}
{{--            <div class="form-group">--}}
{{--                <label>Longtitude: </label>--}}
{{--                <input wire:model="long" type="text" class="form-control" >--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-2">--}}
{{--            <div class="form-group">--}}
{{--                <label >Lattitude: </label>--}}
{{--                <input wire:model="lat" type="text" class="form-control" >--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col">
            <div class="card border-0">
                <div wire:ignore id='map' style='width: 100%; height: 76vh;'></div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:load', () => {
            const defaultLocation = [115.22680528081725, -8.672911449382596]

            mapboxgl.accessToken = '{{ env("MAPBOX_KEY") }}';
            const map = new mapboxgl.Map({
                container: 'map',
                center: defaultLocation,
                zoom: 12,
                style: 'mapbox://styles/mapbox/light-v10'
            });
            //light-v10, outdoor-v11, satellite-v9, streets-v11, dark-v10


            // //Create a default Marker and add it to the map.
            // const marker1 = new mapboxgl.Marker({ color: 'red'})
            //     .setLngLat([115.216656, -8.691174])
            //     .addTo(map);
            //
            // // Create a default Marker, colored black, rotated 45 degrees.
            // const marker2 = new mapboxgl.Marker({ color: 'black', rotation: 45 })
            //     .setLngLat([115.226805, -8.672911])
            //     .addTo(map);

            map.on('load', () => {
                // Add an image to use as a custom marker
                map.loadImage(
                    '{{ asset('img/locationPoint/veterinary.png')}}',
                    (error, image) => {
                        if (error) throw error;
                        map.addImage('custom-marker', image);
                        // Add a GeoJSON source with 2 points
                        map.addSource('points', {
                            'type': 'geojson',
                            'data': {
                                'type': 'FeatureCollection',
                                'features': [
                                    {
                                        'type': 'Feature',
                                        'geometry': {
                                            'type': 'Point',
                                            'coordinates': [
                                                115.216656, -8.691174
                                            ]
                                        },
                                        'properties': {
                                            'title': 'Rumah Sakit Hewan RDS'
                                        }
                                    },
                                    {
                                        'type': 'Feature',
                                        'geometry': {
                                            'type': 'Point',
                                            'coordinates': [115.226805, -8.672911]
                                        },
                                        'properties': {
                                            'title': 'ITB STIKOM Bali'
                                        }
                                    },
                                    {
                                        'type': 'Feature',
                                        'geometry': {
                                            'type': 'Point',
                                            'coordinates': [115.22113567360952, -8.70026609475363]
                                        },
                                        'properties': {
                                            'title': 'Murah Jaya Pet Shop'
                                        }
                                    },
                                    {
                                        'type': 'Feature',
                                        'geometry': {
                                            'type': 'Point',
                                            'coordinates': [115.21825270113834, -8.693618641821104]
                                        },
                                        'properties': {
                                            'title': 'Happy Pet'
                                        }
                                    },
                                ]
                            }
                        });

                        // Add a symbol layer
                        map.addLayer({
                            'id': 'points',
                            'type': 'symbol',
                            'source': 'points',
                            'layout': {
                                'icon-image': 'custom-marker',
                                // get the title name from the source's "title" property
                                'text-field': ['get', 'title'],
                                'text-font': [
                                    'Open Sans Semibold',
                                    'Arial Unicode MS Bold'
                                ],
                                'text-offset': [0, 1.25],
                                'text-anchor': 'top'
                            }
                        });
                    }
                );
            });

            // create the popup
            const popup = new mapboxgl.Popup({ offset: 25 }).setText(
                'Construction on the Washington Monument began in 1848.'
            );

            // create DOM element for the marker
            const el = document.createElement('div');
            el.id = 'marker';

            new mapboxgl.Marker(el)
                .setLngLat(defaultLocation)
                .setPopup(popup) // sets a popup on this marker
                .addTo(map);


            map.addControl(
                new MapboxDirections({
                    accessToken: mapboxgl.accessToken
                }),
                'top-left'
            );

            map.addControl(new mapboxgl.NavigationControl())

            console.log("ini dari blade", @this.test);

            map.on('click',
                (e) => {
                    const longtitude = e.lngLat.lng
                    const lattitude = e.lngLat.lat

                    @this.long = longtitude
                    @this.lat = lattitude
                    //
                    // console.log(longtitude, lattitude)
                })

        })
    </script>
@endpush
