<x-layouts.seeker-manager>
    <x-slot:title>
        求職更新
    </x-slot:title>

    <h1>求職更新</h1>
    @if ($errors->any())
        <x-alert class="danger">
            <x-error-messages :errors="$errors" />
        </x-alert>
    @endif
    <form action="{{ route('seeker.update', $seeker) }}" method="POST">        
        @csrf
        @method('PUT')
        <x-seeker-form :$categories :$employers :$seeker :$employerIds />
        <input type="submit" value="送信">
    </form>
</x-layouts.seeker-manager>