<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    
    <div class="auth-card">
        <button class="cancel"><a href="Index.html" class="times">&times;</a></button>
        <h1>AO Login</h1>
        <p><span class="note">Note:</span>Only members of this group can login</p>

    <form method='POST'>        
       <input type="text" id="username" placeholder="Username" name="username">
        <input type="password" id="password" placeholder="Password" name="password">
       
        <button type="submit" id="button">Login</button>
    </form>
    </div>
</body>
</html>