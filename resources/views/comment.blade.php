<style>
    textarea{
        width:30rem;
        height:10rem;
    }
    .comment{
        padding-left: 10rem;

    }
    .button{
            background-color: rgb(241, 103, 53);
        }
</style>

<div>
    <div class="my-5 ">
        <h1 class="md:text-5xl sm:text-3xl text-lg font-bold uppercase text-center text-light mb-5">Comments</h1>
        <form class="text-center mt-10  sm:mx-20 mx-7 " action="{{ url('/add_comment') }}" method="post">
            @csrf
            <textarea id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                placeholder="Write your thoughts here..." name="comment"></textarea><br>
            <input type="submit" value="Comment"
                class="button rounded mt-2 text-white md:px-5 my-7 md:py-2 sm:px-3 sm:py-1 px-2 py-1  border-2 rounded-lg sm:text-lg text-xs border-white">
        </form>
    </div>
</div>

<div>
    <div class="border sm:mx-24 mx-2 md:max-w-6xl  sm:max-w-3xl justify-end pb-10 mb-10 text-light">
        <h3 class="md:text-3xl sm:text-2xl text-lg  text-center my-5 font-bold">All comments</h3>
        @foreach ($comment as $comments)
            <div class="mb-5 pl-5 comment ">
                <b>{{ $comments->name }}</b>
                <p>{{ $comments->comment }}</p>
                {{-- <a href="javascript::void(0)" class=" text-blue-500" onclick="reply(this)"
                    data-Commentid="{{ $comments->id }}">Reply</a>
                @foreach ($reply as $replies)
                    @if ($replies->comment_id == $comments->id)
                        <div class="ml-3 mt-3">
                            <b>{{ $replies->name }}</b>
                            <p>{{ $replies->reply }}</p>
                            <a href="javascript::void(0)" class="text-blue-500 " onclick="reply(this)"
                                data-Commentid="{{ $comments->id }}">Reply</a>
                        </div>
                    @endif
                @endforeach --}}
            </div>
        @endforeach
        <!-- reply textbox -->
        <div style="display:none" class="replyDiv">
            <form action="{{ url('/add_reply') }}" method="post">
                @csrf
                <input type="text" name="commentId" id="commentId" hidden>
                <textarea name="reply" id="" cols="50" rows="5" placeholder="Write something here"></textarea><br>
                <input type="submit" value="Reply" style="background-color:rgb(121, 8, 8);"
                    class="btn btn-primary btn-outline-light text-light">
                <a href="javascript::void(0)" onclick="reply_close(this)" class="btn btn-dark">Close</a>
            </form>
        </div>
    </div>
</div>

<script>
    function reply(caller) {
        document.getElementById('commentId').value = $(caller).attr('data-Commentid')
        $('.replyDiv').insertAfter($(caller))
        $('.replyDiv').show();
    }

    function reply_close(caller) {
        $('.replyDiv').hide();
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = sessionStorage.getItem('scrollpos');
        if (scrollpos) {
            window.scrollTo(0, scrollpos);
            sessionStorage.removeItem('scrollpos');
        }
    });

    window.addEventListener("beforeunload", function(e) {
        sessionStorage.setItem('scrollpos', window.scrollY);
    });
</script>
