<div>
    <label>カテゴリ</label>
    <select name="content_id">
        @foreach ($contents as $content)
            <option 
                value="{{ $content->id }}" 
                @selected(
                    $content->id == old(
                        'content_id', 
                        $seeker->content_id
                    )
                )
            >
                {{ $content->title }}
            </option>
        @endforeach
    </select>
</div>
<div>
    <label>タイトル</label>
    <input type="text" name="title" 
        value="{{ old('title', $seeker->title) }}">
</div>
<div>
    <label>価格</label>
    <input type="text" name="price" 
        value="{{ old('price', $seeker->price) }}">
</div>
<div>
    <label>求人</label>
    <ul>
        @foreach ($employers as $employer)
            <li>
                <input type="checkbox" name="employer_ids[]" 
                    value="{{ $employer->id }}" 
                    @checked(
                        in_array(
                            $employer->id, 
                            old('employer_ids', $employerIds)
                        )
                    )
                >
                {{ $employer->name }}
            </li>
        @endforeach
    </ul>
</div>