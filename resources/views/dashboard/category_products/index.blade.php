<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kategori Produk') }}
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
            <a href="{{ route('product-category.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Kategori
            </a>
        </div>

        <table class="table table-striped table-bordered align-middle bg-white">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->product_count }}</td>
                        <td>
                            <a href="{{ route('product-category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('product-category.destroy', $category->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>