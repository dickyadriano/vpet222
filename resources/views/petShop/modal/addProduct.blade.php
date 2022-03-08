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
                    <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-basket"></i></span>
                            </div>
                            <input class="form-control" placeholder="Product Name" type="text" name="productName" value="{{ old('ProductName') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                            </div>
                            <input class="form-control" placeholder="Quantity" type="number" name="quantity" value="{{ old('Quantity') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-alternative mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                            </div>
                            <input class="form-control" placeholder="Price/Unit" type="text" name="price" value="{{ old('Price') }}" required autofocus>
                        </div>
                    </div>

                    <form enctype="multipart/form-data" action="{!! route('petShop-profilePic') !!}" method="post">
                        @csrf
                        <input type="file" name="avatar" class="form-control">
                    </form>

                    <form method="post">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4" id="submit_button" disabled>Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
