<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data"
              x-data @submit.prevent="$refs.published.value = $event.submitter.dataset.published; $event.target.submit();"
        >
            @csrf

            <input type="hidden" name="published" x-ref="published"/>
            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" required />
            <x-form.textarea name="excerpt" required />
            <x-form.textarea name="body" required />

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <div class="md:flex md:justify-evenly">
                <x-form.button data-published="0" color="gray">Save as Draft</x-form.button>
                <x-form.button data-published="1">Publish</x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
