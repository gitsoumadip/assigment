@extends('layout.layout')
@section('main')
    <section class="topbar">
        <div class="container">
            <div class="topbar_inner">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Test</h3>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add +</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  ******************************************************************************************************** --}}

    <div class="table_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                </div>
                <div class="col-sm-12">
                    <div class="table_inner">
                        <div class="row">
                            <div class="col-sm-2 mb-3">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                    id="sortById">
                                    <option selected>Id Sort</option>
                                    <option value="id_asc">Low to high</option>
                                    <option value="id_desc">High to Low</option>
                                </select>
                            </div>
                            <div class="col-sm-2 mb-3">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                    id="sortByName">
                                    <option selected>Name Sort</option>
                                    <option value="name_asc">Low to high</option>
                                    <option value="name_desc">High to Low</option>
                                </select>
                            </div>
                        </div>
                        <table class="table" id="htmlBody">
                            <thead>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Message</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                {{-- {{$json_data}} --}}
                                @forelse ($json_data as $value)
                                    <tr>
                                        <td>{{ $value['id'] }}</td>
                                        <td> <img src="{{ $value['file'] }}" alt="" width="60" height="60"
                                                style="border-radius: 50%"></td>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['gender'] }}</td>
                                        <td>{{ $value['address'] }}</td>
                                        <td>
                                            <button class="btn btn-primary editButton" data-bs-toggle="modal"
                                                data-bs-target="#editdataModal" data-id="{{ $value['id'] }}">Edit</button>

                                            <button class="btn btn-primary deleteButton" data-bs-toggle="modal"
                                                data-bs-target="#deletedataModal"
                                                data-id="{{ $value['id'] }}">Delete</button>
                                        </td>

                                    </tr>
                                @empty
                                    <p>No data found !</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

    {{--  *************************************Add Section************************************************************* --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="AddUserForm">
                        @csrf
                        <input type="hidden" name="id" id="" value="{{ time() }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter User Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                                <label class="form-check-label" for="Male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                                <label class="form-check-label" for="Female">Female</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" cols="10" rows="1"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="modal-footer">
                            <input type="submit" id="submit" value="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{--  ***************************Edit Section********************************************************************** --}}

    <!-- Modal -->
    <div class="modal fade" id="editdataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="EditUserForm">
                        @csrf
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="edit_name"
                                placeholder="Enter User Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender_male"
                                    value="male">
                                <label class="form-check-label" for="Male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_gender"
                                    id="edit_gender_female" value="female">
                                <label class="form-check-label" for="Female">Female</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="edit_address" name="edit_address" cols="10" rows="1"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="float">
                                <img id="imgg" alt="" width="60" height="60">
                                <img id="blah" src="#" alt="your image" width="60" height="60" />
                            </div>
                            <br>
                            <label for="image" class="form-label">Image</label>
                            <input type="hidden" name="" id="edit_image_hid" value="">
                            <input type="file" class="form-control" id="edit_image" name="edit_image">
                        </div>

                        <div class="modal-footer">
                            <input type="submit" id="submit" value="submit" class="btn btn-primary">
                            {{-- <button type="button" id="submit" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{--  ***************************************Delete Section*********************************************************** --}}

    <div class="modal fade" id="deletedataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="deleteUserForm">
                        @csrf
                        <input type="hidden" name="delete_id" id="delete_id">
                        <p>Are you sure you want to delete Data?</p>
                        <div class="modal-footer">
                            <input type="submit" id="submit" value="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
{{--  *************************************Script Section*********************************************************** --}}

@push('scripts')
    <script>
        $(document).ready(function() {
            //hide image box
            $('#blah').css('display', 'none');

            // ***********************Add********************************************************************************

            //Add Data to get form  and insert in json file

            $('#AddUserForm').on("submit", function(e) {
                e.preventDefault();
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
                        // console.log(data);
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                })

            })
            // *********************Edit & update***************************************************************************
            //Edit form Data

            // $(".editButton").click(function() {
            $(document).on('click', '.editButton', function() {
                var id = $(this).attr('data-id');
                console.log(id);
                // alert(id);
                $("#edit_id").val(id);
                $.ajax({
                    url: "{{ route('test.editData') }}",
                    type: 'get',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        // console.log(res.data.gender);
                        if (res.success == true) {
                            $('#edit_name').val(res.data.name);
                            if (res.data.gender == 'male') {
                                console.log(res.data.gender);
                                $('input[id="edit_gender_male"]').attr("checked", "checked");
                            } else {
                                console.log(res.data.gender);
                                $('input[id="edit_gender_female"]').attr("checked", "checked");
                            }
                            $('#edit_image_hid').val(res.data.file);
                            $('#edit_address').val(res.data.address);
                            $('#imgg').attr('src', res.data.file);

                        }
                    }
                });

            });

            //update form data
            $("#EditUserForm").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);;
                console.log(formData);
                $.ajax({
                    url: "{{ route('test.updateData') }}",
                    type: "post",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        // console.log(res);
                        if (res.success == true) {
                            // console.log("success", res);
                            location.reload();
                        } else {
                            //printErrorMsg(res);
                            alert("error", res.msg);
                        }
                    }
                });
            });
            // *************************Delete*******************************************************************************

            // Delete get id and set id
            $(".deleteButton").click(function() {
                var id = $(this).attr('data-id');
                // console.log(item_id);
                $("#delete_id").val(id);
            });

            //delete data id ways
            $("#deleteUserForm").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);;
                console.log(formData);
                $.ajax({
                    url: "{{ route('test.deleteData') }}",
                    type: "post",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // console.log(data);
                        if (data.success == true) {
                            location.reload();
                        } else {
                            //printErrorMsg(res);
                            alert("error", data.msg);
                        }
                    }
                });
            });
            // ****************************Sort****************************************************************************

            //sort data by id
            $("#sortById").change(function() {
                var data = $(this).val();
                var my_data = @json($json_data);
                console.log(my_data);
                if (data == 'id_asc') {
                    output = sortJSON(my_data, "id", true);
                } else {
                    output = sortJSON(my_data, "id", false);
                }
                appendHtml(output);
            });

            //sort data by name
            $("#sortByName").change(function() {
                var data = $(this).val();
                var my_data = @json($json_data);

                if (data == 'name_asc') {
                    output = sortJSON(my_data, "name", true);
                } else {
                    output = sortJSON(my_data, "name", false);
                }
                appendHtml(output);
            });

            //compare the data
            function sortJSON(arr, key, asc = true) {
                return arr.sort((a, b) => {
                    let x = a[key] == a["id"] ? parseInt(a[key]) : a[key];
                    let y = b[key] == b["id"] ? parseInt(b[key]) : b[key];
                    if (asc) {
                        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                    } else {
                        return ((x > y) ? -1 : ((x < y) ? 1 : 0));
                    }
                });
            }

            // showing the data use table
            function appendHtml(output) {
                var html = '';
                html += `
                 <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                 </thead>`;
                for (let index = 0; index < output.length; index++) {
                    html += `
            <tr>
                <td>` + output[index]['id'] + `</td>
                <td> <img src="` + output[index]['file'] + `" alt="" width="60"
                                                height="60" style="border-radius: 50%"></td>
                <td>` + output[index]['name'] + `</td>
                <td>` + output[index]['gender'] + `</td>
                <td>` + output[index]['address'] + `</td>
                <td>
                    <button class="btn btn-primary editButton" data-bs-toggle="modal"
                     data-bs-target="#editdataModal" data-id="` + output[index]['id'] + `">Edit</button>

                    <button class="btn btn-primary deleteButton" data-bs-toggle="modal"
                       data-bs-target="#deletedataModal"
                                                data-id="` + output[index]['id'] + `">Delete</button>
                </td>
            </tr>
            `;
                }

                $("#htmlBody").html(html);
            }
        })
    </script>
    {{-- ******************************************************************************************************* --}}
    <script>
        // image upload time showing
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#edit_image").change(function() {
            $('#blah').css('display', 'block');
            readURL(this);
        });
    </script>
@endpush
