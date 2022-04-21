<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalAddVaccine" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Add Vaccine') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="{{ route('vaccine.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input class="form-control" placeholder="User ID" type="number" name="userID" value="{{ Auth::user()->id }}" required hidden readonly>

                        <div class="form-group">
                            Vaccine Name
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-basket"></i></span>
                                </div>
                                <input class="form-control" placeholder="Vaccine Name" type="text" name="vaccineName" value="{{ old('vaccineName') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Medicine Stock
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                                </div>
                                <input class="form-control" placeholder="Medicine Stock" min="1" type="number" name="stock" value="{{ old('stock') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Vaccine Price
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                                </div>
                                <input class="form-control" placeholder="Vaccine Price" min="1" type="number" name="vaccinePrice" value="{{ old('vaccinePrice') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Vaccine Detail
                            <div class="input-group input-group-alternative mb-3 border">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                                </div>
                                <textarea class="form-control" rows="5" type="text" name="vaccineDetail" required autofocus>{{ old('vaccineDetail') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image">Vaccine Picture</label>
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" required>

                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mt-4" id="submit_button">Add Vaccine</button>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
