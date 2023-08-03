@include('super_admin.Header')
<div class="container text-center" id="admin_table">
    <h2 class="p-3">Admin Manage</h2>
    <table class="table table-striped table-hover table-light" id="adminTable">
        <thead class="table-dark">
            <th scope="col">Id</th>
            <th scope="col">Admin Name</th>
            <th scope="col">Total Posts</th>
            <th scope="col">Creation Date</th>
            <th scope="col">Manage</th>
        </thead>
        <tbody>
            @foreach ($showAdmin as $s)
                <a href="">
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $s->firstname }}</td>
                        <td>1</td>
                        <td>{{ $s->created_at->format('d/m/Y') }}</td>
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
                </a>
            @endforeach

        </tbody>
    </table>
</div>

@include('super_admin.Footer')
