@props(['color' => 'blue', 'textColor' => 'white'])

<x-form.field>
   <button
        {{ $attributes
            ->class(['uppercase font-semibold text-xs py-2 px-10 rounded-2xl'])
            ->merge(['type' => 'submit', 'class' => 'bg-'.$color.'-500 hover:bg-'.$color.'-600 text-'.$textColor]) 
        }}
    >
        {{ $slot }}
    </button>
</x-form.field>
