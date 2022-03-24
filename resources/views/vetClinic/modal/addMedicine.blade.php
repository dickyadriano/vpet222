<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalAddMedicine" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Add Medicine') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="{{ route('medicine.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input class="form-control" placeholder="User ID" type="number" name="userID" value="{{ Auth::user()->id }}" required hidden readonly>

                        <div class="form-group">
                            Medicine Name
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-basket"></i></span>
                                </div>
                                <input class="form-control" placeholder="Medicine Name" type="text" name="medicineName" value="{{ old('MedicineName') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Medicine Amount
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                                </div>
                                <input class="form-control" placeholder="Medicine Amount" type="number" name="medicineAmount" value="{{ old('MedicineAmount') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Medicine Price
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                                </div>
                                <input class="form-control" placeholder="Medicine Price" type="number" name="medicinePrice" value="{{ old('medicinePrice') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image">Medicine Picture</label>
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" required>

                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mt-4" id="submit_button">Add Medicine</button>
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
