<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8"><link href="myLogo.ico" alt="iniGambar" rel="icon" type="image/x-icon">
    <meta property="og:description" content="[Web Portfolio] Web Portofolio muhamad oskhar mubarok, calon Programmer">
    <meta property="og:image" content="myLogo.ico" alt="iniGambar">
    <meta name="description" content="
        Author: Muhamad Oskhar Mubarok,
        Category: Web Portfolio,
        Date: December 2020,
        Purpose: Training ">
    <link rel="stylesheet" href="src/my_css/style.css">
    <title>Hi, I'm Oskhar 👋🏼</title>
</head>
<body>

    <div id="lantai">
        <button><</button>
        <button id="l3" onclick="gantiLantai(this, 29)">3</button>
        <button id="l2" onclick="gantiLantai(this, 16)">2</button>
        <button id="l1" onclick="gantiLantai(this, 3)" class="active">1</button>
        <button>></button>
    </div>
    <button id="log_user">Login User</button>
    <button id="log_admin">Login Admin</button>
    <script type="importmap">
        {
            "imports": {
                "three": "./node_modules/three/build/three.module.js"
            }
        }
    </script>

    <script type="module" src="src/my_js/App.js"></script>
    
</body>
</html>
