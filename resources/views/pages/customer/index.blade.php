@extends('template.application')
@section('main')
    <div class="container-fluid mx-2 my-2">
        <h3 class="text-bold text-primary">顧客管理</h3>
        <div class="row">
            <div class="col-12">
                @if (session()->has('notice'))
                <div class="alert alert-success" role="alert">{{ session()->get('notice'); }}</div>
                @endif
                <a class="btn btn-sm btn-primary" href="{{ route('customer.create') }}">新增顧客</a>
                <hr>
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <th>#</th>
                        <th>顧客名稱</th>
                        <th>電話</th>
                        <th>地址</th>
                        <th>操作</th>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm mx-1 my-1" href="{{ route('customer.edit', $customer) }}">編輯</a>
                                    {{-- <a class="btn btn-danger mx-1 my-1" id="delete" href="{{ route('customer.destroy', $customer) }}">刪除</a> --}}
                                    <form class="d-inline" action="{{route('customer.destroy', $customer)}}" method="post" id="delete_form">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm mx-1 my-1" type="submit">刪除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {{-- <script type="text/javascript">
        $('.delete').click(()=>{
            if(confirm('你確定要刪除這筆資料嗎?')){
                $('.delete').find('form').submit();
            }
        })
    </script> --}}
@endsection
