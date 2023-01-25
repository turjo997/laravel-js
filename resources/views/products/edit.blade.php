@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
</div>
<form action="{{ route('product.update' , $product) }}" method="post">
    @csrf
    @method('put')
    <section>
        <div class="row">
            <div class="col-md-6">
                <!--                    Product-->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                    </div>
                    <div class="card-body border">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="title" id="product_name" required placeholder="Product Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="product_sku">Product SKU</label>
                            <input type="text" name="sku" id="product_sku" required placeholder="Product Name" class="form-control">
                        </div>
                        <div class="form-group mb-0">
                            <label for="product_description">Description</label>
                            <textarea name="description" id="product_description" required rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <!--Media-->


            </div>

            <!--                Variants-->


            <!-- Preview -->


        </div>
        <button type="submit" class="btn btn-lg btn-primary">Save</button>
        <button type="submit" class="btn btn-secondary btn-lg">Cancel</button>
    </section>
</form>
@endsection

@push('page_js')
<script type="text/javascript" src="{{ asset('js/product.js') }}"></script>
@endpush