@props([
    'forNavbar' => false,
    'model'
])

<a 
   href="{{ route('dashboard', ['model' => $model]) }}" 
   style="{{ $forNavbar ? 'padding: 12px 0px !important' : '' }}"
    @class([
        'dashboard-link',
        'sidebar-link-is-route' => (!$forNavbar) && request()->segment(count(request()->segments())) == $model
    ])
>
    {{ $model }} 
</a>