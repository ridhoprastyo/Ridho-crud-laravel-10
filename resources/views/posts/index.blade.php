@extends('layouts.app')

@section('content')
  <div class="row my-5">
    <div class="col-md-12">
      <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
          <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-4 ">+ TAMBAH POST</a>
          <table class="table table-bordered text-center text-dark">
            <thead>
              <tr>
                <th scope="col">GAMBAR</th>
                <th scope="col">JUDUL</th>
                <th scope="col">CONTENT</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($posts as $post)
                <tr>
                  <td class="text-center">
                    <img src="{{ asset('/storage/posts/' . $post->image) }}" class="rounded" style="width: 150px">
                  </td>
                  <td>{{ $post->title }}</td>
                  <td>{!! $post->content !!}</td>
                  <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?');"
                      action="{{ route('posts.destroy', $post->id) }}" method="POST">
                      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-warning"><i
                          class="bi bi-eye-fill"></i></a>
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-secondary"><i
                          class="bi bi-pencil-square"></i></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <div class="alert alert-danger">
                  Data Post belum Tersedia.
                </div>
              @endforelse
            </tbody>
          </table>
          {{ $posts->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
