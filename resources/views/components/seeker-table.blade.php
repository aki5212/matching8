<table border="1">
    <tr>
        <th>業務内容</th>
        <th>求職者</th>
        <th>価格</th>
        <th>更新</th>
        <th>削除</th>
    </tr>
    @foreach ($seekers as $seeker)
        <tr @if ($loop->even) style="background-color:#E0E0E0" @endif>
            <td>{{ $seeker->content->title }}</td>
            <td>
                <a href="{{ route('seeker.show', $seeker) }}">
                    {{ $seeker->title }}
                </a>
            </td>
            <td>{{ $seeker->price }}</td>
            <td>
                <a href="{{ route('seeker.edit', $seeker) }}">
                    <button>更新</button>
                </a>
            </td>
            <td>
                <form action="{{ route('seeker.destroy', $seeker) }}" 
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除">
                </form>
            </td>
        </tr>
    @endforeach
</table>