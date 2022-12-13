<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title . ($post->published ? '' : ' [DRAFT]')">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data"
            x-data @submit.prevent="$refs.published.value = $event.submitter.dataset.published; $event.target.submit();"
        >
            @csrf
            @method('PATCH')

            <input type="hidden" name="published" x-ref="published"/>
            <input type="hidden" name="body" id="body" value="{{ $post->body }}">

            <x-form.field>
                <x-form.label name="author"/>

                <select name="user_id" id="user_id" required>
                    @foreach (\App\Models\User::all() as $user)
                        <option
                            value="{{ $user->id }}"
                            {{ $user->id == $post->user_id ? 'selected' : '' }}
                        >{{ ucwords($user->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="author"/>
            </x-form.field>

            <x-form.input name="title" :value="old('title', $post->title)" required />
            <x-form.input name="slug" :value="old('slug', $post->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.editor name="body" />

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <div class="md:flex md:justify-evenly">
                @if (!($post->published))
                    <x-form.button data-published="0" color="gray">Save as Draft</x-form.button>
                @endif
                <x-form.button data-published="1">
                    {{ $post->published ? 'Update' : 'Publish' }}
                </x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
