<x-layouts.seeker-manager>
    <x-slot:title>
        求職登録
    </x-slot:title>
    <h1>求職登録</h1>
    @if ($errors->any())
        <x-alert class="danger">
            <x-error-messages :$errors />
        </x-alert>
    @endif
    <form action="{{ route('seeker.store') }}" method="POST">
        @csrf
        <x-seeker-form :$contents :$employers />
        <input type="submit" value="送信">
    </form>
</x-layouts.seeker-manager>
