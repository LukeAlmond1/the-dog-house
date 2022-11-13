@extends("layouts.app")

@section("content")
<div class="bg-white p-4 w-2/3 mx-auto rounded-md">
    <h2 class="text-center text-3xl font-bold mt-4 ">🐶 Upload your dog!</h2>

    {{-- Form which handles uploading details about a users dog --}}
    {{-- ------------------------------------------------------------------------------------- --}}
    <form
        action="/pictures"
        class="flex flex-col px-4 w-full"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        {{-- Doggo's name  --}}
        {{-- --------------------------------------------------------------------------------- --}}
        <fieldset class="mt-6">
            <label
                for="name"
                class="font-bold"
            >
                Doggo's Name...
            </label>

            <input
                class="border-2 mt-1 border-slate-700 rounded-md w-full py-2 px-4 outline-none focus:border-blue-500"
                name="name"
                placeholder="Please enter your dogs name"
                type="text"
            />

            <p class="text-red-500 mt-1">@error("name"){{ $message }}@enderror</p>
        </fieldset>

        {{-- File upload --}}
        {{-- --------------------------------------------------------------------------------- --}}
        <fieldset class="mt-4">
            <label
                for="image"
                class="font-bold"
            >
                Upload an image of your doggo here...
            </label>

            <input
                class="border-2 mt-1 border-slate-700 rounded-md w-full py-2 px-4 outline-none focus:border-blue-500"
                name="image"
                type="file"
            />

            <p class="text-red-500 mt-1">@error("image"){{ $message }}@enderror</p>
        </fieldset>

        {{-- Submit form --}}
        {{-- --------------------------------------------------------------------------------- --}}
        <button
            type="submit"
            class="bg-blue-500 text-white mt-8 font-bold rounded-md py-4 w-full hover:bg-blue-600"
        >
            Submit your doggo!
        </button>
    </form>
</div>
@endsection