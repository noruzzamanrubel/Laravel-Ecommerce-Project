@extends('layouts.app')

@section('content')

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="user_profile_info">
                        <div class="card">
                            <img class="card-img-top"
                                src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}">
                            <div class="card-body">
                                <h5 class="card-title">User Name: {{ $user->name }}</h5>
                                <p class="card-text">User Email: {{ $user->email }}</p>
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                                <a href="{{ route('user.password.edit') }}" class="btn btn-primary">Change Password</a>
                                <br><br>
                                <a href="{{ route('user.logout') }}" class="btn btn-primary">LogOut</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 card">
                    <table class="table table-response">
                        <thead>
                            <tr>
                                <th scope="col"># </th>
                                <th scope="col">First </th>
                                <th scope="col">Last </th>
                                <th scope="col">Body </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col">1 </td>
                                <td scope="col">Mark 1 </td>
                                <td scope="col">Mark 2 </td>
                                <td scope="col">Mark 3 </td>
                            </tr>
                            <tr>
                                <td scope="col">1 </td>
                                <td scope="col">Mark 1 </td>
                                <td scope="col">Mark 2 </td>
                                <td scope="col">Mark 3 </td>
                            </tr>
                            <tr>
                                <td scope="col">1 </td>
                                <td scope="col">Mark 1 </td>
                                <td scope="col">Mark 2 </td>
                                <td scope="col">Mark 3 </td>
                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>

        </div>


    </div>



@endsection
