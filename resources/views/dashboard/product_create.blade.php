@extends("layouts.dashboard")

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">
                            Add Products
                        </h4>
                        <p class="card-category">
                            <a href="{{ route('dashboard.product') }}">
                                ย้อนกลับ
                            </a>
                        </p>
                    </div>
                    <div class="card-body table-full-width table-responsive mx-3 mb-2">

                        <form method="post" action="{{ route('dashboard.product.insert') }}" enctype="multipart/form-data">

                            @csrf

                            {{-- name --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    ชื่อสินค้า
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="name"
                                    value="{{ old('name') }}"
                                />
                                @error('name')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>

                            {{-- Type --}}
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">
                                    ประเภทสินค้า
                                </label>
                                <select name="type" class="form-control">
                                    <option value="">เลือกประเภทสินค้า</option>
                                    @foreach($type as $type)
                                        <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>

                            {{-- price --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    ราคา
                                </label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name="price"
                                    value="{{ old('price') }}"
                                />
                                @error('price')
                                    <span class="text-danger"> 
                                        {{ $message }} 
                                    </span>
                                @enderror
                            </div>

                            {{-- image --}}
                            <div class="mb-3">
                                <label class="custom-file-label" for="inputGroupFile01">
                                    รูปภาพ
                                </label>
                                <input type="file" class="form-control" name="image" />
                                @error('image')
                                    <span class="text-danger"> 
                                        {{ $message }} 
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
