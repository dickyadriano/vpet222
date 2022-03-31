<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Add Product') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="{{ route('petShop-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input class="form-control" placeholder="User ID" type="number" name="userID" value="{{ Auth::user()->id }}" required hidden readonly>

                        <div class="form-group">
                            Product Name
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-basket"></i></span>
                                </div>
                                <input class="form-control" placeholder="Product Name" type="text" name="productName" value="{{ old('productName') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Quantity
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                                </div>
                                <input class="form-control" placeholder="Quantity" min="1" type="number" name="quantity" value="{{ old('quantity') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Price/Unit
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                                </div>
                                <input class="form-control" placeholder="Price/Unit" min="1" type="number" name="price" value="{{ old('price') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Detail Product
                            <div class="input-group input-group-alternative mb-3 border">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                                </div>
                                <textarea class="form-control" rows="5" type="text" name="detail" required autofocus>{{ old('detail') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            @csrf
                            <label for="image">Product Picture</label>
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" required>

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mt-4" id="submit_button">Add Product</button>
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
