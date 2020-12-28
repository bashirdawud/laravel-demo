<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <h2>All Categories</h2>
            
        </h2>
    </x-slot>

    
<div class="container">
    <div class="row mt-3 mb-3">
            <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-header">All Categories</div>
                
                        <table class="table ">
                            <thead>
                            <tr>
                                <th scope="col">sl no</th>
                                <th scope="col">category name</th>
                                <th scope="col">user</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$categories->firstItem()+ $loop->index }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td></td>
                                <td>
                                    @if($category->created_at == NULL)
                                        <p class="text-danger">No date is set</p>
                                    @else
                                    {{ $category->created_at->diffForHumans() }}</td>
                                    @endif
                                <td>
                                   <a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                   <a href="{{ url('/softdelete/update/'.$category->id) }}" class="btn btn-danger btn-sm" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif --}}
                
                
                <div class="card-header">Add Category</div>
                <div class="card-body">
                    <form action="{{ route('store.category') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Add Category</label>
                          <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Category</button>
                      </form>
                </div>
                
            </div>
        </div>
    </div>

        
</div>













    {{-- Trashed Part --}}

    <div class="container">
        <div class="row mt-3 mb-3">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Trashed Part</div>
                    
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th scope="col">sl no</th>
                                    <th scope="col">category name</th>
                                    <th scope="col">user</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trashCat as $category)
                                <tr>
                                    <th scope="row">{{$categories->firstItem()+ $loop->index }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    <td>
                                        @if($category->created_at == NULL)
                                            <p class="text-danger">No date is set</p>
                                        @else
                                        {{ $category->created_at->diffForHumans() }}</td>
                                        @endif
                                    <td>
                                       
                                       <a href="{{ url('/category/restore/'.$category->id) }}" class="btn btn-warning btn-sm" >Restore Category</a>
                                       <a href="{{ url('/category/pdelete/'.$category->id) }}" class="btn btn-danger">P Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $trashCat->links() }}
                </div>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
    
            
    </div>

</x-app-layout>
