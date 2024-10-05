<x-layouts.seeker-manager>
    <x-slot:title>
        求職一覧
    </x-slot:title>
    <h1>求職一覧</h1>
    @if (session('message'))
        <x-alert class="info">
            {{ session('message') }}
        </x-alert>
    @endif
    <a href="{{ route('seeker.create') }}">追加</a>
    <x-seeker-table :$seekers />
</x-layouts.seeker-manager>