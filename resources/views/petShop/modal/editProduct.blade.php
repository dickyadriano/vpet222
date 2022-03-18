<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Add Product') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            Product Name
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-basket"></i></span>
                                </div>
                                <input class="form-control" placeholder="Product Name" type="text" name="productName"
                                       value="{{ $data->productName }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Quantity
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                                </div>
                                <input class="form-control" placeholder="Quantity" type="number" name="quantity" value="{{ $data->quantity }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            Price/Unit
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                                </div>
                                <input class="form-control" placeholder="Price/Unit" type="text" name="price" value="{{ $data->price }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            @csrf
                            <label for="image">Product Picture</label>
                            <input type="file" id="image" name="image" class="form-control @error('image') value="{{ $data->image }}" is-invalid @enderror">

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
