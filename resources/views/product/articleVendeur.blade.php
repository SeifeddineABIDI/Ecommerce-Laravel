@include('includes.head')
<style>
    body {
        background-color: #1a1a1a;
        color: #fff;
    }

    .grid {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
        margin-top: 100px;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        margin-bottom: 10px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        background: linear-gradient(135deg, #0981d6, #0076c4);
        color: #ffffff;
        transition: background 0.3s ease;
    }

    .btn:hover {
        background: linear-gradient(135deg, #0099ff, #423ddb);
    }

    .table {
        width: 80%;
        border-collapse: separate;
        border-spacing: 0 15px;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        background-color: #2a2a2a;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 255, 204, 0.2);
    }

    .table th,
    .table td {
        border: none;
        padding: 12px 15px;
        text-align: left;
    }

    .table th {
        background: linear-gradient(135deg, #022842, #233d4d);
        font-weight: bold;
        color: #ffffff;
        text-align: center;
        border-radius: 10px 10px 0 0;
    }

    .table td {
        background-color: #333;
        color: #ffffff;
    }

    .table tr {
        border-radius: 10px;
    }

    .table tr td:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .table tr td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        color: #fff;
    }

    .badge-primary {
        background: linear-gradient(135deg, #0099ff, #0074e0);
    }

    .badge-success {
        background: linear-gradient(135deg, #00ffcc, #06cb5f);
    }
</style>

<body>
    @include('includes.navbar')

    <div class="container mt-5">

        @if($achats->isEmpty())
            <div class="alert alert-warning" role="alert">
                You have not made any purchases yet.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Quantité</th>
                            <th>User</th>
                            <th>Prix</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Delivery Date</th>
                            <th>Review</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($achats as $achat)
                            <tr>
                                <td>{{ $achat->product->nom }}</td>
                                <td>{{ $achat->quantity }}</td>
                                <td>{{ $achat->user->name }}</td>
                                <td>{{ $achat->price }} TND</td>
                                <td>
                                    @if ($achat->product && $achat->product->image)
                                        <img src="{{ asset('uploads/products/' . $achat->product->image) }}" alt="Product Image" class="img-thumbnail" width="100">
                                    @else
                                        <span>No image available</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($achat->status == 'en cours')
                                        <span class="badge badge-primary">Pending</span>
                                    @else
                                        <span class="badge badge-success">Delivered</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($achat->status == 'en cours')
                                        <span>Not yet delivered</span>
                                    @else
                                        <span>{{ $achat->updated_at }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($achat->review)
                                        <p>{{ $achat->review }}</p>
                                        
                                    @else
                                        <span class="badge badge-primary">No review</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn" data-toggle="modal" data-target="#mapModal" data-lat="{{ $achat->user->latitude }}" data-lng="{{ $achat->user->longitude }}">Show Location</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mapModalLabel">User Location</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="map" style="height: 500px;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb423ykEWarHHzXt-70jd1-TvsPazqQcM&libraries=places"></script>
    <script>
        let map;
        let marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 33.886917, lng: 9.537499 },
                zoom: 8
            });
        }

        $(document).ready(function() {
            $('#mapModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget);
                const lat = parseFloat(button.data('lat'));
                const lng = parseFloat(button.data('lng'));

                if (marker) {
                    marker.setMap(null);
                }

                const location = { lat: lat, lng: lng };
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });

                map.setCenter(location);
                map.setZoom(15);
            });

            google.maps.event.addDomListener(window, 'load', initMap);
        });
    </script>
</body>
