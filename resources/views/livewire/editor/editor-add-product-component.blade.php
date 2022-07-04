<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('editor.products')}}" class="btn btn-success pull-right">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Enter product name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product slug" class="form-control input-md" wire:model="slug">
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Short description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Short description" wire:model="short_description"></textarea>
                                    @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Description" wire:model="description"></textarea>
                                    @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Regular price" class="form-control input-md" wire:model="regular_price">
                                    @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale price" class="form-control input-md" wire:model="sale_price">
                                    @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                    @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">InStock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Featured</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity">
                                    @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" placeholder="Image" class="input-file" wire:model="image">
                                    @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120">
                                    @endif
                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
