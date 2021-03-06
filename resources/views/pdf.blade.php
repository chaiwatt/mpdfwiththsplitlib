<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=1252">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>MPDF</title>
        <style>
            body {
                font-family: "thsarabunnew";
                font-size: 18px
            }
            .justifycenter {
                text-align: justify;
                text-justify: inter-word;
            }
            .underlinedot{
                border-bottom: 1px dotted;
                width: 100%;
                display: block;
            }
            .lineheight1_6{
                line-height: 1.6;
            }
            p {
                border-bottom: 1px dotted black hidden;
                line-height: 30px;
                text-align: justify;
                /* text-indent: 50px; */
                word-break:break-all; 
                word-wrap:break-word;
                font-family: "thsarabunnew";
            }
            span {
                border-bottom: 1px  dotted;
                line-height: 30px;
                text-align: justify;
                /* text-indent: 50px; */
                word-break:break-all; 
                word-wrap:break-word;
                font-family: "thsarabunnew";
            }
            p>span {
                padding-bottom: 0px;
                vertical-align: top;
            }
        </style>
    </head>
    <body>
        <h1>{{ $title }}</h1>
        <p><span>{{$body}}</span></p>
    </body>
</html>