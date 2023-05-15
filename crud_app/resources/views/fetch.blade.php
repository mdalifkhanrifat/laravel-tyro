<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container">
    <div class="row centered-form">
        <div class="col-lg-12 ">
            <p><a href="form">Add New Record</a></p>
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">CRUD Operation </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact-No</th>
                                <th>Gender</th>
                                <th>Qualification</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($crud as $index => $crud)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $crud->name }}
                                    </td>
                                    <td>
                                        {{ $crud->email }}
                                    </td>
                                    <td>
                                        {{ $crud->contact_no }}
                                    </td>
                                    <td>
                                        {{ $crud->gender }}
                                    </td>
                                    <td>
                                        {{ $crud->qualification }}
                                    </td>
                                    <td>
                                        {{ $crud->address }}
                                    </td>
                                    <td>&nbsp;&nbsp;
                                        <a href="{{ url('/edit-data/' . $crud->id) }}">
                                            <button class="btn btn-primary btn-xs"
                                                onClick="return confirm('Do you really want to Edit');"">Edit
                                                Data</button>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="{{ url('/delete-data/' . $crud->id) }}">
                                            <button class="btn btn-danger btn-xs"
                                                onClick="return confirm('Do you really want to delete');">Delete
                                                Data</button>
                                        </a>
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
<style type="text/css">
    body {
        background-color: #fff;
    }

    .centered-form {
        margin-top: 60px;
    }

    .centered-form .panel {
        background: rgba(255, 255, 255, 0.8);
        box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
    }
</style>
