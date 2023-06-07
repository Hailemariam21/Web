<html>

<head>
    <title>Online Dormitory Management System</title>
    <link rel="icon" type="image/x-icon" href="image/DMU.jpg" />
    <style>
        nav {
            background-color: lightgreen;
            color: black;
            padding: 13px;
            font-size: 25px;
            display: flex; /* Add flex display to align items horizontally */
            justify-content: space-between; /* Add space between items */
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            margin-right: 10px;
        }

        .nav-links {
            display: flex; /* Add flex display to align links horizontally */
        }

        .nav-links li {
            margin-right: 10px;
        }

        a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
        }

        a:hover {
            background-color: #555;
        }

        #log{
            background-color: aquamarine;
            color: black;
        }
    </style>
</head>

<body>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php"> Home </a></li>
            <li><a href="about.php"> About </a></li>
            <li><a href="services.php"> Services </a></li>
            <li><a href="#contact"> Contact </a></li>
        </ul>
        <a href="login.php" id="log"> Login </a>
        <img src="image/DMU.jpg" width="40px" />
    </nav>
</body>
</html>