<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Add User</title>
    </head>
<body>
    {{#success}}
        Utilisteur Ok
    {{/success}}
    <form action="/users/posts" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name"><br/>
        <input type="text" name="lastname" placeholder="Lastname"><br/>
        <input type="email" name="email" placeholder="Email"><br/>
        <input type="file" name="file" placeholder="File"><br/>
        <input type="submit" value="Add"><br/>
    </form>
</body>
</html>