<div>
    <div class="card">

        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" >
            {{$search}}
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('user.edit',$user)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
          {{-- {{ $users->links() }} --}}
        </div>
    </div>
</div>
