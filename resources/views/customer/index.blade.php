@extends('master')

@section('title')
    danh sang khac hang
@endsection

@section('content')
    <h3>danh sach khach hang</h3>
    <a href="{{ route('customers.create') }}">them moi</a>



    @if (session()->has('success') && !session()->get('success'))
        <div class="alert alert-danger">
            {{ session->get('error') }}
        </div>
    @endif


    @if (session()->has('success') && !session()->get('success'))
        <div class="alert alert-info">
            lam thanh cong
        </div>
    @endif


    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">address</th>
                    <th scope="col">image</th>
                    <th scope="col">phone</th>
                    <th scope="col">email</th>
                    <th scope="col">is_active</th>
                    <th scope="col">created at</th>
                    <th scope="col">updated at</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $customer)
                    <tr>
                        <td scope="row">{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            @if ($customer->avatar)
                                <img src="{{ Storage::url($customer->avatar) }}" width="100px">
                            @endif
                        </td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            @if ($customer->is_active)
                                <span class="badge bg-primary">yes</span>
                            @else
                                <span class="badge bg-danger">no</span>
                            @endif
                        </td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('customers.show', $customer) }}">show</a>
                            <a class="btn btn-warning" href="{{ route('customers.edit', $customer) }}">edit</a>

                            <form action="{{ route('customers.destroy', $customer) }}" method="post">

                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('co chac xoa k')" class="btn btn-danger" >
                                    xoa men
                                </button>

                            </form>
                            <form action="{{ route('customers.forceDestroy', $customer) }}" method="post">

                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('co chac xoa k')" class="btn btn-dark">
                                    xoa cung
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links()}}
    </div>
@endsection
