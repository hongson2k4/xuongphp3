@extends('master')

@section('title')
    them xem chi tiet:{{ $customer->name }}
@endsection

@section('content')
    <h1>chi tiet khac hang:{{ $customer->name }}</h1>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ten truong</th>
                    <th scope="col">gia tri</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($customer->toArray() as $key => $value)
                    <tr class="">

                        <td scope="row"> {{ strtoupper($key) }} </td>
                        <td>
                            @php
                                switch ($key) {
                                    case 'is_active':
                                        echo $value
                                            ? '<span class="badge bg-primary">yes</span>'
                                            : '<span class="badge bg-danger">no</span>';

                                        break;

                                    case 'avatar':
                                        if ($value) {
                                            $url = Storage::url($value);
                                            echo "<img src='$url' width='100px'>";
                                        }

                                        break;

                                    

                                    default:
                                        echo $value;
                                        break;
                                }
                            @endphp
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
