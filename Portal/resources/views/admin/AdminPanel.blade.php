@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"> Controls</div>
                <a href="/admin/add" class="btn btn-outline-primary btn-sm"> Users</a>
                <a href="/admin/perm" class="btn btn-outline-danger btn-sm"> Privilage</a>
                <a href="/upload" class="btn btn-outline-success btn-sm"> Uploads</a>
                <a href="/profile/personal" class="btn btn-outline-info btn-sm">Profile</a>
                <a href="/admin/course" class="btn btn-outline-dark btn-sm">Course</a>
                <a href="/notice" class="btn btn-outline-success btn-sm"> Notification</a>
            
            </div>

            <div class="card mt-5">
                <div class="card-header">
                    Write Notification
                </div>
                <div class="card-body">
                    <div class="item">
                        Message *
                    </div>
                    <form action="" method="POST">
                        
                        <textarea type="textarea" name="message" class="mt-2" placeholder="Write Here Your Message">
                        </textarea>

                        <input type="submit" value="Generate" class="btn btn-primary float-right mt-2" />

                    </form>
                </div>

            </div>

        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <h1 class="text-center"> Welcome User! Nothing To Show Here</h1>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
