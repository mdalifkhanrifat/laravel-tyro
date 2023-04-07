<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">CRUD Operation</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/update-data/'. $crud->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control input-sm"
                                placeholder="Name" required="" value="{{$crud->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control input-sm"
                                placeholder="Email Address" required="" value="{{$crud->email}}">
                        </div>
                        <div class="form-group">
                            <label for="contact_no">Contact No</label>
                            <input type="text" name="contact_no" id="contact_no" class="form-control input-sm"
                                placeholder="Contact No" required="" value="{{ $crud->contact_no }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Gender</label>
                            <input type="radio" name="gender" value="Male" checked="Male == {{ $crud->gender }}">Male
                            <input type="radio" name="gender" value="Female" checked="Female == {{ $crud->gender }}">Female
                        </div>
                        <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <select name="qualification" id="qualification" class="form-control input-sm"
                                placeholder="Qualification" required="" value="{{ $crud->qualification }}">
                                <option value="NA">--select--</option>
                                <option value="10th">10th</option>
                                <option value="12th">12th</option>
                                <option value="Graduation ">Graduation</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Address</label>
                            <textarea name="address" id="address" class="form-control input-sm" required="" value="{{ $crud->address }}"></textarea>
                        </div>
                        <input type="hidden" value="" name="id">
                        <input type="submit" name="submit" value="submit" class="btn btn-info btn-block">

                    </form>
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
