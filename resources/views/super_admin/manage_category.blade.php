@include('super_admin.Header')
<div class="container text-center" id="admin_table">
    <h2 class="p-3">Category</h2>
    <table class="table table-striped table-hover table-light" id="adminTable">
        <thead class="table-dark">
            <th scope="col">Id</th>
            <th scope="col">Category title</th>
            <th scope="col"> Category description</th>
            <th scope="col">Creation Date</th>
            <th scope="col">Manage</th>
        </thead>
        <tbody>
            @foreach ($cat as $category)
                @if ($category->deleted_at == null)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ Str::limit($category->description, 50) }}</td>
                        <td>{{ date('d/m/Y', strtotime($category->updated_at)) }}</td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <i class="bi bi-trash-fill" style="font-size: 1.2rem;"></i>
                                </div>
                                <div class="col-6">
                                    <i class="bi bi-pencil-square" style="font-size: 1.2rem;"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@include('super_admin.Footer')
