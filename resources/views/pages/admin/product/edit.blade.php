@extends('layouts.admin')

@section('title')
    Produk
@endsection

@section('content')

          <div class="section-content sction-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Produk</h2>
                <p class="dashboard-subtitle">Edit Data {{ $item->name }}</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                      @endif
                    <div class="card">
                      <div class="card-body">
                        <form action="{{route('product.update', $item->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pemilik Produk</label>
                                        <select name="users_id" class="form-control">
                                           @foreach ($users as $user)
                                            <option value="{{ $item->users_id }}" selected > {{ $item->user->name }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kategori Produk</label>
                                        <select name="categories_id" class="form-control">
                                           @foreach ($categories as $category)
                                            <option value="{{ $item->categories_id }}" selected > {{ $item->category->name }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Harga Produk</label>
                                        <input type="number" name="price" class="form-control" required value="{{ $item->price }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi Produk</label>
                                        <textarea name="description" id="editor"
                                            class="form-control" required cols="30" rows="10">{!! $item->description !!}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class=" btn btn-success px-5">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
