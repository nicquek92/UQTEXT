<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Refresh" content="5;URL=../login.php">
    <meta charset="UTF-8">
    <title>Verify Email</title>
    <meta name="description" content="Please verify your account." >

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <style>

        body{
            font-family: 'Noto Sans', Arial, serif;
            font-weight: 400;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            line-height: 1.618em;
            background: #464646 url('../imgs/book.png') center center no-repeat fixed;
            background-size: cover;
        }
        h2{
            font-family: 'Noto Sans', Arial, serif;
            font-weight: 700;
            font-size:40px;
            line-height: 1.618em;
        }
        section{
            max-width:800px;
            margin:8% auto 1em auto;
            background-color:#222;
            opacity: 0.8;
            filter: alpha(opacity=80); /* For IE8 and earlier */
            color:#fff;
            padding:1em 5%;
        }

        a{
            color: #00CC66;
        }
        a:focus{
            outline:none;
            outline-offset:inherit;
        }
        @media (max-device-width: 1027px) {

            body{
                text-align:center;
                font-size:larger;
            }
            section{
                max-width: 90%;
            }

        }

        @media (max-device-width: 640px) {
            section{
                max-width: 97%;
            }

        }

    </style>
</head>
<body>
<section>
    <h2>We sent you the verification link to your email. </h2>

    <h3>Please verify your account and log in back</h3>
    <h3>...You will be transferred to Login page in 5 seconds...</h3>
<a href="../login.php"><button class="btn btn-success">Login Now</button> </a>
</section>

</body>
</html>