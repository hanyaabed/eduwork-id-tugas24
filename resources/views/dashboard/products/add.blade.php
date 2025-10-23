<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk Baru') }}
        </h2>
    </x-slot>
    <div class="container py-5">
        @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Nama Produk -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama produk"
                            required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            placeholder="Tulis deskripsi produk" required></textarea>
                    </div>

                    <!-- Stok -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stock" name="stock"
                            placeholder="Masukkan jumlah stok" min="0" required>
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control" id="price" name="price"
                            placeholder="Masukkan harga produk" min="0" required>
                    </div>

                    <!-- Gambar -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori Produk</label>
                        <select class="form-select" id="product_category_id" name="product_category_id" required>
                            <option value="" disabled selected>Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('product_category_id' ) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Tambah Produk</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>