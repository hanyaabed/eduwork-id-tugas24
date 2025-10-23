<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT') @csrf
                    <!-- Nama Produk -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"
                            required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
                    </div>

                    <!-- Stok -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stock" name="stock"
                            value="{{ $product->stock }}" min="0" required>
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $product->price }}" min="0" required>
                    </div>

                    <!-- Gambar -->
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <!-- Kategori -->
                    <div class="mb-3">
                        <label for="product_category_id" class="form-label">Kategori Produk</label>
                        <select class="form-select" id="product_category_id" name="product_category_id" required>
                            <option value="" disabled selected>Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->product_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Update Produk</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>