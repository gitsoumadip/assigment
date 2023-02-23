<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Test</title>
</head>

<body>
    <h1>Test</h1>

    <div class="container">
        {{-- <div class="row">
            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                <img src="..." class="card-img-bottom" alt="...">
            </div>
        </div> --}}
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <form id="AddUserForm" class="m-3">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <input type="test" class="form-control" id="gender"
                                placeholder="Enter Genter"name="gender">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" cols="10" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" placeholder="Upload image"
                                name="image">
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" id="submit" value="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src=""></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#AddUserForm').on("submit", function(e) {
                // var submitbtn = $(this).find("input[type=submit]");
                // $(submitbtn).text("Please Wait...");
                // $(submitbtn).props(disable, true);
                e.preventDefault();
                alert("Please Wait...");
                var data = new FormData(this);
                console.log(data);
                $.ajax({
                    url: "{{ route('test.adddata') }}",
                    type: "post",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        // if (data.success == true) {
                        //     $(submitbtn).text("submit");
                        //     $(submitbtn).props(disable, false);
                        //     alert(data.msg);
                        // } else {
                        //     alert(data.msg);
                        // }
                    }
                })

            })
        })
    </script>

</body>

</html>
