@extends('panel.layout.master')


@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')


<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="d-flex justify-content-between mb-4">
            <h5 class="font-weight-bold">لیست کامنت ها ({{ $comments->count() }})</h5>
        </div>

        <div>
            <table class="table table-bordered table-striped text-center" id="table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام کاربر</th>
                        <th>نام محصول</th>
                        <th>وضعیت کامنت</th>
                        <th>متن کامنت</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $key => $comment)
                    <tr>
                        <th>
                            {{ $loop->index+1 }}
                        </th>
                        <th>
                            {{ $comment->user->name }}
                        </th>
                        <th>
                            <a href="{{ route('product.show',['product'=>$comment->product->id]) }}">نام محصول</a>
                        </th>
                        <th class="commentStatus">
                            @if ($comment->commentStatus)
                            <span style="color:green">تایید شده</span> - <a href="#" data-cancel-comment-id="{{ $comment->id }}">لغو تایید</a>
                            @else
                            <span style="color:red">در انتظار تایید</span> - <a href="#" data-comment-id="{{ $comment->id }}">تایید کنید</a>
                            @endif
                        </th>
                        <th>
                            <span>{{substr($comment->text, 0,30)}}...</span> - <a href="#" data-text-id="{{ $comment->id }}">ادامه متن</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="fullComment">

            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    const table = document.querySelector("#table");
    const token = document.querySelector('meta[name="csrf-token"]').content;

    table.addEventListener("click", function(event) {

        let route = "";
        let request = "";

        if (event.target.hasAttribute('data-comment-id')) {
            event.preventDefault();
            const commentID = event.target.getAttribute('data-comment-id');
            route = " {{ route('comment.approve', ['comment'=>':id']) }}";
            route = route.replace(':id', commentID);
            request = "approved";
        }

        if (event.target.hasAttribute('data-cancel-comment-id')) {
            event.preventDefault();
            const commentID = event.target.getAttribute('data-cancel-comment-id');
            console.log(commentID);
            route = " {{ route('comment.cancel', ['comment'=>':id']) }}";
            route = route.replace(':id', commentID);
            request = "cancel";
        }

        const xhr = new XMLHttpRequest();
        xhr.open('post', route);
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.send();

        xhr.addEventListener("load", function() {
            const response = xhr.responseText;
            if (xhr.status == 200) {
                let a = event.target.getAttribute('data-comment-id');
                alert(response);

                if (request == "approved") {
                    event.target.parentElement.innerHTML = `<span style="color:green">تایید شده</span> - <a href="#" data-cancel-comment-id="${event.target.getAttribute('data-comment-id')}">لغو تایید</a>`
                } else {
                    event.target.parentElement.innerHTML = `<span style="color:red">در انتظار تایید</span> - <a href="#" id="approveComment" data-comment-id="${event.target.getAttribute('data-cancel-comment-id')}">تایید کنید</a>`
                }
            }
        });

    });

    table.addEventListener("click", function(event){
        if(event.target.hasAttribute('data-text-id')){
            event.preventDefault();

            const id = event.target.getAttribute('data-text-id');
            let route = "{{ route('comment.fullcomment', ['comment' => ':comment']) }}";
            route = route.replace(':comment', id);

            const xhr = new XMLHttpRequest();
            xhr.open('post', route);
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.send();

            xhr.addEventListener("load", function(){
                fullComment.innerHTML = `<p>${xhr.responseText}</p>`
            });
        }
    });


</script>
@endsection
