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
                        </h4>
                        <p class="card-category">
                            Here is a subtitle for this table
                        </p>
                    </div>
                    <div class="card-body table-full-width table-responsive">

                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Image</th>
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
                                            {{ $data->type }}
                                        </td>
                                        <td>
                                            {{ $data->price }}
                                        </td>
                                        <td>
                                            {{ $data->image }}
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
