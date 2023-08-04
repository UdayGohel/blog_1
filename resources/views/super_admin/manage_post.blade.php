@include('super_admin.Header')
<div class="container text-center" id="admin_table">
    <h2 class="p-3">Admin Posts</h2>
    <table class="table table-striped table-hover table-light" id="adminTable">
        <thead class="table-dark">
            <th scope="col">Id</th>
            <th scope="col">post title</th>
            <th scope="col"> Posts Description</th>
            <th scope="col">Category</th>
            <th scope="col"> Creation By</th>
            <th scope="col">Creation Date</th>
            <th scope="col">Manage</th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                @if ($post->deleted_at == null)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $post->post_title }}</td>
                        <td>{{ Str::limit($post->body, 50) }}</td>
                        <td>{{ $post->title }} </td>
                        <td>{{ $post->firstname }}</td>
                        <td>{{ date('d/m/Y', strtotime($post->updated_at)) }}</td>
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
