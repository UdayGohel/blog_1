@include('super_admin.Header')
<div class="container text-center" id="admin_table">
    <h2 class="p-3">User Details</h2>
    <table class="table table-striped table-hover table-light" id="adminTable">
        <thead class="table-dark">
            <th scope="col">Id</th>
            <th scope="col">Firstname</th>
            <th scope="col">Email</th>
            <th scope="col">Creation Date</th>
            <th scope="col">Manage</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if ($user->deleted_at == null)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ date('d/m/Y', strtotime($user->updated_at)) }}</td>
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
