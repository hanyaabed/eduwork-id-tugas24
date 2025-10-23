<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('product.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Produk
            </a>
        </div>

        <table class="table table-striped table-bordered align-middle bg-white">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td><img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-width: 150px;" alt="products"></td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</x-app-layout>