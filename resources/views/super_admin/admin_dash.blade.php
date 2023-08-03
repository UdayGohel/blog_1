@include('super_admin.Header')
    <div class="container text-center" id="dash_container">
        <div class="row justify-content-around">
            <div class="col-xl-3 p-5" id="total_Count">
                <h3><i class="bi bi-people-fill"></i> Total User </h3>
                <div>
                    <h4>{{ $userCount }}</h4>
                </div>
            </div>
            <div class="col-xl-3 p-5" id="total_Count">
                <h3><i class="bi bi-file-post-fill"></i> Total Posts</h3>
                <div>
                    <h4>{{ $postCount }}</h4>
                </div>
            </div>
        </div>
        <div class="row pt-5 justify-content-around">
            <div class="col-xl-3 p-5" id="total_Count">
                <h3><i class="bi bi-list-task"></i> Total Category</h3>
                <div>
                    <h4>{{ $categoryCount }}</h4>
                </div>
            </div>
            <div class="col-xl-3 p-5" id="total_Count">
                <h3><i class="bi bi-person-check-fill"></i> Total Admin</h3>
                <div>
                    <h4>{{ $adminCount }}</h4>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
