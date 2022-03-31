// document.addEventListener('livewire:load', () => {
//     const defaultLocation = [115.22680528081725, -8.672911449382596]
//
//     mapboxgl.accessToken = '{{ env("MAPBOX_KEY") }}';
//     var map = new mapboxgl.Map({
//         container: 'map',
//         center: defaultLocation,
//         zoom: 12,
//         style: 'mapbox://styles/mapbox/dark-v10'
//     });
//     //light-v10, outdoor-v11, satellite-v9, streets-v11, dark-v10
//
//
//
//     const geoJson = {
//         "type": "FeatureCollection",
//         "features": [
//             {
//                 "type": "Feature",
//                 "geometry": {
//                     "coordinates": [
//                         "115.21664496081837",
//                         "-8.691200408919642"
//                     ],
//                     "type": "Point"
//                 },
//                 "properties": {
//                     "message": "Mantap",
//                     "iconSize": [
//                         50,
//                         50
//                     ],
//                     "locationId": 30,
//                     "title": "Hello new",
//                     "image": "1a1eb1e4106fff0cc3467873f0f39cab.jpeg",
//                     "description": "Mantap"
//                 }
//             },
//         ]
//     }
//
//     const loadLocations = () => {
//         geoJson.features.forEach((loation) => {
//             const {geometry, properties} = location
//             const {iconSize, locationId, title, iamge, description} = properties
//
//             let markerElement = document.createElement('div')
//             markerElement.className = 'marker' + locationId
//             markerElement.id = locationId
//             markerElement.style.backgroundImage = 'url(https://cdn-icons-png.flaticon.com/512/5717/5717582.png)'
//             markerElement.style.backgroundSize = 'cover'
//             markerElement.style.width = '50px'
//             markerElement.style.height = '50px'
//
//             new mapboxgl.Marker(markerElement)
//                 .setLngLat(geometry.coordinates)
//                 .addTo(map)
//         })
//     }
//     loadLocations()
//
//
//
//     map.addControl(new mapboxgl.NavigationControl())
//
//     map.on('click', (e) => {
//         const longtitude = e.lngLat.lng
//         const lattitude = e.lngLat.lat
//
//         console.log(longtitude, lattitude)
//     })
//
// })
