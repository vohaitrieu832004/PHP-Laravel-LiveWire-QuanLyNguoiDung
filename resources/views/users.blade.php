<h1>DANH SÁCH NGƯỜI DÙNG</h1>

<ul>
    @foreach($ngdung as $i)
        <li>{{$i->name}}</li>
    @endforeach 
</ul>