@extends('user.app')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h1> <strong>pengumuman 1</strong></h1>
                {{-- <p class="text-muted">{{ $post->created_at->format('d M Y ') }} Created By {{ $post->user->name }} 
                <a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->name }}</a>
            </p> --}}
            </div>
            <div class="col-md-8 mx-auto d-flex justify-content-center">
                {{-- <div class="w-100" style="height: 500px; background-color: grey; border-radius: 20px;"></div> --}}
                <img width="730px" height="500px" src="Bethany/assets/img/pengumuman/pe1.jpg"
                    style="border-radius:10px; object-fit:cover;">
            </div>
            <div class="col-md-8 mx-auto mt-4">
                <p>lorem Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type
                    specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in the
                    1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
                    recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                    Why do we use it?
                    It is a long established fact that a reader will be distracted by the readable
                    content of a page when looking at its layout. The point of using Lorem Ipsum
                    is that it has a more-or-less normal distribution of letters, as opposed to
                    using 'Content here, content here', making it look like readable English.
                    Many desktop publishing packages and web page editors now use Lorem Ipsum
                    as their default model text, and a search for 'lorem ipsum' will uncover many
                    web sites still in their infancy. Various versions have evolved over the years,
                    sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            </div>
        </div>
    </div>
@endsection
