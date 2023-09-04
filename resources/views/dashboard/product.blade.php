@extends("layouts.dashboard")

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">
                            Products 
                            <span>
                                <a href="{{ route('dashboard.product.create') }}" class="btn btn-success btn-sm mt-1 mx-1">
                                    เพิ่มข้อมูล
                                </a>
                            </span>
                        </h4>
                        {{-- <p class="card-category">

                        </p> --}}
                    </div>
                    <div class="card-body ">

                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach ($products as $data)
                                    <tr>
                                        <td>
                                            {{ $data->id }}
                                        </td>
                                        <td>
                                            {{ $data->name }}
                                        </td>
                                        <td>
                                            {{ !empty($data->type) ? $data->Type->name : 'ไม่ได้ระบุประเภท' }}
                                        </td>
                                        <td>
                                            {{ number_format($data->price , 2) }}
                                        </td>
                                        <td>
                                            @if(!empty($data->image))
                                                <img 
                                                    src="{{ asset($data->image) }}" 
                                                    class="img-thumbnail" 
                                                    alt="{{ $data->name }}"
                                                    width="64"
                                                    height="64"
                                                />
                                            @else
                                                ไม่มีรูปภาพ
                                            @endif
                                        </td>
                                        <td>
                                            {{-- update --}}
                                                {{-- Button --}}
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateId{{ $data->id }}">
                                                    แก้ไข
                                                </button>
                                                {{-- Modal --}}
                                                <div class="modal fade" id="updateId{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    แก้ไข {{ $data->name }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="post" action="{{ route('dashboard.product.update', $data->id) }}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="product_name">
                                                                            ชื่อสินค้า
                                                                        </label>
                                                                        <input type="text" class="form-control" name="name" value="{{ $data->name }}" required />
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="type">
                                                                            ประเภทสินค้า
                                                                        </label>
                                                                        <select name="type" id="type" class="form-control" required>
                                                                            @if(!$data->type)
                                                                                <option value="" selected>
                                                                                    {{ __('เลือกประเภทสินค้า') }}
                                                                                </option>
                                                                            @endif
                                                                            @foreach($types as $type)
                                                                                <option value="{{ $type->id }}" {{ ($data->type == $type->id) ? 'selected' : '' }}>
                                                                                    {{ $type->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="">
                                                                            ราคา
                                                                        </label>
                                                                        <input class="form-control" type="number" name="price" value="{{ $data->price }}" required />
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
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- ./update --}}
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
