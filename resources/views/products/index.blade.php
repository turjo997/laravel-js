@extends('layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>
</div>


<div class="card">
    <form action="" method="" class="card-header">
        <div class="form-row justify-content-between">
            <div class="col-md-2">
                <input type="text" name="search" placeholder="Product Title" class="form-control">
            </div>


            <div class="col-md-2">

                <select name="variant" id="" class="form-control">
                    <option value="Category">--Select A Variant--</option>
                    <optgroup label="Color">
                        <option name="red">Red</option>
                        <option name="black">Black</option>
                        <option name="green">Green</option>
                    </optgroup>
                    <optgroup label="Size">
                        <option name="XL">XL</option>
                        <option name="L">L</option>
                        <option name="red">SM</option>
                    </optgroup>
                    <optgroup label="Style">
                        <option>v-nick</option>
                        <option>o-nick</option>
                    </optgroup>
                </select>
                <!-- <select name="variant" id="" class="form-control">
                    <option value="Category">--Select A Variant--</option>
                    <option value="Novel">Novel</option>
                    <option value="Action">Action</option>
                    <option value="Comics">Comics</option>
                    <option value="Detactive">Detactive</option>
                </select> -->
            </div>

            <div class="col-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Price Range</span>
                    </div>
                    <input type="text" name="price_from" placeholder="From" class="form-control">
                    <input type="text" name="price_to" placeholder="To" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <input type="date" name="date" placeholder="Date" class="form-control">
            </div>


            <div class="col-md-1">
                <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

    <div class="card-body">
        <div class="table-response">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Variant</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($variants as $key=>$variant)
                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{ $variant->title }} &nbsp;Created At:{{substr($variant->created_at,0,10)}}</td>
                        <td>{{ nl2br($variant->description) }}</td>
                        <td>{{ $variant->variant}}&nbsp;Price:{{ $variant->price}}
                            &nbsp;In Stock:{{ $variant->stock}}
                        </td>
                        <td><a href="{{ route('product.edit',$variant->id)}}" class="btn btn-success">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="row justify-content-between">
            <div>
                {{$variants->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
<style>
    .w-5 {
        display: none;
    }
</style>