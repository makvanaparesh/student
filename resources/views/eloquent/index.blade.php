<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Eloquent</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h3>User</h3>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Index</th>
                        <th>Post Title</th>
                        <th>Post Comments</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @foreach ($post->comments as $comment)
                                <div>
                                    {{ $comment->id }}. {{ $comment->comment }}
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>