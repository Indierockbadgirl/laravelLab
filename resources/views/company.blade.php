<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@extends('layouts.appLab2')

@section('content')
    
    <h1>สวัสดี {{auth()->user()->name}}</h1>
    <table class="table">
        <thead><th>ชื่อบริษัท</th><th>ราคาที่จดทะเบียน</th><th>ขนาดบริษัท</th><th>ชื่อเจ้าของบริษัท</th></thead>
        <tbody>
            @foreach ($companys as $item)
                <tr>
                    <td>{{$item->company_name}}</td>
                    <td>{{$item->company_price}}</td>
                    <td>
                        @if ($item->company_price<5000000)
                            ขนาดเล็ก
                        @elseif ($item->company_price>5000000)
                            ขนาดกลาง
                        @elseif ($item->company_price>10000000)
                            ขนาดใหญ่
                        @endif
                    </td>
                    <td>{{$item->user->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection