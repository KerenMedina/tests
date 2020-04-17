<form action="/store-post" method="post">
    {{ csfr_field() }}
    <input type="text" name="title">
    <textarea name="body"></textarea>
    <button>Save Post</button>
</form>