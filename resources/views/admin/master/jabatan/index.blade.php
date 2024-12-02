@extends ('layouts.main')
@section('title', 'Data Master Jabatan')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="mb-1 page-title">Data Jabatan</h3>
            <a href="{{ route('jabatan.create') }}">
                <button type="button" class="btn btn-primary btn-md btn-icon-split mt-1 mb-0"><span
                        class="fe fe-12 fe-plus-circle"></span>&nbsp; Tambah <i
                        class="mdi mdi-plus-circle-outline"></i></button>
            </a>
            <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- table -->
                            <table class="table datatables" id="dataTable-1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach ($jabatan as $jbt)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>{{ $jbt->nama_jabatan }}</td>
                                            <td>
                                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('jabatan.edit', $jbt->id) }}"><i
                                                            class="fe fe-edit fe-16"></i>&nbsp;Edit</a>
                                                    <form method="POST" action="{{ route('jabatan.destroy', $jbt->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="dropdown-item remove-item-btn"
                                                            data-toggle="tooltip" title='Delete'><i
                                                                class="fe fe-trash-2 fe-16"></i>&nbsp;Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- simple table -->
            </div> <!-- end section -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
@endsection
