@extends("layouts.app")

@section("content")
    <section class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach ($pictures as $picture)
            <aside class="rounded bg-white border border-gray-200 p-6 w-full">
                {{-- Dog image --}}
                {{-- --------------------------------------------------------------------------------- --}}
                <img
                    class="w-full rounded-md h-48 object-cover"
                    src="{{ asset("storage/" . $picture->file_path) }}"
                >

                <p class="mt-2 font-bold text-xl mt-4">{{ $picture->name }}</p>

                {{-- Upvote section --}}
                {{-- --------------------------------------------------------------------------------- --}}
                <form
                    class="flex flex-wrap gap-6 items-center justify-between mt-3"
                    method="post"
                    action={{ "pictures/$picture->id/upvote" }}
                >
                    @csrf

                    <input
                        value="❤️ Upvote this doggo!"
                        type="submit"
                        class="py-4 px-3 bg-green-500 rounded-md text-white font-bold hover:bg-green-600 cursor-pointer"
                    >

                    <p class="mt-2 font-bold border-b-2 border-green-500 text-xl">{{ $picture->votes }} votes</p>
                </form>
            </aside>
        @endforeach
    </section>
@endsection