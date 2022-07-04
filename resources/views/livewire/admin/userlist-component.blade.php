<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">All Users</div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Password</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userlist as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->type}}</td>
                                <td>{{$user->password}}</td>
                                <td>
                                    <a href="{{route('admin.edituserlist',['user_email'=>$user->email])}}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="#" wire:click.prevent="deleteUser({{$user->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$userlist->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
