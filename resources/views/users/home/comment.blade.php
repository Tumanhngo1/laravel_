<span>Đã có <span style="color: red">({{ count($post->comments) }})</span> bình luận</span>
@foreach ($post->comments as $comment)
    <section style="border: 1px solid rgb(240, 236, 236); margin:10px 0">
        <article class="flex">
            {{-- <div>
                <img style="width:5%;margin-top:3px" src="https://i.pravatar.cc/100" alt="">
            </div> --}}
            <div>
                <header style="display:flex">
                    <div>
                        <h5 style="color: rgb(35, 98, 235)" class="font-bold">{{ $comment->author->name }}:</h5>
                    </div>
                    <div>
                        <p class="text-xs">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>

                </header>
                <p>
                    {{ $comment->body }}
                </p>
                <div>
                    <a style="color: red" class="feel" href="#">Thich</a> | <a class="prereplay" href="#" data="{{ $comment->id }}">Tra loi</a>
                </div>
                <form style="display: none" id="replay_{{ $comment->id }}"
                    action="{{ route('replay', $comment->id) }}" method="Post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="body" class="form-control body" id="toReplay_{{ $comment->id }}"
                            value="{{ $comment->author->name }} : ">
                        <div class="input-group-append">
                            <button type="button" data="{{ $comment->id }}"
                                data-url="{{ route('replay', $comment->id) }}"
                                class="input-group-text toReplay">send</button>
                        </div>
                </form>

            </div>
            <div class="replay{{ $comment->id }}">
                @include('users.home.replay')
            </div>
        </article>
    </section>
@endforeach
