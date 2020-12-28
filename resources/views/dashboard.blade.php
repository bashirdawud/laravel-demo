<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome, <b>{{ Auth::user()->name }}</b>
            <b style="float:right;"> Total Users
              <span style="color: red;" class="badge badge-danger">{{ count($users) }}</span>
            </b>
        </h2>
    </x-slot>

    
    <div class="container">
        <div class="row">
            <table class="table ">
                <thead>
                  <tr>
                    <th scope="col">sl no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user)
                  <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        
    </div>

</x-app-layout>
