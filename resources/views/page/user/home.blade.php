@extends('layout')

@section('title')
{{$title}}
@endsection
@section('content')
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new user</button>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('user.add')}}" method="post" class="form_add_user">
                    <div>
                        <label for="validationCustom01" class="form-label">User Name</label>
                        <input type="text" name='name' class="form-control input_name" id="validationCustom01"
                            placeholder="User Name">
                    </div>
                    <div>
                        <label for="validationCustom02" class="form-label">Email address</label>
                        <input type="email" name='email' class="form-control input_email" id="validationCustom02"
                            placeholder="name@example.com">
                    </div>
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script src="/js/formAdd.js"></script>

    @endsection