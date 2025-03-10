<flux:table.row data-id="{{ $item->id }}">
    @if (count(getLocalesManta()) > 1)
        <flux:table.cell><i class="fi fi-{{ $item->locale }}"></i></flux:table.cell>
    @endif
    <flux:table.cell>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</flux:table.cell>
    @if ($fields['name']['active'])
        <flux:table.cell>{{ $item->name }}</flux:table.cell>
    @endif
    @if ($fields['firstname']['active'])
        <flux:table.cell>{{ $item->firstname }}</flux:table.cell>
    @endif
    @if ($fields['lastname']['active'])
        <flux:table.cell>{{ $item->lastname }}</flux:table.cell>
    @endif
    @if ($fields['email']['active'])
        <flux:table.cell><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></flux:table.cell>
    @endif
    @if ($fields['phone']['active'])
        <flux:table.cell><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></flux:table.cell>
    @endif
    <flux:table.cell>
        <livewire:module-contact-button-email :contact="$item" />
    </flux:table.cell>
    <x-manta::flux.manta-flux-delete :$item :$route_name :$moduleClass uploads :translatable="false" />
</flux:table.row>
